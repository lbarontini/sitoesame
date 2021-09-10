@extends('layouts.layout')
@section('script')
<script src="{{ asset('js/functions.js') }}" ></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(function () {
        var actionType = 'POST';
        var actionUrl = "{{ route('products.store') }}";
        var formId = 'addproduct';
        $(":input").on('blur', function (event) {
            var formElementId = $(this).attr('id');
            doElemValidation(formElementId, actionUrl, formId, actionType);
        });
        $("#addproduct").on('submit', function (event) {
            event.preventDefault();
            doFormValidation(actionUrl, formId, actionType);
        });
    });
</script>
@endsection

@section('content')
    <div class="container-contact">
            <h1>Nuovo Prodotto</h1>
            {!! Form::open(array('route' => 'products.store', 'id' => 'addproduct', 'files' => true, 'class' => 'contact-form')) !!}
                <div class="wrap-input">
                    <div  class="rs1-wrap-input">
                        {{ Form::label('model', 'Modello', ['class' => 'label-input']) }}
                        {{ Form::text('model', '', ['class' => 'input', 'id' => 'model']) }}
                    </div>

                    <div  class="rs1-wrap-input">
                        {{ Form::label('description', 'Descrizione', ['class' => 'label-input']) }}
                        {{ Form::text('description', '', ['class' => 'input','id' => 'description']) }}
                    </div>

                    <div  class="rs1-wrap-input">
                        {{ Form::label('installation_notes', 'Note di installazione', ['class' => 'label-input']) }}
                        {{ Form::textarea('installation_notes', '', ['class' => 'input', 'id' => 'installation_notes']) }}
                    </div>

                    <div  class="rs1-wrap-input">
                        {{ Form::label('use_notes', 'Note di utlizzo', ['class' => 'label-input']) }}
                        {{ Form::textarea('use_notes', '', ['class' => 'input', 'id' => 'use_notes']) }}
                    </div>

                    <div  class="rs1-wrap-input">
                        {{ Form::label('image', 'Foto', ['class' => 'label-input']) }}
                        {{Form::file('image', ['class' => 'input', 'id' => 'image'])}}
                    </div>

                    <div  class="rs1-wrap-input">
                        {{ Form::label('user_id', 'Gestore', ['class' => 'label-input']) }}
                        {{ Form::text('user_id', '', ['class' => 'input', 'id' => 'user_id']) }}
                    </div>

                    <div class="container-form-btn">
                        {{ Form::submit('Aggiungi Prodotto', ['class' => 'form-btn1', 'id' => 'sub-btn']) }}
                    </div>
                </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection
