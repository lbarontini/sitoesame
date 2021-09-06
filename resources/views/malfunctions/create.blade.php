@extends('layouts.layout')
@section('script')
<script src="{{ asset('js/functions.js') }}" ></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(function () {
        var actionType = 'POST';
        var actionUrl = "{{ route('malfunctions.store') }}";
        var formId = 'addmalfunction';
        $(":input").on('blur', function (event) {
            var formElementId = $(this).attr('id');
            doElemValidation(formElementId, actionUrl, formId, actionType);
        });
        $("#addmalfunction").on('submit', function (event) {
            event.preventDefault();
            doFormValidation(actionUrl, formId, actionType);
        });
        // $("#newsol-btn").on('click', function (event) {
        //     event.preventDefault();
        //     var out = '<div  class="rs1-wrap-input"> {{ Form::label('sol_name', 'Nome Soluzione', ['class' => 'label-input']) }} {{ Form::text('sol_name', '', ['class' => 'input', 'id' => 'sol_name']) }} </div> <div  class="rs1-wrap-input"> {{ Form::label('sol_description', 'Descrizione soluzione', ['class' => 'label-input']) }} {{ Form::text('sol_description', '', ['class' => 'input','id' => 'sol_description']) }} </div>'
        //     $(this).before(out);
        //     $(this).hide();
        // });
    });
</script>
@endsection

@section('content')
    <div class="container-contact">
            <h1>Nuovo Malfunzionamento</h1>
            {!! Form::open(array('route' => 'malfunctions.store', 'id' => 'addmalfunction','class' => 'contact-form')) !!}
                <div class="wrap-input">
                    <div  class="rs1-wrap-input">
                        {{ Form::label('name', 'Nome', ['class' => 'label-input']) }}
                        {{ Form::text('name', '', ['class' => 'input', 'id' => 'name']) }}
                    </div>

                    <div  class="rs1-wrap-input">
                        {{ Form::label('description', 'Descrizione', ['class' => 'label-input']) }}
                        {{ Form::text('description', '', ['class' => 'input','id' => 'description']) }}
                    </div>

                    <div  class="rs1-wrap-input">
                        {{ Form::label('solutions', 'Soluzioni', ['class' => 'label-input']) }}
                        {{ Form::select('solutions[]',
                                         $solutions->pluck('name','id'),
                                         null,
                                         [  'multiple'=>true,
                                            'class' => 'input',
                                            'id' => 'solutions'
                                         ])
                        }}
                    </div>
                    @if (isset($product))
                        <input type = "hidden" name = "product" value = {{$product}} />
                    @endif
                    <div class="container-form-btn">
                        {{ Form::submit('Aggiungi', ['class' => 'form-btn1', 'id' => 'sub-btn']) }}
                    </div>
                </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection
