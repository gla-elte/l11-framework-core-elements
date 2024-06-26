<?php

namespace App\Http\Controllers;

use App\Events\MovieCreated;
use App\Models\Movie;
use App\Models\User;
use App\Notifications\ContactMe;
use App\Notifications\MoviePremier;
use App\Services\Imdb;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;

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

  public function create() {
    return view('movies.create');
  }

  public function store() {
    // $movie = Movie::create(
    //   array_merge(
    //     request()->all(),
    //     ['user_id' => auth()->id()]
    //   )
    // );
    Movie::create(request()->all());

    // Notification::send(User::first(), new MoviePremier($movie->id, 1234));
    // Notification::send(User::first(), new ContactMe());
    // User::first()->notify(new ContactMe());

    // MovieCreated::dispatch($movie);
    // event(new MovieCreated($movie));

    return redirect(route('movies.index'))->with('message', 'Movie created.');
  }
}
