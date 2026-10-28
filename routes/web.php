<?php

use App\Http\Controllers\EtatequipementController;
use App\Http\Controllers\MotDePasseOublieController;
use App\Http\Controllers\NotificationGeneraleController;
use App\Http\Controllers\ShortLinkController;
use Illuminate\Support\Facades\Route;

Route::get('/reload-captcha', [App\Http\Controllers\ConnexionController::class, 'reloadCaptcha'])->name('reloadCaptcha');

Route::view("/403", "errors.403")->name('403');
Route::view("/404", "errors.404")->name('404');
Route::view("/500", "errors.500")->name('500');
//Route::get('/403', function () { return redirect('/home/dashboard'); });

Route::match(['get', 'post'], '/', [App\Http\Controllers\IndexController::class, 'index'])->name('/');
Route::post('/portfolio/contact', [App\Http\Controllers\IndexController::class, 'contact'])->middleware('throttle:5,10')->name('portfolio.contact');
Route::post('/portfolio/demande-acces', [App\Http\Controllers\IndexController::class, 'demandeAcces'])->middleware('throttle:5,10')->name('portfolio.demande');
Route::match(['get', 'post'], '/login', [App\Http\Controllers\ConnexionController::class, 'login'])->name('login');
Route::match(['get', 'post'], '/connexion', [App\Http\Controllers\ConnexionController::class, 'login'])->name('connexion');
Route::get('/deconnexion', [App\Http\Controllers\HomeController::class, 'deconnexion']);

Route::get('/motdepasseoublie', [MotDePasseOublieController::class, 'index'])->name('motdepasseoublie');
Route::post('/motdepasseoublie', [MotDePasseOublieController::class, 'verify'])->name('motdepasseoublie.verify');

Route::get('motdepasseoublie/{email}/otp', [MotDePasseOublieController::class, 'otp'])->name('otp');
Route::post('motdepasseoublie/{email}/otp', [MotDePasseOublieController::class, 'verifyOtpUpdatePassword'])->name('otp.verification');

Route::group(['middleware' => ['auth']], function () {

    Route::resources([
        'audits' => App\Http\Controllers\AuditController::class,
    ]);

    Route::group(['middleware' => ['can:role-index']], function () {
        Route::resources([
            'roles' => App\Http\Controllers\RoleController::class,
        ]);
    });

    Route::group(['middleware' => ['can:users-index']], function () {
        Route::resources([
            'users' => App\Http\Controllers\UserController::class,
        ]);
    });

    Route::group(['middleware' => ['can:permission-index']], function () {
        Route::resources([
            'permissions' => App\Http\Controllers\PermissionController::class,
        ]);
    });

    Route::group(['middleware' => ['can:module-index']], function () {
        Route::resources([
            'menus' => App\Http\Controllers\MenuController::class,
        ]);
    });

    Route::group(['middleware' => ['can:sous-module-index']], function () {
        Route::resources([
            'sousmenus' => App\Http\Controllers\SousmenuController::class,
        ]);
    });




    Route::get('users/{id}/delete', [App\Http\Controllers\UserController::class, 'delete'])->name('users.delete');
    Route::get('/dashboard', [App\Http\Controllers\ConnexionController::class, 'dashboard'])->name('dashboard');

    Route::match(['get', 'post'], '/profil', [App\Http\Controllers\HomeController::class, 'profil'])->name('profil');

    Route::group(['middleware' => ['can:attribuer']], function () {
        Route::match(['get', 'post'], '/menuprofil', [App\Http\Controllers\GenerermenuController::class, 'parametragemenu'])->name('menuprofil');
        Route::match(['get', 'post'], '/menuprofillayout/{id}', [App\Http\Controllers\GenerermenuController::class, 'menuprofillayout'])->name('menuprofillayout');
    });


    Route::match(['get', 'post'], '/modifiermotdepasse', [App\Http\Controllers\HomeController::class, 'updatepassword'])->name('modifier.mot.passe');
    Route::match(['get', 'post'], '/modifiermotdepasse/{id}', [App\Http\Controllers\HomeController::class, 'updatepassword'])->name('modifiermotpasse');



    Route::group(['middleware' => ['can:demandesacces-index']], function () {
        Route::get('/demandesacces', [App\Http\Controllers\DemandeAccesController::class, 'index'])->name('demandesacces.index');
        Route::get('/demandesacces/{id}', [App\Http\Controllers\DemandeAccesController::class, 'show'])->name('demandesacces.show');
        Route::group(['middleware' => ['can:demandesacces-edit']], function () {
            Route::post('/demandesacces/{id}/traiter', [App\Http\Controllers\DemandeAccesController::class, 'traiter'])->name('demandesacces.traiter');
            Route::post('/demandesacces/{id}/renvoyer', [App\Http\Controllers\DemandeAccesController::class, 'renvoyer'])->name('demandesacces.renvoyer');
            Route::post('/demandesacces/{id}/rejeter', [App\Http\Controllers\DemandeAccesController::class, 'rejeter'])->name('demandesacces.rejeter');
        });
    });

    Route::group(['middleware' => ['can:messagescontact-index']], function () {
        Route::get('/messagescontact', [App\Http\Controllers\MessageContactController::class, 'index'])->name('messagescontact.index');
        Route::get('/messagescontact/{id}', [App\Http\Controllers\MessageContactController::class, 'show'])->name('messagescontact.show');
        Route::group(['middleware' => ['can:messagescontact-edit']], function () {
            Route::post('/messagescontact/{id}/repondre', [App\Http\Controllers\MessageContactController::class, 'repondre'])->name('messagescontact.repondre');
            Route::delete('/messagescontact/{id}', [App\Http\Controllers\MessageContactController::class, 'destroy'])->name('messagescontact.destroy');
        });
    });

    Route::group(['middleware' => ['can:parametresmail-index']], function () {
        Route::get('/parametresmail', [App\Http\Controllers\ParametreMailController::class, 'index'])->name('parametresmail.index');
        Route::group(['middleware' => ['can:parametresmail-edit']], function () {
            Route::post('/parametresmail', [App\Http\Controllers\ParametreMailController::class, 'update'])->name('parametresmail.update');
            Route::post('/parametresmail/test', [App\Http\Controllers\ParametreMailController::class, 'test'])->name('parametresmail.test');
        });
    });

    Route::group(['middleware' => ['can:parametresysteme-index']], function () {
        Route::match(['get', 'post'], '/parametresysteme', [App\Http\Controllers\ParametreController::class, 'parametresysteme'])->name('parametresysteme');
        Route::match(['get', 'post'], '/creerparametresysteme', [App\Http\Controllers\ParametreController::class, 'creerparametresysteme'])->name('creerparametresysteme');
        Route::match(['get', 'post'], '/modifierparametresysteme/{id}', [App\Http\Controllers\ParametreController::class, 'modifierparametresysteme'])->name('modifierparametresysteme');
        Route::match(['get', 'post'], '/activeparametresysteme/{id}/{id1}', [App\Http\Controllers\ParametreController::class, 'activeparametresysteme'])->name('activeparametresysteme');
        Route::match(['get', 'post'], '/desactiveparametresysteme/{id}/{id1}', [App\Http\Controllers\ParametreController::class, 'desactiveparametresysteme'])->name('desactiveparametresysteme');
    });

});
