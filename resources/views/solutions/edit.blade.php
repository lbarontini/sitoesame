<div class="container-contact" >
    <h1>Modifica soluzione</h1>
    {!! Form::model($solution, array('route' => array('solutions.update', $solution), 'id' => 'editsolution'.$solution->id, 'solutionId'=>$solution->id, 'class' => 'editsolution-form')) !!}
        <div class="wrap-input">
            <div  class="rs1-wrap-input">
                {{ Form::label('name', 'Nome', ['class' => 'label-input']) }}
                {{ Form::text('name', $solution->name, ['class' => 'input', 'id' => 'name']) }}
            </div>

            <div  class="rs1-wrap-input">
                {{ Form::label('description', 'Descrizione', ['class' => 'label-input']) }}
                {{ Form::text('description', $solution->description, ['class' => 'input','id' => 'description']) }}
            </div>

            <input type = "hidden" name = "malfunction_id" value = {{$solution->malfunction->id}} />

            <div class="container-form-btn">
                {{ Form::submit('Conferma', ['class' => 'form-btn1', 'id' => 'sub-btn']) }}
            </div>
        </div>
    {!! Form::close() !!}
</div>
