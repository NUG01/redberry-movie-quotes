<?php

use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Models\Movie;
use Illuminate\Database\Eloquent\Builder;

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
    // return view('main',['movies'=>Movie::inRandomOrder()->get()]);
   $quantity= Movie::count();
    return view('main',['movies'=>Movie::all()->random()]);
});
Route::get('/quotes/{slug}', function ($slug) {
    // dd($slug);
    return view('movies',['movies'=>Movie::all(),'slug'=>$slug]);
});
