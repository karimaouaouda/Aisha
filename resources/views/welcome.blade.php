<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Applight Template By W3 Template</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.css">
    @vite('resources/css/animate.css')

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css"
        integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
    @vite('resources/css/style.css')
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css"
        integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
    <!-- Font Google -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg">
        <div class="container"> <a class="navbar-brand navbar-logo" href="#"> <img src="{{ asset('images/logo.png') }}"
                    alt="logo" class="logo-1"> </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"> <span
                    class="fas fa-bars"></span> </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item"> <a class="nav-link" href="" data-scroll-nav="0">Home</a> </li>
                    <li class="nav-item"> <a class="nav-link" href="#" data-scroll-nav="1">About</a> </li>
                    <li class="nav-item"> <a class="nav-link" href="#" data-scroll-nav="2">Features</a> </li>
                    <li class="nav-item"> <a class="nav-link" href="#" data-scroll-nav="3">Team</a> </li>
                    <li class="nav-item"> <a class="nav-link" href="#" data-scroll-nav="4">Testimonials</a> </li>
                    <li class="nav-item"> <a class="nav-link" href="#" data-scroll-nav="5">Faq</a> </li>
                    <li class="nav-item"> <a class="nav-link" href="#" data-scroll-nav="6">Contact</a> </li>
                    <li class="nav-item"> <a class="btn btn-light text-dark" href="{{route('filament.patient.auth.register')}}">start know</a> </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- End Navbar -->
    <!-------Banner Start------->
    <section class="banner" data-scroll-index='0'>
        <div class="banner-overlay">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-sm-12">
                        <div class="banner-text">
                            <h2 class="white"> {{ __('welcome.heading') }} </h2>
                            <h6 class="white">This awesome template designed by <a href="https://w3Template.com"
                                    target="_blank" rel="dofollow" class="weblink">W3 Template</a>.</h6>
                            <p class="banner-text white">Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                Curabitur hendrerit neque massa, sit amet tristique ante porta ut. In sodales et justo
                                vel vulputate. Pellentesque habitant morbi tristique senectus et netus et malesuada
                                fames ac turpis egestas.</p>
                            <ul>
                                <li><a href="#"><img src="{{asset('images/appstore.png')}}" class="wow fadeInUp"
                                            data-wow-delay="0.4s" /></a></li>
                                <li><a href="#"><img src="{{asset('images/playstore.png')}}" class="wow fadeInUp"
                                            data-wow-delay="0.7s" /></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-12"> <img src="{{asset('images/iphone-screen.png')}}"
                            class="img-fluid wow fadeInUp" /> </div>
                </div>
            </div>
        </div>
        <span class="svg-wave"> <img class="svg-hero" src="{{asset('images/applight-wave.svg')}}"> </span>
    </section>

    <!-------Banner End------->

    <!-------About End------->

    <section class="about section-padding prelative" data-scroll-index='1'>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="sectioner-header text-center">
                        <h3>About</h3>
                        <span class="line"></span>
                        <p>Sed quis nisi nisi. Proin consectetur porttitor dui sit amet viverra. Fusce sit amet lorem
                            faucibus, vestibulum ante in, pharetra ante.</p>
                    </div>
                    <div class="section-content text-center">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="icon-box wow fadeInUp" data-wow-delay="0.2s"> <i class="fa fa-life-ring"
                                        aria-hidden="true"></i>
                                    <h5>Support</h5>
                                    <p>Phasellus lobortis justo a magna facilisis, in commodo tellus rutrum. Sed vitae
                                        condimentum nulla.</p>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="icon-box wow fadeInUp" data-wow-delay="0.4s"> <i class="fa fa-mobile"
                                        aria-hidden="true"></i>
                                    <h5>Cross Platform</h5>
                                    <p>Phasellus lobortis justo a magna facilisis, in commodo tellus rutrum. Sed vitae
                                        condimentum nulla.</p>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="icon-box wow fadeInUp" data-wow-delay="0.6s"> <i class="fa fa-bolt"
                                        aria-hidden="true"></i>
                                    <h5>Fast</h5>
                                    <p>Phasellus lobortis justo a magna facilisis, in commodo tellus rutrum. Sed vitae
                                        condimentum nulla.</p>
                                </div>
                            </div>
                        </div>
                        <a href="#" class="about-btn">Learn More</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-------About End------->

    <!-------Video Start------->
    <section class="video-section prelative text-center white">
        <div class="section-padding video-overlay">
            <div class="container">
                <h3>Watch Now</h3>
                <i class="fa fa-play" id="video-icon" aria-hidden="true"></i>
                <div class="video-popup">
                    <div class="video-src">
                        <div class="iframe-src">
                            <iframe src="https://www.youtube.com/embed/Ku52zNnft8k?rel=0&amp;showinfo=0"
                                allowfullscreen></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-------Video End------->

    <!-------Features Start------->
    <section class="feature section-padding" data-scroll-index='2'>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="sectioner-header text-center">
                        <h3>Features</h3>
                        <span class="line"></span>
                        <p>Sed quis nisi nisi. Proin consectetur porttitor dui sit amet viverra. Fusce sit amet lorem
                            faucibus, vestibulum ante in, pharetra ante.</p>
                    </div>
                    <div class="section-content text-center">
                        <div class="row">
                            <div class="col-md-4 col-sm-12">
                                <div class="media single-feature wow fadeInUp" data-wow-delay="0.2s">
                                    <div class="media-body text-right media-right-margin">
                                        <h5>Fast Processing</h5>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                            tempor incididugnt ut labore</p>
                                    </div>
                                    <div class="media-right icon-border"> <span class="fa fa-bolt"
                                            aria-hidden="true"></span> </div>
                                </div>
                                <div class="media single-feature wow fadeInUp" data-wow-delay="0.4s">
                                    <div class="media-body text-right media-right-margin">
                                        <h5>Low Power Consuming</h5>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                            tempor incididugnt ut labore</p>
                                    </div>
                                    <div class="media-right icon-border"> <span class="fa fa-battery-full"
                                            aria-hidden="true"></span> </div>
                                </div>
                                <div class="media single-feature wow fadeInUp" data-wow-delay="0.6s">
                                    <div class="media-body text-right media-right-margin">
                                        <h5>Wifi Compatibility</h5>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                            tempor incididugnt ut labore</p>
                                    </div>
                                    <div class="media-right icon-border"> <span class="fa fa-wifi"
                                            aria-hidden="true"></span> </div>
                                </div>
                            </div>
                            <div class="col-md-4 d-none d-md-block d-lg-block">
                                <div class="feature-mobile"> <img src="images/iphone-screen-with-shadow.png"
                                        class="img-fluid wow fadeInUp" /> </div>
                            </div>
                            <div class="col-md-4 col-sm-12">
                                <div class="media single-feature wow fadeInUp" data-wow-delay="0.2s">
                                    <div class="media-left icon-border media-right-margin"> <span
                                            class="fa fa-check-double" aria-hidden="true"></span> </div>
                                    <div class="media-body text-left">
                                        <h5>Regular Updates</h5>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                            tempor incididugnt ut labore</p>
                                    </div>
                                </div>
                                <div class="media single-feature wow fadeInUp" data-wow-delay="0.4s">
                                    <div class="media-left icon-border media-right-margin"> <span
                                            class="fa fa-dollar-sign" aria-hidden="true"></span> </div>
                                    <div class="media-body text-left">
                                        <h5>Save Money</h5>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                            tempor incididugnt ut labore</p>
                                    </div>
                                </div>
                                <div class="media single-feature wow fadeInUp" data-wow-delay="0.6s">
                                    <div class="media-left icon-border media-right-margin"> <span class="fa fa-hdd"
                                            aria-hidden="true"></span> </div>
                                    <div class="media-body text-left">
                                        <h5>Unlimited Storage</h5>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                            tempor incididugnt ut labore</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-------Features End------->

    <!-------Team Start------->
    <section class="team section-padding" data-scroll-index='3'>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="sectioner-header text-center">
                        <h3>Our Team</h3>
                        <span class="line"></span>
                        <p>Sed quis nisi nisi. Proin consectetur porttitor dui sit amet viverra. Fusce sit amet lorem
                            faucibus, vestibulum ante in, pharetra ante.</p>
                    </div>
                    <div class="section-content text-center">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="team-detail wow bounce" data-wow-delay="0.2s"> <img
                                        src="{{asset('images/user1.jpg')}}" class="img-fluid" />
                                    <h4>Nitu Singh</h4>
                                    <p>Marketing Specialist</p>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="team-detail wow bounce" data-wow-delay="0.4s"> <img
                                        src="{{asset('images/user2.jpg')}}" class="img-fluid" />
                                    <h4>Yogesh Singh</h4>
                                    <p>CEO & Founder</p>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="team-detail wow bounce" data-wow-delay="0.6s"> <img
                                        src="{{asset('images/user3.jpg')}}" class="img-fluid" />
                                    <h4>Nisha Sharma</h4>
                                    <p>Web Developer</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-------Team End------->

    <!-------Testimonial Start------->
    <section class="testimonial section-padding" data-scroll-index='4'>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="sectioner-header text-center white">
                        <h3>Testimonials</h3>
                        <span class="line"></span>
                        <p class="white">Sed quis nisi nisi. Proin consectetur porttitor dui sit amet viverra. Fusce
                            sit amet lorem faucibus, vestibulum ante in, pharetra ante.</p>
                    </div>

                    <div class="section-content">
                        <div class="row">
                            <div class="offset-md-2 col-md-8 col-sm-12">
                                <div class="slider">
                                    <div class="slider-item">
                                        <div class="test-img"><img src="{{asset('images/user1.jpg')}}" alt="Placeholder"
                                                width="157" height="157"></div>
                                        <div class="test-text"><span class="title"><span>John Michal</span> Digital
                                                Designer</span> Consectetuer adipiscing elit, sed diam nonummy nibh
                                            euismod tincidunt ut laoreet dolore magna aliquam eratvo lutpat.</div>
                                    </div>
                                    <div class="slider-item">
                                        <div class="test-img"><img src="{{asset('images/user3.jpg')}}" alt="Placeholder"
                                                width="157" height="157"></div>
                                        <div class="test-text"><span class="title"><span>Steve Smith</span> App
                                                User</span> Euismod tincidunt ut laoreet dolore magna aliquam eratvo
                                            lutpat. Ut wisi enim ad minim veniam, quis nostrud v</div>
                                    </div>
                                    <div class="slider-item">
                                        <div class="test-img"><img src="{{asset('images/user3.jpg')}}" alt="Placeholder"
                                                width="157" height="157"></div>
                                        <div class="test-text"><span class="title"><span>Gordon Shaw</span>
                                                Blogger</span> Consectetuer adipiscing elit, sed diam nonummy nibh
                                            euismod tincidunt ut laoreet dolore magna aliquam eratvo lutpat. Ut wisi
                                            enim ad minim veniam, quis nostrud v</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-------Testimonial End------->

    <!-------FAQ Start------->
    <section class="faq section-padding prelative" data-scroll-index='5'>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="sectioner-header text-center">
                        <h3>Frequently Asked Questions</h3>
                        <span class="line"></span>
                        <p>Sed quis nisi nisi. Proin consectetur porttitor dui sit amet viverra. Fusce sit amet lorem
                            faucibus, vestibulum ante in, pharetra ante.</p>
                    </div>
                    <div class="section-content">
                        <div class="row">
                            <div class="col-md-6 faq-content wow fadeInUp" data-wow-delay="0.2s">
                                <h4>Nam tellus felis, dignissim quis dui ?</h4>
                                <p>Suspendisse fermentum placerat enim, at pellentesque augue. Nullam elit est,
                                    ultricies et tellus ac, euismod placerat orci. Donec commodo.</p>
                            </div>
                            <div class="col-md-6 faq-content wow fadeInUp" data-wow-delay="0.2s">
                                <h4>Mauris scelerisque, dui non faucibus vulputate ?</h4>
                                <p>Sed tempus in neque ac rhoncus. Phasellus vehicula, erat tempor malesuada egestas,
                                    mauris tellus malesuada erat, at vestibulum nulla ex et lectus. Nullam elit est,
                                    ultricies et tellus ac, euismod placerat orci.</p>
                            </div>
                            <div class="col-md-6 faq-content wow fadeInUp" data-wow-delay="0.4s">
                                <h4>Nullam elit est, ultricies et tellus ac ?</h4>
                                <p>Ut vestibulum euismod aliquet. Quisque nec malesuada nibh. Vivamus euismod nunc eu
                                    leo faucibus, vel elementum justo posuere. In sed varius nisi. Curabitur id porta
                                    ipsum, et vestibulum dui.</p>
                            </div>
                            <div class="col-md-6 faq-content wow fadeInUp" data-wow-delay="0.4s">
                                <h4>Suspendisse fermentum placerat enim, at pellentesque augue elit est ?</h4>
                                <p>Vivamus euismod nunc eu leo faucibus, vel elementum justo posuere. In sed varius
                                    nisi.</p>
                            </div>
                            <div class="col-md-6 faq-content wow fadeInUp" data-wow-delay="0.6s">
                                <h4>Ut vestibulum euismod aliquet. Quisque nec malesuada nibh ?</h4>
                                <p>Suspendisse fermentum placerat enim, at pellentesque augue. Nullam elit est,
                                    ultricies et tellus ac, euismod placerat orci. Donec commodo dapibus congue.</p>
                            </div>
                            <div class="col-md-6 faq-content wow fadeInUp" data-wow-delay="0.6s">
                                <h4>Donec commodo dapibus congue ?</h4>
                                <p>Nullam elit est, ultricies et tellus ac, euismod placerat orci fermentum placerat
                                    enim, at pellentesque augue. Nullam elit est, ultricies et tellus ac, euismod
                                    placerat orci. Donec commodo dapibus congue.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-------FAQ End------->

    <!-------Contact Start------->
    <section class="contact section-padding" data-scroll-index='6'>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="sectioner-header text-center">
                        <h3>Contact us</h3>
                        <span class="line"></span>
                        <p>Sed quis nisi nisi. Proin consectetur porttitor dui sit amet viverra. Fusce sit amet lorem
                            faucibus, vestibulum ante in, pharetra ante.</p>
                    </div>
                    <div class="section-content">
                        <div class="row">
                            <div class="col-sm-12 col-md-12 col-lg-8">
                                <form id="contact_form" action="">
                                    <div class="row">
                                        <div class="col">
                                            <input type="text" id="your_name" class="form-input w-100"
                                                name="full-name" placeholder="Full Name" required>
                                        </div>
                                        <div class="col">
                                            <input type="email" id="email" class="form-input w-100"
                                                name="email" placeholder="Email" required>
                                        </div>
                                    </div>
                                    <input type="text" id="subject" class="form-input w-100" name="subject"
                                        placeholder="Subject">
                                    <textarea class="form-input w-100" id="message" placeholder="Message" name="message"></textarea>
                                    <button class="btn-grad w-100 text-uppercase" type="submit"
                                        name="button">submit</button>
                                </form>
                            </div>
                            <div class="col-sm-12 col-md-12 col-lg-4">
                                <div class="contact-info white">
                                    <div class="contact-item media"> <i
                                            class="fa fa-map-marker-alt media-left media-right-margin"></i>
                                        <div class="media-body">
                                            <p class="text-uppercase">Address</p>
                                            <p class="text-uppercase">New Delhi, India</p>
                                        </div>
                                    </div>
                                    <div class="contact-item media"> <i
                                            class="fa fa-mobile media-left media-right-margin"></i>
                                        <div class="media-body">
                                            <p class="text-uppercase">Phone</p>
                                            <p class="text-uppercase"><a class="text-white"
                                                    href="tel:+15173977100">009900990099</a> </p>
                                        </div>
                                    </div>
                                    <div class="contact-item media"> <i
                                            class="fa fa-envelope media-left media-right-margin"></i>
                                        <div class="media-body">
                                            <p class="text-uppercase">E-mail</p>
                                            <p class="text-uppercase"><a class="text-white"
                                                    href="mailto:abcdefg@gmail.com">yogeshsingh.now@gmail.com</a> </p>
                                        </div>
                                    </div>
                                    <div class="contact-item media"> <i
                                            class="fa fa-clock media-left media-right-margin"></i>
                                        <div class="media-body">
                                            <p class="text-uppercase">Working Hours</p>
                                            <p class="text-uppercase">Mon-Fri 9.00 AM to 5.00PM.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-------Contact End------->

    <!-------Download End------->
    <section class="download section-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="sectioner-header text-center white">
                        <h3>Download Our App</h3>
                        <span class="line"></span>
                        <p class="white">Sed quis nisi nisi. Proin consectetur porttitor dui sit amet viverra. Fusce
                            sit amet lorem faucibus, vestibulum ante in, pharetra ante.</p>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="section-content text-center">
                        <ul>
                            <li><a href="#"><img src="{{asset('images/appstore.png')}}" class="wow fadeInUp"
                                        data-wow-delay="0.4s" /></a></li>
                            <li><a href="#"><img src="{{asset('images/playstore.png')}}" class="wow fadeInUp"
                                        data-wow-delay="0.7s" /></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-------Download End------->

    <footer class="footer-copy">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <p>2018 &copy; Applight. Website Designed by <a href="https://w3Template.com" target="_blank"
                            rel="dofollow">W3 Template</a></p>
                </div>
            </div>
        </div>
    </footer>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"
        integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.min.js"></script>
    <!-- scrollIt js -->
    <script src="{{asset('js/scrollit.min.js')}}"></script>
    <script src="{{asset('js/wow.min.js')}}"></script>
    <script>
        wow = new WOW();
        wow.init();
        $(document).ready(function(e) {

            $('#video-icon').on('click', function(e) {
                e.preventDefault();
                $('.video-popup').css('display', 'flex');
                $('.iframe-src').slideDown();
            });
            $('.video-popup').on('click', function(e) {
                var $target = e.target.nodeName;
                var video_src = $(this).find('iframe').attr('src');
                if ($target != 'IFRAME') {
                    $('.video-popup').fadeOut();
                    $('.iframe-src').slideUp();
                    $('.video-popup iframe').attr('src', " ");
                    $('.video-popup iframe').attr('src', video_src);
                }
            });

            $('.slider').bxSlider({
                pager: false
            });
        });

        $(window).on("scroll", function() {

            var bodyScroll = $(window).scrollTop(),
                navbar = $(".navbar");

            if (bodyScroll > 50) {
                $('.navbar-logo img').attr('src', 'images/logo-black.png');
                navbar.addClass("nav-scroll");

            } else {
                $('.navbar-logo img').attr('src', 'images/logo.png');
                navbar.removeClass("nav-scroll");
            }

        });
        $(window).on("load", function() {
            var bodyScroll = $(window).scrollTop(),
                navbar = $(".navbar");

            if (bodyScroll > 50) {
                $('.navbar-logo img').attr('src', 'images/logo-black.png');
                navbar.addClass("nav-scroll");
            } else {
                $('.navbar-logo img').attr('src', 'images/logo-white.png');
                navbar.removeClass("nav-scroll");
            }

            $.scrollIt({

                easing: 'swing', // the easing function for animation
                scrollTime: 900, // how long (in ms) the animation takes
                activeClass: 'active', // class given to the active nav element
                onPageChange: null, // function(pageIndex) that is called when page is changed
                topOffset: -63
            });
        });
    </script>
</body>

</html>
