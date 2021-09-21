<ul>
    @foreach ($products as $product)
        <li class="info">
            @include('helpers/productImg', ['attrs' => 'imagefrm', 'imgFile' => $product->image])
            <a href="{{route('products.show',['product'=>$product])}}">
                <h3 class = "blue">{{$product->model}}</h3>
            </a>
            <h4 >{{$product->description}}</h4>
        </li>
    @endforeach
</ul>
