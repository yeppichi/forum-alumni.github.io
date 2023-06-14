<!doctype html>
<html lang="en">
  <head>
    @include('partials.head')
  </head>

  <body>
    <div class="container mt-4">
        @include('components.alert-message')

        @yield('content')
    </div>
    
    @include('partials.footer')
    @include('partials.foot')
  </body>
</html>
