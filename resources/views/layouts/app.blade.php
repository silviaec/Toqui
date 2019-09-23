<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <!-- include libraries(jQuery, bootstrap) -->
        <script src="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.js"></script> 

        <!-- include summernote css/js -->
        <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote.css" rel="stylesheet">
        <script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote.js" defer></script>
    <script>
    $(function () {
  $('[data-toggle="tooltip"]').tooltip()
})
    $(document).ready(function() {
        $('.toast').toast('show')

        $('#summernote').summernote({
        height: 400,   //set editable area's height
        codemirror: { // codemirror options
            theme: 'monokai'
        }
        });
       $.ajaxSetup({
           headers: {
               'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
           }
       });
       $('.love').click(function (e) {
           e.preventDefault();
           var id = this.id
            $.post('/love', { post: id }, function(data) {
                if(data == 0) {
                    $('#'+id).attr({ "src": "imgs/como.png" });
                    $('#'+id).attr({ "data-original-title": "Desfavoritear" });
                } else { 
                    $('#'+id).attr({ "src": "imgs/como_empty.png" });
                    $('#'+id).attr({ "data-original-title": "Favoritear" });
                }
            });
        })
        $('.submit_comment').click(function (e) {
           e.preventDefault();
           var id = $('#postid').val()
           var text = $('#comment').val()
            $.post('/comment', { post: id, text: text }, function(data) {
                var comment =   "<div class=card-body>"+
                                    "<h5 class='card-title'>"+ data.data.user[0].name +"</h5>"+
                                    "<h6 class='card-subtitle mb-2 text-muted'> Recientemente </h6>"+
                                    "<p class='card-text'>"+ data.data.text +"</p>"+
                                    "<a href=# class='card-link'>Responder</a>"+
                                    "<a href=# class='card-link'>Eliminnar</a>"+
                                "</div>"
                $("#comments").append(comment)
                $('#comment').val('')
            });
        })
    });
    </script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/home') }}">
                    Toqui
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                                <a class="nav-link write" href="{{ url('/post/create') }}" role="button" aria-haspopup="true"  v-pre>
                                    ESCRIBIR UN POST 
                                </a>
                                <a class="nav-link notification" href="#" role="button" aria-haspopup="true"  v-pre>
                                    <img src="{{ url('/imgs/notification.png') }}" width="35">
                                </a>
                                <a class="nav-link message" href="#" role="button" aria-haspopup="true"  v-pre>
                                    <img src="{{ url('/imgs/avion.png') }}">
                                </a>
                            <li class="nav-item dropdown" style="margin: auto;">
                               
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
        
        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
