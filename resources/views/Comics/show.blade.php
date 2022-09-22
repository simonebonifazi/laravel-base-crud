@extends('layouts.main')


@section('content')

<div class="card my-5" style="width: 45rem">
    <h1> {{ $comic->title }} </h1>

    <figure>
        <img src="{{ $comic->thumb }}" class="card-img-top" alt="{{ $comic->title }}">
    </figure>
    <div class="card-body">
        <p class="card-text">{{ $comic->description }}</p>
        <p class="card-text"> Prezzo al pubblico : {{ $comic->price }}</p>
        <p class="card-text"> Scadenza offerta: {{ $comic->sale_date }}</p>
        <p class="card-text"> Serie: {{ $comic->price }}</p>
        <p class="card-text"> Tipo: {{ $comic->type }}</p>
        <hr>
        <div class="d-flex justify-content-between">
            <a href="{{ route('comics.index') }}" class="btn btn-danger"> Torna indetro...</a>
            <a href="{{ route('comics.edit', $comic->id) }}" class="btn btn-success ms-3"> ...o modifica il
                fumetto..!</a>
        </div>

    </div>
</div>
@endsection