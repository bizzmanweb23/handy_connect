@extends('frontend.layouts.main')
@section('content')
    <!--Main Slider-->
    <section class="main-slider style2">
        <div class="rev_slider_wrapper fullwidthbanner-container" id="rev_slider_one_wrapper" data-source="gallery">
            <div class="rev_slider fullwidthabanner" id="rev_slider_two" data-version="5.4.1">
                <ul>
                    <li data-description="Slide Description" data-easein="default" data-easeout="default"
                        data-fsmasterspeed="1500" data-fsslotamount="7" data-fstransition="fade" data-hideafterloop="0"
                        data-hideslideonmobile="off" data-index="rs-1689" data-masterspeed="default" data-param1=""
                        data-param10="" data-param2="" data-param3="" data-param4="" data-param5="" data-param6=""
                        data-param7="" data-param8="" data-param9="" data-rotate="0" data-saveperformance="off"
                        data-slotamount="default" data-thumb="{{ asset('asset/font/images/slides/v2-1.jpg') }}"
                        data-title="Slide Title" data-transition="parallaxvertical">

                        <img alt="" class="rev-slidebg" data-bgfit="cover" data-bgparallax="10"
                            data-bgposition="center center" data-bgrepeat="no-repeat" data-no-retina=""
                            src="{{ asset('asset/font/images/slides/v2-1.jpg') }}">

                        <div class="tp-caption" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]"
                            data-paddingright="[0,0,0,0]" data-paddingtop="[0,0,0,0]" data-responsive_offset="on"
                            data-type="text" data-height="none" data-width="['1000','800','800','500']"
                            data-whitespace="normal" data-hoffset="['15','15','15','15']"
                            data-voffset="['-180','-150','-120','-125']" data-x="['center','center','center','center']"
                            data-y="['middle','middle','middle','middle']" data-textalign="['top','top','top','top']"
                            data-frames='[{"from":"y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;","mask":"x:0px;y:0px;s:inherit;e:inherit;","speed":1500,"to":"o:1;","delay":1000,"ease":"Power3.easeInOut"},{"delay":"wait","speed":1000,"to":"auto:auto;","mask":"x:0;y:0;s:inherit;e:inherit;","ease":"Power3.easeInOut"}]'
                            style="z-index: 7; white-space: nowrap;">
                            <div class="slide-content text-center">
                                <div class="title">A Smarter Way For Home Repairs</div>
                            </div>
                        </div>
                        <div class="tp-caption" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]"
                            data-paddingright="[0,0,0,0]" data-paddingtop="[0,0,0,0]" data-responsive_offset="on"
                            data-type="text" data-height="none" data-width="['1000','800','800','400']"
                            data-whitespace="normal" data-hoffset="['15','15','15','15']"
                            data-voffset="['-40','-30','-25','-35']" data-x="['center','center','center','center']"
                            data-y="['middle','middle','middle','middle']" data-textalign="['top','top','top','top']"
                            data-frames='[{"from":"y:[-100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;","mask":"x:0px;y:0px;s:inherit;e:inherit;","speed":1500,"to":"o:1;","delay":1500,"ease":"Power3.easeInOut"},
                {"delay":"wait","speed":1000,"to":"auto:auto;","mask":"x:0;y:0;s:inherit;e:inherit;","ease":"Power3.easeInOut"}]'
                            style="z-index: 7; white-space: nowrap;">
                            <div class="slide-content text-center">
                                <div class="big-title">
                                    Welcome To Handy Connect
                                </div>
                            </div>
                        </div>
                        <div class="tp-caption" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]"
                            data-paddingright="[0,0,0,0]" data-paddingtop="[0,0,0,0]" data-responsive_offset="on"
                            data-type="text" data-height="none" data-width="['800','800','800','400']"
                            data-whitespace="normal" data-hoffset="['15','15','15','15']"
                            data-voffset="['85','70','50','45']" data-x="['center','center','center','center']"
                            data-y="['middle','middle','middle','middle']" data-textalign="['top','top','top','top']"
                            data-frames='[{"from":"y:[-100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;","mask":"x:0px;y:0px;s:inherit;e:inherit;","speed":1500,"to":"o:1;","delay":1500,"ease":"Power3.easeInOut"},
                {"delay":"wait","speed":1000,"to":"auto:auto;","mask":"x:0;y:0;s:inherit;e:inherit;","ease":"Power3.easeInOut"}]'
                            style="z-index: 7; white-space: nowrap;">
                            <div class="slide-content text-center">
                                <div class="text">If you are looking to save time and
