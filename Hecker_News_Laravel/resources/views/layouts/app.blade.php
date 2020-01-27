<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Hecker-News') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        
        @include('include.navbar')
        
        <div class="container"><!--begin container-->
        @include('include.messages') 
            <div class="row">
                 <div class="col-md-4 col-lg-4">
                    <main class="py-4">
                      @include('include.sidebar')
                    </main>
                 </div>
                 <div class="col-md-8 col-lg-8">
                   <main class="py-4">
                       @yield('content')
                   </main>
                </div>                 
            </div>
        </div><!--end container-->
        
       <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
        <script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
        <script>
            CKEDITOR.replace( 'article-ckeditor' );
        </script>
    </div>
</body>
</html>
