@extends('layouts.app')

@section('log_content')
<div class="container-contact">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

                <div class="card-body">
                    <h2>Benvenuto {{Auth::user()->name}}</h4>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
