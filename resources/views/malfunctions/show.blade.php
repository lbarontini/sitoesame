    <li>
        <h3 class = "blue">{{$malfunction->name}}</h3>

        <div class="info_malfunction" malfunctionId={{$malfunction->id}}>
            <a class="edit_malfunction" malfunctionId={{$malfunction->id}} href="">
                <h3 class = "blue">Modifica</h3>
            </a>
            <a class="delete_malfunction" malfunctionId={{$malfunction->id}} href = "">
                <h3 class = "blue">Elimina</h3>
            </a>
            <h4 class="description_malfunction">{{$malfunction->description}}</h4>
            <h4 class = "blue">Soluzioni: </h5>
                <a class="add_solution" href="{{ route('solutions.create',['malfunction'=>$malfunction]) }}">
                    <h3 class = "blue">Aggiungi</h3>
                </a>

            <ul class="solutions">
                @include('solutions.show')
                {{-- todo make this solution.index --}}
            </ul>
        </div>
    </li>
