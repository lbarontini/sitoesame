@extends('layouts.layout')
@section('content')
<ul>
    <li><h1><a href="{{route('malfunctions.index')}}">Malfunzionamenti</a></h1></li>
    <li><h1><a href="{{route('solutions.index')}}">Soluzioni</a></h1></li>
    @can('admin_work')
        <li><h1><a href="{{route('users.index')}}">Utenti</a></h1></li>
    @endcan
</ul>
@endsection
