@extends('layouts.layout')
@section('script')
    <script src="{{ asset('js/functions.js') }}" ></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script >
        $(function () {
            $('#search').keyup(function (){
                $value=$(this).val();
                $.ajax({
                    type : 'get',
                    url : '{{ route('products.search') }}',
                    data: {'search':$value},
                    success:function(data){
                            console.log(data);
                            $('#index').html(data.html);
                        }
                    });
            })
    });
    </script>
@endsection

@section('content')
<div id="maincontent" class="bodywidth clear">
    <section id="tools">
        <input type="text" class="form-controller searchbar" id="search" name="search" placeholder="Cerca..">
        @can('admin_work')
            <a href="{{route('products.create')}}">Nuovo Prodotto</a>
        @endcan
    </section>

    <section id="index">
        @include('products.list')
    </section>
</div>
@endsection
