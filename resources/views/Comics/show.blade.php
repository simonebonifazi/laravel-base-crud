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
            <a href="{{ route('comics.index') }}" class="btn btn-light"> Torna indetro...</a>
            <a href="{{ route('comics.edit', $comic->id) }}" class="btn btn-success ms-3"> ...o modifica il
                fumetto..</a>
            <form action="{{ route('comics.destroy', $comic->id) }}" method="POST" class="blocker-delete"
                data-comic="{{ $comic->title }}">
                @csrf
                @method('DELETE')
                <button type=" submit" class="btn btn-danger ms-3"> Proprio non ti piace? Clicca qui per
                    Eliminare il fumetto! </button>
            </form>
        </div>

    </div>
</div>
@endsection

@section('more-js')
<script>
const deleteBlocker = document.querySelectorAll('.blocker-delete');
deleteBlocker.forEach(form => {
    form.addEventListener('submit', (event) => {
        event.preventDefault();
        const comicTitle = form.getAttribute('data-comic');
        const hasConfirmed = confirm(`Vuoi davvero eliminare ${comicTitle} ?`);
        if (hasConfirmed) form.submit();
    });
})
</script>
@endsection