<?php

use Illuminate\Support\Facades\Route;
use App\Models\Movie;
use App\Models\Quote;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\QuoteController;
use App\Http\Controllers\LoginController;

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
	// $quantity = Movie::count();
	if(Movie::all()->count()){
   
		return view('main', ['movies'=>Quote::all()->random()]);
	}else{
		return 'Database is empty :)';
	}
});
Route::get('quotes/{slug}', function ($slug) {
	// dd($slug);
	return view('movies', ['movies'=>Movie::all(), 'slug'=>$slug]);
});


Route::get('/choose',function(){
	return view('choose');
});

Route::get('add/movie',[MovieController::class,'show']);
Route::post('add/movie',[MovieController::class,'store']);


Route::post('add/quote',[QuoteController::class,'store']);
Route::get('add/quote',function(){

 return view('addQuote',['quotes'=>Quote::all(),'allMovie'=>Movie::all()]);
});


Route::get('login',[LoginController::class,'create'])->middleware('guest');
Route::post('login',[LoginController::class,'store'])->middleware('guest');


Route::post('logout',[LoginController::class,'destroy'])->middleware('auth');

Route::delete('admin/quotes/{quote}',[QuoteController::class,'destroy']);
Route::delete('admin/movies/{movie}',[MovieController::class,'destroy']);


Route::get('admin/quotes/{quote}/edit',[QuoteController::class,'edit']);
Route::patch('admin/quotes/{quote}',[QuoteController::class,'update']);