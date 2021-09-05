@extends('layouts.layout')

@section('content')
<div id="maincontent" class="bodywidth clear">
    <section id="tools">
        @can('admin_work')
            <a href="{{route('assistance_centers.create')}}">aggiungi</a>
        @endcan
    </section>
    <section id="index">
        <ul>
            @foreach ($assistance_centers as $assistance_center)
                <article>
                    <li class="info">
                        <a href="{{route('assistance_centers.show',['assistance_center'=>$assistance_center])}}">
                            <h3 class = "blue">{{$assistance_center->name}}</h3>
                        </a>
                    </li>
                </article>
            @endforeach
        </ul>
    </section>
</div>
@endsection
