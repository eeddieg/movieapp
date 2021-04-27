@extends('layouts.app')

@section('content')
<div class="container d-block">
    <h1><div class="card-header text-center p-3">Movie details</div></h1>

    <div class="row justify-content-center pt-5">
        <h1><div class="card-header text-center">Title: <strong>{{ __($movie->title ?? '') }}</strong></div></h1>
    </div>
    <div class="row justify-content-center p-1">
        <h3><div class="card-header text-center">Popularity: <strong>{{ __($movie->popularity ?? '-') }}</strong> </div></h3>
    </div>

    <div class="row justify-content-center">
        <div class="col-8 p-3">
            <div id="movie" class="card">
                <div class="card-body text-xl-center ">
                <div>
                    <img src="{{ $imagePath . $movie->backdrop_path }}" alt="Poster image">
                </div>

                <i>{{ __($movie->overview) }}</i>
            </div>
            </div>
        </div>
    </div>
    <div class="text-center">
        <strong><a href="/home">Back</a></strong>
    </div>
</div>
@endsection
