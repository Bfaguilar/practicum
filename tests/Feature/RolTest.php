<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Rol;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RolTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Verificar que los roles pueden listarse correctamente.
     */
    public function test_listar_roles()
    {
        // Crear roles de prueba
        Rol::factory()->create(['nombre' => 'Administrador']);
        Rol::factory()->create(['nombre' => 'Usuario']);

        // Realizar una solicitud GET a la ruta index de roles
        $response = $this->get(route('roles.index'));

        // Verificar que la respuesta sea exitosa
        $response->assertStatus(200);

        // Verificar que los roles creados se muestren en la vista
        $response->assertSee('Administrador');
        $response->assertSee('Usuario');
    }

    /**
     * Verificar que un rol puede ser creado correctamente.
     */
    public function test_crear_rol()
    {
        // Datos de ejemplo para un nuevo rol
        $rolData = [
            'nombre' => 'Editor',
            'descripcion' => 'Puede editar contenido.',
        ];

        // Realizar una solicitud POST para crear un rol
        $response = $this->post(route('roles.store'), $rolData);

        // Verificar que la redirección es correcta
        $response->assertRedirect(route('roles.index'));

        // Verificar que el rol fue creado en la base de datos
        $this->assertDatabaseHas('roles', $rolData);
    }

    /**
     * Verificar que un rol puede ser actualizado correctamente.
     */
    public function test_actualizar_rol()
    {
        // Crear un rol de prueba
        $rol = Rol::factory()->create([
            'nombre' => 'Usuario',
            'descripcion' => 'Acceso limitado.',
        ]);

        // Datos actualizados
        $updatedData = [
            'nombre' => 'Usuario Avanzado',
            'descripcion' => 'Acceso con permisos adicionales.',
        ];

        // Realizar una solicitud PUT para actualizar el rol
        $response = $this->put(route('roles.update', $rol->id), $updatedData);

        // Verificar que la redirección es correcta
        $response->assertRedirect(route('roles.index'));

        // Verificar que los datos fueron actualizados en la base de datos
        $this->assertDatabaseHas('roles', $updatedData);
    }

    /**
     * Verificar que un rol puede ser eliminado correctamente.
     */
    public function test_eliminar_rol()
    {
        // Crear un rol de prueba
        $rol = Rol::factory()->create([
            'nombre' => 'Temporal',
            'descripcion' => 'Rol para pruebas.',
        ]);

        // Realizar una solicitud DELETE para eliminar el rol
        $response = $this->delete(route('roles.destroy', $rol->id));

        // Verificar que la redirección es correcta
        $response->assertRedirect(route('roles.index'));

        // Verificar que el rol fue eliminado de la base de datos
        $this->assertDatabaseMissing('roles', ['id' => $rol->id]);
    }
}
