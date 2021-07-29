@extends('layout')

@section('content')
<div id="maincontent" class="bodywidth clear">
    <section id="tools">
        <a href="/products/create">aggiungi</a>
    <section id="aboutleft">
        @foreach ($products as $product)
            <article>
                <div>
                    <figure> <img src="/images/articleimage.jpg" alt=""> </figure>
                    {{-- <figure> <img src={{$product->photo_path}} alt=""> </figure> --}}
                    <header><a href="/products/{{$product->id}}"><h3>{{$product->model}}</h3></a></header>
                    <h4>{{$product->description}}</h4>
                    <h5>{{$product->installation_notes}}</h5>
                    <h5>{{$product->use_notes}}</h5>
                </div>
            </article>
        @endforeach
    </section>
    {{-- <section id="articlesright">
        <article>
            <figure> <img src="/images/articleimage.jpg" alt=""> </figure>
            <header><a href="#">
            <h5>Random News Article</h5>
            </a></header>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse quis molestie sapien. Proin elit quam dolor amet...</p>
            <a href="#" class="readmore">Read more</a> </article>
        <article>
            <figure> <img src="/images/articleimage.jpg" alt=""> </figure>
            <header><a href="#">
            <h5>Random News Article</h5>
            </a></header>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse quis molestie sapien. Proin elit quam dolor amet...</p>
            <a href="#" class="readmore">Read more</a> </article>
        <article>
            <figure> <img src="/images/articleimage.jpg" alt=""> </figure>
            <header><a href="#">
            <h5>Random News Article</h5>
            </a></header>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse quis molestie sapien. Proin elit quam dolor amet...</p>
            <a href="#" class="readmore">Read more</a> </article>
    </section> --}}
</div>
@endsection
