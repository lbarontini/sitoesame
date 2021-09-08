@foreach ($malfunction->solutions as $solution)
<li>
    <h3 class = "blue">{{$solution->name}}</h3>

    <div class="info_solution" solutionId={{$solution->id}}>
        <a class="edit_solution" solutionId={{$solution->id}} href="">
            <h3 class = "blue">Modifica</h3>
        </a>
        <a class="delete_solution" solutionId={{$solution->id}}href="{{ route('solutions.destroy',['solution'=>$solution]) }}">
            <h3 class = "blue">Elimina</h3>
        </a>
        <h4 class="description">{{$solution->description}}</h4>
    </div>
</li>
@endforeach
