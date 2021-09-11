<li class="malfunction" malfunctionId={{$malfunction->id}}>
    <a class="malfunction_name" href="">
        <h3 class = "blue">{{$malfunction->name}}</h3>
    </a>
    <div class="info_malfunction" malfunctionId={{$malfunction->id}} hidden ="true">
        <h4 class="description_malfunction">{{$malfunction->description}}</h4>
        @can('staff_work')
            <a class="edit_malfunction" malfunctionId={{$malfunction->id}} href="">
                <h3 class = "blue">Modifica</h3>
            </a>
            <a class="delete_malfunction" malfunctionId={{$malfunction->id}} href = "">
                <h3 class = "blue">Elimina</h3>
            </a>
        @endcan

        @include('solutions.index')
    </div>
</li>
