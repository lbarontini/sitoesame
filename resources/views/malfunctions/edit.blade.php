@extends('layouts.layout')
@section('script')
<script src="{{ asset('js/functions.js') }}" ></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(function () {
        var actionType = 'PUT';
        var actionUrl = "{{ route('malfunctions.update',['malfunction'=>$malfunction]) }}";
        var formId = 'editmalfunction';
        $(":input").on('blur', function (event) {
            var formElementId = $(this).attr('id');
            doElemValidation(formElementId, actionUrl, formId, actionType);
        });
        $("#editmalfunction").on('submit', function (event) {
            event.preventDefault();
            doFormValidation(actionUrl, formId, actionType);
        });
    });
</script>
@endsection

@section('content')
    <div class="container-contact">
            <h1>Modifica malfunzionamento</h1>
            {!! Form::open(array('route' => 'malfunctions.store', 'id' => 'editmalfunction','class' => 'contact-form')) !!}
                <div class="wrap-input">
                    <div  class="rs1-wrap-input">
                        {{ Form::label('name', 'Nome', ['class' => 'label-input']) }}
                        {{ Form::text('name', $malfunction->name, ['class' => 'input', 'id' => 'name']) }}
                    </div>

                    <div  class="rs1-wrap-input">
                        {{ Form::label('description', 'Descrizione', ['class' => 'label-input']) }}
                        {{ Form::text('description', $malfunction->description, ['class' => 'input','id' => 'description']) }}
                    </div>

                    <div  class="rs1-wrap-input">
                        {{ Form::label('solutions', 'Soluzioni', ['class' => 'label-input']) }}
                        {{ Form::select('solutions[]',
                                         $solutions->pluck('name','id'),
                                         $malfunction->solutions()->pluck('solution_id'),
                                         [  'multiple'=>true,
                                            'class' => 'input',
                                            'id' => 'solutions'
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
