@extends('layouts.layout')

@section('script')
<script src="{{ asset('js/functions.js') }}" ></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(function(){
        $("a.category_name").click(function(event){
            event.preventDefault();
            var id=$(this).attr("category_id");
            $(".info[category_id ="+id+"]").toggle();
        });
        $("a.question").click(function(event){
            event.preventDefault();
            var id=$(this).attr("question_id");
            $(".info[question_id ="+id+"]").toggle();
        });
        $("a.delete").on('click', function (event) {
            var actionUrl=$(this).attr("href");
            deleteElement(actionUrl);
        });
    });
</script>

@endsection

@section('content')
<div id="maincontent" class="bodywidth clear">
    <section id="tools">
        @can('admin_work')
            <a href="{{route('faqs_categories.create')}}">Aggiungi categoria</a>
            <a href="{{route('faqs.create')}}">Aggiungi Domanda</a>
        @endcan
    </section>
    <section id="index">
        <ul>
            @foreach ($faqs_categories as $faqs_category)
                <li>
                    <a class="category_name" category_id={{$faqs_category->id}} href="">
                        <h3 class = "blue">{{$faqs_category->name}}</h3>
                    </a>
                    <div class="info" category_id={{$faqs_category->id}}>
                        @can('admin_work')
                        <a class="edit" href="{{route('faqs_categories.edit',['faqs_category'=>$faqs_category])}}">
                            <h3 class = "blue">Modifica categoria</h3>
                        </a>
                        <a class="delete" href = "{{ route('faqs_categories.destroy',['faqs_category'=>$faqs_category]) }}">
                            <h3 class = "blue">Elimina categoria</h3>
                        </a>
                        @endcan
                        <ul>
                            @foreach ($faqs_category->faqs as $faq)
                            <a class="question" question_id={{$faq->id}} href="">
                                <h3 class = "blue">Domanda: {{$faq->question}}</h3>
                            </a>
                                <div  class="info" question_id={{$faq->id}}>
                                    @can('admin_work')
                                    <a class="edit" href="{{route('faqs.edit',['faq'=>$faq])}}">
                                        <h3 class = "blue">Modifica doamnda</h3>
                                    </a>
                                    <a class="delete" href = "{{ route('faqs.destroy',['faq'=>$faq]) }}">
                                        <h3 class = "blue">Elimina domanda</h3>
                                    </a>
                                    @endcan
                                    <h4 id="answer">Risposta: {{$faq->answer}}</h4>
                                </div>
                            @endforeach
                        </ul>
                    </div>

                </li>
            @endforeach
        </ul>
    </section>
</div>
@endsection
