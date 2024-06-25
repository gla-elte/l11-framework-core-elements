<?php

namespace App\Notifications;

use App\Models\Movie;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class MoviePremier extends Notification
{
  use Queueable;

public $movieId;

/**
 * Create a new notification instance.
 */
public function __construct($movieId)
{
  $this->movieId = $movieId;
}

  /**
   * Get the notification's delivery channels.
   *
   * @return array<int, string>
   */
  public function via(object $notifiable): array
  {
    return ['mail'];
  }

  /**
   * Get the mail representation of the notification.
   */
  public function toMail(object $notifiable): MailMessage
  {
    return (new MailMessage)
      ->from('attila@gludovatz.hu', 'Attila Gludovatz')
      ->greeting('Hi ' . \App\Models\User::first()->name . '!')
      ->subject('Movie created: ' . Movie::find($this->movieId)->title)
      ->success()
      ->line('New movie was created!')
      ->action('New Movie Details', url('/movies/' . $this->movieId))
      ->line('Thank you for using our application!');
  }

  /**
   * Get the array representation of the notification.
   *
   * @return array<string, mixed>
   */
  public function toArray(object $notifiable): array
  {
    return [
      //
    ];
  }
}
