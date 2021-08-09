@extends('layout')

@section('script')
<script src="{{ asset('js/functions.js') }}" ></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(function(){
        $("#maincontent li a").click(function(event){
            event.preventDefault();
            var id=$(this).attr("solutionId");
            $(".info[solutionId ="+id+"]").toggle();
        });
    });
</script>

@section('content')
<div id="maincontent" class="bodywidth clear">
    <section id="tools">
        <a href="{{route('solutions.create')}}">aggiungi</a>
    </section>
    <section id="index">
        <ul>
            @foreach ($solutions as $solution)
                <li>
                    <a solutionId={{$solution->id}} href="">
                        <h3 class = "blue">{{$solution->name}}</h3>
                    </a>
                    <div class="info" solutionId={{$solution->id}}>
                        <a class="editsolution" href="">
                            <h3 class = "blue">edit</h3>
                        </a>
                        <a class="deletesolution" href="">
                            <h3 class = "blue">delete</h3>
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
