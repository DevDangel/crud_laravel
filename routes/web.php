<?php

use App\Http\Controllers\CrudController;
use Illuminate\Support\Facades\Route;

Route::get('/',[CrudController::class,'index'])->name('crud.index');
Route::post('/registrar-producto',[CrudController::class,'create'])->name('crud.create');
Route::post('/modificar-producto',[CrudController::class,'update'])->name('crud.update');
Route::get('/eliminar-producto-{id}',[CrudController::class, 'delete'])->name('crud.delete');
