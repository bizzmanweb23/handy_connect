<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Handy Connect</title>

    <!-- responsive meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- For IE -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- master stylesheet -->
    <link rel="stylesheet" href="{{ url('asset/font/css/style.css') }}">
    <!-- Responsive stylesheet -->
    <link rel="stylesheet" href="{{ url('asset/font/css/responsive.css') }}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <!-- Favicon -->

    <link rel="icon" type="image/png" href="{{ url('asset/font/images/favicon/favicon-32x32.png') }}" sizes="32x32">


    <script src="https://cdnjs.cloudflare.com/ajax/libs/typed.js/2.0.8/typed.min.js"></script>

    <!-- Fixing Internet Explorer-->
    <!--[if lt IE 9]>
        <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
        <script src="js/html5shiv.js"></script>
    <![endif]-->

</head>

<body>
    <div class="boxed_wrapper">

        <div class="preloader style-two"></div>

        <!-- main header -->
        <header class="main-header style2">
            <!--Start header top style2-->
            <div class="header-top-style2">
                <div class="container">
                    <div class="outer-box clearfix">
                        <!--Top Left-->
                        <div class="top-left float-left">
                            <p><span class="icon-saw"></span>Best Handyman Service in Singapore.</p>
                        </div>
                        <!--Top Middle-->
                        <div class="top-middle float-left">
                            <p><b>Need Help?:</b> <span class="icon-phone"></span> Call: +65 6734 1229</p>
                        </div>
                        <!--Top Right-->
                        <div class="top-right float-right">
                            <div class="language-switcher">
                                <div id="polyglotLanguageSwitcher">
                                    <form action="#">
                                        <select id="polyglot-language-options">
                                            <option id="en" value="en" selected>English</option>
                                            <option id="fr" value="fr">French</option>
                                            <option id="es" value="es">Spanish</option>
                                        </select>
                                    </form>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>
            </div>
            <!--End header top style2-->
            <!--Start Header upper style2-->
            <div class="header-upper-style2">
                <div class="container-fluid clearfix">
                    <div class="outer-box clearfix">
                        <div class="header-upper-left">
                            <div class="logo">
                                <a href="{{ route('index') }}"><img src="{{ asset('asset/font/images/logo.png') }}"
                                        alt="Awesome Logo" title="" style="width: 172px; height: 80px;"></a>
                            </div>
                        </div>
                        <div class="header-upper-right clearfix">
                            <ul class="header-contact-info clearfix">
                                <li>
                                    <div class="single-item">
                                        <div class="icon">
                                            <span class="icon-maps-and-location"></span>
                                        </div>
                                        <div class="text">
                                            <p> 1 Pemimpin Drive #04-02 One Pemimpin, Singapore 576151
                                            </p>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="single-item">
                                        <div class="icon">
                                            <span class="icon-mail"></span>
                                        </div>
                                        <div class="text">
                                            <p>sales@goodmaninterior.com</p>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!--End Header Upper style2-->
            <!--Start Header Lawer-->
            <div class="header-lower">
                <div class="container">
                    <div class="outer-box clearfix">
                        <div class="header-lawer-left float-left">
                            <div class="nav-outer clearfix">
                                <!-- Main Menu -->
                                <nav class="main-menu style2 dropdown-menus2 navbar-expand-lg">
                                    <div class="navbar-header">
                                        <!-- Toggle Button -->
                                        <button type="button" class="navbar-toggle" data-toggle="collapse"
                                            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                                            aria-expanded="false" aria-label="Toggle navigation">
                                            <span class="icon-bar"></span>
                                            <span class="icon-bar"></span>
                                            <span class="icon-bar"></span>
                                        </button>
                                    </div>

                                    <div class="navbar-collapse collapse clearfix" id="navbarSupportedContent">
                                        <ul class="navigation clearfix">
                                            <li><a href="index.html">Home</a></li>
                                            <li class=""><a href="#">About Us</a>

                                            </li>
                                            <li class=""><a href="services.html">Services</a>

                                            </li>
                                            <li><a href="https://goodmaninterior.com/residential-home-renovation/"
                                                    target="_blank">Projects</a>

                                            </li>
                                            <li class=""><a href="#">News</a>

                                            </li>
                                            <li><a href="#">Contact</a>
                                                <ul>
                                                    <li><a href="#">FAQ</a></li>
                                                    <li><a href="#">Privacy Policy</a></li>
                                                    <li><a href="#">Terms & Conditions</a></li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </div>
                                </nav>
                                <!-- Main Menu End-->
                                <div class="menu-right-content-style2">
                                    <div class="outer-search-box">
                                        <div class="seach-toggle"><i class="fa fa-search"></i></div>
                                        <ul class="search-box">
                                            <li>
                                                <form method="post" action="#">
                                                    <div class="form-group">
                                                        <input type="search" name="search" placeholder="Search Here"
                                                            required>
                                                        <button type="submit"><i class="fa fa-search"></i></button>
                                                    </div>
                                                </form>
                                            </li>
                                        </ul>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="header-lawer-right float-right">
                            <div class="social-links">
                                <ul class="social-links-style1">
                                    <li>
                                        <a class="envelop" href="#"><i class="fa fa-envelope"
                                                aria-hidden="true"></i></a>
                                    </li>
                                    <li>
                                        <a class="fb" href="#"><i class="fa fa-facebook"
                                                aria-hidden="true"></i></a>
                                    </li>
                                    <li>
                                        <a class="tw" href="#"><i class="fa fa-twitter"
                                                aria-hidden="true"></i></a>
                                    </li>
                                    <li>
                                        <a class="youtube" href="#"><i class="fa fa-youtube-play"
                                                aria-hidden="true"></i></a>
                                    </li>
                                </ul>
                            </div>
                            <div class="button">
                                <a href="#"><span class="icon-login"></span>Request a Call</a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <!--End Header Lawer-->

            <!--Sticky Header-->
            <div class="sticky-header style2">
                <div class="container">
                    <div class="clearfix">
                        <!--Logo-->
                        <div class="logo float-left">
                            <a href="index.html" class="img-responsive"><img
                                    src="{{ asset('asset/font/images/logo.png') }}" alt="" title=""></a>
                        </div>
                        <!--Right Col-->
                        <div class="right-col float-right">
                            <!-- Main Menu -->
                            <nav class="main-menu style2 dropdown-menus2 navbar-expand-lg">
                                <div class="navbar-collapse collapse clearfix">
                                    <ul class="navigation clearfix">
                                        <li><a href="index.html">Home</a></li>
                                        <li class=""><a href="#">About Us</a>

                                        </li>
                                        <li class=""><a href="services.html">Services</a>

                                        </li>
                                        <li class=""><a
                                                href="https://goodmaninterior.com/residential-home-renovation/"
                                                target="_blank">Projects</a>

                                        </li>
                                        <li class=""><a href="#">News</a>

                                        </li>
                                        <li><a href="#">Contact</a>
                                            <ul>
                                                <li><a href="#">FAQ</a></li>
                                                <li><a href="#">Privacy Policy</a></li>
                                                <li><a href="#">Terms & Conditions</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                            </nav><!-- Main Menu End-->
                        </div>
                    </div>
                </div>
            </div>
            <!--End Sticky Header-->
        </header>


        @yield('content')



        <!--End Latest Project Style2 Area-->
        <footer class="footer-area mt-5">
            <div class="footer-shape-bg wow slideInRight animated" data-wow-delay="300ms" data-wow-duration="2500ms"
                style="visibility: visible; animation-duration: 2500ms; animation-delay: 300ms; animation-name: slideInRight;">
            </div>
            <div class="container">
                <div class="row">
                    <!--Start single footer widget-->
                    <div class="col-xl-3 col-lg-6 col-md-5 col-sm-12">
                        <div class="single-footer-widget marbtm50">
                            <div class="title">
                                <h3>About Company</h3>
                                <div class="decor"><span></span></div>
                            </div>
                            <div class="footer-company-info-text">
                                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ullam optio culpa, quo
                                    cupiditate ipsa accusantium maxime maiores earum. Accusantium nobis odit porro eum
                                    soluta quidem totam sit libero cupiditate aspernatur.</p>
                                <a class="btn-two" href="#">More About Company<span
                                        class="icon-arrow"></span></a>
                            </div>
                        </div>
                    </div>
                    <!--End single footer widget-->
                    <!--Start single footer widget-->
                    <div class="col-xl-3 col-lg-6 col-md-7 col-sm-12">
                        <div class="single-footer-widget useful-links-box marbtm50">
                            <div class="title">
                                <h3>Useful Links</h3>
                                <div class="decor"><span></span></div>
                            </div>
                            <div class="usefull-links">
                                <div class="row">
                                    <div class="col-xl-6 col-lg-6 col-md-6">
                                        <ul>
                                            <li><a href="#">Home</a></li>
                                            <li><a href="#">About</a></li>
                                            <li><a href="#">Services</a></li>
                                            <li><a href="#">Residential</a></li>
                                            <li><a href="#">Commercial</a></li>
                                            <li><a href="#">News</a></li>

                                        </ul>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-6">
                                        <ul>
                                            <li><a href="#">Contact us</a></li>
                                            <li><a href="#">Privacy Policy</a></li>
                                            <li><a href="#">Terms & Conditions</a></li>
                                            <li><a href="#">FAQ</a></li>

                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--End single footer widget-->
                    <!--Start single footer widget-->
                    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12">
                        <div class="single-footer-widget pdbtm50">
                            <div class="title">
                                <h3>News &amp; Updates</h3>
                                <div class="decor"><span></span></div>
                            </div>
                            <ul class="recent-news">
                                <li>
                                    <div class="img-holder">
                                        <img src="{{ asset('asset/font/images/footer/recent-news-1.jpg') }}"
                                            alt="Awesome Image">
                                        <div class="overlay-style-one bg1">
                                            <div class="box">
                                                <div class="content">
                                                    <a href="project-single.html"><span
                                                            class="icon-link1"></span></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="title-holder">
                                        <p>March 10, 2019</p>
                                        <h5><a href="#">Creating drama and<br> feeling with...</a></h5>
                                    </div>
                                </li>
                                <li>
                                    <div class="img-holder">
                                        <img src="{{ asset('asset/font/images/footer/recent-news-2.jpg') }}"
                                            alt="Awesome Image">
                                        <div class="overlay-style-one bg1">
                                            <div class="box">
                                                <div class="content">
                                                    <a href="project-single.html"><span
                                                            class="icon-link1"></span></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="title-holder">
                                        <p>March 02, 2019</p>
                                        <h5><a href="#">Wondering if interior<br> design is dying...</a></h5>
                                    </div>
                                </li>


                            </ul>
                        </div>
                    </div>
                    <!--End single footer widget-->
                    <!--Start single footer widget-->
                    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12">
                        <div class="single-footer-widget">
                            <div class="title">
                                <h3>Newsletter</h3>
                                <div class="decor"><span></span></div>
                            </div>
                            <div class="subscribe-box">
                                <div class="text">
                                    <p><span>*</span>Subscribe us &amp; get latest updates.</p>
                                </div>
                                <form class="subscribe-form" action="#">
                                    <input type="email" name="email" placeholder="Your Email">
                                    <button type="submit">Subscribe<span class="flaticon-next"></span></button>
                                </form>
                                <div class="footer-social-links">
                                    <ul class="social-links-style1">
                                        <li>
                                            <a class="envelop" href="#"><i class="fa fa-envelope"
                                                    aria-hidden="true"></i></a>
                                        </li>
                                        <li>
                                            <a class="fb" href="#"><i class="fa fa-facebook"
                                                    aria-hidden="true"></i></a>
                                        </li>
                                        <li>
                                            <a class="tw" href="#"><i class="fa fa-twitter"
                                                    aria-hidden="true"></i></a>
                                        </li>
                                        <li>
                                            <a class="youtube" href="#"><i class="fa fa-youtube-play"
                                                    aria-hidden="true"></i></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--End single footer widget-->
                </div>
            </div>
        </footer>


        <!--Start footer bottom area-->
        <section class="footer-bottom-area-style2">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                        <div class="footer-bottom-content-style2">
                            <div class="copyright-text-style2">
                                <p>COPYRIGHTS © 2021 ALL RIGHTS RESERVED BY CSS OFFICE PTE LTD</p>
                            </div>
                            <div class="footer-menu-style1">
                                <ul>
                                    <li><a href="#">Terms &amp; Condition</a></li>
                                    <li><a href="#">Private Policy</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--End footer bottom area-->




    </div>
    <script>
        new Typed('#typed', {
            strings: ['Service', 'Asistance', 'Facility'],
            typeSpeed: 80,
            delaySpeed: 90,
            loop: true
        });
    </script>

    <!-- Scroll Top Button -->
    <button class="scroll-top style2 scroll-to-target" data-target="html">
        <span>Top</span>
    </button>


    <script src="{{ asset('asset/font/js/jquery.js') }}"></script>
    <script src="{{ asset('asset/font/js/appear.js') }}"></script>
    <script src="{{ asset('asset/font/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('asset/font/js/bootstrap-select.min.js') }}"></script>
    <script src="{{ asset('asset/font/js/isotope.js') }}"></script>
    <script src="{{ asset('asset/font/js/jquery.bootstrap-touchspin.js') }}"></script>
    <script src="{{ asset('asset/font/js/jquery.countTo.js') }}"></script>
    <script src="{{ asset('asset/font/js/jquery.easing.min.js') }}"></script>
    <script src="{{ asset('asset/font/js/jquery.enllax.min.js') }}"></script>
    <script src="{{ asset('asset/font/js/jquery.fancybox.js') }}"></script>
    <script src="{{ asset('asset/font/js/jquery.mixitup.min.js') }}"></script>
    <script src="{{ asset('asset/font/js/jquery.paroller.min.js') }}"></script>
    <script src="{{ asset('asset/font/js/owl.js') }}"></script>
    <script src="{{ asset('asset/font/js/validation.js') }}"></script>
    <script src="{{ asset('asset/font/js/wow.js') }}"></script>
    <script src="{{ asset('asset/font/js/jquery.mCustomScrollbar.concat.min.js') }}"></script>
    <script src="{{ asset('asset/font/js/slick.js') }}"></script>
    <script src="{{ asset('asset/font/language-switcher/jquery.polyglot.language.switcher.js') }}"></script>
    <script src="{{ asset('asset/font/timepicker/timePicker.js') }}"></script>
    <script src="{{ asset('asset/font/html5lightbox/html5lightbox.js') }}"></script>

    <!--Revolution Slider-->
    <script src="{{ asset('asset/font/plugins/revolution/js/jquery.themepunch.revolution.min.js') }}"></script>
    <script src="{{ asset('asset/font/plugins/revolution/js/jquery.themepunch.tools.min.js') }}"></script>
    <script src="{{ asset('asset/font/plugins/revolution/js/extensions/revolution.extension.actions.min.js') }}">
    </script>
    <script src="{{ asset('asset/font/plugins/revolution/js/extensions/revolution.extension.carousel.min.js') }}">
    </script>
    <script src="{{ asset('asset/font/plugins/revolution/js/extensions/revolution.extension.kenburn.min.js') }}">
    </script>
    <script src="{{ asset('asset/font/plugins/revolution/js/extensions/revolution.extension.layeranimation.min.js') }}">
    </script>
    <script src="{{ asset('asset/font/plugins/revolution/js/extensions/revolution.extension.migration.min.js') }}">
    </script>
    <script src="{{ asset('asset/font/plugins/revolution/js/extensions/revolution.extension.navigation.min.js') }}">
    </script>
    <script src="{{ asset('asset/font/plugins/revolution/js/extensions/revolution.extension.parallax.min.js') }}">
    </script>
    <script src="{{ asset('asset/font/plugins/revolution/js/extensions/revolution.extension.slideanims.min.js') }}">
    </script>
    <script src="{{ asset('asset/font/plugins/revolution/js/extensions/revolution.extension.video.min.js') }}"></script>
    <script src="{{ asset('asset/font/js/main-slider-script.js') }}"></script>

    <!-- thm custom script -->
    <script src="{{ asset('asset/font/js/custom.js') }}"></script>


    @yield('javascript')


</body>

</html>
