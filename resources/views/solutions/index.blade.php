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
        </ul>
    </section>
</div>
@endsection
