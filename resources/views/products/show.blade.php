@extends('layout')

@section('content')
<div id="maincontent" class="bodywidth clear">
    <section id="tools">
        <a href="/products/create">aggiungi</a>
    <section id="aboutleft">
        <article>
            <div>
                <figure> <img src="/images/articleimage.jpg" alt=""> </figure>
                {{-- <figure> <img src={{$product->photo_path}} alt=""> </figure> --}}
                <h3>{{$product->model}}</h3>
                <h4>{{$product->description}}</h4>
                <p>{{$product->installation_notes}}</p>
            </div>
        </article>
    </section>
</div>
@endsection
