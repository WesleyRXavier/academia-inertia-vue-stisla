<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSS comun -->
    <link href="{{ url(mix('css/app.css')) }}" rel="stylesheet">
   
    
    @stack('css')
    <title> Spreading</title>
</head>

<body>
  <main>
    @yield('content')
</main>
</body>
 <!--JS comun-->

 <script src="{{ url(mix('js/app.js')) }}"></script>
 @stack('scripts')
</html>
