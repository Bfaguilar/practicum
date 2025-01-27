<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Medicina;

class MedicinaTest extends TestCase
{
    /**
     * Verificar que un modelo Medicina se cree correctamente en memoria.
     */
    public function test_creacion_medicina_en_memoria()
    {
        // Crear un modelo Medicina en memoria
        $medicina = new Medicina([
            'nombre' => 'Paracetamol',
            'marca' => 'Genfar',
            'descripcion' => 'Alivia dolores leves y reduce la fiebre.',
        ]);

        // Verificar que los valores sean correctos
        $this->assertEquals('Paracetamol', $medicina->nombre);
        $this->assertEquals('Genfar', $medicina->marca);
        $this->assertEquals('Alivia dolores leves y reduce la fiebre.', $medicina->descripcion);
    }

    /**
     * Verificar que los fillables estén correctos (forma básica).
     */
    public function test_fillable_medicina()
    {
        // Crear una instancia del modelo Medicina
        $medicina = new Medicina();

        // Verificar que los fillables coincidan con los esperados
        $this->assertEquals(
            ['nombre', 'marca', 'descripcion'],
            $medicina->getFillable()
        );
    }
}

class MedicinaRelationshipTest extends TestCase
{
    /**
     * Verificar que la entidad Medicina tiene una relación con Recetas.
     */
    public function test_medicina_tiene_relacion_con_recetas()
    {
        $medicina = new Medicina();

        // Verificar que el método 'recetas' es una instancia de HasMany
        $this->assertInstanceOf(
            \Illuminate\Database\Eloquent\Relations\HasMany::class,
            $medicina->recetas()
        );
    }

    /**
     * Verificar que la entidad Medicina tiene una relación con Consultas Médicas.
     */
    public function test_medicina_tiene_relacion_con_consultas_medicas()
    {
        $medicina = new Medicina();

        // Verificar que el método 'consultasMedicas' es una instancia de HasMany
        $this->assertInstanceOf(
            \Illuminate\Database\Eloquent\Relations\HasMany::class,
            $medicina->consultasMedicas()
        );
    }
}
