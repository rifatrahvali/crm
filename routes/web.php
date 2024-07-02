<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AgentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\EmailController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('mainpage');


// Rolsüzler
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

Route::get('admin/login', [AdminController::class, 'AdminLogin'])->name('admin.login');

// MIDDLEWARE KULLANARAK ADMIN YETKISINE SAHIP KULLANICILARIN KULLANABILECEKLERI ROTALAR
Route::middleware(['auth', 'role:admin'])->group(function () {
    // PANEL ANASAYFA
    Route::get('admin/dashboard', [AdminController::class, 'AdminDashboard'])->name('admin.dashboard');
    // PANEL KULLANICISININ CIKIS ISLEMI
    Route::get('admin/logout', [AdminController::class, 'AdminLogout'])->name('admin.logout');
    // PANEL KULLANICISININ PROFILI
    Route::get('admin/profile', [AdminController::class, 'AdminProfile'])->name('admin.profile');
    // PANEL KULLANICISININ PROFIL BILGILERINI GUNCELLEME ISLEMI
    Route::post('admin/profile/update', [AdminController::class, 'AdminProfileUpdate']);
    // KULLANICILARI LISTELEME ISLEMI
    Route::get('admin/users', [AdminController::class, 'AdminUsers']);
    Route::get('admin/users/view/{id}', [AdminController::class, 'AdminUserView']);

    Route::get('admin/email/compose',[EmailController::class, 'EmailComposer']);
    Route::post('admin/email/compose_post',[EmailController::class, 'EmailComposerPost']);
    Route::get('admin/email/sent',[EmailController::class, 'EmailSent']);

    Route::get('admin/email/sentDelete',[EmailController::class, 'EmailSentDelete']);

    Route::get('admin/email/read/{id}',[EmailController::class, 'AdminEmailRead']);
    Route::get('admin/email/ReadDelete/{id}',[EmailController::class, 'AdminEmailReadDelete']);

});
// MIDDLEWARE KULLANARAK AGENT YETKISINE SAHIP KULLANICILARIN KULLANABILECEKLERI ROTALAR
Route::middleware(['auth', 'role:agent'])->group(function () {
    Route::get('agent/dashboard', [AgentController::class, 'AgentDashboard'])->name('agent.dashboard');
});



