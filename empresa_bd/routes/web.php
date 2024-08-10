<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PersonasController;
use App\Http\Controllers\ContactoController;



Auth::routes();
//Auth::routes(['register' => false]);

Route::resource('personas',PersonasController::class)
    ->names('personas');

Route::view('/', 'home')->name('home');
Route::view('contacto', 'contacto')->name('contacto');
Route::post('contacto/store', [ContactoController::class, 'store'])->name('contacto.store');

















/*
Route::get('personas', [PersonasController::class, 'index'])->name('personas.index');
Route::get('personas/crear', [PersonasController::class, 'create'])->name('personas.create');
Route::post('personas/store', [PersonasController::class, 'store'])->name('personas.store');

Route::get('personas/{id}', [PersonasController::class, 'show'])->name('personas.show');

Route::get('personas/{persona}/editar', [PersonasController::class, 'edit'])->name('personas.edit');
Route::patch('personas/{id}', [PersonasController::class, 'update'])->name('personas.update');
Route::delete('personas/{persona}', [PersonasController::class, 'destroy'])->name('personas.destroy');
*/

//Route::view('contacto', 'contacto')->name('contacto');



Route::get('test-email', function() {
    try {
        Mail::raw('Test email', function($message) {
            $message->to('t512700120@unitru.edu.pe')
                    ->subject('Test Email');
        });
        return 'Email sent';
    } catch (\Exception $e) {
        return 'Error: ' . $e->getMessage();
    }
});


//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
