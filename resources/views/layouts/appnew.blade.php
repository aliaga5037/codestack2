<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>CodeStack</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="/css/newStyle.css" media="screen" title="no title" charset="utf-8">
    <script src="https://use.fontawesome.com/0f3550b748.js"></script>
    <link rel="stylesheet" href="/js/prism/prism.css">
    <script src="/js/prism/prism.js"></script>
      <script src="/vendors/ckeditor/ckeditor/ckeditor.js"></script>
    <!-- old_head directory -->
    
    <!-- endoff old head directory -->
  </head>
  <body>
    <section id="navbar" role="navigation" class="navbar navbar-default">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" data-target="#navbarCollapse" data-toggle="collapse" class="navbar-toggle">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          </button>
          <a href="#">
            <div class="logo">
              <a href="{{ url('/home') }}">
                <img src="/assets/images/logo.png" alt="LOGO" />
              </a>
            </div>
          </a>
        </div>
        <div id="navbarCollapse" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li class="editLeftLine"><a href=" {{ url("/home") }} ">Ana Səhifə</a></li>
            <li class="dropdown rightLine">
              <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                Kateqoriyalar
                <span class="glyphicon glyphicon-menu-down" aria-hidden="true"></span></a>
                <ul role="menu" class="dropdown-menu">
                  @foreach($Cat as $cats)
                  <li><a href="{{ url("/cat/$cats->id") }}">{{$cats->cat_name}}</a></li>
                  @endforeach
                </ul>
              </li>
            </ul>
            <form class="searchForm" action="/searchresult" method="get" role="search">
              {{ csrf_field() }}
              <input type="text" name="search" id='search' placeholder="Axtar...">
              <button class="glyphicon glyphicon-search" type="submit"></button>
            </form>
            <ul class="nav navbar-nav navbar-right">
              <li>
              @yield('sual')                
                </li>
                <li>
                  <a href="#">
                    <span class="glyphicon glyphicon-bell" aria-hidden="true">
                    </a>
                  </li>
                  <li class="dropdown">
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                      <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                      <span class="glyphicon glyphicon-menu-down" aria-hidden="true"></span>
                    </a>
                    <ul role="menu" class="dropdown-menu">
                      <li><a href="{{ url('/profile') }}"><i class="fa fa-btn "></i>Profil</a></li>
                      @if(Auth::user()->role == 'admin' || Auth::user()->role == 'muellim'  || Auth::user()->role == 'mentor')
                      <li><a href="{{ url('/adminPage') }}"><i class="fa fa-btn "></i>Admin&nbspSəhifəsi</a></li>
                      @endif
                      <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Çıxış</a></li>
                    </ul>
                  </li>
                </ul>
              </div>
            </div>
          </section>
          @yield('content')
          <script type="text/javascript">
        
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
        </body>
      </html>