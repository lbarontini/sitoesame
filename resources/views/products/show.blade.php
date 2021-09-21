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
        //malfunctions scripts
        $("div.malfunctions").on('click','a.add_malfunction', function (event) {
            event.preventDefault();
            var product_id= $(this).attr("productId");
            var actionUrl="{{ route('malfunctions.create', 'product_id') }}";
            actionUrl=actionUrl.replace('product_id', product_id)

            $.ajax({
                type : 'GET',
                url : actionUrl,
                success:function(data){
                    $("a.add_malfunction").hide();
                    $("a.add_malfunction").after(data.html);
                }
            });
        });


        $("div.malfunctions").on('blur','.addmalfunction-form :input', function (event) {
            event.preventDefault();
            var formId = $(this).closest('.addmalfunction-form').attr('id');
            var formElementId = $(this).attr('id');
            var actionUrl = "{{ route('malfunctions.store') }}";
            doElemValidation(formElementId, actionUrl, formId, 'POST');
        });
        $("div.malfunctions").on('submit','.addmalfunction-form', function (event) {
            event.preventDefault();
            var formId = $(this).attr('id');
            var actionUrl = "{{ route('malfunctions.store') }}";
            console.log(actionUrl);
            doFormValidation(actionUrl,formId, 'POST');
        });

        $("ul.malfunctions").on('click','a.edit_malfunction', function (event) {
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

        $("ul.malfunctions").on('blur','li.malfunction .editmalfunction-form :input', function (event) {
            var malfunction_id= $(this).parent().attr("malfunctionId");
            var actionUrl="{{ route('malfunctions.update', 'malfunction_id') }}";
            actionUrl=actionUrl.replace('malfunction_id', malfunction_id)
            var formElementId = $(this).attr('id');
            var formId = $(this).closest('.editmalfunction-form').attr('id');
            doElemValidation(formElementId, actionUrl, formId, 'PUT');
        });
        $("ul.malfunctions").on('submit','li.malfunction .editmalfunction-form', function (event) {
            event.preventDefault();
            var formId = $(this).attr('id');
            var malfunction_id= $(this).attr("malfunctionId");
            var actionUrl="{{ route('malfunctions.update', 'malfunction_id') }}";
            actionUrl=actionUrl.replace('malfunction_id', malfunction_id)
            doFormValidation(actionUrl, formId, 'PUT');
        });

        $("ul.malfunctions").on('click',' a.delete_malfunction', function (event) {
            event.preventDefault();
            var actionUrl="{{ route('malfunctions.destroy', 'malfunction_id') }}";
            var malfunction_id=parseInt($(this).attr("malfunctionId"));
            actionUrl=actionUrl.replace('malfunction_id', malfunction_id);
            deleteElement(actionUrl);
        });

        $("ul.malfunctions").on('click','a.malfunction_name', function (event) {
            event.preventDefault();
            $(this).next().toggle();
        });

        //solutions scripts
        $("ul.malfunctions").on('click','a.add_solution', function (event) {
            event.preventDefault();
            var malfunction_id= $(this).attr("malfunctionId");
            var actionUrl="{{ route('solutions.create', 'malfunction_id') }}";
            actionUrl=actionUrl.replace('malfunction_id', malfunction_id)

            $.ajax({
                type : 'GET',
                url : actionUrl,
                success:function(data){
                    $("a.add_solution[malfunctionId="+data.malfunction_id+"]").hide();
                    $("a.add_solution[malfunctionId="+data.malfunction_id+"]").after(data.html);
                }
            });
        });


        $("ul.malfunctions").on('blur','.addsolution-form :input', function (event) {
            var formElementId = $(this).attr('id');
            var formId = $(this).closest('.addsolution-form').attr('id');
            var actionUrl = "{{ route('solutions.store') }}";
            doElemValidation(formElementId, actionUrl, formId, 'POST');
        });
        $("ul.malfunctions").on('submit','.addsolution-form', function (event) {
            event.preventDefault();
            var formId = $(this).attr('id');
            var actionUrl = "{{ route('solutions.store') }}";
            doFormValidation(actionUrl, formId, 'POST');
        });

        $("ul.malfunctions").on('click','li.solution a.edit_solution', function (event) {
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

        $("ul.malfunctions").on('blur','li.solution .editsolution-form :input', function (event) {
            var solution_id= $(this).parent().attr("solutionId");
            var actionUrl="{{ route('solutions.update', 'solution_id') }}";
            actionUrl=actionUrl.replace('solution_id', solution_id)
            var formElementId = $(this).attr('id');
            var formId = $(this).closest('.editsolution-form').attr('id');
            doElemValidation(formElementId, actionUrl, formId, 'PUT');
        });
        $("ul.malfunctions").on('submit','li.solution .editsolution-form', function (event) {
            event.preventDefault();
            var formId = $(this).attr('id');
            var solution_id= $(this).attr("solutionId");
            var actionUrl="{{ route('solutions.update', 'solution_id') }}";
            actionUrl=actionUrl.replace('solution_id', solution_id)
            doFormValidation(actionUrl, formId, 'PUT');
        });

        $("ul.malfunctions").on('click','li.solution a.delete_solution', function (event) {
            event.preventDefault();
            var actionUrl="{{ route('solutions.destroy', 'solution_id') }}";
            var solution_id=parseInt($(this).attr("solutionId"));
            actionUrl=actionUrl.replace('solution_id', solution_id);
            deleteElement(actionUrl);
        });

        $("ul.malfunctions").on('click','li.solution a.solution_name', function (event) {
            event.preventDefault();
            $(this).next().toggle();
        });
    });
</script>
@endsection

@section('content')
<div id="maincontent" class="bodywidth clear">
    <section id="tools">
        @can('admin_work')
            <a href="{{route('products.edit',['product'=>$product])}}">Modifica</a>
            <a href="" id="destroy">Elimina</a>
        @endcan
    </section>
    <section id="show">
        <div class="info1" >
            @include('helpers/productImg', ['attrs' => 'imagefrm', 'imgFile' => $product->image])
            <p>
            <h3 class = "blue">Modello: {{$product->model}}</h3>
            <h3 class = "blue">Descrizione: <h3>{{$product->description}}</h3></h3>
            </p>
        </div>
        <div class="info2">
            <h4 class = "blue">Note Installazione: <h4>{{$product->installation_notes}}</h4></h4>
            <h4 class = "blue">Note Utlizzo: <h4>{{$product->use_notes}}</h4></h4>
            <h4 class = "blue">Gestito da: <h4>{{$product->user->name}}</h4></h4>
            @can('tecn_work')
                @include('malfunctions.index')
            @endcan
        </div>
    </section>
</div>
@endsection
