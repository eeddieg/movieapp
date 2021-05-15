@extends('layouts.app')

@section('content')
<div class="container d-block">

    <div class="row justify-content-center pt-5">
        <h1>Welcome </h1>
    </div>

    <div>
        <size-bar :image-sizes="{{ json_encode($imageSizes) }}"></size-bar>
        <discover-movies
            :discover-movies="{{ json_encode($discoverMovies["results"]) }}"
            :image-path="{{ json_encode($imagePath) }}"
            {{-- :backdrop-sizes="{{ json_encode($imageSizes["backdrop_sizes"]) }}" --}}
            {{-- :logo-sizes="{{ json_encode($imageSizes["logo_sizes"]) }}" --}}
            :poster-sizes="{{ json_encode($imageSizes["poster_sizes"]) }}"
            {{-- :profile-sizes="{{ json_encode($imageSizes["profile_sizes"]) }}" --}}
            {{-- :still-sizes="{{ json_encode($imageSizes["still_sizes"]) }}" --}}
            >
        </discover-movies>
    </div>

    {{-- <div class="row d-flex justify-content-center">
        @foreach ($discoverMovies["results"] as $movie)
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
    </div> --}}
</div>
@endsection
