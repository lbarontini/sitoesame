<div class="container-contact" >
    <h1>Modifica malfunzionamento</h1>
    {!! Form::model($malfunction, array('route' => array('malfunctions.update', $malfunction), 'id' => 'editmalfunction'.$malfunction->id, 'malfunctionId'=>$malfunction->id, 'class' => 'editmalfunction-form')) !!}
        <div class="wrap-input">
            <div  class="rs1-wrap-input">
                {{ Form::label('name', 'Nome', ['class' => 'label-input']) }}
                {{ Form::text('name', $malfunction->name, ['class' => 'input', 'id' => 'name']) }}
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

