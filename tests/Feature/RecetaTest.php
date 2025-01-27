<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Receta;
use App\Models\Paciente;
use App\Models\Doctor;
use App\Models\Medicina;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RecetaTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Prueba para listar las recetas.
     */
    public function test_listar_recetas()
    {
        // Crear datos de prueba
        $receta = Receta::factory()->create();

        // Hacer una solicitud GET a la ruta de índice
        $response = $this->get(route('recetas.index'));

        // Verificar que la respuesta sea exitosa y contiene datos de la receta
        $response->assertStatus(200);
        $response->assertSee($receta->id);
    }

    /**
     * Prueba para crear una nueva receta.
     */
    public function test_crear_receta()
    {
        // Crear datos relacionados
        $paciente = Paciente::factory()->create();
        $doctor = Doctor::factory()->create();
        $medicina = Medicina::factory()->create();

        // Datos de la nueva receta
        $data = [
            'paciente_id' => $paciente->id,
            'doctor_id' => $doctor->id,
            'medicina_id' => $medicina->id,
            'dosis' => '2 veces al día',
        ];

        // Hacer una solicitud POST para crear la receta
        $response = $this->post(route('recetas.store'), $data);

        // Verificar la redirección y que los datos estén en la base de datos
        $response->assertRedirect(route('recetas.index'));
        $this->assertDatabaseHas('recetas', $data);
    }

    /**
     * Prueba para editar una receta.
     */
    public function test_editar_receta()
    {
        // Crear datos de prueba
        $receta = Receta::factory()->create();

        // Nuevos datos para la receta
        $updatedData = [
            'dosis' => '3 veces al día',
        ];

        // Hacer una solicitud PUT para actualizar la receta
        $response = $this->put(route('recetas.update', $receta->id), $updatedData);

        // Verificar la redirección y que los datos se actualicen en la base de datos
        $response->assertRedirect(route('recetas.index'));
        $this->assertDatabaseHas('recetas', [
            'id' => $receta->id,
            'dosis' => '3 veces al día',
        ]);
    }

    /**
     * Prueba para eliminar una receta.
     */
    public function test_eliminar_receta()
    {
        // Crear datos de prueba
        $receta = Receta::factory()->create();

        // Hacer una solicitud DELETE para eliminar la receta
        $response = $this->delete(route('recetas.destroy', $receta->id));

        // Verificar la redirección y que los datos no estén en la base de datos
        $response->assertRedirect(route('recetas.index'));
        $this->assertDatabaseMissing('recetas', [
            'id' => $receta->id,
        ]);
    }
}
