<h4 class = "blue">Soluzioni: </h5>
<a class="addSolution" href="{{ route('solutions.create',['malfunction'=>$malfunction]) }}">
    <h3 class = "blue">Aggiungi</h3>
</a>
<ul class="solutions">
    @foreach ($malfunction->solutions as $solution)
        <li class="solution">
            @include('solutions.show')
        </li>
    @endforeach
</ul>
