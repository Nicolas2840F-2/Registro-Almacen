<?php

use App\Http\Controllers\RegisterUsuarioController;
use App\Http\Controllers\AuthenticatedSessionController;
use App\Http\Controllers\tipoDocumentoController;
use App\Http\Controllers\UsuarioController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\PortatilController;
use App\Http\Controllers\RegistroController;
use App\Http\Controllers\ResetPasswordController;
use App\Http\Controllers\RolController;
use App\Models\TipoDocumento;

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

// Routes register - login - welcome
Route::view('/', 'welcome')->name('welcome');
Route::post('/register', [RegisterUsuarioController::class, 'store'])->name('usuario.store');
Route::get('/register', [tipoDocumentoController::class, 'listarSelect'])->name("register");
Route::post('/login', [AuthenticatedSessionController::class, 'store'])->name('login.store');
Route::view('/login', 'welcome')->name("login");

// Routes resetPassword
Route::post('/reset', [ForgotPasswordController::class, 'sendResetLink'])->name('password.send');
Route::post('/code-reset', [ForgotPasswordController::class, 'resetPassword'])->name('password.code');
Route::view('/confirmation', 'codeConfirmation')->name('password.verify');
Route::get('/reset-password/{email}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('/reset-password', [ResetPasswordController::class, 'resetPassword'])->name('password.update');
Route::view('/reset', 'resetPassword')->name("reset");


// Rutas protegidas por middleware auth
Route::middleware(['auth'])->group(function () {

    // Route navigation
    Route::view('/main', 'mainView')->name("main.index");
    Route::view('/Registroentradas', 'Registros.create')->name('registro.create');
    // Route::view('/HistorialRegistros', 'registros.index')->name('registro.index');

    // Routes Usuarios
    Route::get('/usuarios', [UsuarioController::class, 'index'])->name('usuario.index');
    Route::post('/usuarios/buscar', [UsuarioController::class, 'buscarByDocumento'])->name('usuario.buscar');
    Route::get('/edit', [UsuarioController::class, 'show'])->name('user.edit');
    Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('user.logout');
    Route::post('/Usuario/buscar', [UsuarioController::class, 'buscarByDocument'])->name('user.search');
    Route::post('/editar/{usuario}', [UsuarioController::class, 'update'])->name('usuario.update');
    Route::post('/usuario/editar', [UsuarioController::class, 'edit'])->name('usuario.edit');
    Route::get('/usuarios/editar', [UsuarioController::class, 'store'])->name('usuarios.listar');

    //  Routes portatiles
    Route::view('/portatiles/create', 'Portatiles.create')->name('portatil.create');
    Route::get('/portatiles/{usuario}', [PortatilController::class, 'create'])->name('portatil.user.create');
    Route::post('/portatiles/create', [PortatilController::class, 'store'])->name('portatil.store');
    Route::get('/portatiles', [PortatilController::class, 'index'])->name('portatil.index');

    // Route Registro
    Route::post('/registro', [RegistroController::class, 'store'])->name('registro.store');
    Route::post('/registro/update', [RegistroController::class, 'update'])->name('registro.update');
    Route::get('/Registros', [RegistroController::class, 'index'])->name('registro.index');
    Route::post('/Registro/buscar', [RegistroController::class, 'buscarByDocument'])->name('registro.buscar');

    // Route Complementos
    Route::get('/complementos/roles', [RolController::class, 'index'])->name('rol.index');
    Route::post('/rol/create',[RolController::class,'store'])->name('rol.store');
    Route::post('/rol/update',[RolController::class,'update'])->name('rol.update');
    Route::delete('/rol/{id}/destroy',[RolController::class,'destroy'])->name('rol.destroy');

    Route::get('/complementos/tipoDocumento', [tipoDocumentoController::class, 'index'])->name('tipoDocumento.index');
    Route::post('/tipoDocumento/create',[tipoDocumentoController::class,'store'])->name('tipoDocumento.store');
    Route::post('/tipoDocumento/update',[tipoDocumentoController::class,'update'])->name('tipoDocumento.update');
    Route::delete('/tipoDocumento/{id}/destroy',[tipoDocumentoController::class,'destroy'])->name('tipoDocumento.destroy');

});
