<?php

use App\Http\Controllers\DiscussionController;
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

Route::get('/', function () {
    return view('home', [
        'title' => 'Home'
    ]);
});

Route::get('/material', function () {
    return view('material', [
        'title' => 'Material'
    ]);
});

Route::get('/quiz', function () {
    return view('quiz', [
        'title' => 'Quiz'
    ]);
});

Route::get('/discussions', [DiscussionController::class, 'index']);

Route::get('discussions/{discussion:slug}', [DiscussionController::class, 'show']);

Route::get('/profile', function () {
    return view('profile', [
        'title' => 'Profile'
    ]);
});
