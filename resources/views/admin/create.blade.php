@extends('main')

@section('title', '| Kreiranje novog korisnika')

@section('stylesheets')
    {!! Html::style('css/parsley.css') !!}
@endsection

@section('content')

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
           <div class="formular-head">Novi korisnik</div>
           <div class="formular-body">
            {!! Form::open(['route' => 'admin.store', 'data-parsley-validate' => '']) !!}
                {{ Form::label('name', 'Prezime i ime:') }}
                {{ Form::text('name', null, ['class' => 'form-control', 'required' => '']) }}
                
                {{ Form::label('degree', 'Akademska titula:') }}
                {{ Form::select('degree', array(
                                        'akad. slikar' => 'akad. slikar',
                                        'akad. slikar - grafičar' => 'akad. slikar - grafičar',
                                        'bacc. med. techn.' => 'bacc. med. techn.',
                                        'bacc. prim.' => 'bacc. prim.',
                                        'dipl. def.' => 'dipl. def.',
                                        'dipl. diz.' => 'dipl. diz.',
                                        'dipl. inf.' => 'dipl. inf',
                                        'dipl. ing.' => 'dipl. ing',
                                        'dipl. iur.' => 'dipl. iur.',
                                        'dipl. mag. techn.' => 'dipl. mag. techn.',
                                        'dipl. med. techn.' => 'dipl. med. techn.',
                                        'dipl. nov.' => 'dipl. nov.',
                                        'dipl. oec.' => 'dipl. oec.',
                                        'dipl. učit.' => 'dipl. učit.',
                                        'dr. med.' => 'dr. med.',
                                        'dr. phil.' => 'dr. phil.',
                                        'dr. sc.' => 'dr. sc.',
                                        'mag. educ. mat. et phys.' => 'mag. educ. mat. et phys.',
                                        'mag. inf.' => 'mag. inf.',
                                        'mag. ing. techn. graph.' => 'mag. ing. techn. graph.',
                                        'mag. ing. mech.' => 'mag. ing. mech.',
                                        'mag. ing. inf. et comm. techn.' => 'mag. ing. inf. et comm. techn.',
                                        'mag. med. techn.' => 'mag. med. techn.',
                                        'mag. nov.' => 'mag. nov.',
                                        'mag. oec.' => 'mag. oec.',
                                        'mag. philol.' => 'mag. philol.',
                                        'mag. philol. angl.' => 'mag. philol. ang.',
                                        'mag. politolog.' => 'mag. politolog.',
                                        'mag. prim. educ.' => 'mag. prim. educ.',
                                        'mag. psih.' => 'mag. psih.',
                                        'mr. sc.' => 'mr. sc.',
                                        'prof.' => 'prof.',
                                        'struc. spec. ing. tech. inf.' => 'struc. spec. ing. tech. inf.',
                                        'struč. spec. ing. el.' => 'struč. spec. ing. el.',
                                        'struč. spec. ing. građ.' => 'struč. spec. ing. građ.',
                                        'student' => 'student',
                                        'univ. spec. oec.' => 'univ. spec. oec.'
                                        
                                ), null, ['class' => 'form-control', 'placeholder' => '...', 'required' => '']) }}
                                
                {{ Form::label('position', 'Zvanje:') }}
                {{ Form::select('position', array(
                                        'Asistent' => 'Asistent',
                                        'Docent' => 'Docent',
                                        'Izvanredni profesor' => 'Izvanredni profesor',
                                        'Mentor vježbovne nastave' => 'Mentor vježbovne nastave',
                                        'Predavač' => 'Predavač',
                                        'Profesor visoke škole' => 'Profesor visoke škole',
                                        'Profesor visoke škole u trajnom zvanju' => 'Profesor visoke škole u trajnom zvanju',
                                        'Redoviti profesor' => 'Redoviti profesor',
                                        'Redoviti profesor u trajnom zvanju' => 'Redoviti profesor u trajnom zvanju',
                                        'Student' => 'Student',
                                        'Viši predavač' => 'Viši predavač',
                                        'Viši predavač - Docent' => 'Viši predavač - Docent'
                                ), null, ['class' => 'form-control', 'placeholder' => '...', 'required' => '']) }}
                
                {{ Form::label('email', 'Email:') }}
                {{ Form::email('email', null, ['class' => 'form-control', 'required' => '', 'type' => 'email']) }}
                
                {{ Form::label('phone', 'Broj telefona:') }}
                {{ Form::text('phone', null, ['class' => 'form-control', 'required' => '']) }}
                
                {{ Form::label('username', 'Korisničko ime:') }}
                {{ Form::text('username', null, ['class' => 'form-control', 'required' => '', 'minlength' => '6']) }}
                
                {{ Form::label('admin', 'Administratorska prava:') }}
                {{ Form::select('admin', array('0' => 'Ne','1' => 'Da'), null, ['class' => 'form-control']) }}
                
                {{ Form::label('password', 'Lozinka:') }}
                {{ Form::password('password', ['class' => 'form-control', 'required' => '']) }}
                
                {{ Form::submit('Registriraj', ['class' => 'btn btn-success btn-lg btn-block', 'style' => 'margin-top:20px']) }}
            {!! Form::close() !!}
            </div>
        </div>
    </div>

@endsection


@section('scripts')
    {!! Html::script('js/parsley.min.js') !!}
@endsection