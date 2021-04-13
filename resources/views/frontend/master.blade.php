<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Klassy Cafe - Restaurant HTML Template</title>
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('/assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{asset('/assets/css/font-awesome.css')}}">
    <link rel="stylesheet" href="{{asset('/assets/css/templatemo-klassy-cafe.css')}}">
    <link rel="stylesheet" href="{{asset('/assets/css/owl-carousel.css')}}">
    <link rel="stylesheet" href="{{asset('/assets/css/lightbox.css')}}">
</head>
<body>
    <!-- ***** Preloader Start ***** -->
    <div id="preloader">
        <div class="jumper">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>
    <!-- ***** Preloader End ***** -->


    <!-- ***** Header Area Start ***** -->
    <header class="header-area header-sticky">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="main-nav">
                        <!-- ***** Logo Start ***** -->
                        <a href="{{route('index')}}" class="logo">
                            <img src="{{asset($setting->logo)}}" align="klassy cafe html template">
                        </a>
                        <!-- ***** Logo End ***** -->
                        <!-- ***** Menu Start ***** -->
                        <ul class="nav">
                            <li class="scroll-to-section"><a href="#top" class="active">Home</a></li>
                            <li class="scroll-to-section"><a href="#about">About Us</a></li>

                            <!-- 
                            <li class="submenu">
                                <a href="javascript:;">Drop Down</a>
                                <ul>
                                    <li><a href="#">Drop Down Page 1</a></li>
                                    <li><a href="#">Drop Down Page 2</a></li>
                                    <li><a href="#">Drop Down Page 3</a></li>
                                </ul>
                            </li>
                        -->
                            <li class="scroll-to-section"><a href="#menu">Menu</a></li>
                            <li class="scroll-to-section"><a href="#chefs">Chefs</a></li>
                            <li class="submenu">
                                <a href="javascript:;">Features</a>
                                <ul>
                                    <li><a href="#">Features Page 1</a></li>
                                    <li><a href="#">Features Page 2</a></li>
                                    <li><a href="#">Features Page 3</a></li>
                                    <li><a href="#">Features Page 4</a></li>
                                </ul>
                            </li>
                            <!-- <li class=""><a rel="sponsored" href="https://templatemo.com" target="_blank">External URL</a></li> -->
                            <li class="scroll-to-section"><a href="#reservation">Contact Us</a></li>
                        </ul>
                        <a class='menu-trigger'>
                            <span>Menu</span>
                        </a>
                        <!-- ***** Menu End ***** -->
                    </nav>
                </div>
            </div>
        </div>
    </header>
    @yield('content');
       <!-- ***** Footer Start ***** -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-xs-12">
                    <div class="right-text-content">
                        <ul class="social-icons">
                            @foreach($socials as $social)
                            <li><a href="{{$social->link}}"><i class="{{$social->icon}}"></i></a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="logo">
                        <a href="{{route('index')}}"><img src="{{asset($setting->logo)}}" alt=""></a>
                    </div>
                </div>
                <div class="col-lg-4 col-xs-12">
                    <div class="left-text-content">
                        <p>{!!$setting->copyright!!}<br>
                            <span style="font-size: 120%;"><i class="fa fa-home mr-2"></i>{{$setting->adress}}</span>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- jQuery -->
    <script src="{{asset('/assets/js/jquery-2.1.0.min.js')}}"></script>

    <!-- Bootstrap -->
    <script src="{{asset('/assets/js/popper.js')}}"></script>
    <script src="{{asset('/assets/js/bootstrap.min.js')}}"></script>

    <!-- Plugins -->
    <script src="{{asset('/assets/js/owl-carousel.js')}}"></script>
    <script src="{{asset('/assets/js/accordions.js')}}"></script>
    <script src="{{asset('/assets/js/datepicker.js')}}"></script>
    <script src="{{asset('/assets/js/scrollreveal.min.js')}}"></script>
    <script src="{{asset('/assets/js/waypoints.min.js')}}"></script>
    <script src="{{asset('/assets/js/jquery.counterup.min.js')}}"></script>
    <script src="{{asset('/assets/js/imgfix.min.js')}}"></script>
    <script src="{{asset('/assets/js/slick.js')}}"></script>
    <script src="{{asset('/assets/js/lightbox.js')}}"></script>
    <script src="{{asset('/assets/js/isotope.js')}}"></script>

    <!-- Global Init -->
    <script src="{{asset('/assets/js/custom.js')}}"></script>
    <script>
        $(function() {
            var selectedClass = "";
            $("p").click(function() {
                selectedClass = $(this).attr("data-rel");
                $("#portfolio").fadeTo(50, 0.1);
                $("#portfolio div").not("." + selectedClass).fadeOut();
                setTimeout(function() {
                    $("." + selectedClass).fadeIn();
                    $("#portfolio").fadeTo(50, 1);
                }, 500);

            });
        });
    </script>
</body>

</html>