ensure a job is carried out correctly,
professional assistance can make all
the difference.</div>
                            </div>
                        </div>
                        <div class="tp-caption" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]"
                            data-paddingright="[0,0,0,0]" data-paddingtop="[0,0,0,0]" data-responsive_offset="on"
                            data-type="text" data-height="none" data-width="['800','800','800','500']"
                            data-whitespace="normal" data-hoffset="['15','15','15','15']"
                            data-voffset="['170','155','120','125']" data-x="['center','center','center','center']"
                            data-y="['middle','middle','middle','middle']" data-textalign="['top','top','top','top']"
                            data-frames='[{"from":"y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;","mask":"x:0px;y:0px;s:inherit;e:inherit;","speed":1500,"to":"o:1;","delay":1500,"ease":"Power3.easeInOut"},{"delay":"wait","speed":1000,"to":"auto:auto;","mask":"x:0;y:0;s:inherit;e:inherit;","ease":"Power3.easeInOut"}]'
                            style="z-index: 7; white-space: nowrap;">
                            <div class="slide-content text-center">
                                <div class="btn-box">
                                    <a class="btn-one" href="#">About Company</a>
                                </div>
                            </div>
                        </div>

                    </li>

                    <li data-description="Slide Description" data-easein="default" data-easeout="default"
                        data-fsmasterspeed="1500" data-fsslotamount="7" data-fstransition="fade" data-hideafterloop="0"
                        data-hideslideonmobile="off" data-index="rs-1687" data-masterspeed="default" data-param1=""
                        data-param10="" data-param2="" data-param3="" data-param4="" data-param5="" data-param6=""
                        data-param7="" data-param8="" data-param9="" data-rotate="0" data-saveperformance="off"
                        data-slotamount="default" data-thumb="{{ asset('asset/font/images/slides/v2-2.jpg') }}"
                        data-title="Slide Title" data-transition="parallaxvertical">

                        <img alt="" class="rev-slidebg" data-bgfit="cover" data-bgparallax="10"
                            data-bgposition="center center" data-bgrepeat="no-repeat" data-no-retina=""
                            src="{{ asset('asset/font/images/slides/v2-2.jpg') }}">

                        <div class="tp-caption" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]"
                            data-paddingright="[0,0,0,0]" data-paddingtop="[0,0,0,0]" data-responsive_offset="on"
                            data-type="text" data-height="none" data-width="['1000','800','800','500']"
                            data-whitespace="normal" data-hoffset="['15','15','15','15']"
                            data-voffset="['-180','-150','-120','-125']" data-x="['center','center','center','center']"
                            data-y="['middle','middle','middle','middle']" data-textalign="['top','top','top','top']"
                            data-frames='[{"from":"y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;","mask":"x:0px;y:0px;s:inherit;e:inherit;","speed":1500,"to":"o:1;","delay":1000,"ease":"Power3.easeInOut"},{"delay":"wait","speed":1000,"to":"auto:auto;","mask":"x:0;y:0;s:inherit;e:inherit;","ease":"Power3.easeInOut"}]'
                            style="z-index: 7; white-space: nowrap;">
                            <div class="slide-content text-center">
                                <div class="title">A Smarter Way For Home Repairs</div>
                            </div>
                        </div>
                        <div class="tp-caption" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]"
                            data-paddingright="[0,0,0,0]" data-paddingtop="[0,0,0,0]" data-responsive_offset="on"
                            data-type="text" data-height="none" data-width="['1000','800','800','400']"
                            data-whitespace="normal" data-hoffset="['15','15','15','15']"
                            data-voffset="['-40','-30','-25','-35']" data-x="['center','center','center','center']"
                            data-y="['middle','middle','middle','middle']" data-textalign="['top','top','top','top']"
                            data-frames='[{"from":"y:[-100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;","mask":"x:0px;y:0px;s:inherit;e:inherit;","speed":1500,"to":"o:1;","delay":1500,"ease":"Power3.easeInOut"},
                {"delay":"wait","speed":1000,"to":"auto:auto;","mask":"x:0;y:0;s:inherit;e:inherit;","ease":"Power3.easeInOut"}]'
                            style="z-index: 7; white-space: nowrap;">
                            <div class="slide-content text-center">
                                <div class="big-title">
                                   MORE THAN 10 YEARS OF EXPERIENCE
                                </div>
                            </div>
                        </div>
                        <div class="tp-caption" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]"
                            data-paddingright="[0,0,0,0]" data-paddingtop="[0,0,0,0]" data-responsive_offset="on"
                            data-type="text" data-height="none" data-width="['800','800','800','400']"
                            data-whitespace="normal" data-hoffset="['15','15','15','15']"
                            data-voffset="['85','70','50','45']" data-x="['center','center','center','center']"
                            data-y="['middle','middle','middle','middle']" data-textalign="['top','top','top','top']"
                            data-frames='[{"from":"y:[-100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;","mask":"x:0px;y:0px;s:inherit;e:inherit;","speed":1500,"to":"o:1;","delay":1500,"ease":"Power3.easeInOut"},
                {"delay":"wait","speed":1000,"to":"auto:auto;","mask":"x:0;y:0;s:inherit;e:inherit;","ease":"Power3.easeInOut"}]'
                            style="z-index: 7; white-space: nowrap;">
                            <div class="slide-content text-center">
                                <div class="text">Our team of professional
