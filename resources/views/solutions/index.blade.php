<div class="solutions">
    <h4 class = "blue">Soluzioni: </h5>
    <a class="add_solution" malfunctionId={{$malfunction->id}} href="">
        <h3 class = "blue">Aggiungi</h3>
    </a>
    <ul class="solutions">
        @foreach ($malfunction->solutions as $solution)
            @include('solutions.show')
        @endforeach
    </ul>
</div>

