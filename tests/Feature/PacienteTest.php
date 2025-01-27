<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Paciente;
use App\Models\Usuario;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PacienteTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Verificar que un paciente puede ser listado correctamente.
     */
    public function test_listar_pacientes()
    {
        // Crear pacientes de prueba
        Paciente::factory()->create(['usuario_id' => Usuario::factory()->create()->id]);
        Paciente::factory()->create(['usuario_id' => Usuario::factory()->create()->id]);

        // Realizar una solicitud GET a la ruta index de pacientes
        $response = $this->get(route('pacientes.index'));

        // Verificar que la respuesta sea exitosa
        $response->assertStatus(200);
    }

    /**
     * Verificar que un paciente puede ser creado correctamente.
     */
    public function test_crear_paciente()
    {
        // Crear un usuario asociado al paciente
        $usuario = Usuario::factory()->create();

        // Datos de prueba para el paciente
        $pacienteData = [
            'usuario_id' => $usuario->id,
            'historia_clinica' => '12345',
        ];

        // Realizar una solicitud POST para crear el paciente
        $response = $this->post(route('pacientes.store'), $pacienteData);

        // Verificar que la redirección es correcta
        $response->assertRedirect(route('pacientes.index'));

        // Verificar que el paciente fue creado en la base de datos
        $this->assertDatabaseHas('pacientes', $pacienteData);
    }

    /**
     * Verificar que un paciente puede ser actualizado correctamente.
     */
    public function test_actualizar_paciente()
    {
        // Crear un paciente de prueba
        $paciente = Paciente::factory()->create([
            'historia_clinica' => '12345',
        ]);

        // Nuevos datos para actualizar el paciente
        $updatedData = [
            'historia_clinica' => '54321',
        ];

        // Realizar una solicitud PUT para actualizar el paciente
        $response = $this->put(route('pacientes.update', $paciente->id), $updatedData);

        // Verificar que la redirección es correcta
        $response->assertRedirect(route('pacientes.index'));

        // Verificar que los datos fueron actualizados en la base de datos
        $this->assertDatabaseHas('pacientes', $updatedData);
    }

    /**
     * Verificar que un paciente puede ser eliminado correctamente.
     */
    public function test_eliminar_paciente()
    {
        // Crear un paciente de prueba
        $paciente = Paciente::factory()->create();

        // Realizar una solicitud DELETE para eliminar el paciente
        $response = $this->delete(route('pacientes.destroy', $paciente->id));

        // Verificar que la redirección es correcta
        $response->assertRedirect(route('pacientes.index'));

        // Verificar que el paciente fue eliminado de la base de datos
        $this->assertDatabaseMissing('pacientes', [
            'id' => $paciente->id,
        ]);
    }
}
