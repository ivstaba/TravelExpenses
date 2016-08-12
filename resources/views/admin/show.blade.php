@extends('main')


@section('title', "| $user->name" )


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
                            <dd>{{ $user->username }}</dd>
                            <dt>Administrator:</dt>
                            <dd>{{ ($user->admin === 1) ? 'Da' : 'Ne' }}</dd>
                        </div>            
                    </div>

                    <div class="col-md-4">
                        <div class="well">
                            <dl>
                                <dt>Korisnik je kreiran:</dt>
                                <dd>{{ date('M j, Y', strtotime($user->created_at)) }}</dd>
                                <dt>Korisnički podaci su nadograđeni:</dt>
                                <dd>{{ date('M j, Y', strtotime($user->updated_at)) }}</dd>
                            </dl>
                            
                            <div class="row">
                                <div class="col-sm-6">
                                    {!! Html::linkRoute('admin.edit', 'Editiraj', [$user->id], ['class' => 'btn btn-primary btn-block']) !!}
                                </div>
                                <div class="col-sm-6">
                                    {!! Form::open(['route' => ['admin.destroy', $user->id], 'method' => 'DELETE']) !!}
                                        {!! Form::submit('Izbriši', ['class' => 'btn btn-danger btn-block']) !!}
                                    {!! Form::close() !!}
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
						            {{ Html::linkRoute('admin.index', '<< Povratak na početnu stranicu', [], ['class' => 'btn btn-default btn-block btn-h1-spacing']) }}
					            </div>
                            </div>
                            
                        </div>
                    </div>
                    
               </div>      
           </div>
           <div class="panel panel-success">
                <div class="panel-heading">
                    <h3>Izvadak putnih troškova</h3>
                </div>
                <div class="panel-body">
                   <div class="col-md-8 col-md-offset-2">
                       <table class="table table-bordered">
                          <thead>
                             <th>Id</th>
                              <th>Datum</th>
                              <th>Polazište</th>
                              <th>Odredište</th>
                              <th>Km</th>
                              <th>Kn/km</th>
                              <th>Ukupno (kn)</th>                
                          </thead>
                          <tbody>
                             @foreach($posts as $post)
                              <tr>
                                 <th>{{ $post->user_id }}</th>
                                  <th>{{ date('M j, Y', strtotime($post->created_at)) }}</th>
                                  <td>{{ $post->polaziste }}</td>
                                  <td>{{ $post->odrediste }}</td>
                                  <td>{{ $post->km }}</td>
                                  <td>{{ $post->naknada }}</td>
                                  <th>{{ $post->iznos }}</th>
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
    </div>

@stop()
