@extends('layouts.main')

@section('content')

<h1 class="bg-success"> I nostri fumetti</h1>
<ul class="d-flex justify-content-center align-items-center flex-wrap row">

    @foreach($comics as $comic)
    <li class="list-group-item m-5 col-3">
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
            <form class="blocker-delete" action="{{ route('comics.destroy', $comic->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-outline-danger ms-3"> Elimina il fumetto! :( </button>
            </form>
        </div>
    </li>

    @endforeach

</ul>
<h3>Non ti piacciono? Carica il tuo fumetto! <a href="{{ route('comics.create')}}" class="btn btn-primary"> cliccando
        qui</a></h3>


@endsection

@section('more-js')
<script>
const deleteBlocker = document.querySelectorAll('.blocker-delete');
deleteBlocker.forEach(form => {
    form.addEventListener('submit', (event) => {
        event.preventDefault();
        const hasConfirmed = confirm('Vuoi davvero eliminare questo fumetto?');
        if (hasConfirmed) form.submit();
    });
})
</script>
@endsection