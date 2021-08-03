@extends('layout')

@section('content')
<div id="maincontent" class="bodywidth clear">
    <section id="tools">
        <a href="{{$product->id}}/edit">Modifica</a>
        {{-- <a href="delete">Elimina</a> --}}
    </section>
    <section id="product">
        <article>
            <div>
                @include('helpers/productImg', ['attrs' => 'imagefrm', 'imgFile' => $product->image])
                <div class="info">
                    <a href="/products/{{$product->id}}">
                        <h3 class = "blue">{{$product->model}}</h3>
                    </a>
                    <h4 >{{$product->description}}</h4>
                    <h5>{{$product->installation_notes}}</h5>
                    <h5>{{$product->use_notes}}</h5>
                </div>
            </div>
        </article>
    </section>
</div>
@endsection
