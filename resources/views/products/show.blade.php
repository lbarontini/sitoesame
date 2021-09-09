@extends('layouts.layout')

@section('script')
 <script src="{{ asset('js/functions.js') }}" ></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
{{--<script>
    $(function () {
        $("#destroy").on('click', function (event) {
            event.preventDefault();
            deleteElement("{{ route('products.destroy',['product'=>$product]) }}");
        });
        $("#deleteMalfunction").on('click', function (event) {
            //var malfunction_id=$(this).attr("malfunction_id");
            //var malfunction={"id": parseInt($(this).attr("malfunction_id")), 'name':'','description':''};
            var malfunction={"id": parseInt($(this).attr("malfunction_id"))};
            $("#deleteMalfunction").after("<h3>"+JSON.stringify(malfunction)+"</h3>");
            event.preventDefault();
            deleteElement("{{ route('malfunctions.destroy',['malfunction'=>2]) }}");
        });
        $("#deleteSolution").on('click', function (event) {
            var solution={'id': $(this).attr("solution_id")};
            event.preventDefault();
            deleteElement("{{ route('solutions.destroy',['solution'=>"+solution+"]) }}");
        });
    });
</script> --}}
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

                    <h3 class = "blue">Descrizione: <h3>{{$product->description}}</h3></h3>
                    <h4 class = "blue">Note Installazione: <h4>{{$product->installation_notes}}</h4></h4>
                    <h4 class = "blue">Note Utlizzo: <h4>{{$product->use_notes}}</h4></h4>
                    @can('tecn_work')
                        <h4 class = "blue">MalFunzionementi: </h5>
                        <a class="addMalfunction" href="{{ route('malfunctions.create',['product'=>$product]) }}">
                            <h3 class = "blue">Aggiungi</h3>
                        </a>
                        <ul class="malfunctions">
                            @include('malfunctions.index')
                        </ul>
                    @endcan
                </div>
            </div>
        </article>
    </section>
</div>
@endsection
