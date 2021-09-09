
{{-- <script src="{{ asset('js/functions.js') }}" ></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>--}}
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

    <div class="container-contact" >
        <h1>Modifica malfunzionamento</h1>
        {!! Form::model($malfunction, array('route' => array('malfunctions.update', $malfunction), 'id' => 'editmalfunction','class' => 'contact-form')) !!}
            <div class="wrap-input">
                <div  class="rs1-wrap-input">
                    {{ Form::label('name', 'Nome', ['class' => 'label-input']) }}
                    {{ Form::text('name', $malfunction->name, ['class' => 'input', 'id' => 'editmalfunction_name'.$malfunction->id]) }}
                </div>

                <div  class="rs1-wrap-input">
                    {{ Form::label('description', 'Descrizione', ['class' => 'label-input']) }}
                    {{ Form::text('description', $malfunction->description, ['class' => 'input','id' => 'description']) }}
                </div>

                <input type = "hidden" name = "product_id" value = {{$malfunction->product->id}} />

                <div class="container-form-btn">
                    {{ Form::submit('Conferma', ['class' => 'form-btn1', 'id' => 'sub-btn']) }}
                </div>
            </div>
        {!! Form::close() !!}
    </div>

