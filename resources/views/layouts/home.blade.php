<!DOCTYPE html>
<html>
    <head>
        <title>@yield('title')</title>

        @include('libraries.bootstrap')

        <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">

        <link rel="stylesheet" href="/css/welcome.css">
    </head>

    <body>

      <nav class="navbar navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="{{ route('proveedores') }}">Lista de proveedores</a>
        </div>
      </nav>
      <div class="container">
        @yield('content')
      </div>
    </body>
</html>
