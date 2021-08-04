@extends('layout')

@section('script')
<script src="{{ asset('js/functions.js') }}" ></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(function () {
        var actionType = 'DELETE';
        var actionUrl = "{{ route('products.destroy',['product'=>$product]) }}";
        var linkId = 'destroy';
        $("#destroy").on('click', function (event) {
            event.preventDefault();
            $.ajaxSetup({
                headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
            $.ajax({
            type: 'DELETE',
            url: actionUrl,
            dataType: "json",
            success: function (data) {
                window.location.replace(data.redirect);
            },
            contentType: false,
            processData: false
            });
        });
    });
</script>
@endsection

@section('content')
<div id="maincontent" class="bodywidth clear">
    <section id="tools">
        <a href="{{$product->id}}/edit">Modifica</a>
        <a href="" id="destroy">Elimina</a>
       {{-- <a href="" id="destroy" token="{{ csrf_token() }}">Elimina</a> --}}
    </section>
    <section id="product">
        <article>
            <div>
                @include('helpers/productImg', ['attrs' => 'imagefrm', 'imgFile' => $product->image])
                <div class="info">
                    <a href="/products/{{$product->id}}">
                        <h3 class = "blue">{{$product->model}}</h3>
                    </a>
                    <h4 >{{$product->description}}</h4>
                    <h5>{{$product->installation_notes}}</h5>
                    <h5>{{$product->use_notes}}</h5>
                </div>
            </div>
        </article>
    </section>
</div>
@endsection
