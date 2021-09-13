<div class="solutions">
    <h4 class = "blue">Soluzioni: </h5>
    @can('staff_work')
        <a class="add_solution" malfunctionId={{$malfunction->id}} href="">
            <h3 class = "blue">Aggiungi</h3>
        </a>
    @endcan

    <ul class="solutions" malfunctionId={{$malfunction->id}}>
        @foreach ($malfunction->solutions as $solution)
            @include('solutions.show')
        @endforeach
    </ul>
</div>

