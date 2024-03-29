<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Quote;
use App\Models\Movie;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;

class MainPageController extends Controller
{
   public function index(): View
   {

      if (Auth::user()) {
         return view('main', ['movies' => Quote::all()->random()]);
      } else {
         return view('login');
      }
   }
   public function show($slug): View
   {
      return view('movies', ['movies' => Movie::where('id', $slug)->first(), 'slug' => $slug,]);
   }
}
