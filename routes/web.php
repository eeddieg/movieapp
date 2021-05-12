<?php

use App\Http\Controllers\ApiController;
use App\Models\Movie;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\WelcomeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
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

Route::get('/', [WelcomeController::class, 'index']);

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('movie/{id}', function($id) {

    $result = json_decode(json_encode(Movie::where('movie_id', $id)->first())); // get the protected property

    return view('components.movie', [
        'movie' => $result,
        'imagePath' => Cache::get('imagePath')
    ]);
});

