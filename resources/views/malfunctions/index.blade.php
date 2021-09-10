<h4 class = "blue">MalFunzionementi: </h5>
<a class="addMalfunction" href="{{ route('malfunctions.create',['product'=>$product]) }}">
    <h3 class = "blue">Aggiungi</h3>
</a>
<ul class="malfunctions">
    @foreach ($product->malfunctions as $malfunction)
        <li class="malfunction">
            @include('malfunctions.show')
        </li>
    @endforeach
</ul>

