<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Doctor;
use App\Models\Usuario;
use Illuminate\Foundation\Testing\RefreshDatabase;

class DoctorTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Verificar que se pueden listar los doctores.
     */
    public function test_listar_doctores()
    {
        // Crear doctores de prueba
        Doctor::factory()->create(['especialidad' => 'Cardiología']);
        Doctor::factory()->create(['especialidad' => 'Neurología']);

        // Realizar una solicitud GET a la ruta de index de doctores
        $response = $this->get(route('doctores.index'));

        // Verificar que la respuesta sea exitosa
        $response->assertStatus(200);

        // Verificar que las especialidades aparecen en la respuesta
        $response->assertSee('Cardiología');
        $response->assertSee('Neurología');
    }

    /**
     * Verificar que se puede crear un doctor.
     */
    public function test_crear_doctor()
    {
        // Crear un usuario asociado
        $usuario = Usuario::factory()->create();

        // Datos del doctor
        $doctorData = [
            'usuario_id' => $usuario->id,
            'especialidad' => 'Pediatría',
        ];

        // Realizar una solicitud POST para crear un doctor
        $response = $this->post(route('doctores.store'), $doctorData);

        // Verificar que la redirección es correcta
        $response->assertRedirect(route('doctores.index'));

        // Verificar que el doctor fue creado en la base de datos
        $this->assertDatabaseHas('doctores', $doctorData);
    }

    /**
     * Verificar que se puede actualizar un doctor.
     */
    public function test_actualizar_doctor()
    {
        // Crear un doctor de prueba
        $doctor = Doctor::factory()->create(['especialidad' => 'Dermatología']);

        // Datos actualizados
        $updatedData = [
            'especialidad' => 'Medicina Interna',
        ];

        // Realizar una solicitud PUT para actualizar el doctor
        $response = $this->put(route('doctores.update', $doctor->id), $updatedData);

        // Verificar que la redirección es correcta
        $response->assertRedirect(route('doctores.index'));

        // Verificar que los datos fueron actualizados en la base de datos
        $this->assertDatabaseHas('doctores', [
            'id' => $doctor->id,
            'especialidad' => 'Medicina Interna',
        ]);
    }

    /**
     * Verificar que se puede eliminar un doctor.
     */
    public function test_eliminar_doctor()
    {
        // Crear un doctor de prueba
        $doctor = Doctor::factory()->create(['especialidad' => 'Oncología']);

        // Realizar una solicitud DELETE para eliminar el doctor
        $response = $this->delete(route('doctores.destroy', $doctor->id));

        // Verificar que la redirección es correcta
        $response->assertRedirect(route('doctores.index'));

        // Verificar que el doctor fue eliminado de la base de datos
        $this->assertDatabaseMissing('doctores', [
            'id' => $doctor->id,
        ]);
    }
}
