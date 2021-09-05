@extends('layouts.layout')
@section('script')
<script src="{{ asset('js/functions.js') }}" ></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(function () {
        var actionType = 'POST';
        var actionUrl = "{{ route('assistance_centers.store') }}";
        var formId = 'addassistance_centers';
        $(":input").on('blur', function (event) {
            var formElementId = $(this).attr('id');
            doElemValidation(formElementId, actionUrl, formId, actionType);
        });
        $("#addassistance_centers").on('submit', function (event) {
            event.preventDefault();
            doFormValidation(actionUrl, formId, actionType);
        });
    });
</script>
@endsection

@section('content')
    <div class="container-contact">
        <h1>Nuovo centro assistenza</h1>
        {!! Form::open(array('route' =>array('assistance_centers.store', ''),
                                         'id' => 'addassistance_centers',
                                         'class' => 'contact-form',
                                         'method'=>'POST'));
        !!}
            <div class="wrap-input">
                <div  class="rs1-wrap-input">
                    {{ Form::label('name', 'Nome', ['class' => 'label-input']) }}
                    {{ Form::text('name','', ['class' => 'input', 'id' => 'name']) }}
                </div>

                <div  class="rs1-wrap-input">
                    {{ Form::label('address', 'Indirizzo', ['class' => 'label-input']) }}
                    {{ Form::text('address','', ['class' => 'input', 'id' => 'address']) }}
                </div>

                <div  class="rs1-wrap-input">
                    {{ Form::label('description', 'Descrizione', ['class' => 'label-input']) }}
                    {{ Form::textarea('description','', ['class' => 'input','id' => 'description']) }}
                </div>

                <div  class="rs1-wrap-input">
                    {{ Form::label('technicians', 'Tecnici Afferenti', ['class' => 'label-input']) }}
                    {{ Form::select('technicians[]',
                                     $technicians->pluck('name','id'),
                                     '',
                                    ['multiple'=>true,
                                    'class' => 'input',
                                    'id' => 'technicians'
                                    ])
                    }}

                <div class="container-form-btn">
                    {{ Form::submit('Conferma', ['class' => 'form-btn1', 'id' => 'sub-btn']) }}
                </div>
            </div>
        {!! Form::close() !!}
    </div>
@endsection
