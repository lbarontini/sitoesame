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
@endsection


