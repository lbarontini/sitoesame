@extends('layouts.layout')

@section('content')
<div id="maincontent" class="bodywidth clear">
    <section id="index">
        <ul>
            @foreach ($users as $user)
                <li>
                    <a class= "username" userId={{$user->id}} href="">
                        <h3 class = "blue">{{$user->username}}</h3>
                    </a>
                    <div userId={{$user->id}}>
                        {{-- <a class="edit" href="{{route('users.edit',['solution'=>$user])}}"> --}}
                            <h3 class = "blue">Modifica</h3>
                        {{-- </a>
                        <a class="delete" href="{{ route('users.destroy',['solution'=>$user]) }}"> --}}
                            <h3 class = "blue">Elimina</h3>
                        </a>
                        <h4 id="email">{{$user->email}}</h4>
                        <h4 id="role">{{$user->role}}</h4>
                    </div>
                </li>
            @endforeach
        </ul>
    </section>
</div>
@endsection
