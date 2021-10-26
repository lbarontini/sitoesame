@extends('layouts.layout')

@section('content')
<aside id="introduction" class="bodywidth clear">
    @yield('welcome')
    <div id="introleft">
        <h2>Benvenuto nel <span class="blue">Nostro sito</span></h2>
        <p>Autore: Lorenzo Barontini</p>
        <p>Email : S1080199@studenti.univpm.it</p>
        <p>Github: https://github.com/lbarontini/sitoesame</p>
        <p><a href="https://it.wikipedia.org/wiki/Sito_web" class="findoutmore">Scopri di più?</a></p>
    </div>
    <blockquote id="introquote">
        <p>This company is amazing. I can't come up with enough good things to say. Literally. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum magna tortor.</p>
        <p class="quotename">John Smith, <span class="bold">Un'altra Azienda</span></p>
    </blockquote>
</aside>
@endsection
