@extends('main')

@section('title', '| Administrator')

@section('content')

    <div class="row">
        <div class="col-md-12">
           
            <div class="col-md-8">
                <h1>Administrator</h1>
            </div>  
            
            <div class="col-md-3 col-md-offset-1">
                <a href="{{ route('admin.create') }}" class="btn btn-primary btn-block btn-lg" style="margin-top: 30px"><i class="fa fa-user-plus" aria-hidden="true"></i>  Dodaj novog korisnika</a>
            </div>    
        </div>
     </div>
       <hr>     
    <div class="row">  
        <div class="col-md-12">
           <h3>Popis korisnika</h3>
            <table class="table table-bordered">
              <thead>
                  <th>Id</th>
                  <th>Prezime i ime</th>
                  <th>Ak. stupanj</th>
                  <th>Zvanje</th>
                  <th>Email</th>
                  <th>Tel. broj</th>
                  <th>Kor. ime</th> 
                  <th>Admin</th>                 
              </thead>
              <tbody>
                 @foreach($users as $user)
                  <tr>
                      <th>{{ $user->id }}</th>
                      <td>{{ $user->name }}</td>
                      <td>{{ $user->degree }}</td>
                      <td>{{ $user->position }}</td>
                      <td>{{ $user->email }}</td>
                      <td>{{ $user->phone }}</td>
                      <td>{{ $user->username }}</td>
                      <td>{{ ($user->admin === 1) ? 'Da' : 'Ne' }}</td>
                      <td><a href="{{ route('admin.show', $user->id) }}" class="btn btn-success">Korisnik</a></td>
                      <td><a href="{{ route('admin.edit', $user->id) }}" class="btn btn-primary">Editiraj</a></td>
                  </tr>
                @endforeach
              </tbody>
            </table>
            
            <div class="text-center paginacija">
				{!! $users->links() !!}
			</div>
        </div>
    </div>
  
            
@endsection

