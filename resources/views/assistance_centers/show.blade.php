@extends('layouts.layout')

@section('script')
<script src="{{ asset('js/functions.js') }}" ></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(function () {
        $("#destroy").on('click', function (event) {
            event.preventDefault();
            deleteElement("{{ route('assistance_centers.destroy',['assistance_center'=>$assistance_center]) }}");
        });
    });
</script>
@endsection

@section('content')
<div id="maincontent" class="bodywidth clear">
    <p class="pagetitle">Panoramica centro assistenza</p>
    <section id="tools">
        @can('admin_work')
            <a href="{{route('assistance_centers.edit',['assistance_center'=>$assistance_center])}}">Modifica</a>
            <a href="" id="destroy">Elimina</a>
        @endcan
    </section>
    <section id="show">
        <h2 class = "info blue">Nome: <span class = "black">{{$assistance_center->name}}</span></h2>
        <h3 class = "info blue">Descrizione: <span class = "black">{{$assistance_center->description}}</span></h3>
        <h4 class = "info blue">Indirizzo: <span class = "black">{{$assistance_center->address}}</span></h4>
        @can('tecn_work')
            <h4 class = " blue">Tecnici afferenti: </h4>
            <ul>
                @foreach ($assistance_center->technicians as $technician)
                    <li><h4>{{$technician->name}}</h4>
                @endforeach
        </ul>
        @endcan
    </section>
</div>
@endsection
