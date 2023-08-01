<?php

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\EventoController;
use App\Http\Controllers\Logs\AuditLogsController;
use App\Http\Controllers\Logs\SystemLogsController;
use App\Http\Controllers\Account\SettingsController;
use App\Http\Controllers\AtividadeController;
use App\Http\Controllers\AtividadeParticipanteTemporarioController;
use App\Http\Controllers\Auth\SocialiteLoginController;
use App\Http\Controllers\Documentation\ReferencesController;
use App\Http\Controllers\ParticipanteController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return redirect('index');
// });

$menu = theme()->getMenu();
array_walk($menu, function ($val) {
    if (isset($val['path'])) {
        $route = Route::get($val['path'], [PagesController::class, 'index']);

        // Exclude documentation from auth middleware
        if (!Str::contains($val['path'], 'documentation')) {
            $route->middleware('auth');
        }
    }
});

// Documentations pages
Route::prefix('documentation')->group(function () {
    Route::get('getting-started/references', [ReferencesController::class, 'index']);
    Route::get('getting-started/changelog', [PagesController::class, 'index']);
});

Route::middleware('auth')->group(function () {
    // Account pages
    Route::prefix('account')->group(function () {
        Route::get('settings', [SettingsController::class, 'index'])->name('settings.index');
        Route::put('settings', [SettingsController::class, 'update'])->name('settings.update');
        Route::put('settings/email', [SettingsController::class, 'changeEmail'])->name('settings.changeEmail');
        Route::put('settings/password', [SettingsController::class, 'changePassword'])->name('settings.changePassword');
    });

    Route::prefix('eventos')->group(function () {
        Route::get('/', [EventoController::class, 'index'])->name('eventos.index');
        Route::get('/create', [EventoController::class, 'create'])->name('eventos.create');
        Route::post('/', [EventoController::class, 'store'])->name('eventos.store');
        Route::get('/{evento}', [EventoController::class, 'show'])->name('eventos.show');
        Route::post('/{evento}/atividades', [AtividadeController::class, 'store'])->name('atividades.store');
    });
    Route::prefix('atividades')->group(function () {
        Route::patch('/{atividade}', [AtividadeController::class, 'update'])->name('atividades.update');
        Route::delete('/{atividade}', [AtividadeController::class, 'destroy'])->name('atividades.destroy');
        Route::get('/{atividade}/participantes/create', [ParticipanteController::class, 'create'])->name('atividades.participantes.create');
    });
    Route::prefix('participantes')->group(function () {
        Route::post('/import', [AtividadeParticipanteTemporarioController::class, 'import'])->name('participantes.import');
    });

    // Logs pages
    Route::prefix('log')->name('log.')->group(function () {
        Route::resource('system', SystemLogsController::class)->only(['index', 'destroy']);
        Route::resource('audit', AuditLogsController::class)->only(['index', 'destroy']);
    });
});

Route::resource('users', UsersController::class);

/**
 * Socialite login using Google service
 * https://laravel.com/docs/8.x/socialite
 */
Route::get('/auth/redirect/{provider}', [SocialiteLoginController::class, 'redirect']);

require __DIR__.'/auth.php';
