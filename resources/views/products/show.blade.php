@extends('layouts.layout')

@section('script')
<script src="{{ asset('js/functions.js') }}" ></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(function () {
        $("#destroy").on('click', function (event) {
            event.preventDefault();
            deleteElement("{{ route('products.destroy',['product'=>$product]) }}");
        }
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
                        <ul>
                            @foreach ($product->malfunctions as $malfunction)
                                <li><h5>{{$malfunction->name}}</h5>
                                    <h5>{{$malfunction->description}}</h5>
                                    <h5>Soluzioni: </h5>
                                    <ul>
                                        @foreach ($malfunction->solutions as $solution)
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
