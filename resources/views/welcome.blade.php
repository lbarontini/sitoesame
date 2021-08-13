@extends('layouts.layout')

@section('content')
<aside id="introduction" class="bodywidth clear">
    @yield('welcome')
    <div id="introleft">
        <h2>Welcome to <span class="blue">our website</span></h2>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse quis molestie sapien. Proin elit quam, commodo ut aliquet vel, elementum ut odio. Praesent semper tincidunt magna, sed sagittis elit congue sed. Mauris malesuada, elit ut luctus tristique, lectus libero rutrum mauris, ac tristique.</p>
        <p><a href="#" class="findoutmore">Find out more?</a></p>
    </div>
    <blockquote id="introquote">
        <p>This company is amazing. I can't come up with enough good things to say. Literally. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum magna tortor.</p>
        <p class="quotename">John Smith, <span class="bold">Another Company</span></p>
    </blockquote>
</aside>
@endsection
