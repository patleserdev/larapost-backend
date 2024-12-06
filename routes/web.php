<?php

use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('/layouts/app');
// });

Route::get('/{any}', function () {
    return view('/layouts/app');  // 'app' est le nom de la vue où ton bundle React est rendu
})->where('any', '.*');
