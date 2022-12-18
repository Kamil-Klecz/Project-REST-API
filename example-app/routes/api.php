<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\requests;


Route::get('people', [requests::class, 'index']);
Route::get('people/{id}', [requests::class, 'show']);
Route::post('people', [requests::class, 'create']);
Route::get('people/{id}', [requests::class, 'update']);
Route::get('people/{id}', [requests::class, 'destroy']);

Route::apiResource('peoples', requests::class);
