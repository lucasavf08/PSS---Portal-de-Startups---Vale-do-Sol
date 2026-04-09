<?php
use Illuminate\Support\Facades\Route;

// Agora o Laravel sabe que ao digitar /startups ele deve mostrar sua página
Route::get('/startups', function () {
    return view('startups'); 
});