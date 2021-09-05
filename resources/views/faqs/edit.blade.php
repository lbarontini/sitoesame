@extends('layouts.layout')
@section('script')
<script src="{{ asset('js/functions.js') }}" ></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(function () {
        var actionType = 'PUT';
        var actionUrl = "{{ route('faqs.update',['faq'=>$faq]) }}";
        var formId = 'editfaq';
        $(":input").on('blur', function (event) {
            var formElementId = $(this).attr('id');
            doElemValidation(formElementId, actionUrl, formId, actionType);
        });
        $("#editfaq").on('submit', function (event) {
            event.preventDefault();
            doFormValidation(actionUrl, formId, actionType);
        });
    });
</script>
@endsection

@section('content')
    <div class="container-contact">
            <h1>Modifica domanda</h1>
            {!! Form::model($faq, array('route' => array('faqs.update', $faq->id), 'id' => 'editfaq','class' => 'contact-form')) !!}
                <div class="wrap-input">
                    <div  class="rs1-wrap-input">
                        {{ Form::label('question', 'Domanda', ['class' => 'label-input']) }}
                        {{ Form::text('question', $faq->question, ['class' => 'input', 'id' => 'question']) }}
                    </div>

                    <div  class="rs1-wrap-input">
                        {{ Form::label('answer', 'Risposta', ['class' => 'label-input']) }}
                        {{ Form::text('answer', $faq->answer, ['class' => 'input','id' => 'answer']) }}
                    </div>

                    <div  class="rs1-wrap-input">
                        {{ Form::label('faqs_category', 'Categoria', ['class' => 'label-input']) }}
                        {{ Form::select('faqs_category',
                                         $faqs_categories->pluck('name','id'),
                                         $faq->faqs_category->id,
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
