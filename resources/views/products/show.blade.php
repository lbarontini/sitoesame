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
                <figure> <img src="/images/articleimage.jpg" alt=""> </figure>
                {{-- <figure> <img src={{$product->photo_path}} alt=""> </figure> --}}
                <h3 class="blue">{{$product->model}}</h3>
                <h4>{{$product->description}}</h4>
                <h5>{{$product->installation_notes}}</h5>
                <h5>{{$product->use_notes}}</h5>
            </div>
        </article>
    </section>
</div>
@endsection
