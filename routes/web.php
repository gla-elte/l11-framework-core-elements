<?php


use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\View;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Request;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\ProfileController;

Route::get('/', function () {
  // return view('welcome');
  return View::make('welcome');
});


// Route::get('/movies', [MovieController::class, 'index'])->name('movies.index');
// Route::get('/movies/{movie}', [MovieController::class, 'show'])->name('movies.show');
Route::resource('movies', MovieController::class);

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


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/notifications', [\App\Http\Controllers\UserNotificationController::class, 'index'])
      ->name('notifications.index');
    Route::get('/notifications/mark-as-read-all', [\App\Http\Controllers\UserNotificationController::class, 'markAsReadAll'])
      ->name('notifications.mark-as-read-all');
    Route::get('/notifications/{notification}', [\App\Http\Controllers\UserNotificationController::class, 'show'])
      ->name('notifications.show');


});

require __DIR__.'/auth.php';
