<?php

use Illuminate\Support\Facades\Route;


//Route::get('listar', [PersonaController::class, 'listar']);
Route::get('listar', 'PersonaController@listar')->name('personas.listar');;
Route::post('/personas/create-or-update', 'PersonaController@createOrUpdate')->name('personas.createOrUpdate');
Route::delete('delete/{id}', 'PersonaController@delete')->name('personas.delete');

Route::get('personas/edit/{id}', 'PersonaController@edit')->name('personas.edit');
