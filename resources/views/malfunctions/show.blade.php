<script>
    $(function () {
        $("a.edit_malfunction").on('click', function (event) {
            event.preventDefault();
            var malfunction_id= $(this).attr("malfunctionId");
            var actionUrl="{{ route('malfunctions.edit', 'malfunction_id') }}";
            actionUrl=actionUrl.replace('malfunction_id', malfunction_id)

            $.ajax({type : 'get',
                    url : actionUrl,
                    success:function(data){
                            console.log(data);
                            $("div.info_malfunction[malfunctionId="+data.malfunction_id+"]").html(data.html);
                        }
                    });
        });

        $("#destroy").on('click', function (event) {
            event.preventDefault();
            deleteElement("{{ route('products.destroy',['product'=>$product]) }}");
        });
        $("#deleteMalfunction").on('click', function (event) {
            //var malfunction_id=$(this).attr("malfunction_id");
            //var malfunction={"id": parseInt($(this).attr("malfunction_id")), 'name':'','description':''};
            var malfunction={"id": parseInt($(this).attr("malfunction_id"))};
            $("#deleteMalfunction").after("<h3>"+JSON.stringify(malfunction)+"</h3>");
            event.preventDefault();
            deleteElement("{{ route('malfunctions.destroy',['malfunction'=>2]) }}");
        });
        $("#deleteSolution").on('click', function (event) {
            var solution={'id': $(this).attr("solution_id")};
            event.preventDefault();
            deleteElement("{{ route('solutions.destroy',['solution'=>"+solution+"]) }}");
        });
    });
</script>

@foreach ($product->malfunctions as $malfunction)
    <li>
        <h3 class = "blue">{{$malfunction->name}}</h3>

        <div class="info_malfunction" malfunctionId={{$malfunction->id}}>
            <a class="edit_malfunction" malfunctionId={{$malfunction->id}} href="">
                <h3 class = "blue">Modifica</h3>
            </a>
            <a class="delete_malfunction" malfunctionId={{$malfunction->id}} href = "">
                <h3 class = "blue">Elimina</h3>
            </a>
            <h4 class="description_malfunction">{{$malfunction->description}}</h4>
            <h4 class = "blue">Soluzioni: </h5>
                <a class="add_solution" href="{{ route('solutions.create',['malfunction'=>$malfunction]) }}">
                    <h3 class = "blue">Aggiungi</h3>
                </a>

            <ul class="solutions">
                @include('solutions.show')
            </ul>
        </div>
    </li>
@endforeach
