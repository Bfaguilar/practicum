<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Informe;
use App\Models\CitaMedica;
use Illuminate\Foundation\Testing\RefreshDatabase;

class InformeTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Verificar que se pueden listar los informes.
     */
    public function test_listar_informes()
    {
        // Crear informes de prueba
        $informe1 = Informe::factory()->create(['descripcion' => 'Primer informe']);
        $informe2 = Informe::factory()->create(['descripcion' => 'Segundo informe']);

        // Realizar una solicitud GET a la ruta de index de informes
        $response = $this->get(route('informes.index'));

        // Verificar que la respuesta sea exitosa y los informes aparecen
        $response->assertStatus(200);
        $response->assertSee('Primer informe');
        $response->assertSee('Segundo informe');
    }

    /**
     * Verificar que se puede crear un informe.
     */
    public function test_crear_informe()
    {
        // Crear una cita médica de prueba
        $citaMedica = CitaMedica::factory()->create();

        // Datos de ejemplo para el nuevo informe
        $data = [
            'cita_medica_id' => $citaMedica->id,
            'descripcion' => 'Informe detallado de prueba',
            'fecha' => '2025-01-01',
        ];

        // Realizar una solicitud POST para crear un informe
        $response = $this->post(route('informes.store'), $data);

        // Verificar que se redirige correctamente
        $response->assertRedirect(route('informes.index'));

        // Verificar que el informe fue creado en la base de datos
        $this->assertDatabaseHas('informes', $data);
    }

    /**
     * Verificar que se puede actualizar un informe.
     */
    public function test_actualizar_informe()
    {
        // Crear un informe de prueba
        $informe = Informe::factory()->create([
            'descripcion' => 'Descripción original',
        ]);

        // Nuevos datos para actualizar el informe
        $updatedData = [
            'descripcion' => 'Descripción actualizada',
        ];

        // Realizar una solicitud PUT para actualizar el informe
        $response = $this->put(route('informes.update', $informe->id), $updatedData);

        // Verificar que se redirige correctamente
        $response->assertRedirect(route('informes.index'));

        // Verificar que los datos fueron actualizados en la base de datos
        $this->assertDatabaseHas('informes', $updatedData);
    }

    /**
     * Verificar que se puede eliminar un informe.
     */
    public function test_eliminar_informe()
    {
        // Crear un informe de prueba
        $informe = Informe::factory()->create();

        // Realizar una solicitud DELETE para eliminar el informe
        $response = $this->delete(route('informes.destroy', $informe->id));

        // Verificar que se redirige correctamente
        $response->assertRedirect(route('informes.index'));

        // Verificar que el informe fue eliminado de la base de datos
        $this->assertDatabaseMissing('informes', ['id' => $informe->id]);
    }
}
