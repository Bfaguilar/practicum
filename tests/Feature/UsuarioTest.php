<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Usuario;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UsuarioTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Verificar que un usuario puede ser listado correctamente.
     */
    public function test_listar_usuarios()
    {
        // Crear usuarios de prueba
        Usuario::factory()->create(['nombre' => 'Juan']);
        Usuario::factory()->create(['nombre' => 'María']);

        // Realizar una solicitud GET a la ruta index de usuarios
        $response = $this->get(route('usuarios.index'));

        // Verificar que la respuesta sea exitosa
        $response->assertStatus(200);

        // Verificar que los usuarios aparecen en la respuesta
        $response->assertSee('Juan');
        $response->assertSee('María');
    }

    /**
     * Verificar que un usuario puede ser creado correctamente.
     */
    public function test_crear_usuario()
    {
        // Datos de ejemplo para el nuevo usuario
        $usuarioData = [
            'nombre' => 'Carlos',
            'apellido' => 'Gómez',
            'email' => 'carlos.gomez@example.com',
            'password' => 'password123',
        ];

        // Realizar una solicitud POST para crear un usuario
        $response = $this->post(route('usuarios.store'), $usuarioData);

        // Verificar que la redirección es correcta
        $response->assertRedirect(route('usuarios.index'));

        // Verificar que el usuario fue creado en la base de datos
        $this->assertDatabaseHas('usuarios', [
            'nombre' => 'Carlos',
            'apellido' => 'Gómez',
            'email' => 'carlos.gomez@example.com',
        ]);
    }

    /**
     * Verificar que un usuario puede ser actualizado correctamente.
     */
    public function test_actualizar_usuario()
    {
        // Crear un usuario de prueba
        $usuario = Usuario::factory()->create([
            'nombre' => 'Luis',
            'apellido' => 'Pérez',
        ]);

        // Datos actualizados
        $updatedData = [
            'nombre' => 'Luis Actualizado',
            'apellido' => 'Pérez Actualizado',
        ];

        // Realizar una solicitud PUT para actualizar el usuario
        $response = $this->put(route('usuarios.update', $usuario->id), $updatedData);

        // Verificar que la redirección es correcta
        $response->assertRedirect(route('usuarios.index'));

        // Verificar que los datos fueron actualizados en la base de datos
        $this->assertDatabaseHas('usuarios', $updatedData);
    }

    /**
     * Verificar que un usuario puede ser eliminado correctamente.
     */
    public function test_eliminar_usuario()
    {
        // Crear un usuario de prueba
        $usuario = Usuario::factory()->create([
            'nombre' => 'Temporal',
            'apellido' => 'Usuario',
        ]);

        // Realizar una solicitud DELETE para eliminar el usuario
        $response = $this->delete(route('usuarios.destroy', $usuario->id));

        // Verificar que la redirección es correcta
        $response->assertRedirect(route('usuarios.index'));

        // Verificar que el usuario fue eliminado de la base de datos
        $this->assertDatabaseMissing('usuarios', [
            'id' => $usuario->id,
        ]);
    }
}
