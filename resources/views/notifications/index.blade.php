<h1>Notifications</h1>
<h2>New movie premiers</h2>
<ul>
  @forelse ($notifications as $notification)
    <li>
      <a href="{{ route('notifications.show', $notification["id"]) }}">
        Title: {{ $notification["movieTitle"] }}, Budget: {{ $notification["budget"] }}
      </a>
    </li>
  @empty
    <li>You have no unread notifications at this time.</li>
  @endforelse
</ul>
@if (count($notifications) > 0)
  <a href="{{ route('notifications.mark-as-read-all')}}">Mark as read all notifications</a>
@endif
