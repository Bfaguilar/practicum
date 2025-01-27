<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\CitaMedica;
use App\Models\Paciente;
use App\Models\Doctor;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CitaMedicaTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Verificar que se puedan listar las citas médicas.
     */
    public function test_listar_citas_medicas()
    {
        // Crear citas médicas de prueba
        CitaMedica::factory()->create(['fecha' => '2025-01-01', 'hora' => '09:00']);
        CitaMedica::factory()->create(['fecha' => '2025-01-02', 'hora' => '10:00']);

        // Realizar una solicitud GET
        $response = $this->get(route('citas_medicas.index'));

        // Verificar que la respuesta sea exitosa y contenga las fechas
        $response->assertStatus(200);
        $response->assertSee('2025-01-01');
        $response->assertSee('2025-01-02');
    }

    /**
     * Verificar que se pueda crear una cita médica.
     */
    public function test_crear_cita_medica()
    {
        $paciente = Paciente::factory()->create();
        $doctor = Doctor::factory()->create();

        // Datos de ejemplo para la nueva cita médica
        $data = [
            'paciente_id' => $paciente->id,
            'doctor_id' => $doctor->id,
            'fecha' => '2025-01-03',
            'hora' => '11:00',
        ];

        // Realizar una solicitud POST
        $response = $this->post(route('citas_medicas.store'), $data);

        // Verificar que la redirección sea correcta
        $response->assertRedirect(route('citas_medicas.index'));

        // Verificar que la cita médica se creó en la base de datos
        $this->assertDatabaseHas('citas_medicas', $data);
    }

    /**
     * Verificar que se pueda actualizar una cita médica.
     */
    public function test_actualizar_cita_medica()
    {
        $cita = CitaMedica::factory()->create([
            'fecha' => '2025-01-01',
            'hora' => '09:00',
        ]);

        // Nuevos datos para la cita médica
        $updatedData = [
            'fecha' => '2025-01-05',
            'hora' => '14:00',
        ];

        // Realizar una solicitud PUT
        $response = $this->put(route('citas_medicas.update', $cita->id), $updatedData);

        // Verificar que la redirección sea correcta
        $response->assertRedirect(route('citas_medicas.index'));

        // Verificar que los datos se actualizaron en la base de datos
        $this->assertDatabaseHas('citas_medicas', $updatedData);
    }

    /**
     * Verificar que se pueda eliminar una cita médica.
     */
    public function test_eliminar_cita_medica()
    {
        $cita = CitaMedica::factory()->create([
            'fecha' => '2025-01-01',
            'hora' => '09:00',
        ]);

        // Realizar una solicitud DELETE
        $response = $this->delete(route('citas_medicas.destroy', $cita->id));

        // Verificar que la redirección sea correcta
        $response->assertRedirect(route('citas_medicas.index'));

        // Verificar que la cita médica fue eliminada de la base de datos
        $this->assertDatabaseMissing('citas_medicas', [
            'id' => $cita->id,
        ]);
    }
}
