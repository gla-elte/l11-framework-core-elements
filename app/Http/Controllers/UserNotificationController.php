<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;
use Illuminate\Notifications\DatabaseNotification;

class UserNotificationController extends Controller
{
  public function index()
  {
    $notifications = [];

    foreach (auth()->user()->unreadNotifications as $notification)
    {
      if($notification->data != null)
      {
        $notifications[] = [
          "id" => $notification->id,
          "movieTitle" => Movie::find($notification->data["movieId"])->title,
          "budget" => $notification->data["budget"]
        ];
      }
    }

    return view('notifications.index', [
      'notifications' => $notifications
    ]);
  }

  public function show($id)
  {
    $notification = DatabaseNotification::find($id);
    $notification->markAsRead();

    return to_route('movies.show', [
      'movie' => $notification->data["movieId"]
    ]);
  }

  public function markAsReadAll()
  {
    auth()->user()->unreadNotifications->markAsRead();
    return to_route('notifications.index');
  }
}
