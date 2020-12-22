<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;


Route::get('/ping', function(){
    return ['pong'=>true];
});
Route::get('/', function(){
    return ['is Alive'];
});

Route::post('/auth/login', [AuthController::class, 'login']);
Route::post('/auth/logout', [AuthController::class, 'logout']);
Route::post('/auth/refresh', [AuthController::class, 'refresh']);
Route::post('/user', [AuthController::class, 'create']);


//gravar usuário

//listar usuários

//enviar arquivos e usuários permitidos

//listar arquivos

//gravar grupo

//listar grupo