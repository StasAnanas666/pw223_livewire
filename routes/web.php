<?php

use App\Livewire\Completedtasks;
use Illuminate\Support\Facades\Route;
use Livewire\Livewire;

Livewire::setScriptRoute(function ($handle) {
    return Route::get('/pw223_livewire/public/livewire/livewire.js', $handle);
});

Livewire::setUpdateRoute(function ($handle) {
    return Route::get('/pw223_livewire/public/livewire/update', $handle);
});

Route::get('/', function () {
    return view('welcome');
});
Route::get("/completed-tasks", function () {
    return view('completed-tasks');
});
