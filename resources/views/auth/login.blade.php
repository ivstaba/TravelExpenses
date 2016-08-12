@extends('main')


@section('title', '| Logiranje korisnika')

@section('stylesheets')
    {!! Html::style('css/parsley.css') !!}
@endsection

@section('content')


    <div class="row">
        <div class="col-md-6 col-md-offset-3">
           <div class="panel panel-primary" id="login-panel">
                <div class="panel-heading">
                    <h1 class="text-center"><i class="fa fa-lock fa-2x"> Login</i></h1>
                </div>
                <hr>
                <div class="panel-body">
                    {!! Form::open(['data-parsley-validate' => '']) !!}

                        {{ Form::label('email', 'Email:') }}
                        {{ Form::email('email', null, ['class' => 'form-control', 'required' => '']) }}
                        
                        {{ Form::label('password', 'Lozinka:') }}
                        {{ Form::password('password', ['class' => 'form-control', 'required' => '']) }}
                        <br>
                        {{ Form::submit('Ulogiraj se', ['class' => 'btn btn-primary btn-block']) }}

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>



@endsection


@section('scripts')
    {!! Html::script('js/parsley.min.js') !!}
@endsection