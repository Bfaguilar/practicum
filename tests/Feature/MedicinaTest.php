<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Medicina;
use Illuminate\Foundation\Testing\RefreshDatabase;

class MedicinaTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Verificar que se puede listar las medicinas.
     */
    public function test_listar_medicinas()
    {
        // Crear medicinas de prueba
        Medicina::factory()->create(['nombre' => 'Paracetamol', 'marca' => 'Farmacia A']);
        Medicina::factory()->create(['nombre' => 'Ibuprofeno', 'marca' => 'Farmacia B']);

        // Realizar una solicitud GET a la ruta de index
        $response = $this->get(route('medicinas.index'));

        // Verificar que la respuesta sea exitosa
        $response->assertStatus(200);

        // Verificar que los datos se muestren en la vista
        $response->assertSee('Paracetamol');
        $response->assertSee('Ibuprofeno');
    }

    /**
     * Verificar que se puede crear una medicina.
     */
    public function test_crear_medicina()
    {
        // Datos de ejemplo
        $data = [
            'nombre' => 'Aspirina',
            'marca' => 'Bayer',
            'descripcion' => 'Analgésico y antipirético.',
        ];

        // Realizar una solicitud POST para crear una medicina
        $response = $this->post(route('medicinas.store'), $data);

        // Verificar que la redirección es correcta
        $response->assertRedirect(route('medicinas.index'));

        // Verificar que los datos fueron almacenados en la base de datos
        $this->assertDatabaseHas('medicinas', $data);
    }

    /**
     * Verificar que se puede actualizar una medicina.
     */
    public function test_actualizar_medicina()
    {
        // Crear una medicina de prueba
        $medicina = Medicina::factory()->create([
            'nombre' => 'Paracetamol',
            'marca' => 'Farmacia A',
            'descripcion' => 'Analgésico básico.',
        ]);

        // Datos actualizados
        $updatedData = [
            'nombre' => 'Paracetamol Extra',
            'marca' => 'Farmacia A',
            'descripcion' => 'Analgésico con fórmula mejorada.',
        ];

        // Realizar una solicitud PUT para actualizar la medicina
        $response = $this->put(route('medicinas.update', $medicina->id), $updatedData);

        // Verificar que la redirección es correcta
        $response->assertRedirect(route('medicinas.index'));

        // Verificar que los datos fueron actualizados en la base de datos
        $this->assertDatabaseHas('medicinas', $updatedData);
    }

    /**
     * Verificar que se puede eliminar una medicina.
     */
    public function test_eliminar_medicina()
    {
        // Crear una medicina de prueba
        $medicina = Medicina::factory()->create([
            'nombre' => 'Ibuprofeno',
            'marca' => 'Farmacia B',
            'descripcion' => 'Anti-inflamatorio.',
        ]);

        // Realizar una solicitud DELETE para eliminar la medicina
        $response = $this->delete(route('medicinas.destroy', $medicina->id));

        // Verificar que la redirección es correcta
        $response->assertRedirect(route('medicinas.index'));

        // Verificar que la medicina fue eliminada de la base de datos
        $this->assertDatabaseMissing('medicinas', [
            'id' => $medicina->id,
        ]);
    }
}
