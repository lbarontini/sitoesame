@extends('layouts.layout')
@section('script')
<script src="{{ asset('js/functions.js') }}" ></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(function () {
        var actionType = 'PUT';
        var actionUrl = "{{ route('solutions.update',['solution'=>$solution]) }}";
        var formId = 'addsolution';
        $(":input").on('blur', function (event) {
            var formElementId = $(this).attr('id');
            doElemValidation(formElementId, actionUrl, formId, actionType);
        });
        $("#addsolution").on('submit', function (event) {
            event.preventDefault();
            doFormValidation(actionUrl, formId, actionType);
        });
    });
</script>
@endsection

@section('content')
    <div class="container-contact">
            <h1>Nuovo Prodotto</h1>
            {!! Form::open(array('route' => 'solutions.store', 'id' => 'addsolution','class' => 'contact-form')) !!}
                <div class="wrap-input">
                    <div  class="rs1-wrap-input">
                        {{ Form::label('name', 'Nome', ['class' => 'label-input']) }}
                        {{ Form::text('name', $solution->name, ['class' => 'input', 'id' => 'name']) }}
                    </div>

                    <div  class="rs1-wrap-input">
                        {{ Form::label('description', 'Descrizione', ['class' => 'label-input']) }}
                        {{ Form::text('description', $solution->description, ['class' => 'input','id' => 'description']) }}
                    </div>

                    <div  class="rs1-wrap-input">
                        {{ Form::label('malfunctions', 'Malfunzionamenti', ['class' => 'label-input']) }}
                        {{ Form::select('malfunctions[]',
                                         $malfunctions->pluck('name','id'),
                                         $solution->malfunctions()->pluck('solution_id'),
                                         [  'multiple'=>true,
                                            'class' => 'input',
                                            'id' => 'malfunctions'
                                         ])
                        }}
                    </div>

                    <div class="container-form-btn">
                        {{ Form::submit('Aggiungi', ['class' => 'form-btn1', 'id' => 'sub-btn']) }}
                    </div>
                </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection
