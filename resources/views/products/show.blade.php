@extends('layouts.layout')

@section('script')
<script src="{{ asset('js/functions.js') }}" ></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(function () {
        $("#destroy").on('click', function (event) {
            event.preventDefault();
            deleteElement("{{ route('products.destroy',['product'=>$product]) }}");
        });
    });
</script>
@endsection

@section('content')
<div id="maincontent" class="bodywidth clear">
    <section id="tools">
        @can('staff_work')
            <a href="{{route('products.edit',['product'=>$product])}}">Modifica</a>
        @endcan
        @can('admin_work')
            <a href="" id="destroy">Elimina</a>
        @endcan
    </section>
    <section id="show">
        <article>
            <div>
                @include('helpers/productImg', ['attrs' => 'imagefrm', 'imgFile' => $product->image])
                <div class="info">
                    <h3 class = "blue">Modello: {{$product->model}}</h3>

                    <h4>Descrizione: {{$product->description}}</h4>
                    <h5>Note Installazione: {{$product->installation_notes}}</h5>
                    <h5>Note Utlizzo: {{$product->use_notes}}</h5>
                    @can('tecn_work')
                        <h5>MalFunzionementi: </h5>
                        <a class="add" href="{{ route('malfunctions.create',['product'=>$product]) }}">
                            <h3 class = "blue">Aggiungi</h3>
                        </a>
                        <ul>
                            @foreach ($product->malfunctions as $malfunction)
                                <a class="edit" href="{{route('malfunctions.edit',['malfunction'=>$malfunction])}}">
                                    <h3 class = "blue">Modifica</h3>
                                </a>
                                <a class="delete" href = "{{ route('malfunctions.destroy',['malfunction'=>$malfunction]) }}">
                                    <h3 class = "blue">Elimina</h3>
                                </a>
                                <li><h5>{{$malfunction->name}}</h5>
                                    <h5>{{$malfunction->description}}</h5>
                                    <h5>Soluzioni: </h5>
                                    <a class="add" href="{{ route('solutions.create',['malfunction'=>$malfunction]) }}">
                                        <h3 class = "blue">Aggiungi</h3>
                                    </a>
                                    <ul>
                                        @foreach ($malfunction->solutions as $solution)
                                            <a class="edit" href="{{route('solutions.edit',['solution'=>$solution,'malfunction'=>$malfunction])}}">
                                                <h3 class = "blue">Modifica</h3>
                                            </a>
                                            <a class="delete" href="{{ route('solutions.destroy',['solution'=>$solution]) }}">
                                                <h3 class = "blue">Elimina</h3>
                                            </a>
                                            <li><h5>{{$solution->name}}</h5>
                                                <h5>{{$solution->description}}</h5>
                                            </li>
                                        @endforeach
                                    </ul>
                                </li>
                            @endforeach
                        </ul>
                    @endcan
                </div>
            </div>
        </article>
    </section>
</div>
@endsection
