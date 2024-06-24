<div>
    <table>
        <tr>
            <th>Title</th>
            <th>Score</th>
        </tr>
    @foreach ($movies as $movie)
        <tr>
            <td><a href="{{ route('movies.show', $movie->id)}}">{{ $movie->title }}</a></td>
            <td>{{ $movie->score }}</td>
        </tr>
    @endforeach
    </table>
</div>
