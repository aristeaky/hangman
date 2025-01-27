<?php

use App\Http\Controllers\hangmanController;
use Illuminate\Support\Facades\Route;

Route::get('/hangman',[hangmanController::class,"index"])->name("index.hangman");

Route::post('/hangman',[hangmanController::class,"handleLetter"])->name("handleLetter.hangman");

Route::get('/hangman/newGame',[hangmanController::class,"newGame"])->name("newGame.hangman");