@extends('frontend.layouts.main')
@section('content')

<!--Start breadcrumb area-->     
<section class="breadcrumb-area style2" style="background-image: url(frontend/images/resources/breadcrumb-bg-style2.png);">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="inner-content clearfix">
                    
                    <div class="title">
                       <h1>Our Services</h1>
                    </div>
                    <div class="breadcrumb-menu">
                        <div class="home-icon">
                            <a href="index.html"><span class="icon-home"></span></a>
                        </div>
                        <ul class="clearfix">
                            <li class="active">Services</li>
                        </ul>    
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--End breadcrumb area-->


<section class="site-service mt-5 pt-5 mb-5">
    <div class="container">
        <div class="sec-title-style2 text-center">
            <span>Our Services</span>
            <div class="title">What We Do For You</div>
            <div class="decor center"><span></span></div> 
        </div>
        <div class="row">
            @foreach($services as $rows)
            <div class="col-md-3">
                <div class="service-main"> 
                    <a href="http://handyconnectfrontend.testbizzm.com/services.html">
                    <img src="{{ url('/').'/'.$rows->service_image }}" alt="" class="h-25">

                    <p>{{ $rows->service_name }}</p>
                    </a>    
                    
                   
                </div>
            </div>
            @endforeach
         </div>   
</section> 


<footer class="footer-area mt-5">
    <div class="footer-shape-bg wow slideInRight animated" data-wow-delay="300ms" data-wow-duration="2500ms" style="visibility: visible; animation-duration: 2500ms; animation-delay: 300ms; animation-name: slideInRight;"></div>
    <div class="container">
        <div class="row">
            <!--Start single footer widget-->
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12">
                <div class="single-footer-widget-style3 marbtm-50">
                    <div class="footer-logo">
                        <a href="index.html"><img src="images/goodman-interior-logo.png" alt="Footer Logo"></a>    
                    </div>
                    
                    <div class="footer-social-links">
                        <ul class="social-links-style2">
                            
                            <li>
                                <a class="fb" href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a> 
                            </li>
                            <li>
                                <a class="tw" href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a> 
                            </li>
                            <li>
                                <a class="envelop" href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a> 
                            </li>
                            <li>
                                <a class="envelop" href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a> 
                            </li>
                            <li>
                                <a class="youtube" href="#"><i class="fa fa-youtube-play" aria-hidden="true"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!--End single footer widget-->

            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12">
                <div class="single-footer-widget useful-links-box marbtm50">
                    <div class="title">
                        <h3>Goodman Interior</h3>
                        <div class="decor"><span></span></div>
                    </div>
                    <ul class="contact-details">
                        <li>
                            <h5 style="color: #b49f64;">Address</h5>
                            <p> 1 Pemimpin Drive #04-01/02 One Pemimpin S’pore 576151
                            </p>
                        </li>
                        <li>
                            <h5 style="color: #b49f64;">Phone</h5>
                           <p>+65 9738 8330 / +65 6734 1229</p>
                        </li>
                        <li>
                            <h5 style="color: #b49f64;">Email</h5>
                            <p>sales@goodmaninterior.com</p>
                        </li>      
                    </ul>
                </div>
            </div>
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
                                    <li><a href="#">About us</a></li>
                                    <li><a href="#">Service</a></li>
                                    <li><a href="#">Projects</a></li>
                                    <li><a href="#">News</a></li>
                                    <li><a href="#">Contact us</a></li>
                                    
                                </ul>    
                            </div>
                           
                        </div>
                    </div>
                </div>
            </div>
            <!--End single footer widget-->
            
            <!--Start single footer widget-->
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12">
                <div class="single-footer-widget">
                    <div class="title">
                        <h3>Get a Quote</h3>
                        <div class="decor"><span></span></div>
                    </div>
                    <div class="subscribe-box">
                       
                        <form class="subscribe-form" action="#">
                            <input type="text" name="name" placeholder="Your Name" class="form-control">
                            <input type="email" name="email" placeholder="Your Email" class="form-control mt-2">
                            <input type="text" name="mobile" placeholder="Your Number" class="form-control mt-2 mb-2">
                            <textarea name="" id="" cols="30" rows="10" style="height: 100px;" class="form-control" placeholder="Enter your message"></textarea>
                            <input type="file" class="mt-3" placeholder="choose file">
                            <button type="submit">SUBMIT<span class="flaticon-next"></span></button>
                        </form>
                        
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
    new Typed('#typed',{
    strings : ['Service', 'Services'],
    typeSpeed : 180,
    delaySpeed : 190,
    loop : true
  });
</script>

<!-- Scroll Top Button -->
<button class="scroll-top style2 scroll-to-target" data-target="html">
    <span>Top</span>
</button>

@endsection