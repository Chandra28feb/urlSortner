<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShortLinkController;

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', [ShortLinkController::class,'index']);
Route::post('/generate-shorten-link', [ShortLinkController::class,'store'])->name('generate.shorten.link.post');
Route::get('{code}', [ShortLinkController::class,'shortenLink'])->name('shorten.link'); 