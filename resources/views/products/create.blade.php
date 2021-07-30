@extends('layout')
@section('script')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script>
    $(function () {
        var actionUrl = "{{ route('products.store') }}";
        var formId = 'addproduct';
        $(":input").on('blur', function (event) {
            var formElementId = $(this).attr('id');
            console.log(formElementId);
            doElemValidation(formElementId, actionUrl, formId);
        });
    });

    function doElemValidation(id, actionUrl, formId) {

        var formElems;

        function addFormToken() {
            var tokenVal = $("#" + formId + " input[name=_token]").val();
            formElems.append('_token', tokenVal);
        }

        function sendAjaxReq() {
            $.ajax({
                type: 'POST',
                url: actionUrl,
                data: formElems,
                dataType: "json",
                error: function (data) {
                    if (data.status === 422) {
                        var errMsgs = JSON.parse(data.responseText);
                        $("#" + id).parent().find('.errors').html(' ');
                        $("#" + id).after(getErrorHtml(errMsgs[id]));
                    }
                },
                contentType: false,
                processData: false
            });
        }

        var elem = $("#" + formId + " :input[name=" + id + "]");
        if (elem.attr('type') === 'file') {
        // elemento di input type=file valorizzato
            if (elem.val() !== '') {
                inputVal = elem.get(0).files[0];
            } else {
                inputVal = new File([""], "");
            }
        } else {
            // elemento di input type != file
            inputVal = elem.val();
        }
        formElems = new FormData();
        formElems.append(id, inputVal);
        addFormToken();
        sendAjaxReq();
    }
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
                        {{ Form::label('photo_path', 'Foto', ['class' => 'label-input']) }}
                        {{Form::file('photo_path', ['class' => 'input', 'id' => 'photo_path'])}}
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
