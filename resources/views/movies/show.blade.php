<x-top5movies/>
<h1>Movie</h1>
<div>
    Title: {{ $movie->title }} (score: {{ $movie->score }})
</div>
<a href="{{ route('movies.index')}}">Back to the movies</a>
