@extends('layouts.app')

@section('content')
<div class="container d-block">

    <div class="row justify-content-center pt-5">
        <h1>Welcome </h1>
    </div>
    <div class="row justify-content-center pt-5">
        <h2>Discover movies</h2>
    </div>

    <div class="row d-flex justify-content-center">
        @foreach ($movies["results"] as $movie)
        <div class="col-4 p-3">
            <div id="movie" class="card">
                <div class="card-header text-center">{{ $movie["title"] ?? '' }}</div>

                <div class="card-body text-xl-center ">
                    <a href="/movie/{{ $movie["id"] }}">
                        <img src="{{ $imagePath . $movie["poster_path"] }}" alt="">
                    </a>
                    <article>{{ __($movie["overview"]) }}</article>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
