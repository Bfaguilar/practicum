<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\ConsultaMedica;
use App\Models\CitaMedica;
use App\Models\Medicina;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ConsultaMedicaTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Prueba que se puede listar las consultas médicas.
     */
    public function test_listar_consultas_medicas()
    {
        // Crear datos de prueba
        $consulta1 = ConsultaMedica::factory()->create();
        $consulta2 = ConsultaMedica::factory()->create();

        // Realizar solicitud GET a la ruta de index
        $response = $this->get(route('consultas_medicas.index'));

        // Verificar respuesta
        $response->assertStatus(200);
        $response->assertSee($consulta1->diagnostico);
        $response->assertSee($consulta2->diagnostico);
    }

    /**
     * Prueba que se puede crear una consulta médica.
     */
    public function test_crear_consulta_medica()
    {
        // Crear datos de prueba
        $cita = CitaMedica::factory()->create();
        $medicina = Medicina::factory()->create();

        $consultaData = [
            'cita_medica_id' => $cita->id,
            'medicina_id' => $medicina->id,
            'diagnostico' => 'Diagnóstico de prueba',
        ];

        // Realizar solicitud POST
        $response = $this->post(route('consultas_medicas.store'), $consultaData);

        // Verificar redirección
        $response->assertRedirect(route('consultas_medicas.index'));

        // Verificar que los datos se guardaron en la base de datos
        $this->assertDatabaseHas('consultas_medicas', $consultaData);
    }

    /**
     * Prueba que se puede actualizar una consulta médica.
     */
    public function test_actualizar_consulta_medica()
    {
        // Crear datos de prueba
        $consulta = ConsultaMedica::factory()->create();

        $updatedData = [
            'diagnostico' => 'Diagnóstico actualizado',
        ];

        // Realizar solicitud PUT
        $response = $this->put(route('consultas_medicas.update', $consulta->id), $updatedData);

        // Verificar redirección
        $response->assertRedirect(route('consultas_medicas.index'));

        // Verificar que los datos se actualizaron en la base de datos
        $this->assertDatabaseHas('consultas_medicas', $updatedData);
    }

    /**
     * Prueba que se puede eliminar una consulta médica.
     */
    public function test_eliminar_consulta_medica()
    {
        // Crear datos de prueba
        $consulta = ConsultaMedica::factory()->create();

        // Realizar solicitud DELETE
        $response = $this->delete(route('consultas_medicas.destroy', $consulta->id));

        // Verificar redirección
        $response->assertRedirect(route('consultas_medicas.index'));

        // Verificar que los datos fueron eliminados de la base de datos
        $this->assertDatabaseMissing('consultas_medicas', [
            'id' => $consulta->id,
        ]);
    }
}
