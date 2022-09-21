@extends('layouts.main')

@section('content')
<h1> Inserisci tu un titolo che vuoi vendere in feat!</h1>
<form action="">

    <div class="mb-3">
        <label for="title" class="form-label">Titolo fumetto...</label>
        <input class="form-control" type="text" id="title" placeholder="es. capitan america">
    </div>
    <div class="mb-3">
        <label for="description" class="form-label">Descrizione: </label>
        <textarea class="form-control" id="description" placeholder="descrizione..."> </textarea>
    </div>
    <div class="mb-3">
        <label for="formFileMultiple" class="form-label">Multiple files input example</label>
        <input class="form-control" type="file" id="formFileMultiple" multiple>
    </div>
    <div class="mb-3">
        <label for="formFileDisabled" class="form-label">Disabled file input example</label>
        <input class="form-control" type="file" id="formFileDisabled" disabled>
    </div>
    <div class="mb-3">
        <label for="formFileSm" class="form-label">Small file input example</label>
        <input class="form-control form-control-sm" id="formFileSm" type="file">
    </div>
    <div>
        <label for="formFileLg" class="form-label">Large file input example</label>
        <input class="form-control form-control-lg" id="formFileLg" type="file">
    </div>
</form>
@endsection