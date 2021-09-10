@extends('layouts.layout')

@section('script')
 <script src="{{ asset('js/functions.js') }}" ></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(function () {
        $("#destroy").on('click', function (event) {
            event.preventDefault();
            deleteElement("{{ route('products.destroy',['product'=>$product]) }}");
        });

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

        $("li.malfunction").on('click','a.malfunction_name', function (event) {
            event.preventDefault();
            $(this).next().toggle();
        });

        $("li.malfunction").on('click','li.solution a.edit_solution', function (event) {
            event.preventDefault();
            var solution_id= $(this).attr("solutionId");
            var actionUrl="{{ route('solutions.edit', 'solution_id') }}";
            actionUrl=actionUrl.replace('solution_id', solution_id)

            $.ajax({
                type : 'GET',
                url : actionUrl,
                success:function(data){
                        $("div.info_solution[solutionId="+data.solution_id+"]").html(data.html);
                    }
                });
        });

        $("li.malfunction").on('blur','li.solution :input', function (event) {
            var solution_id= $(this).parent().attr("solutionId");
            var actionUrl="{{ route('solutions.update', 'solution_id') }}";
            actionUrl=actionUrl.replace('solution_id', solution_id)
            var formElementId = $(this).attr('id');
            var formId = $(this).parent().attr('id');
            doElemValidation(formElementId, actionUrl, formId, actionType);
        });
        $("li.malfunction").on('submit','li.solution .contact-form', function (event) {
            event.preventDefault();
            var formId = $(this).attr('id');
            var solution_id= $(this).attr("solutionId");
            var actionUrl="{{ route('solutions.update', 'solution_id') }}";
            actionUrl=actionUrl.replace('solution_id', solution_id)
            doFormValidation(actionUrl, formId, actionType);
        });

        $("li.malfunction").on('click','li.solution a.delete_solution', function (event) {
            event.preventDefault();
            var actionUrl="{{ route('solutions.destroy', 'solution_id') }}";
            var solution_id=parseInt($(this).attr("solutionId"));
            actionUrl=actionUrl.replace('solution_id', solution_id);
            deleteElement(actionUrl);
        });

        $("li.malfunction").on('click','li.solution a.solution_name', function (event) {
            event.preventDefault();
            $(this).next().toggle();
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
        </article>
    </section>
</div>
@endsection
