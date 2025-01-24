<?php
use App\Http\Controllers\RolController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\AdministradorController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\CitaMedicaController;
use App\Http\Controllers\ConsultaMedicaController;
use App\Http\Controllers\HistorialMedicoController;
use App\Http\Controllers\RecetaController;
use App\Http\Controllers\MedicinaController;
use App\Http\Controllers\InformeController;

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

/*Route::get('/', function () {
    return view('welcome');
});

Route::get('/register', function () {
    return view('register');
});

Route::get('/login', function () {
    return view('login');
});
*/

//Route::get('citas_medicas/create', [CitaMedicaController::class, 'create'])->name('citas_medicas.create');


Route::get('/', function () {
    return view('home');
})->name('home');

Route::resource('roles', RolController::class);
Route::resource('usuarios', UsuarioController::class);
Route::resource('administradores', AdministradorController::class);
Route::resource('doctors', DoctorController::class);
Route::resource('patients', PatientController::class);
Route::resource('citas_medicas', CitaMedicaController::class);
Route::resource('consultas_medicas', ConsultaMedicaController::class);
Route::resource('historiales-medicos', HistorialMedicoController::class);
Route::resource('recetas', RecetaController::class);
Route::resource('medicinas', MedicinaController::class);
Route::resource('informes', InformeController::class);