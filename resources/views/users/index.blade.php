@extends('layouts.layout')

@section('script')
<script src="{{ asset('js/functions.js') }}" ></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(function(){
        $("a.username").click(function(event){
            event.preventDefault();
            var id=$(this).attr("userId");
            $(".info[userId ="+id+"]").toggle();
        });
        $("a.delete").on('click', function (event) {
            var actionUrl=$(this).attr("href");
            deleteElement(actionUrl);
        });
    });
</script>

@endsection

@section('content')
<div id="maincontent" class="bodywidth clear">
    <section id="tools">
        @can('admin_work')
            <a href="{{route('users.create')}}">aggiungi</a>
        @endcan
    </section>
    <section id="index">
        <ul>
            @foreach ($users as $user)
                <li>
                    <a class= "username" userId={{$user->id}} href="">
                        <h3 class = "blue">{{$user->username}}</h3>
                    </a>
                    <div class="info" userId={{$user->id}}>
                        <a class="edit" href="{{route('users.edit',['user'=>$user])}}">
                            <h3 class = "blue">Modifica</h3>
                        </a>
                        <a class="delete" href="{{ route('users.destroy',['user'=>$user]) }}">
                            <h3 class = "blue">Elimina</h3>
                        </a>
                        <h4 id="name">{{$user->name}}</h4>
                        <h4 id="email">{{$user->email}}</h4>
                        <h4 id="role">{{$user->role->label}}</h4>
                    </div>
                </li>
            @endforeach
        </ul>
    </section>
</div>
@endsection
