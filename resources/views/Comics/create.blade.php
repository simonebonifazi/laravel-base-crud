@extends('layouts.main')

@section('content')
<h1 class="my-5"> Inserisci un nuovo fumetto per la vendita</h1>
<!-- stampo validazione -->
@if($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach($errors->all() as $error)
        <li>
            {{ $error }}
        </li>
        @endforeach
    </ul>
</div>
@endif

<form action="{{ route('comics.store')}}" method="POST">
    <!-- devo avvisare laravel che la domanda sia autorizzata, che venga dalla sua stessa app -->
    @csrf
    <!-- titolo -->
    <div class="mb-3">
        <label for="title" class="form-label">Titolo fumetto...</label>
        <input class="form-control  @error('title') is-invalid @enderror" type="text" id="title" name="title" placeholder="es. capitan america"
        value=" {{ old('title' }} ">
    </div>
    <!-- descizione -->
    <div class="mb-3">
        <label for="description" class="form-label">Descrizione: </label>
        <textarea class="form-control" id="description" name="description"
        value=" {{ old('description' }}" > </textarea>
    </div>
    <!-- thumb -->
    <div class="mb-3">
        <label for="thumb" class="form-label">Immagine di copertina </label>
        <input class="form-control @error('thumb') is-invalid @enderror" type="text" id="thumb" name="thumb" placeholder="Url della cover..."
        value=" {{ old('thumb' }}">
    </div>
    <!-- price -->
    <div class="mb-3">
        <label for="price" class="form-label">Il tuo prezzo</label>
        <input class="form-control @error('price') is-invalid @enderror" type="text" id="price" name="price" placeholder="scegli un prezzo ragionevole"
        value=" {{ old('price' }}">
    </div>
    <!-- sale_date // cambiare prospettiva rispetto da utente finale a chi riceve progetto in mano-->
    <div class="mb-3">
        <label for="sale_date" class="form-label">Scadenza offerta</label>
        <input class="form-control @error('sale_date') is-invalid @enderror" type="text" id="sale_date" name="sale_date" placeholder="es.: 2023-08-22"
        value=" {{ old('sale_date' }}">
    </div>
    <!-- series -->
    <div class="mb-3">
        <label for="series" class="form-label">La Serie del tuo fumetto</label>
        <input class="form-control @error('series') is-invalid @enderror" type="text" id="series" name="series" placeholder="es. aquaman, batman..."
        value=" {{ old('series' }}">
    </div>
    <!-- type -->
    <div class="mb-3">
        <label for="type" class="form-label">Che tipo di fumetto vuoi vendere?</label>
        <input class="form-control @error('type') is-invalid @enderror" type="text" id="type" name="type" placeholder="es. graphic novel, comic book..."
        value=" {{ old('type'}}">
        <!-- # il value old('nome attributo') fa si che se c'è un errore, verrà reimpostato ciò che è stato scritto dell'utente in precedenza, al ricaricare della pagina dopo l'invio dei dati
            # ne consegue che nel form congiunto edit e create dovrò aggiungere secondo parametro
            : old('type', $comic->type) , che cerca il valore per il campo nel db   -->
    </div>
    <!-- buttons & a -->
    <div class="d-flex justify-content-between">
        <div>
            <a class="btn btn-secondary me-4" href="{{ route('comics.index') }}"> Torna indietro..</a>
        </div>
        <div>

            <button type="reset" class="btn btn-danger"> Cancella</button>
            <button type="submit" class="btn btn-success"> Salva!</button>
        </div>
    </div>


</form>
@endsection