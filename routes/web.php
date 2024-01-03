<?php

use Illuminate\Support\Str;
use App\Enums\PermissionsEnum;
use App\Mail\CertificadoNotificacao;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\EventoController;
use App\Http\Controllers\AtividadeController;
use App\Http\Controllers\CertificadoController;
use App\Http\Controllers\ParticipanteController;
use App\Http\Controllers\Logs\AuditLogsController;
use App\Http\Controllers\Logs\SystemLogsController;
use App\Http\Controllers\Account\SettingsController;
use App\Http\Controllers\MeusCertificadosController;
use App\Http\Controllers\ConfigCertificadosController;
use App\Http\Controllers\Auth\SocialiteLoginController;
use App\Http\Controllers\AtividadeParticipantesController;
use App\Http\Controllers\Documentation\ReferencesController;
use Illuminate\Support\Facades\Mail;

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

Route::middleware(['auth', 'perfil_usuario_atualizado'])->group(function () {

    Route::prefix('users')->group(function () {
        Route::get('', [UsersController::class, 'index'])->name('users.index')
            ->can(PermissionsEnum::GERENCIAR_USUARIOS->value);
        Route::get('{user}', [UsersController::class, 'show'])->name('users.show')
            ->can(PermissionsEnum::GERENCIAR_USUARIOS->value);
        Route::get('{user}/edit', [UsersController::class, 'edit'])->name('users.edit')
            ->can(PermissionsEnum::GERENCIAR_USUARIOS->value);
        Route::delete('/{user}', [UsersController::class, 'destroy'])->name('users.destroy')
            ->can(PermissionsEnum::GERENCIAR_USUARIOS->value);
        Route::post('alterar-funcao', [UsersController::class, 'alterarFuncao'])->name('users.alterar-funcao')
            ->can(PermissionsEnum::GERENCIAR_USUARIOS->value);
    });

    // Account pages
    Route::prefix('account')->group(function () {
        Route::get('settings', [SettingsController::class, 'index'])->name('settings.index');
        Route::put('settings', [SettingsController::class, 'update'])->name('settings.update');
        Route::put('settings/email', [SettingsController::class, 'changeEmail'])->name('settings.changeEmail');
        Route::put('settings/password', [SettingsController::class, 'changePassword'])->name('settings.changePassword');
    });

    Route::prefix('eventos')->group(function () {
        Route::get('/', [EventoController::class, 'index'])->name('eventos.index')
            ->can(PermissionsEnum::GERENCIAR_EVENTOS->value);
        Route::get('{evento}/edit', [EventoController::class, 'edit'])->name('eventos.edit')
            ->can(PermissionsEnum::GERENCIAR_EVENTOS->value);
        Route::patch('{evento}', [EventoController::class, 'update'])->name('eventos.update')
            ->can(PermissionsEnum::GERENCIAR_EVENTOS->value);
        Route::delete('{evento}', [EventoController::class, 'destroy'])->name('eventos.destroy')
            ->can(PermissionsEnum::GERENCIAR_EVENTOS->value);
        Route::get('create', [EventoController::class, 'create'])->name('eventos.create')
            ->can(PermissionsEnum::GERENCIAR_EVENTOS->value);
        Route::post('/', [EventoController::class, 'store'])->name('eventos.store')
            ->can(PermissionsEnum::GERENCIAR_EVENTOS->value);
        Route::get('{evento}/{abaAtiva?}', [EventoController::class, 'show'])->name('eventos.show')
            ->can(PermissionsEnum::GERENCIAR_EVENTOS->value);
        Route::post('{evento}/atividades', [AtividadeController::class, 'store'])->name('atividades.store')
            ->can(PermissionsEnum::GERENCIAR_EVENTOS->value);
        Route::get('{evento}/config-certificados/{tipoConfigCertificado}/create', [ConfigCertificadosController::class, 'create'])->name('config-certificados.create')
            ->can(PermissionsEnum::GERENCIAR_EVENTOS->value);
        Route::post('{evento}/config-certificados', [ConfigCertificadosController::class, 'store'])->name('config-certificados.store')
            ->can(PermissionsEnum::GERENCIAR_EVENTOS->value);
    });

    Route::prefix('config-certificados')->group(function () {
        Route::delete('{config_certificado}', [ConfigCertificadosController::class, 'destroy'])->name('config-certificados.destroy')
            ->can(PermissionsEnum::GERENCIAR_EVENTOS->value);
        Route::patch('{config_certificado}', [ConfigCertificadosController::class, 'update'])->name('config-certificados.update')
            ->can(PermissionsEnum::GERENCIAR_EVENTOS->value);
        Route::get('{config_certificado}/edit', [ConfigCertificadosController::class, 'edit'])->name('config-certificados.edit')
            ->can(PermissionsEnum::GERENCIAR_EVENTOS->value);
    });

    Route::prefix('certificados')->group(function () {
        Route::post('publicar', [CertificadoController::class, 'publicar'])->name('certificados.publicar')
            ->can(PermissionsEnum::GERENCIAR_EVENTOS->value);
        Route::patch('alterar-publicacao', [CertificadoController::class, 'alterarPublicacao'])->name('certificados.alterar-publicacao')
            ->can(PermissionsEnum::GERENCIAR_EVENTOS->value);
        Route::delete('{certificado}', [CertificadoController::class, 'destroy'])->name('certificados.destroy')
            ->can(PermissionsEnum::GERENCIAR_EVENTOS->value);
        Route::get('{certificado}/download', [CertificadoController::class, 'download'])->name('certificados.download');
    });

    Route::prefix('atividades')->group(function () {
        Route::patch('{atividade}', [AtividadeController::class, 'update'])->name('atividades.update')
            ->can(PermissionsEnum::GERENCIAR_EVENTOS->value);
        Route::delete('{atividade}', [AtividadeController::class, 'destroy'])->name('atividades.destroy')
            ->can(PermissionsEnum::GERENCIAR_EVENTOS->value);
        Route::get('{atividade}/participantes/create', [ParticipanteController::class, 'create'])->name('atividades-participantes.create')
            ->can(PermissionsEnum::GERENCIAR_EVENTOS->value);
    });

    Route::prefix('atividade-participantes')->group(function () {
        Route::post('import', [AtividadeParticipantesController::class, 'import'])->name('atividade-participantes.import')
            ->can(PermissionsEnum::GERENCIAR_EVENTOS->value);
        Route::post('create', [AtividadeParticipantesController::class, 'store'])->name('atividade-participantes.store')
            ->can(PermissionsEnum::GERENCIAR_EVENTOS->value);
        Route::delete('atividade/{atividade}/participante/{participante}', [AtividadeParticipantesController::class, 'destroy'])->name('atividade-participantes.destroy')
            ->can(PermissionsEnum::GERENCIAR_EVENTOS->value);
    });

    Route::prefix('participantes')->group(function () {
        Route::patch('{participante}', [ParticipanteController::class, 'update'])->name('participantes.update')
            ->can(PermissionsEnum::GERENCIAR_EVENTOS->value);
    });

    Route::prefix('meus-certificados')->group(function () {
        Route::get('/', [MeusCertificadosController::class, 'index'])->name('meus-certificados.index');
        Route::get('{evento}', [MeusCertificadosController::class, 'show'])->name('meus-certificados.show');
    });

    // Logs pages
    Route::prefix('log')->name('log.')->group(function () {
        Route::resource('system', SystemLogsController::class)->only(['index', 'destroy']);
        Route::resource('audit', AuditLogsController::class)->only(['index', 'destroy']);
    });
});

/**
 * Socialite login using Google service
 * https://laravel.com/docs/8.x/socialite
 */
Route::get('/auth/redirect/{provider}', [SocialiteLoginController::class, 'redirect']);

require __DIR__ . '/auth.php';
