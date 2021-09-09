@foreach ($products as $product)
<article>
    @include('helpers/productImg', ['attrs' => 'imagefrm', 'imgFile' => $product->image])
    <div class="info">
        <a href="{{route('products.show',['product'=>$product])}}">
            <h3 class = "blue">{{$product->model}}</h3>
        </a>
        <h4 >{{$product->description}}</h4>
    </div>
</article>
@endforeach