@extends('main')


@section('title', '| Obrazac za unos putnih troškova')

@section('stylesheets')
    {!! Html::style('css/parsley.css') !!}
@endsection

@section('content')
    
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
              <div class="formular-head"><p>Obrazac za upis troškova</p></div>
               <div class="formular-body">
                {!! Form::open(['route' => 'post.store', 'data-parsley-validate' => '']) !!}

                    {{ Form::label('polaziste', 'Polazište:') }}
                    {{ Form::text('polaziste', null, ['class' => 'form-control', 'required' => '']) }}

                    {{ Form::label('odrediste', 'Odredište:') }}
                    {{ Form::text('odrediste', null, ['class' => 'form-control', 'required' => '']) }}

                    {{ Form::label('km', 'Broj kilometara:') }}
                    {{ Form::text('km', null, ['class' => 'form-control', 'required' => '']) }}

                    {{ Form::label('naknada', 'Kn/km:') }}
                    {{ Form::text('naknada', null, ['class' => 'form-control', 'required' => '']) }}
                    <hr>
                    {{ Form::submit('Spremi', ['class' => 'btn btn-success btn-lg btn-block', 'style' => 'margin-top:20px']) }}
                {!! Form::close() !!}
                <a href="{{ url('user/{user}') }}" class="btn btn-primary btn btn-block btn-lg" style="margin-top: 20px"><< Natrag</a>
                </div>
            </div>
        </div>
    
    
    
@endsection


@section('scripts')
    {!! Html::script('js/parsley.min.js') !!}
@endsection