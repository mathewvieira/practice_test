<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    // return view('welcome');

    return response()->json([
        'message' => 'Practice Test API',
        'status' => 'Connected',
        'data' => [
            'readme' => 'Consultar o README.md para mais detalhes.',
            'links' => [
                'transportadoras' => 'http://localhost:8080/api/transportadoras',
                'motoristas' => 'http://localhost:8080/api/motoristas',
                'caminhoes' => 'http://localhost:8080/api/caminhoes',
                'modelos' => 'http://localhost:8080/api/modelos'
            ]
        ]
    ]);
});
