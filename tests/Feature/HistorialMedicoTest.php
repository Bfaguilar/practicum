<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\HistorialMedico;
use App\Models\Paciente;
use Illuminate\Foundation\Testing\RefreshDatabase;

class HistorialMedicoTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Verificar que un historial médico puede ser listado correctamente.
     */
    public function test_listar_historiales_medicos()
    {
        // Crear historiales médicos de prueba
        $paciente = Paciente::factory()->create();
        HistorialMedico::factory()->create(['paciente_id' => $paciente->id, 'descripcion' => 'Historial 1']);
        HistorialMedico::factory()->create(['paciente_id' => $paciente->id, 'descripcion' => 'Historial 2']);

        // Realizar una solicitud GET a la ruta index
        $response = $this->get(route('historiales_medicos.index'));

        // Verificar que la respuesta sea exitosa y los datos se muestren
        $response->assertStatus(200);
        $response->assertSee('Historial 1');
        $response->assertSee('Historial 2');
    }

    /**
     * Verificar que un historial médico puede ser creado correctamente.
     */
    public function test_crear_historial_medico()
    {
        // Crear un paciente
        $paciente = Paciente::factory()->create();

        // Datos de ejemplo
        $data = [
            'paciente_id' => $paciente->id,
            'descripcion' => 'Nuevo historial médico',
            'fecha' => '2025-01-01',
        ];

        // Realizar una solicitud POST para crear un historial médico
        $response = $this->post(route('historiales_medicos.store'), $data);

        // Verificar redirección y que los datos se guarden en la base de datos
        $response->assertRedirect(route('historiales_medicos.index'));
        $this->assertDatabaseHas('historiales_medicos', $data);
    }

    /**
     * Verificar que un historial médico puede ser actualizado correctamente.
     */
    public function test_actualizar_historial_medico()
    {
        // Crear un historial médico de prueba
        $historial = HistorialMedico::factory()->create(['descripcion' => 'Descripción antigua']);

        // Datos actualizados
        $updatedData = [
            'descripcion' => 'Descripción actualizada',
            'fecha' => '2025-01-02',
        ];

        // Realizar una solicitud PUT para actualizar el historial médico
        $response = $this->put(route('historiales_medicos.update', $historial->id), $updatedData);

        // Verificar redirección y que los datos se actualicen en la base de datos
        $response->assertRedirect(route('historiales_medicos.index'));
        $this->assertDatabaseHas('historiales_medicos', $updatedData);
    }

    /**
     * Verificar que un historial médico puede ser eliminado correctamente.
     */
    public function test_eliminar_historial_medico()
    {
        // Crear un historial médico de prueba
        $historial = HistorialMedico::factory()->create();

        // Realizar una solicitud DELETE para eliminar el historial médico
        $response = $this->delete(route('historiales_medicos.destroy', $historial->id));

        // Verificar redirección y que los datos se eliminen de la base de datos
        $response->assertRedirect(route('historiales_medicos.index'));
        $this->assertDatabaseMissing('historiales_medicos', ['id' => $historial->id]);
    }
}
