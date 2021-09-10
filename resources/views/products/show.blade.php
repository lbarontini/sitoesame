@extends('layouts.layout')

@section('script')
 <script src="{{ asset('js/functions.js') }}" ></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(function () {
        $("li.malfunction").on('click','a.edit_malfunction', function (event) {
            event.preventDefault();
            var malfunction_id= $(this).attr("malfunctionId");
            var actionUrl="{{ route('malfunctions.edit', 'malfunction_id') }}";
            actionUrl=actionUrl.replace('malfunction_id', malfunction_id)

            $.ajax({
                type : 'GET',
                url : actionUrl,
                success:function(data){
                        $("div.info_malfunction[malfunctionId="+data.malfunction_id+"]").html(data.html);
                    }
                });
        });

        var actionType = 'PUT';
        $("li.malfunction").on('blur',':input', function (event) {
            var malfunction_id= $(this).parent().attr("malfunctionId");
            var actionUrl="{{ route('malfunctions.update', 'malfunction_id') }}";
            actionUrl=actionUrl.replace('malfunction_id', malfunction_id)
            var formElementId = $(this).attr('id');
            var formId = $(this).parent().attr('id');
            doElemValidation(formElementId, actionUrl, formId, actionType);
        });
        $("li.malfunction").on('submit','.contact-form', function (event) {
            event.preventDefault();
            var formId = $(this).attr('id');
            var malfunction_id= $(this).attr("malfunctionId");
            var actionUrl="{{ route('malfunctions.update', 'malfunction_id') }}";
            actionUrl=actionUrl.replace('malfunction_id', malfunction_id)
            doFormValidation(actionUrl, formId, actionType);
        });

        $("#destroy").on('click', function (event) {
            event.preventDefault();
            deleteElement("{{ route('products.destroy',['product'=>$product]) }}");
        });

        //todo same as above for dynamic rendered html
        $("li.malfunction").on('click','a.delete_malfunction', function (event) {
            event.preventDefault();
            var actionUrl="{{ route('malfunctions.destroy', 'malfunction_id') }}";
            var malfunction_id=parseInt($(this).attr("malfunctionId"));
            actionUrl=actionUrl.replace('malfunction_id', malfunction_id);
            deleteElement(actionUrl);
        });
        $("#deleteSolution").on('click', function (event) {
            var solution={'id': $(this).attr("solution_id")};
            event.preventDefault();
            deleteElement("{{ route('solutions.destroy',['solution'=>"+solution+"]) }}");
        });
    });
</script>
@endsection

@section('content')
<div id="maincontent" class="bodywidth clear">
    <section id="tools">
        @can('staff_work')
            <a href="{{route('products.edit',['product'=>$product])}}">Modifica</a>
        @endcan
        @can('admin_work')
            <a href="" id="destroy">Elimina</a>
        @endcan
    </section>
    <section id="show">
        <article>
            <div>
                @include('helpers/productImg', ['attrs' => 'imagefrm', 'imgFile' => $product->image])
                <div class="info">
                    <h3 class = "blue">Modello: {{$product->model}}</h3>

                    <h3 class = "blue">Descrizione: <h3>{{$product->description}}</h3></h3>
                    <h4 class = "blue">Note Installazione: <h4>{{$product->installation_notes}}</h4></h4>
                    <h4 class = "blue">Note Utlizzo: <h4>{{$product->use_notes}}</h4></h4>
                    @can('tecn_work')
                        @include('malfunctions.index')
                    @endcan
                </div>
            </div>
        </article>
    </section>
</div>
@endsection
