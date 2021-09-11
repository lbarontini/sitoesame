<div class="malfunctions">
   <h4 class = "blue">MalFunzionementi: </h4>
    <a class="add_malfunction" productId={{$product->id}} href="">
        <h3 class = "blue">Aggiungi</h3>
    </a>
    <ul class="malfunctions">
        @foreach ($product->malfunctions as $malfunction)

            @include('malfunctions.show')

        @endforeach
    </ul>
</div>

