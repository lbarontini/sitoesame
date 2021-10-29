@extends('layouts.layout')
@section('script')
<script src="{{ asset('js/functions.js') }}" ></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(function () {
        var actionType = 'POST';
        var actionUrl = "{{ route('faqs.store') }}";
        var formId = 'addfaq';
        $(":input").on('blur', function (event) {
            var formElementId = $(this).attr('id');
            doElemValidation(formElementId, actionUrl, formId, actionType);
        });
        $("#addfaq").on('submit', function (event) {
            event.preventDefault();
            doFormValidation(actionUrl, formId, actionType);
        });
    });
</script>
@endsection

@section('content')
    <div class="container-contact">
        <p class="pagetitle">Nuova Domanda</p>
            {!! Form::open(array('route' => 'faqs.store', 'id' => 'addfaq','class' => 'contact-form')) !!}
                <div class="wrap-input">
                    <div  class="rs1-wrap-input">
                        {{ Form::label('question', 'Domanda', ['class' => 'label-input']) }}
                        {{ Form::text('question', '', ['class' => 'input', 'id' => 'question']) }}
                    </div>

                    <div  class="rs1-wrap-input">
                        {{ Form::label('answer', 'Risposta', ['class' => 'label-input']) }}
                        {{ Form::text('answer', '', ['class' => 'input','id' => 'answer']) }}
                    </div>

                    <div  class="rs1-wrap-input">
                        {{ Form::label('faqs_category', 'Categoria', ['class' => 'label-input']) }}
                        {{ Form::select('faqs_category',
                                         $faqs_categories->pluck('name','id'),
                                         null,
                                         [  'multiple'=>false,
                                            'class' => 'input',
                                            'id' => 'faqs_category'
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
