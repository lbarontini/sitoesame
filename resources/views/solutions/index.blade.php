<div class="solutions">
    <div class="tools_solutions">
        <h4 class = "blue">Soluzioni: </h5>
        @can('staff_work_product',$malfunction->product)
            <a class="add_solution" malfunctionId={{$malfunction->id}} href="">
                <h3 class = "blue">Aggiungi soluzione</h3>
            </a>
        @endcan
    </div>

    <ul class="solutions" malfunctionId={{$malfunction->id}}>
        @foreach ($malfunction->solutions as $solution)
            @include('solutions.show')
        @endforeach
    </ul>
</div>

