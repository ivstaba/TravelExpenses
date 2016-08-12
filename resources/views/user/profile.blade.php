@extends('main')


@section('title', "| $user->name")


@section('content')

    <div class="row">
       <div class="col-md-12">
           <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3>{{ $user->name }}</h3>
                </div>
            
                <div class="panel-body">
                    <div class="col-md-8">
                        <div class="dl-horizontal">
                            <dt>Ime i prezime:</dt>
                            <dd>{{ $user->name }}</dd>
                            <dt>Akademski stupanj:</dt>
                            <dd>{{ $user->degree }}</dd>
                            <dt>Zvanje:</dt>
                            <dd>{{ $user->position }}</dd>
                            <dt>Email:</dt>
                            <dd>{{ $user->email }}</dd>
                            <dt>Telefonski broj:</dt>
                            <dd>{{ $user->phone }}</dd>
                            <dt>Korisničko ime:</dt>
                            <dd>{{ ($user->admin === 1) ? $user->username : 'Korisnik nije Administrator' }}</dd>
                        </div>            
                    </div>
                    <div class="row">
                       
                        <div class="col-md-6 col-md-offset-3">
                           <hr>
                            <a href="{{ route('post.create') }}" class="form-control btn btn-success"><i class="fa fa-archive" aria-hidden="true"></i> Obrazac za upis putnih troškova</a>
                        </div>
                    </div>
               </div>      
           </div>
           <br>
           <hr>
            <div class="row text-center">
                <h1 class="ispis-head">Ispis putnih troškova</h1>
            </div>   
            
            <div class="row tablica">
                <div class="col-md-8 col-md-offset-2">
                <table class="table table-bordered text-center">
                  <thead>
                      <th class="datum-head">Datum</th>
                      <th>Polazište</th>
                      <th>Odredište</th>
                      <th>Km</th>
                      <th>Kn/km</th>
                      <th class="ukupno-head">Ukupno (kn)</th>                
                  </thead>
                  <tbody>
                     @foreach($posts as $post)
                      <tr>
                          <th class="datum-body">{{ date('M j, Y', strtotime($post->created_at)) }}</th>
                          <td>{{ $post->polaziste }}</td>
                          <td>{{ $post->odrediste }}</td>
                          <td>{{ $post->km }}</td>
                          <td>{{ $post->naknada }}</td>
                          <th class="ukupno-body">{{ $post->iznos }}</th>
                      </tr>
                    @endforeach
                  </tbody>
                </table>
                <div class="text-center paginacija">
                    {!! $posts->links() !!}
                </div>      
            </div>
            </div>
            
           
       </div>  
    </div>

@endsection