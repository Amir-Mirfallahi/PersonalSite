<?php

use App\Http\Controllers\AvailableAtController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProjectController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get("/posts", [PostController::class, "index"])->name("posts.index");

Route::get("/posts/{post:id}", [PostController::class, "show"])->name("posts.show");

Route::get("/social-media", [AvailableAtController::class, 'index'])->name("social-media.index");

Route::get("/projects", [ProjectController::class, "index"])->name("projects.index");
