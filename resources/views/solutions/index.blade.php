@extends('layouts.layout')

@section('script')
<script src="{{ asset('js/functions.js') }}" ></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(function(){
        $("a.name").click(function(event){
            event.preventDefault();
            var id=$(this).attr("solutionId");
            $(".info[solutionId ="+id+"]").toggle();
        });
        $("a.delete").on('click', function (event) {
            var actionUrl=$(this).attr("href");
            deleteElement(actionUrl);
        });
    });
</script>

@section('content')
<div id="maincontent" class="bodywidth clear">
    <section id="tools">
        <a href="{{route('solutions.create')}}">Aggiungi soluzione</a>
    </section>
    <section id="index">
        <ul>
            @foreach ($solutions as $solution)
                <li>
                    <a class= "name" solutionId={{$solution->id}} href="">
                        <h3 class = "blue">{{$solution->name}}</h3>
                    </a>
                    <div class="info" solutionId={{$solution->id}}>
                        <a class="edit" href="{{route('solutions.edit',['solution'=>$solution])}}">
                            <h3 class = "blue">Modifica</h3>
                        </a>
                        <a class="delete" href="{{ route('solutions.destroy',['solution'=>$solution]) }}">
                            <h3 class = "blue">Elimina</h3>
                        </a>
                        <h4 id="description">{{$solution->description}}</h4>
                        <ul>
                            @foreach ($solution->malfunctions as $malfunction)
                                <li><h5>{{$malfunction->name}}</h5>
                                    <h5>{{$malfunction->description}}</h5>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </li>
            @endforeach
        </ul>
    </section>
</div>
@endsection
