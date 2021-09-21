<div class="malfunctions">
    <div class="tools_malfunctions">
        <h4 class = "blue">MalFunzionementi: </h4>
            @can('staff_work_product', $product)
                <a class="add_malfunction" productId={{$product->id}} href="">
                        <h4 class = "blue">Aggiungi malfunzionamento</h4>
                </a>
        @endcan
    </div>
    <ul class="malfunctions">
        @foreach ($product->malfunctions as $malfunction)

            @include('malfunctions.show')

        @endforeach
    </ul>
</div>

