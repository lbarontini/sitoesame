
{{-- <script src="{{ asset('js/functions.js') }}" ></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>--}}
<script>

</script>

    <div class="container-contact" >
        <h1>Modifica malfunzionamento</h1>
        {!! Form::model($malfunction, array('route' => array('malfunctions.update', $malfunction), 'id' => 'editmalfunction'.$malfunction->id, 'malfunctionId'=>$malfunction->id, 'class' => 'contact-form')) !!}
            <div class="wrap-input">
                <div  class="rs1-wrap-input">
                    {{ Form::label('name', 'Nome', ['class' => 'label-input']) }}
                    {{ Form::text('name', $malfunction->name, ['class' => 'input', 'id' => 'editmalfunction_name'.$malfunction->id]) }}
                </div>

                <div  class="rs1-wrap-input">
                    {{ Form::label('description', 'Descrizione', ['class' => 'label-input']) }}
                    {{ Form::text('description', $malfunction->description, ['class' => 'input','id' => 'editmalfunction_description'.$malfunction->id]) }}
                </div>

                <input type = "hidden" name = "product_id" value = {{$malfunction->product->id}} />

                <div class="container-form-btn">
                    {{ Form::submit('Conferma', ['class' => 'form-btn1', 'id' => 'sub-btn']) }}
                </div>
            </div>
        {!! Form::close() !!}
    </div>

