@extends('layouts.layout')

@section('script')
<script src="{{ asset('js/functions.js') }}" ></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(function(){
        $("a.name").click(function(event){
            event.preventDefault();
            var id=$(this).attr("malfunctionId");
            $(".info[malfunctionId ="+id+"]").toggle();
        });
        $("a.delete").on('click', function (event) {
            var actionUrl=$(this).attr("href");
            deleteElement(actionUrl);
        });
    });
</script>

@endsection

@section('content')
<div id="maincontent" class="bodywidth clear">
    <section id="tools">
        <a href="{{route('malfunctions.create')}}">aggiungi</a>
    </section>
    <section id="index">
        <ul>
            @foreach ($malfunctions as $malfunction)
                <li>
                    <a class="name" malfunctionId={{$malfunction->id}} href="">
                        <h3 class = "blue">{{$malfunction->name}}</h3>
                    </a>
                    <div class="info" malfunctionId={{$malfunction->id}}>
                        <a class="edit" href="{{route('malfunctions.edit',['malfunction'=>$malfunction])}}">
                            <h3 class = "blue">Modifica</h3>
                        </a>
                        <a class="delete" href = "{{ route('malfunctions.destroy',['malfunction'=>$malfunction]) }}">
                            <h3 class = "blue">Elimina</h3>
                        </a>
                        <h4 id="description">{{$malfunction->description}}</h4>
                        <ul>
                            @foreach ($malfunction->solutions as $solution)
                                <li><h5>{{$solution->name}}</h5>
                                    <h5>{{$solution->description}}</h5>
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
