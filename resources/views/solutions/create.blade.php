<div class="container-contact">
        <h1>Nuova Soluzione</h1>
        {!! Form::open(array('route' => 'solutions.store', 'id' => 'addsolution'.$malfunction->id,'class' => 'addsolution-form')) !!}
            <div class="wrap-input">
                <div  class="rs1-wrap-input">
                    {{ Form::label('name', 'Nome', ['class' => 'label-input']) }}
                    {{ Form::text('name', '', ['class' => 'input', 'id' => 'name']) }}
                </div>

                <div  class="rs1-wrap-input">
                    {{ Form::label('description', 'Descrizione', ['class' => 'label-input']) }}
                    {{ Form::text('description', '', ['class' => 'input','id' => 'description']) }}
                </div>

                <input type = "hidden" name = "malfunction_id" value = {{$malfunction->id}} />

                <div class="container-form-btn">
                    {{ Form::submit('Aggiungi', ['class' => 'form-btn1', 'id' => 'sub-btn']) }}
                </div>
            </div>
        {!! Form::close() !!}
    </div>
</div>
