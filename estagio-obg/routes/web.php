<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\GlassesController;
use App\Http\Controllers\SaleController;  // Adicionei o SaleController aqui

Route::get('/', function () {
    return redirect()->route('login');
});

Route::controller(AuthController::class)->group(function () {
    Route::get('register', 'register')->name('register');
    Route::post('register', 'registerSave')->name('register.save');
  
    Route::get('login', 'login')->name('login');
    Route::post('loginAction', 'loginAction')->name('login.action');
  
    Route::get('logout', 'logout')->middleware('auth')->name('logout');
});

Route::middleware('auth')->group(function () {
    Route::get('dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::controller(ClienteController::class)->prefix('clientes')->group(function () {
        Route::get('', 'index')->name('clientes.index');
        Route::get('create', 'create')->name('clientes.create');
        Route::post('store', 'store')->name('clientes.store');
        Route::get('show/{id}', 'show')->name('clientes.show');
        Route::get('edit/{id}', 'edit')->name('clientes.edit');
        Route::put('edit/{id}', 'update')->name('clientes.update');
        Route::delete('destroy/{id}', 'destroy')->name('clientes.destroy');
    });

    Route::controller(GlassesController::class)->prefix('glasses')->group(function () {
        Route::get('', 'index')->name('glasses.index');
        Route::get('create', 'create')->name('glasses.create');
        Route::post('store', 'store')->name('glasses.store');
        Route::get('show/{id}', 'show')->name('glasses.show');
        Route::get('edit/{id}', 'edit')->name('glasses.edit');
        Route::put('edit/{id}', 'update')->name('glasses.update');
        Route::delete('destroy/{id}', 'destroy')->name('glasses.destroy');
    });

    Route::get('/profile', [AuthController::class, 'profile'])->name('profile');

    Route::resource('sales', SaleController::class); // Movei para fora da middleware duplicada

});
