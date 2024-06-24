<aside>
    <h1>Top 5 movies:</h1>
    <ul>
        @foreach ($top5Movies as $topMovie)
            <li><a href="{{ route('movies.show', $topMovie->id) }}">{{ $topMovie->title }} ({{ $topMovie->score }})</a></li>
        @endforeach
    </ul>
</aside>
