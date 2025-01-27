<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Administrador;
use App\Models\Usuario;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AdministradorTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Verificar que se puede listar a los administradores.
     */
    public function test_listar_administradores()
    {
        // Crear administradores de prueba
        Administrador::factory()->create(['cargo' => 'Gerente General']);
        Administrador::factory()->create(['cargo' => 'Jefe de TI']);

        // Realizar una solicitud GET a la ruta de index de administradores
        $response = $this->get(route('administradores.index'));

        // Verificar que la respuesta sea exitosa y contenga los datos
        $response->assertStatus(200)
                 ->assertSee('Gerente General')
                 ->assertSee('Jefe de TI');
    }

    /**
     * Verificar que un administrador puede ser creado correctamente.
     */
    public function test_crear_administrador()
    {
        // Crear un usuario para asociarlo con el administrador
        $usuario = Usuario::factory()->create();

        // Datos de prueba para el nuevo administrador
        $adminData = [
            'usuario_id' => $usuario->id,
            'cargo' => 'Director',
            'departamento' => 'Finanzas',
        ];

        // Realizar una solicitud POST para crear el administrador
        $response = $this->post(route('administradores.store'), $adminData);

        // Verificar que la redirección es correcta
        $response->assertRedirect(route('administradores.index'));

        // Verificar que el administrador fue creado en la base de datos
        $this->assertDatabaseHas('administradors', $adminData);
    }

    /**
     * Verificar que un administrador puede ser actualizado.
     */
    public function test_actualizar_administrador()
    {
        // Crear un administrador de prueba
        $admin = Administrador::factory()->create([
            'cargo' => 'Subdirector',
            'departamento' => 'RRHH',
        ]);

        // Nuevos datos para actualizar el administrador
        $updatedData = [
            'cargo' => 'Director General',
            'departamento' => 'Recursos Humanos',
        ];

        // Realizar una solicitud PUT para actualizar el administrador
        $response = $this->put(route('administradores.update', $admin->id), $updatedData);

        // Verificar que la redirección es correcta
        $response->assertRedirect(route('administradores.index'));

        // Verificar que los datos fueron actualizados en la base de datos
        $this->assertDatabaseHas('administradors', array_merge(['id' => $admin->id], $updatedData));
    }

    /**
     * Verificar que un administrador puede ser eliminado.
     */
    public function test_eliminar_administrador()
    {
        // Crear un administrador de prueba
        $admin = Administrador::factory()->create([
            'cargo' => 'Temporal',
            'departamento' => 'Pruebas',
        ]);

        // Realizar una solicitud DELETE para eliminar el administrador
        $response = $this->delete(route('administradores.destroy', $admin->id));

        // Verificar que la redirección es correcta
        $response->assertRedirect(route('administradores.index'));

        // Verificar que el administrador fue eliminado de la base de datos
        $this->assertDatabaseMissing('administradors', ['id' => $admin->id]);
    }
}

