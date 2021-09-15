<li class="solution"solutionId={{$solution->id}}>
    <a class="solution_name" href="">
        <h3 class = "blue">{{$solution->name}}</h3>
    </a>

    <div class="info_solution" solutionId={{$solution->id}} hidden="true">
        <h4 class="description_solution">{{$solution->description}}</h4>
        @can('staff_work_product',$solution->malfunction->product)
            <a class="edit_solution" solutionId={{$solution->id}} href="">
                <h3 class = "blue">Modifica</h3>
            </a>
            <a class="delete_solution" solutionId={{$solution->id}} href = "">
                <h3 class = "blue">Elimina</h3>
            </a>
        @endcan
    </div>
</li>
