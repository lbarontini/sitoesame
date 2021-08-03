@extends('layout')

@section('content')
<div id="maincontent" class="bodywidth clear">
    <section id="tools">
        <a href="/products/create">aggiungi</a>
    </section>
    <section id="product">
        @foreach ($products as $product)
            <article>
                @include('helpers/productImg', ['attrs' => 'imagefrm', 'imgFile' => $product->image])
                <div class="info">
                    <a href="/products/{{$product->id}}">
                        <h3 class = "blue">{{$product->model}}</h3>
                    </a>
                    <h4 >{{$product->description}}</h4>
                </div>
            </article>
        @endforeach
    </section>
</div>
@endsection
