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
    <section id="tools">
        @can('admin_work')
            <a href="{{route('assistance_centers.edit',['assistance_center'=>$assistance_center])}}">Modifica</a>
            <a href="" id="destroy">Elimina</a>
        @endcan
    </section>
    <section id="show">
        <article>
            <div>
                <div class="info">
                    <h3 class = "blue">Nome: {{$assistance_center->name}}</h3>

                    <h4>Descrizione: {{$assistance_center->description}}</h4>
                    <h5>Indirizzo: {{$assistance_center->address}}</h5>
                    @can('tecn_work')
                        <h5>Tecnici afferenti: </h5>
                        <ul>
                            @foreach ($assistance_center->technicians as $technician)
                                <li><h5>{{$technician->name}}</h5>
                            @endforeach
                    </ul>
                    @endcan
                </div>
            </div>
        </article>
    </section>
</div>
@endsection