handyman, technicians and</div>
                            </div>
                        </div>
                        <div class="tp-caption" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]"
                            data-paddingright="[0,0,0,0]" data-paddingtop="[0,0,0,0]" data-responsive_offset="on"
                            data-type="text" data-height="none" data-width="['800','800','800','500']"
                            data-whitespace="normal" data-hoffset="['15','15','15','15']"
                            data-voffset="['170','155','120','125']" data-x="['center','center','center','center']"
                            data-y="['middle','middle','middle','middle']" data-textalign="['top','top','top','top']"
                            data-frames='[{"from":"y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;","mask":"x:0px;y:0px;s:inherit;e:inherit;","speed":1500,"to":"o:1;","delay":1500,"ease":"Power3.easeInOut"},{"delay":"wait","speed":1000,"to":"auto:auto;","mask":"x:0;y:0;s:inherit;e:inherit;","ease":"Power3.easeInOut"}]'
                            style="z-index: 7; white-space: nowrap;">
                            <div class="slide-content text-center">
                                <div class="btn-box">
                                    <a class="btn-one" href="#">Our Services</a>
                                </div>
                            </div>
                        </div>

                    </li>

                    <li data-description="Slide Description" data-easein="default" data-easeout="default"
                        data-fsmasterspeed="1500" data-fsslotamount="7" data-fstransition="fade" data-hideafterloop="0"
                        data-hideslideonmobile="off" data-index="rs-1688" data-masterspeed="default" data-param1=""
                        data-param10="" data-param2="" data-param3="" data-param4="" data-param5="" data-param6=""
                        data-param7="" data-param8="" data-param9="" data-rotate="0" data-saveperformance="off"
                        data-slotamount="default" data-thumb="{{ asset('asset/font/images/slides/v2-3.jpg') }}"
                        data-title="Slide Title" data-transition="parallaxvertical">
                        <img alt="" class="rev-slidebg" data-bgfit="cover" data-bgparallax="10"
                            data-bgposition="center center" data-bgrepeat="no-repeat" data-no-retina=""
                            src="{{ asset('asset/font/images/slides/v2-3.jpg') }}">

                        <div class="tp-caption" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]"
                            data-paddingright="[0,0,0,0]" data-paddingtop="[0,0,0,0]" data-responsive_offset="on"
                            data-type="text" data-height="none" data-width="['1000','800','800','500']"
                            data-whitespace="normal" data-hoffset="['15','15','15','15']"
                            data-voffset="['-180','-150','-120','-125']" data-x="['center','center','center','center']"
                            data-y="['middle','middle','middle','middle']" data-textalign="['top','top','top','top']"
                            data-frames='[{"from":"y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;","mask":"x:0px;y:0px;s:inherit;e:inherit;","speed":1500,"to":"o:1;","delay":1000,"ease":"Power3.easeInOut"},{"delay":"wait","speed":1000,"to":"auto:auto;","mask":"x:0;y:0;s:inherit;e:inherit;","ease":"Power3.easeInOut"}]'
                            style="z-index: 7; white-space: nowrap;">
                            <div class="slide-content text-center">
                                <div class="title"> Welcome To Handy Connect</div>
                            </div>
                        </div>
                        <div class="tp-caption" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]"
                            data-paddingright="[0,0,0,0]" data-paddingtop="[0,0,0,0]" data-responsive_offset="on"
                            data-type="text" data-height="none" data-width="['1200','1100','1000','400']"
                            data-whitespace="normal" data-hoffset="['15','15','15','15']"
                            data-voffset="['-40','-30','-25','-35']" data-x="['center','center','center','center']"
                            data-y="['middle','middle','middle','middle']" data-textalign="['top','top','top','top']"
                            data-frames='[{"from":"y:[-100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;","mask":"x:0px;y:0px;s:inherit;e:inherit;","speed":1500,"to":"o:1;","delay":1500,"ease":"Power3.easeInOut"},
                {"delay":"wait","speed":1000,"to":"auto:auto;","mask":"x:0;y:0;s:inherit;e:inherit;","ease":"Power3.easeInOut"}]'
                            style="z-index: 7; white-space: nowrap;">
                            <div class="slide-content text-center">
                                <div class="big-title">
                                    Welcome To Handy Connect
                                </div>
                            </div>
                        </div>
                        <div class="tp-caption" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]"
                            data-paddingright="[0,0,0,0]" data-paddingtop="[0,0,0,0]" data-responsive_offset="on"
                            data-type="text" data-height="none" data-width="['800','800','800','400']"
                            data-whitespace="normal" data-hoffset="['15','15','15','15']"
                            data-voffset="['85','70','50','45']" data-x="['center','center','center','center']"
                            data-y="['middle','middle','middle','middle']" data-textalign="['top','top','top','top']"
                            data-frames='[{"from":"y:[-100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;","mask":"x:0px;y:0px;s:inherit;e:inherit;","speed":1500,"to":"o:1;","delay":1500,"ease":"Power3.easeInOut"},
                {"delay":"wait","speed":1000,"to":"auto:auto;","mask":"x:0;y:0;s:inherit;e:inherit;","ease":"Power3.easeInOut"}]'
                            style="z-index: 7; white-space: nowrap;">
                            <div class="slide-content text-center">
                                <div class="text">Lorem ipsum, dolor sit amet consectetur adipisicing
                                    elit. Voluptatum incidunt tempora vero veniam magnam at minus. Amet explicabo
                                    laboriosam libero accusamus corrupti beatae repellat in, harum enim, quas alias
                                    unde?</div>
                            </div>
                        </div>
                        <div class="tp-caption" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]"
                            data-paddingright="[0,0,0,0]" data-paddingtop="[0,0,0,0]" data-responsive_offset="on"
                            data-type="text" data-height="none" data-width="['800','800','800','500']"
                            data-whitespace="normal" data-hoffset="['15','15','15','15']"
                            data-voffset="['170','155','120','125']" data-x="['center','center','center','center']"
                            data-y="['middle','middle','middle','middle']" data-textalign="['top','top','top','top']"
                            data-frames='[{"from":"y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;","mask":"x:0px;y:0px;s:inherit;e:inherit;","speed":1500,"to":"o:1;","delay":1500,"ease":"Power3.easeInOut"},{"delay":"wait","speed":1000,"to":"auto:auto;","mask":"x:0;y:0;s:inherit;e:inherit;","ease":"Power3.easeInOut"}]'
                            style="z-index: 7; white-space: nowrap;">
                            <div class="slide-content text-center">
                                <div class="btn-box">
                                    <a class="btn-one" href="#">Our Services</a>
                                </div>
                            </div>
                        </div>

                    </li>

                </ul>
            </div>
        </div>
    </section>
    <!--End Main Slider-->

    <section class="booking-call-area">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="booking-call">
                        <div class="title-box pull-left">
                            <div class="icon">
                                <span class="flaticon-labor"></span>
                            </div>
                            <div class="title">
                                <h3>Book Your Call &amp; Fix Your Problem</h3>
                                <span>Get call back your affordable time.</span>
                            </div>
                        </div>
                        <div class="booking-call-form pull-right">
                            <form class="clearfix" method="post" action="#">
                                <input type="text" name="number" placeholder="Your Mob Num..." required="">
                                <button type="submit">Book Now</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="container mt-5 pt-5">

        <div class="row">
            <!--Start single service style3-->
            <div class="col-xl-4 col-lg-4">
                <div class="single-service-style3">
                    <div class="img-holder" style="height: 220px;">
                        <img src="{{ asset('asset/font/images/services/ser-style3-1.jpg') }}" alt="Awesome Image">
                        <div class="icon-holder">
                            <span class="icon-idea"></span>
                        </div>
                        <div class="overlay-text">
                            <h3>CONSISTENCY</h3>
                            <p>At HandyConnect, we are not
                                satisfied unless the quality of our
                                services exceeds that of our
                                competitors. Always looking for
                                ways to improve service
                                experience, we take pride in
                                everything we do. To us, every
                                project, job or home is important. 
                            </p>
                        </div>
                        <div class="overlay">
                            <div class="box">
                                <div class="title">
                                    <h3>CONSISTENCY</h3>
                                    <p>At HandyConnect, we are not
                                        satisfied unless the quality of our
                                        services exceeds that of our
                                        competitors. Always looking for
                                        ways to improve service
                                        experience, we take pride in
                                        everything we do. To us, every
                                        project, job or home is important.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="readmore-button">
                            <a class="btn-three" href="#">Read More</a>
                        </div>
                    </div>
                </div>
            </div>
            <!--End single service style3-->
            <!--Start single service style3-->
            <div class="col-xl-4 col-lg-4">
                <div class="single-service-style3">
                    <div class="img-holder">
                        <img src="{{ asset('asset/font/images/interior.png') }}" alt="Awesome Image">
                        <div class="icon-holder">
                            <span class="icon-wire"></span>
                        </div>
                        <div class="overlay-text">
                            <h3>CONSISTENCY</h3>
                            <p>HandyConnect treats our
                                employees like our
                                customers ensuring they are
                                always motivated and
                                happy. Only happy
                                employees deliver
                                exceptional service.
                            </p>
                        </div>
                        <div class="overlay">
                            <div class="box">
                                <div class="title">
                                    <h3>CONSISTENCY</h3>
                                    <p>HandyConnect treats our
                                        employees like our
                                        customers ensuring they are
                                        always motivated and
                                        happy. Only happy
                                        employees deliver
                                        exceptional service.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="readmore-button">
                            <a class="btn-three" href="#">Read More</a>
                        </div>
                    </div>
                </div>
            </div>
            <!--End single service style3-->
            <!--Start single service style3-->
            <div class="col-xl-4 col-lg-4">
                <div class="single-service-style3">
                    <div class="img-holder">
                        <img src="{{ asset('asset/font/images/handy-good-man.png') }}" alt="Awesome Image">
                        <div class="icon-holder">
                            <span class="icon-repair"></span>
                        </div>
                        <div class="overlay-text">
                            <h3>CONSISTENCY</h3>
                            <p>Our handyman, customer support
                                team and management team
                                believe in delivering the Best
                                Customer Practices to ensure your
                                total satisfaction. 
                            </p>
                        </div>
                        <div class="overlay">
                            <div class="box">
                                <div class="title">
                                    <h3>CONSISTENCY</h3>
                                    <p>Our handyman, customer support
                                        team and management team
                                        believe in delivering the Best
                                        Customer Practices to ensure your
                                        total satisfaction. 
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="readmore-button">
                            <a class="btn-three" href="#">Read More</a>
                        </div>
                    </div>
                </div>
            </div>
            <!--End single service style3-->
        </div>
    </div>

    <!--Start about area Style2-->
    <section class="about-area-style2">
        <div class="pattern-layer paroller" data-paroller-factor="0.10" data-paroller-factor-lg="0.10"
            data-paroller-factor-md="0.10" data-paroller-factor-sm="0.10" data-paroller-type="foreground"
            data-paroller-direction="horizontal"
            style="background-image:url({{ asset('asset/font/images/pattern/about-area-style2-bg.jpg') }})">
        </div>
        <div class="container">
            <div class="row">
                <div class="col-xl-12 col-lg-12">
                    <div class="about-content-style2">
                        <div class="year-box">
                            <span class="icon-worker"></span>
                            <p>ESTD 2018</p>
                        </div>
                        <div class="inner-content">
                            <h2>A Growing Company that Makes a Difference</h2>
                            <div class="title">The idea of HandyConnect was developed by our parent company,
