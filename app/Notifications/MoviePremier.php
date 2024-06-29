<?php

namespace App\Notifications;

use App\Models\User;
use App\Models\Movie;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class MoviePremier extends Notification
{
  use Queueable;

  protected $movieId;
  protected $budget;

protected $notifiableUserName;

/**
 * Create a new notification instance.
 */
public function __construct($movieId, $notifiableUserId, $budget)
{
  $this->movieId = $movieId;
  $this->notifiableUserName = User::find($notifiableUserId)->name;
  $this->budget = $budget;
}

  /**
   * Get the notification's delivery channels.
   *
   * @return array<int, string>
   */
  public function via(object $notifiable): array
  {
    return ['mail', 'database'];
  }

  /**
   * Get the mail representation of the notification.
   */
  public function toMail(object $notifiable): MailMessage
  {
    return (new MailMessage)
      ->from('attila@gludovatz.hu', 'Attila Gludovatz')
      ->greeting('Hi ' . $this->notifiableUserName . '!')
      ->subject('Movie created: ' . Movie::find($this->movieId)->title)
      ->success()
      ->line('New movie was created!')
      ->line('New movie\' budget: '. $this->budget)
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
      'movieId' => $this->movieId,
      'budget' => $this->budget,
    ];
  }
}
