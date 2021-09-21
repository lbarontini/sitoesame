<li class="malfunction" malfunctionId={{$malfunction->id}}>
    <a class="malfunction_name" href="">
        <h3 class = "blue">{{$malfunction->name}}</h3>
    </a>

    <div class="info_malfunction" malfunctionId={{$malfunction->id}} hidden ="true">
        <div class="inline_wrapper">
            <h4 class="description_malfunction">{{$malfunction->description}}</h4>
            <div class="tools_malfunction">
                @can('staff_work_product',$malfunction->product)
                    <a class="edit_malfunction" malfunctionId={{$malfunction->id}} href="">
                        <h3 class = "blue">Modifica malfunzionamento</h3>
                    </a>
                    <a class="delete_malfunction" malfunctionId={{$malfunction->id}} href = "">
                        <h3 class = "blue">Elimina malfunzionamento</h3>
                    </a>
                @endcan
            </div>
        </div>
        @include('solutions.index')
        <hr>
    </div>
</li>
