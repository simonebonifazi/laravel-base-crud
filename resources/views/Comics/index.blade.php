@extends('layouts.main')

@section('content')

<h1 class="bg-success"> I nostri fumetti</h1>
<ul class="d-flex justify-content-center align-items-center flex-wrap row">

    @foreach($comics as $comic)
    <li class="list-group-item m-5 col">
        <h2> {{ $comic->title }} </h2>
        <figure>
            <img src="{{ $comic->thumb }}" alt="{{ $comic->title }}">
        </figure>
        <figcaption>
            <p>
                Serie:
                {{ $comic->series }} ;
            </p>
        </figcaption>
        <a href="{{ route('comics.show', $comic->id) }}" class="btn btn-success"> More info...</a>
    </li>

    @endforeach
</ul>

@endsection