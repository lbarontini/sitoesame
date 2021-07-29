@extends('layout')
@section('content')
    <div id="wrapper">
        <div id="page" class="container">
            <h1>Nuovo Prodotto</h1>
            <form method="POST" action="/products">
                @csrf
                <div class="field">
                    <label class="label" for="model">Modello</label>

                    <div class="control">
                        <input class="input" type="text" name="model" id="model">
                    </div>
                </div>

                <div class="field">
                    <label class="label" for="description">Descrizione</label>

                    <div class="control">
                        <input class="input" type="text" name="description" id="description">
                    </div>
                </div>

                <div class="field">
                    <label class="label" for="photo_path">Foto</label>

                    <div class="control">
                        <input class="input" type="text" name="photo_path" id="photo_path">
                    </div>
                </div>

                <div class="field">
                    <label class="label" for="installation_notes">note di installazione</label>

                    <div class="control">
                        <input class="input" type="text" name="installation_notes" id="installation_notes">
                    </div>
                </div>

                <div class="field">
                    <label class="label" for="use_notes">Note di utilizzo</label>

                    <div class="control">
                        <input class="input" type="text" name="use_notes" id="use_notes">
                    </div>
                </div>

                <div class="field">
                    <label class="label" for="user_id">Responsabile</label>

                    <div class="control">
                        <input class="input" type="text" name="user_id" id="user_id">
                    </div>
                </div>

                <div class="field is-grouped">
                    <div class="control">
                        <button class="button is-link" type="submit">Salva</button>
                    </div>

            </form>
        </div>
    </div>
@endsection
