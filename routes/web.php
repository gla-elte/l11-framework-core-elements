<?php

use App\Http\Controllers\MovieController;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;

Route::get('/', function () {
  // return view('welcome');
  return View::make('welcome');
});


Route::get('/movies', [MovieController::class, 'index'])->name('movies.index');
Route::get('/movies/{movie}', [MovieController::class, 'show'])->name('movies.show');

Route::get('/request-test', function () {
  // return request('name');
  return Request::input('name');
});

app()->bind('my-key', function () {
  return "This is my key.";
});

Route::get('/file-facade-get-content', function () {
  dd(File::get(public_path('index.php')));
});

Route::get('/file-di-get-content', function (Filesystem $file) {
  dd($file->get(public_path('index.php')));
});
