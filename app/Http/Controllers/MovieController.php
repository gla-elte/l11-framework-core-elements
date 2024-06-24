<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Services\Imdb;
use Illuminate\Http\Request;

class MovieController extends Controller
{
  protected Imdb $imdb;

  public function __construct(Imdb $imdb)
  {
    $this->imdb = $imdb;
  }

  public function index(Request $request)
  {
    // $poster = $this->imdb->getPoster($request->get('poster'));
    // echo $poster;
    // dd(resolve('App\Services\Imdb'), resolve('App\Services\Imdb'));
    return view('movies.index', [
      'movies' => Movie::all()
    ]);
  }

  public function show(Movie $movie) {
    return view('movies.show', compact('movie'));
  }
}
