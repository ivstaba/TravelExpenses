<!-- Default Bootstrap navbar theme -->
    <nav class="navbar navbar-inverse">
      <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="{{ url('/') }}" style="color:#21b384;"><i class="fa fa-plane" aria-hidden="true"></i> Putni troškovi</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          
          <ul class="nav navbar-nav">
            <li class="{{ Request::is('/') ? "active" : "" }}"><a href="/">Naslovna </a></span></li>
            <li class="{{ Request::is('about') ? "active" : "" }}"><a href="/about">O programu</a></li>
          </ul>
          
          <ul class="nav navbar-nav navbar-right">
            <li class="dropdown">
             @if(Auth::check())
                 <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{ Auth::user()->name }} <span class="caret"></span></a>
            @else
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-shield" aria-hidden="true"></i> Korisnički izbornik <span class="caret"></span></a>
            @endif
              <ul class="dropdown-menu">
                <!--<li><a href="#" data-toggle="modal" data-target=".user-modal-md">Login</a></li>
                <li><a href="#" data-toggle="modal" data-target=".admin-modal-md">Administrator login</a></li>-->
            @if(Auth::check())    
                <li><a href="{{ route('user.show', auth()->user()->id) }}"><i class="fa fa-user" aria-hidden="true"></i> Profil</a></li>
                <li><a href="{{ route('admin.index') }}"><i class="fa fa-key" aria-hidden="true"></i> Administrator</a>
            @else
               <li><a href="{{ route('login') }}"><i class="fa fa-sign-in" aria-hidden="true"></i> Login</a></li>
            @endif 
                <li role="separator" class="divider"></li>
                <li><a href="{{ route('logout') }}"><i class="fa fa-sign-out" aria-hidden="true"></i> Logout</a></li>
              </ul>
            </li>
          </ul>
        </div><!-- /.navbar-collapse -->
      </div><!-- /.container-fluid -->
    </nav>
    
   <!-- user modal -->
   
  <div class="modal fade user-modal-md" tabindex="-1" role="dialog">
     <div class="modal-dialog modal-md">
         <div class="modal-content">
            <div class="user-login">
               <div class="panel panel-primary">
                   <div class="panel-heading">
                       <h1 class="text-center"><i class="fa fa-user fa-2x"> Korisnik</i></h1>
                   </div>
               </div>
               <hr>
                <div class="panel-body">
                    <form class="form-horizontal">
                      <div class="form-group">
                          <label for="inputUser" class="col-md-3 control-label">Korisničko ime:</label>
                          <div class="col-md-9">
                              <input type="text" class="form-control" id="inputUser" placeholder="Korisničko ime">
                          </div>
                      </div>
                      <div class="form-group">
                          <label for="inputPassword" class="col-md-3 control-label">Lozinka</label>
                          <div class="col-md-9">
                              <input type="password" class="form-control" id="inputPassword" placeholder="Lozinka">
                          </div>  
                      </div>
                      <div class="form-group">
                          <div class="col-sm-offset-3 col-sm-9">
                              <button type="submit" class="btn btn-success">Ulogiraj se</button>
                          </div>
                      </div>
                    </form>
                </div>
                 
            </div>
         </div>
     </div>
  </div>
  
 <!-- Admin modal -->
 
<div class="modal fade admin-modal-md" tabindex="-1" role="dialog">
     <div class="modal-dialog modal-md">
         <div class="modal-content">
            <div class="user-login">
               <div class="panel panel-danger">
                   <div class="panel-heading">
                      
                       <h1 class="text-center"><i class="fa fa-lock fa-2x"> Admin</i></h1>
                   </div>
               </div>
               <hr>
                <div class="panel-body">
                    <form class="form-horizontal">
                      <div class="form-group">
                          <label for="inputUser" class="col-md-3 control-label">Korisničko ime:</label>
                          <div class="col-md-9">
                              <input type="text" class="form-control" id="inputUser" placeholder="Korisničko ime">
                          </div>
                      </div>
                      <div class="form-group">
                          <label for="inputPassword" class="col-md-3 control-label">Lozinka</label>
                          <div class="col-md-9">
                              <input type="password" class="form-control" id="inputPassword" placeholder="Lozinka">
                          </div>  
                      </div>
                      <div class="form-group">
                          <div class="col-sm-offset-3 col-sm-9">
                              <button type="submit" class="btn btn-success">Ulogiraj se</button>
                          </div>
                      </div>
                    </form>
                </div>
                 
            </div>
         </div>
     </div>
  </div>