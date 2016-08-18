<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>CodeStack</title>
        <!-- Fonts -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css" integrity="sha384-XdYbMnZ/QjLh6iI4ogqCTaIjrFk87ip+ekIjefZch0Y+PvJ8CDYtEs1ipDmPorQ+" crossorigin="anonymous">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700">

        <!-- Styles -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
        <link rel="stylesheet" href="/js/prism/prism.css">
        {{-- <link href="{{ elixir('css/app.css') }}" rel="stylesheet"> --}}
        <script src="/assets/js/jquery.min.js"></script>
        {{-- <script src="/assets/js/main.js"></script> --}}


        

        <script src="/vendors/ckeditor/ckeditor/ckeditor.js"></script>



        
        @yield('head')
        <style>
        body {
        font-family: 'Verdana';
        }
        .fa-btn {
        margin-right: 6px;
        }
        span{
        word-break: break-all;
        }
        span p{
        word-break: break-all;
        font-size:16px;
        line-height: 18px;
        }
        a:hover{
            text-decoration: none;
        }
        .head_icon{
            display: inline-block;
            font-family: 'Open Sans Condensed', sans-serif; font-size: 28px; color: #777;
        }
        </style>
    </head>
    <body id="app-layout">
        <nav class="navbar navbar-default navbar-static-top" style="max-height:55px;">
            <div class="container">
                <div class="navbar-header">
                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    </button>
                    <a href="{{ url("/home") }}"><img src="/assets/images/web_logo.png" style="height: 50px;margin: 3px 38px 0 0px;;"></a>
                    <!-- Branding Image -->
                </div>
                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        <li><a href="{{ url('/home') }}">Ana Səhifə</a></li>
                    </ul>
                    @if (Auth::user())
                    <ul class="nav navbar-nav">
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" >
                                Kateqoriyalar<span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu" role="menu">
                                @foreach($Cat as $cats)
                                <li><a href="{{ url("/cat/$cats->id") }}"><i class="fa fa-btn "></i>{{$cats->cat_name}}</a></li>
                                @endforeach
                            </ul>
                        </li>
                    </ul>
                    <div class="col-md-5" style="margin-top: 8px;">
                        
                        <form action="/searchresult" method="get" role="search" class="input-group form">
                            {{ csrf_field() }}
                            <input type="text" name="search" id='search' class="form-control" placeholder="Axtar..." class="search">
                            <span class="input-group-btn">
                                <button class="btn btn-primary" type="submit">Axtar</button>
                            </span>
                        </form>
                        <table class="table table-hover">
                            {{-- search output here --}}
                        </table>
                        {{-- <script>
                        $("#search").on("keyup", function () {
                        $value = $(this).val();
                        if ($(this).val() === "") {
                        $(this).val().reset();
                        }
                        $.ajax({
                        type: 'get',
                        url: '{{ URL::to('search') }}',
                        data: {'search': $value},
                        success: function (data) {
                        $('.table').html(data);
                        }
                        })
                        })
                        </script> --}}
                    </div>
                    @yield('sual')
                    @endif
                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                        <li><a href="{{ url('/login') }}">Giriş</a></li>
                        <li><a href="{{ url('/register') }}">Qeydiyyat</a></li>
                        @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" style="position: relative;padding-left: 50px;">
                                <img src="/uploads/avatar/{{ Auth::user()->avatar }}" style="width: 32px;height: 32px;position: absolute;top:10px;left:10px;border-radius:50%;">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="{{ url('/profile') }}"><i class="fa fa-btn "></i>Profil</a></li>
                                @if(Auth::user()->role == 'admin' || Auth::user()->role == 'muellim'  || Auth::user()->role == 'mentor')
                                <li><a href="{{ url('/adminPage') }}"><i class="fa fa-btn "></i>Admin&nbspSəhifəsi</a></li>
                                <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Çıxış</a></li>
                                @endif
                            </ul>
                        </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>
        <div class="blur"></div>
        
        @yield('content')
        <!-- JavaScripts -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js" integrity="sha384-I6F5OKECLVtK/BL+8iSLDEHowSAfUo76ZL9+kGAgTRdiByINKJaqTPH/QVNS1VDb" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
        {{-- <script src="{{ elixir('js/app.js') }}"></script> --}}

        <script>
             var config = {
                        extraPlugins: 'codesnippet',
                        height: 200
                    };
            var editor = CKEDITOR.replace( 'editor1',config ,
            {
            allowedContent:
            'h1 h2 h3 p blockquote strong em;' +
            'a[!href];' +
            //'img(left,right)[!src,alt,width,height];' +
            //'table tr th td caption;' +
            'span{!font-family};' +
            //'span{!color};' +
            'span(!marker);'
            //'del ins'
            }
            );
        
        </script>
        @yield('ck')
        <script src="/js/prism/prism.js"></script>
    </body>
</html>