@extends('layout')

@section('content')
<div id="maincontent" class="bodywidth clear">
    <section id="tools">
        <a href="/products/create">aggiungi</a>
    </section>
    <section id="product">
        @foreach ($products as $product)
            <article>
                <figure> <img src="/images/articleimage.jpg" alt=""> </figure>
                {{-- <figure> <img src={{$product->photo_path}} alt=""> </figure> --}}
                <a href="/products/{{$product->id}}">
                    <h3 class = "blue">{{$product->model}}</h3>
                </a>
                <h4 >{{$product->description}}</h4>
                <h5>{{$product->installation_notes}}</h5>
                <h5>{{$product->use_notes}}</h5>
            </article>
        @endforeach
    </section>
</div>
@endsection
