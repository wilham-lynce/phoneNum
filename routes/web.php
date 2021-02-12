<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PhoneInput;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//input region
Route::view("/", "index");
Route::get("/", [PhoneInput::class, "regions"]);
Route::view("/trial", "sketch");

Route::get("/trial", [PhoneInput::class, "number"]);
// Route::get("/trial", [PhoneInput::class, "internationalFormat"]);
// Route::get('/trial', [PhoneInput::class,'nationalFormat']);
