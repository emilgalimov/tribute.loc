<!doctype html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tribute</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script>
        window.laravel={csrfToken:'{{csrf_token()}}'}
    </script>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=PT+Sans+Narrow" rel="stylesheet">
    <link href="{{asset('css/app.css')}}" rel="stylesheet" type="text/css">
    <!-- Styles -->
</head>

<body>
    <div id="app"></div>
    <script src="{{asset('js/app.js')}}"></script>
</body>

</html>