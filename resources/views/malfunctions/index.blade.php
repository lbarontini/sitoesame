<div class="malfunctions">
   <h4 class = "blue">MalFunzionementi: </h4>
    @can('staff_work')
        <a class="add_malfunction" productId={{$product->id}} href="">
                <h3 class = "blue">Aggiungi</h3>
        </a>
   @endcan

    <ul class="malfunctions">
        @foreach ($product->malfunctions as $malfunction)

            @include('malfunctions.show')

        @endforeach
    </ul>
</div>

