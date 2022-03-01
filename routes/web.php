<?php

use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });


use App\Http\Controllers\SearchFormController;
Route::get('/',[SearchFormController::class, 'form']);
Route::post('/show-result',[SearchFormController::class, 'show_result'])->name('show-result');

// Route::get('/',[SearchFormController::class, 'show_result']);



