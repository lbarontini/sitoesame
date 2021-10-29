@extends('layouts.layout')
@section('script')
<script src="{{ asset('js/functions.js') }}" ></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(function () {
        var actionType = 'PUT';
        var actionUrl = "{{ route('users.update',['user'=>$user]) }}";
        var formId = 'updateuser';
        $(":input").on('blur', function (event) {
            var formElementId = $(this).attr('id');
            doElemValidation(formElementId, actionUrl, formId, actionType);
        });
        $("#updateuser").on('submit', function (event) {
            event.preventDefault();
            doFormValidation(actionUrl, formId, actionType);
        });

        $('#role_id').change(function () {
            if($(this).val()==3){
                $('#assistance_center_wrap').show();
            }else{
                $('#assistance_center_wrap').hide();
            }
        });
        $(document).ready(function () {
            if($('#role_id').val()==3){
                $('#assistance_center_wrap').show();
            }else{
                $('#assistance_center_wrap').hide();
            }
        });
    });
</script>
@endsection

@section('content')
    <div class="container-contact">
        <p class="pagetitle">Modifica Utente</p>
            {!! Form::model($user, array('route' =>array('users.update', $user->id),
                                                        'id' => 'updateuser',
                                                        'class' => 'contact-form',
                                                        'method'=>'PUT')); !!}
                <div class="wrap-input">
                    <div  class="rs1-wrap-input">
                        {{ Form::label('name', 'Nome', ['class' => 'label-input']) }}
                        {{ Form::text('name', $user->name, ['class' => 'input', 'id' => 'name']) }}
                    </div>

                    <div  class="rs1-wrap-input">
                        {{ Form::label('username', 'Username', ['class' => 'label-input']) }}
                        {{ Form::text('username', $user->username, ['class' => 'input','id' => 'username']) }}
                    </div>

                    <div  class="rs1-wrap-input">
                        {{ Form::label('email', 'Email', ['class' => 'label-input']) }}
                        {{ Form::email('email', $user->email, ['class' => 'input','id' => 'email']) }}
                    </div>

                    <div  class="rs1-wrap-input">
                        {{ Form::label('password', 'Password', ['class' => 'label-input']) }}
                        {{ Form::password('password', ['class' => 'input','id' => 'password',]) }}
                    </div>

                    <div  class="rs1-wrap-input">
                        {{ Form::label('role_id', 'Ruolo', ['class' => 'label-input']) }}
                        {{ Form::select('role_id',
                                         $roles->pluck('label','id'),
                                         $user->role->id,
                                         [  'multiple'=>false,
                                            'class' => 'input',
                                            'id' => 'role_id'
                                         ])
                        }}
                    </div>
                    <div  class="rs1-wrap-input" id="assistance_center_wrap" hidden=true>
                            {{ Form::label('assistance_center_id', 'Centro assistenza', ['class' => 'label-input']) }}
                            {{ Form::select('assistance_center_id',
                                            $assistance_centers->pluck('name','id'),
                                            $user->isTecn() ? $user->assistanceCenter->id : '',
                                            [  'multiple'=>false,
                                                'class' => 'input',
                                                'id' => 'assistance_center_id'
                                            ])
                            }}
                    </div>
                    <div class="container-form-btn">
                        {{ Form::submit('Conferma', ['class' => 'form-btn1', 'id' => 'sub-btn']) }}
                    </div>
                </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection
