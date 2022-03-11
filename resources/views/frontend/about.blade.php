@extends('frontend.layouts.main')
@section('content')
<!--Start breadcrumb area-->     
<section class="breadcrumb-area style2" style="background-image: url(frontend/images/resources/breadcrumb-bg-style2.png);">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="inner-content clearfix">
                   
                    <div class="title">
                       <h1>About us</h1>
                    </div>
                    <div class="breadcrumb-menu">
                        <div class="home-icon">
                            <a href="index.html"><span class="icon-home"></span></a>
                        </div>
                        <ul class="clearfix">
                            <li><a href="index.html">Home</a></li>
                            <li class="active">About</li>
                        </ul>    
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--End breadcrumb area--> 
 
<!--Start about area Style1-->
<section class="about-area-style1 secpd1">
    <div class="container">
        <div class="row">
            <div class="col-xl-6 col-lg-6">
                <div class="about-style1-content">
                    <div class="sec-title-style1">
                        <div class="title">About Us</div>
                        <div class="decor"><span></span></div>
                    </div>
                    <div class="inner-content">
                        <div class="text">
                            <p>At Handy Connect, we understand the busy hectic lifestyles that many of us are having and we
                                obviously do not have much time in our hands. Regardless of the size of your home or office,
                                maintaining them can be a struggle. The tasks around your premises usually take up a lot of your
                                time. When work stress builds up, we feel a desperate need to get someone to settle the issues
                                that are popping up.</p>
                                <p>Our team respects your schedule and arrives with all the tools and equipment necessary to
                                    provide an efficient, reliable handyman service. It is our goal to keep your home and office in tip
                                    top shape so you can stay on track.
                                    </p>
                                    <p>The most common interior repair works that we provide are: plumbing, electrical, locksmith,
                                        painting, carpentry, TV bracket installations and drillings etc. Should you need us to assemble
                                        pieces of furniture together or drill holes for hanging of paintings etc, we are experienced in
                                        providing the services you need. Our highly professional handyman team seeks to deliver
                                        genuine workmanship in Singapore. </p>
                                        <p>Handy Connect offers a wide range of hassle-free handyman services. You will be happy to know
                                            that we are not only the handyman you need around your premises, we can help enhance the
                                            look and feel by offering interior design and renovation services by <a href="https://goodmaninterior.com/residential-home-renovation/" target="_blank">Goodman Interior</a> , our other
                                            company within the same Goodman’s group. </p>
                        </div>
                       
                    </div>    
                </div>   
            </div>
            <div class="col-xl-6 col-lg-6">
                <div class="video-holder-box">
                    <div class="img-holder">
                        <img src="{{url('frontend/images/resources/video-gallery.jpg')}}" alt="Awesome Image">
                    </div>    
                </div>     
            </div>
        </div> 
    </div>    
</section>
<!--End about Area Style1-->
@endsection