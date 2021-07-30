@extends('layout')

@section('content')
    <div class="container-contact">
        <h1>Nuovo Prodotto</h1>
        {!! Form::model($product, ['route' => ['products.update', $product->id],'method'=>'put']) !!}
            <div class="wrap-input">
                <div  class="rs1-wrap-input">
                    {{ Form::label('model', 'Modello', ['class' => 'label-input']) }}
                    {{ Form::text('model', $product->model, ['class' => 'input', 'id' => 'model']) }}
                </div>

                <div  class="rs1-wrap-input">
                    {{ Form::label('description', 'Descrizione', ['class' => 'label-input']) }}
                    {{ Form::text('description', $product->description, ['class' => 'input','id' => 'description']) }}
                </div>

                <div  class="rs1-wrap-input">
                    {{ Form::label('installation_notes', 'Note di installazione', ['class' => 'label-input']) }}
                    {{ Form::textarea('installation_notes', $product->installation_notes, ['class' => 'input', 'id' => 'installation_notes']) }}
                </div>

                <div  class="rs1-wrap-input">
                    {{ Form::label('use_notes', 'Note di utlizzo', ['class' => 'label-input']) }}
                    {{ Form::textarea('use_notes', $product->use_notes, ['class' => 'input', 'id' => 'use_notes']) }}
                </div>

                <div  class="rs1-wrap-input">
                    {{ Form::label('photo_path', 'Foto', ['class' => 'label-input']) }}
                    {{Form::file('photo_path', ['class' => 'input', 'id' => 'photo_path'])}}
                </div>

                <div  class="rs1-wrap-input">
                    {{ Form::label('user_id', 'Gestore', ['class' => 'label-input']) }}
                    {{ Form::text('user_id', $product->user_id, ['class' => 'input', 'id' => 'user_id']) }}
                </div>

                <div class="container-form-btn">
                    {{ Form::submit('Aggiungi Prodotto', ['class' => 'form-btn1', 'id' => 'sub-btn']) }}
                </div>
            </div>
        {!! Form::close() !!}
    </div>
    {{-- <div id="wrapper">
        <div id="page" class="container">
            <h1>Aggiorna Prodotto</h1>
            <form method="POST" action="/products/{{$product->id}}">
                @method('PUT')
                @csrf

                <div class="field">
                    <label class="label" for="model">Modello</label>

                    <div class="control">
                        <input class="input" type="text" name="model" id="model" value="{{$product->model}}">
                    </div>
                </div>

                <div class="field">
                    <label class="label" for="description">Descrizione</label>

                    <div class="control">
                        <input class="input" type="text" name="description" id="description" value="{{$product->description}}">
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
                        <input class="input" type="text" name="installation_notes" id="installation_notes" value="{{$product->installation_notes}}">
                    </div>
                </div>

                <div class="field">
                    <label class="label" for="use_notes">Note di utilizzo</label>

                    <div class="control">
                        <input class="input" type="text" name="use_notes" id="use_notes" value="{{$product->use_notes}}">
                    </div>
                </div>

                <div class="field">
                    <label class="label" for="user_id">Responsabile</label>

                    <div class="control">
                        <input class="input" type="text" name="user_id" id="user_id" value="{{$product->user_id}}">
                    </div>
                </div>

                <div class="field is-grouped">
                    <div class="control">
                        <button class="button is-link" type="submit">Salva</button>
                    </div>

            </form>
        </div>
    </div> --}}
@endsection


