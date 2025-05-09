<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('calculator');
});

Route::post('/calculate', function (Request $request) {
    $validated = $request->validate([
        'a' => 'required|numeric',
        'b' => 'required|numeric',
    ]);

    $sum = $validated['a'] + $validated['b'];

    return view('calculator', [
        'a' => $validated['a'],
        'b' => $validated['b'],
        'sum' => $sum
    ]);
});