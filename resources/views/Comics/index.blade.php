@extends('layouts.main')

@section('content')

<h1 class="bg-success"> I nostri fumetti</h1>
<ul class="d-flex justify-content-center align-items-center flex-wrap row">

    @foreach($comics as $comic)
    <li class="list-group-item m-5 col-2">
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
        <div class="d-flex justify-content-between">

            <a href="{{ route('comics.show', $comic->id) }}" class="btn btn-outline-info"> Più info...</a>
            <a href="{{ route('comics.edit', $comic->id) }}" class="btn btn-outline-success ms-3"> ...o modifica il
                fumetto..!</a>
        </div>
    </li>

    @endforeach

</ul>
<h3>Non ti piacciono? Carica il tuo fumetto! <a href="{{ route('comics.create')}}" class="btn btn-primary"> cliccando
        qui</a></h3>


@endsection