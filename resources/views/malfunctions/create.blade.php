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

            <input type = "hidden" name = "product_id" value = {{$product->id}} />

            <div class="container-form-btn">
                {{ Form::submit('Aggiungi', ['class' => 'form-btn1', 'id' => 'sub-btn']) }}
            </div>
        </div>
    {!! Form::close() !!}
</div>
