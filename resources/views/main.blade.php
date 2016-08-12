<!DOCTYPE html>
<html lang="hr">

  <head>
    @include('partials._head')
  </head>
  
  <body>
 
        @include('partials._nav')

        <div class="container">

          @include('partials._messages')

          @yield('content')

          @include('partials._footer')

        </div> <!-- end of .container -->

        @include('partials._js')

        @yield('scripts')

  </body>

</html>