Goodman Interior. While Goodman Interior’s main business is in interior
design and renovation, we have a lot of homeowners who after
renovating their homes, often contact Goodman Interior for minor
home repairs works. Being in the home renovation business, we
understand the frustration of homeowners in finding a reliable and
respectable handyman. It is with this recognition of the market's needs
coupled with our unyielding passion and vision to make home repairs as
painless and hassle-free as possible, that HandyConnect was finally
established. </p>
                                <div class="border-box"></div>
                                <div class="authorised-person">
                                    <h3>Owner name goes here</h3>
                                    <span>Chaiman & Founder of HandyConnect</span>
                                </div>
                                <div class="button">
                                    <a class="left" href="#">More About Us</a>
                                    <a class="right" href="#">DROP US A MESSAGE</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>
    <!--End about Area Style2-->



    <section class="site-service mt-5 pt-5 mb-5 pb-5">
        <div class="container">
            <div>
                <h1>Our <span id="typed">Services</span><span class="typed-cursor">|</span></h1>
                <p>Below are some common handyman services we provide for your homes and offices in
Singapore.</p>
            </div>

            <div class="row mb-5 mt-5">
                <div class="col-md-2 col-xs-6 wow flipInX" data-wow-duration="2s" data-wow-delay="0.1s"
                    style="visibility: visible; animation-duration: 2s; animation-delay: 0.1s; animation-name: flipInX;">
                    <div class="service-icon">
                        <a href="#"><img src="{{ asset('asset/font/images/good-man-icon/basin 2.png') }}" alt=""
                                class="img-fluid">
                            <p>Basin</p>
                        </a>
                    </div>
                </div>
                <div class="col-md-2 col-xs-6 wow flipInX" data-wow-duration="2s" data-wow-delay="0.3s"
                    style="visibility: visible; animation-duration: 2s; animation-delay: 0.3s; animation-name: flipInX;">
                    <div class="service-icon">
                        <a href="#"><img src="{{ asset('asset/font/images/good-man-icon/door lock open.png') }}" alt=""
                                class="img-fluid">
                            <p>Door</p>
                        </a>
                    </div>
                </div>
                <div class="col-md-2 col-xs-6 wow flipInX" data-wow-duration="2s" data-wow-delay="0.5s"
                    style="visibility: visible; animation-duration: 2s; animation-delay: 0.5s; animation-name: flipInX;">
                    <div class="service-icon">
                        <a href="#"> <img src="{{ asset('asset/font/images/good-man-icon/hang mirror.png') }}" alt=""
                                class="img-fluid">
                            <p>Hang Mirror</p>
                        </a>
                    </div>
                </div>
                <div class="col-md-2 col-xs-6 wow flipInX" data-wow-duration="2s" data-wow-delay="0.7s"
                    style="visibility: visible; animation-duration: 2s; animation-delay: 0.7s; animation-name: flipInX;">
                    <div class="service-icon">
                        <a href="#"> <img src="{{ asset('asset/font/images/good-man-icon/gatelock.png') }}" alt=""
                                class="img-fluid">
                            <p>Gatelock</p>
                        </a>
                    </div>
                </div>
                <div class="col-md-2 col-xs-6 wow flipInX" data-wow-duration="2s" data-wow-delay="0.9s"
                    style="visibility: visible; animation-duration: 2s; animation-delay: 0.9s; animation-name: flipInX;">
                    <div class="service-icon">
                        <a href="#"> <img src="{{ asset('asset/font/images/good-man-icon/pull bar icon.png') }}" alt=""
                                class="img-fluid">
                            <p>Pull Bar</p>
                        </a>
                    </div>
                </div>
                <div class="col-md-2 col-xs-6 wow flipInX" data-wow-duration="2s" data-wow-delay="1s"
                    style="visibility: visible; animation-duration: 2s; animation-delay: 1s; animation-name: flipInX;">
                    <div class="service-icon">
                        <a href="#"> <img src="{{ asset('asset/font/images/good-man-icon/Shelf Assembly.png') }}" alt=""
                                class="img-fluid">
                            <p>Shelf Assembly</p>
                        </a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-2 col-xs-6 wow flipInX" data-wow-duration="2s" data-wow-delay="1.1s"
                    style="visibility: visible; animation-duration: 2s; animation-delay: 1.1s; animation-name: flipInX;">
                    <div class="service-icon">
                        <a href="#"> <img src="{{ asset('asset/font/images/good-man-icon/Toilet bowl set.png') }}" alt=""
                                class="img-fluid">
                            <p>Toilet Bowl Set</p>
                        </a>
                    </div>
                </div>
                <div class="col-md-2 col-xs-6 wow flipInX" data-wow-duration="2s" data-wow-delay="1.3s"
                    style="visibility: visible; animation-duration: 2s; animation-delay: 1.3s; animation-name: flipInX;">
                    <div class="service-icon">
                        <a href="#"> <img src="{{ asset('asset/font/images/good-man-icon/kitchen sinkonise.png') }}"
                                alt="" class="img-fluid">
                            <p>Kitchen Sinknoise</p>
                        </a>
                    </div>
                </div>
                <div class="col-md-2 col-xs-6 wow flipInX" data-wow-duration="2s" data-wow-delay="1.5s"
                    style="visibility: visible; animation-duration: 2s; animation-delay: 1.5s; animation-name: flipInX;">
                    <div class="service-icon">
                        <a href="#"> <img src="{{ asset('asset/font/images/good-man-icon/wall mountain.png') }}" alt=""
                                class="img-fluid">
                            <p>Wall Mountain</p>
                        </a>
                    </div>
                </div>
                <div class="col-md-2 col-xs-6 wow flipInX" data-wow-duration="2s" data-wow-delay="1.7s"
                    style="visibility: visible; animation-duration: 2s; animation-delay: 1.7s; animation-name: flipInX;">
                    <div class="service-icon">
                        <a href="#"> <img src="{{ asset('asset/font/images/good-man-icon/cupboard hinge.png') }}" alt=""
                                class="img-fluid">
                            <p>Cupboard Hinge</p>
                        </a>
                    </div>
                </div>
                <div class="col-md-2 col-xs-6 wow flipInX" data-wow-duration="2s" data-wow-delay="1.9s"
                    style="visibility: visible; animation-duration: 2s; animation-delay: 1.9s; animation-name: flipInX;">
                    <div class="service-icon">
                        <a href="#"> <img src="{{ asset('asset/font/images/good-man-icon/shower.png') }}" alt=""
                                class="img-fluid">
                            <p>Shower</p>
                        </a>
                    </div>
                </div>
                <div class="col-md-2 col-xs-6 wow flipInX" data-wow-duration="2s" data-wow-delay="2s"
                    style="visibility: visible; animation-duration: 2s; animation-delay: 2s; animation-name: flipInX;">
                    <div class="service-icon">
                        <a href="#"> <img src="{{ asset('asset/font/images/good-man-icon/Kitchen Sink choke.png') }}"
                                alt="" class="img-fluid">
                            <p>Kitchen Sink Choke</p>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="choose-area mt-5 pt-5"
        style="background-image:url({{ asset('asset/font/images/parallax-background/choose-bg.jpg') }});">
        <div class="container">
            <div class="choose-image-box">
                <img src="{{ asset('asset/font/images/mobile-app.png') }}" alt="Awesome Image">
            </div>
            <div class="row">
                <div class="col-xl-6">
                    <div class="single-choose-box left">
                        <div class="icon">
                            <div class="count">03</div>
                            <span class="icon-award1"></span>
                        </div>
                        <div class="text">
                            <h3>Header Goes Here</h3>
                            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Molestiae sint voluptatem
                                quia.</p>
                            <a href="#">Read More</a>
                        </div>
                        <div class="overlay-count">03</div>
                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="choose-content">
                        <div class="sec-title-style2">
                            <span>Features &amp; Advantages</span>
                            <div class="title clr-white">Reason For Choosing Us</div>
                            <div class="decor"><span></span></div>
                            <div class="text">
                                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Molestiae sint
                                    voluptatem quia.</p>
                            </div>
                        </div>
                        <div class="inner-content">
                            <!--Start Single Choose Box-->
                            <div class="single-choose-box">
                                <div class="icon">
                                    <div class="count">01</div>
                                    <span class="icon-builder"></span>
                                </div>
                                <div class="text">
                                    <h3>Header Goes Here</h3>
                                    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Molestiae sint
                                        voluptatem quia.</p>
                                    <a href="#">Read More</a>
                                </div>
                                <div class="overlay-count">01</div>
                            </div>
                            <!--End Single Choose Box-->
                            <!--Start Single Choose Box-->
                            <div class="single-choose-box">
                                <div class="icon">
                                    <div class="count">02</div>
                                    <span class="icon-cost"></span>
                                </div>
                                <div class="text">
                                    <h3>Header Goes Here</h3>
                                    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Molestiae sint
                                        voluptatem quia.</p>
                                    <a href="#">Read More</a>
                                </div>
                                <div class="overlay-count">02</div>
                            </div>
                            <!--End Single Choose Box-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>



    <!--Start Latest Project Style2 Area-->
    <section class="latest-project-style2-area">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="project-carousel owl-carousel owl-theme style1">
                        <!--Start single project style2-->
                        <div class="single-project-style2">
                            <div class="img-holder">
                                <div class="inner">
                                    <img src="{{ asset('asset/font/images/Air-Conditioning Works.png') }}"
                                        alt="Awesome Image">
                                </div>
                                <div class="overlay-content">
                                    <div class="inner-content">
                                        <div class="links-box">
                                            <ul>
                                                <li><a href="#"><span class="icon-chain"></span></a></li>
                                                <li><a class="zoom lightbox-image" data-fancybox="gallery"
                                                        href="images/Air-Conditioning Works.png">
                                                        <span class="icon-search"></span></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="title-box">
                                    <h3><a href="#">Air Condition Works</a></h3>
                                </div>
                            </div>
                        </div>
                        <!--End single project style2-->
                        <!--Start single project style2-->
                        <div class="single-project-style2">
                            <div class="img-holder">
                                <div class="inner">
                                    <img src="{{ asset('asset/font/images/Drilling Floor Holes.png') }}"
                                        alt="Awesome Image">
                                </div>
                                <div class="overlay-content">
                                    <div class="inner-content">
                                        <div class="links-box">
                                            <ul>
                                                <li><a href="#"><span class="icon-chain"></span></a></li>
                                                <li><a class="zoom lightbox-image" data-fancybox="gallery"
                                                        href="images/Drilling Floor Holes.png">
                                                        <span class="icon-search"></span></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="title-box">
                                    <h3><a href="#">Drilling Floor Holes</a></h3>
                                </div>
                            </div>
                        </div>
                        <!--End single project style2-->
                        <!--Start single project style2-->
                        <div class="single-project-style2">
                            <div class="img-holder">
                                <div class="inner">
                                    <img src="{{ asset('asset/font/images/Installing Ceiling Light.png') }}"
                                        alt="Awesome Image">
                                </div>
                                <div class="overlay-content">
                                    <div class="inner-content">
                                        <div class="links-box">
                                            <ul>
                                                <li><a href="#"><span class="icon-chain"></span></a></li>
                                                <li><a class="zoom lightbox-image" data-fancybox="gallery"
                                                        href="images/Installing Ceiling Light.png">
                                                        <span class="icon-search"></span></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="title-box">
                                    <h3><a href="#">Installing Celling Light</a></h3>
                                </div>
                            </div>
                        </div>
                        <!--End single project style2-->

                        <!--Start single project style2-->
                        <div class="single-project-style2">
                            <div class="img-holder">
                                <div class="inner">
                                    <img src="{{ asset('asset/font/images/Installing Power Points _ Switches.png') }}"
                                        alt="Awesome Image">
                                </div>
                                <div class="overlay-content">
                                    <div class="inner-content">
                                        <div class="links-box">
                                            <ul>
                                                <li><a href="#"><span class="icon-chain"></span></a></li>
                                                <li><a class="zoom lightbox-image" data-fancybox="gallery"
                                                        href="images/Installing Power Points _ Switches.png">
                                                        <span class="icon-search"></span></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="title-box">
                                    <h3><a href="#">Installing Power Switches</a></h3>
                                </div>
                            </div>
                        </div>
                        <!--End single project style2-->
                        <!--Start single project style2-->
                        <div class="single-project-style2">
                            <div class="img-holder">
                                <div class="inner">
                                    <img src="{{ asset('asset/font/images/Installing Shower Mixer.png') }}"
                                        alt="Awesome Image">
                                </div>
                                <div class="overlay-content">
                                    <div class="inner-content">
                                        <div class="links-box">
                                            <ul>
                                                <li><a href="#"><span class="icon-chain"></span></a></li>
                                                <li><a class="zoom lightbox-image" data-fancybox="gallery"
                                                        href="images/Installing Shower Mixer.png">
                                                        <span class="icon-search"></span></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="title-box">
                                    <h3><a href="#">Installing Shower Mixer</a></h3>
                                </div>
                            </div>
                        </div>
                        <!--End single project style2-->
                        <!--Start single project style2-->
                        <div class="single-project-style2">
                            <div class="img-holder">
                                <div class="inner">
                                    <img src="{{ asset('asset/font/images/Installing the Ceiling Fan.png') }}"
                                        alt="Awesome Image">
                                </div>
                                <div class="overlay-content">
                                    <div class="inner-content">
                                        <div class="links-box">
                                            <ul>
                                                <li><a href="#"><span class="icon-chain"></span></a></li>
                                                <li><a class="zoom lightbox-image" data-fancybox="gallery"
                                                        href="images/Installing the Ceiling Fan.png">
                                                        <span class="icon-search"></span></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="title-box">
                                    <h3><a href="#">Installing the Celling Fan</a></h3>
                                </div>
                            </div>
                        </div>
                        <!--End single project style2-->

                        <!--Start single project style2-->
                        <div class="single-project-style2">
                            <div class="img-holder">
                                <div class="inner">
                                    <img src="{{ asset('asset/font/images/Painting Works.png') }}" alt="Awesome Image">
                                </div>
                                <div class="overlay-content">
                                    <div class="inner-content">
                                        <div class="links-box">
                                            <ul>
                                                <li><a href="#"><span class="icon-chain"></span></a></li>
                                                <li><a class="zoom lightbox-image" data-fancybox="gallery"
                                                        href="images/Painting Works.png">
                                                        <span class="icon-search"></span></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="title-box">
                                    <h3><a href="#">Painting Works</a></h3>
                                </div>
                            </div>
                        </div>
                        <!--End single project style2-->
                        <!--Start single project style2-->
                        <div class="single-project-style2">
                            <div class="img-holder">
                                <div class="inner">
                                    <img src="{{ asset('asset/font/images/Plumbing Works.png') }}" alt="Awesome Image">
                                </div>
                                <div class="overlay-content">
                                    <div class="inner-content">
                                        <div class="links-box">
                                            <ul>
                                                <li><a href="#"><span class="icon-chain"></span></a></li>
                                                <li><a class="zoom lightbox-image" data-fancybox="gallery"
                                                        href="images/Plumbing Works.png">
                                                        <span class="icon-search"></span></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="title-box">
                                    <h3><a href="#">Plumbing Works</a></h3>
                                </div>
                            </div>
                        </div>
                        <!--End single project style2-->
                        <!--Start single project style2-->
                        <div class="single-project-style2">
                            <div class="img-holder">
                                <div class="inner">
                                    <img src="{{ asset('asset/font/images/Polishing Marble Floor.png') }}"
                                        alt="Awesome Image">
                                </div>
                                <div class="overlay-content">
                                    <div class="inner-content">
                                        <div class="links-box">
                                            <ul>
                                                <li><a href="#"><span class="icon-chain"></span></a></li>
                                                <li><a class="zoom lightbox-image" data-fancybox="gallery"
                                                        href="images/Polishing Marble Floor.png">
                                                        <span class="icon-search"></span></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="title-box">
                                    <h3><a href="#">Pollishing Marble Floor</a></h3>
                                </div>
                            </div>
                        </div>
                        <!--End single project style2-->
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
