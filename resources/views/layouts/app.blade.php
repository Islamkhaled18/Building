<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{ url('/') }}/website/css/bootstrap.min.css" rel="stylesheet" />
    <link href="{{ url('/') }}/website/css/flexslider.css" rel="stylesheet" />
    <link href="{{ url('/') }}/website/css/style.css" rel="stylesheet" />
    <link rel="stylesheet" href="{{ url('/') }}/website/css/font-awesome.min.css">
    <script src="{{ url('/') }}/website/js/jquery.min.js"></script>
    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
    <link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900' rel='stylesheet' type='text/css'>

    <title>
        موقع العقارات

        |

        @yield('title')
    </title>

    @yield('header')

</head>
<body style="direction: rtl">
    <div id="app">
        <div class="header">
            <div class="container"> <a class="navbar-brand" href="{{ url('/') }}"><i class="fa fa-paper-plane"></i> ONE</a>
              <div class="menu pull-left"> <a class="toggleMenu" href="#"><img src="{{ url('/') }}/website/images/nav_icon.png" alt="" /> </a>
                <ul class="nav" id="nav">
                  <li class="{{ setActive(['home'] , 'current') }}"><a href="{{ url('/home') }}">الرئيسية</a></li>
                  <li class="{{ setActive(['showAllBuildings'] , 'current') }}"><a href="{{ url('/showAllBuildings') }}">كل العقارات</a></li>


                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            ايجار
                        </a>
                        <ul class="dropdown-menu" role="menu">
                            @foreach ( bu_type() as $keytype => $type )
                                <li style="width: 100%"><a href="{{ url('/search?bu_rent=1&bu_type='. $keytype) }}">{{ $type }}</a></li>
                            @endforeach

                        </ul>
                    </li>


                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                           تمليك
                        </a>

                        <ul class="dropdown-menu" role="menu">
                            @foreach ( bu_type() as $keytype => $type )
                                <li style="width: 100%"><a href="{{ url('/search?bu_rent=0&bu_type=' . $keytype) }}">{{ $type }}</a></li>
                            @endforeach

                        </ul>
                    </li>


                    <li><a href="{{ url('/contact')  }}">تواصل معنا</a></li>
                    @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">تسجيل الدخول</a>
                        </li>
                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">عضوية جديده</a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"

                                    onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                    تسجيل خروج
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>

                        </li>
                    @endguest
                  <div class="clear"></div>
                </ul>
                
              </div>
            </div>
        </div>


        
        @yield('content')

        <div class="footer">
            <div class="footer_bottom">
              <div class="follow-us"> 
                <a class="fa fa-facebook social-icon" href=""></a>
                <a class="fa fa-twitter social-icon" href="#"></a> 
                <a class="fa fa-youtube social-icon" href="#"></a>
             </div>
              <div class="copy">
                <p>Design by Pop Code</p>
              </div>
            </div>
        </div>
        
    </div>

    <script src="{{ url('/') }}/website/js/bootstrap.min.js"></script> 
    <script src="{{ url('/') }}/website/js/jquery.flexslider.js"></script>
    <script type="text/javascript" src="{{ url('/') }}/website/js/responsive-nav.js"></script> 
    @yield('footer')
</body>
</html>
