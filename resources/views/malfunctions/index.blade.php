<script>
    $(function () {
        // $("a.edit_malfunction").on('click', function (event) {
        //     event.preventDefault();
        //     var malfunction_id= $(this).attr("malfunctionId");
        //     var actionUrl="{{ route('malfunctions.edit', 'malfunction_id') }}";
        //     actionUrl=actionUrl.replace('malfunction_id', malfunction_id)

        //     $.ajax({
        //         type : 'get',
        //         url : actionUrl,
        //         success:function(data){
        //                 $("div.info_malfunction[malfunctionId="+data.malfunction_id+"]").html(data.html);
        //             }
        //         });
        // });

        // $("#destroy").on('click', function (event) {
        //     event.preventDefault();
        //     deleteElement("{{ route('products.destroy',['product'=>$product]) }}");
        // });
        $("#deleteMalfunction").on('click', function (event) {
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
    @include('malfunctions.show')
</li>
@endforeach
