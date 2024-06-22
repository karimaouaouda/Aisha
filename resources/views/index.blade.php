<!doctype html>
<html lang="en">

<head>
    <!-- Required Meta Tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Document Title, Description, and Author -->
    <title>Wave - Bootstrap 5 One Page Template</title>
    <meta name="description" content="Wave is a Bootstrap 5 One Page Template.">
    <meta name="author" content="BootstrapBrain">

    <!-- Favicon and Touch Icons -->
    <link rel="icon" type="image/png" sizes="512x512" href="./assets/favicon/favicon-512x512.png">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <link href="https://vjs.zencdn.net/8.10.0/video-js.css" rel="stylesheet" />
    <!-- Google Fonts Files -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Oswald:wght@200;300;400;500;600;700&family=Satisfy&display=swap"
        rel="stylesheet">

    <!-- CSS Files -->
    <link rel="stylesheet" href="./assets/css/wave-bsb.css">

    <!-- BSB Head -->
</head>

<body data-bs-spy="scroll" data-bs-target="#bsb-tpl-navbar" data-bs-smooth-scroll="true" tabindex="0">
    <!-- Header -->
    <header id="header" class="sticky-top bsb-tpl-header-sticky bsb-tpl-header-sticky-animationX">

        <!-- Navbar 1 - Bootstrap Brain Component -->
        <nav id="scrollspyNav"
            class="navbar navbar-expand-lg bsb-tpl-bg-blue bsb-navbar bsb-navbar-hover bsb-navbar-caret bsb-tpl-navbar-sticky"
            data-bsb-sticky-target="#header">
            <div class="container">
                <a class="navbar-brand" href="index.html">
                    <img src="./logo.png" class="bsb-tpl-logo" alt="">
                </a>
                <button class="navbar-toggler border-0" type="button" data-bs-toggle="offcanvas"
                    data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                        class="bi bi-list" viewBox="0 0 16 16">
                        <path fill-rule="evenodd"
                            d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z" />
                    </svg>
                </button>
                <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar"
                    aria-labelledby="offcanvasNavbarLabel">
                    <div class="offcanvas-header">
                        <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Menu</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="offcanvas"
                            aria-label="Close"></button>
                    </div>
                    <div class="offcanvas-body">
                        <ul id="bsb-tpl-navbar" class="navbar-nav justify-content-end flex-grow-1">
                            <li class="nav-item">
                                <a class="nav-link active" href="#scrollspyNav" aria-current="page"
                                    data-bs-dismiss="offcanvas" data-bs-target="#offcanvasNavbar">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#scrollspyServices" data-bs-dismiss="offcanvas"
                                    data-bs-target="#offcanvasNavbar">Services</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#scrollspyPortfolio" data-bs-dismiss="offcanvas"
                                    data-bs-target="#offcanvasNavbar">Introduction</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#scrollspyAbout" data-bs-dismiss="offcanvas"
                                    data-bs-target="#offcanvasNavbar">About</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#scrollspyTeam" data-bs-dismiss="offcanvas"
                                    data-bs-target="#offcanvasNavbar">Team</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#scrollspyPricing" data-bs-dismiss="offcanvas"
                                    data-bs-target="#offcanvasNavbar">Pricing</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#scrollspyContact" data-bs-dismiss="offcanvas"
                                    data-bs-target="#offcanvasNavbar">Contact</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>

    </header>

    <!-- Hero 2 - Bootstrap Brain Component -->
    <section id="scrollspyHero" class="bsb-hero-2 bsb-tpl-bg-blue py-5 py-xl-8 py-xxl-10">
        <div class="container overflow-hidden">
            <div class="row gy-3 gy-lg-0 align-items-lg-center justify-content-lg-between">
                <div class="col-12 col-lg-6 order-1 order-lg-0">
                    <h1 class="display-3 fw-bolder mb-3">Your AI companion <br><mark
                            class="bsb-tpl-highlight bsb-tpl-highlight-blue"><span
                                class="bsb-tpl-font-hw display-2 text-primary fw-normal">Aisha</span></mark> for a
                        healthy life.</h1>
                    <p class="fs-4 mb-5">Our assistant is fast, precise, and established to ensure a good life and
                        personlized care.</p>
                    <div class="d-grid gap-2 d-sm-flex">
                        <button type="button" class="btn btn-primary bsb-btn-3xl rounded-pill">Log-in</button>
                        <button type="button"
                            class="btn btn-outline-primary bsb-btn-3xl rounded-pill">Sing-in</button>

                        <button class="btn btn-outline-primary bsb-btn-3xl rounded-pill">
                            <i class="bi bi-play-circle"></i>
                            <span>
                                intro video
                            </span>
                        </button>
                    </div>
                </div>
                <div class="col-12 col-lg-5 text-center">
                    <img class="img-fluid" loading="lazy" src="./images/aisha.png" alt=""
                        style="-webkit-mask-image: url(./assets/img/hero/hero-blob-1.svg); mask-image: url(./assets/img/hero/hero-blob-1.svg);">
                </div>
            </div>
        </div>
    </section>

    <!-- Main -->
    <main id="main">

        <!-- Section - Services -->
        <!-- Service 3 - Bootstrap Brain Component -->
        <section id="scrollspyServices" class="py-5 py-xl-8 bsb-section-py-xxl-1">
            <div class="container mb-5 mb-md-6 mb-xl-10">
                <div class="row justify-content-md-center">
                    <div class="col-12 col-md-10 col-lg-9 col-xl-8 col-xxl-7 text-center">
                        <h2 class="display-3 fw-bolder mb-4">You will get an <br> <mark
                                class="bsb-tpl-highlight bsb-tpl-highlight-yellow"><span
                                    class="bsb-tpl-font-hw display-1 text-primary fw-normal">unforgettable
                                    experience</span></mark> <br> with our care services.</h2>
                    </div>
                </div>
            </div>

            <div class="container overflow-hidden">
                <div class="row gy-5 gx-md-4 gy-lg-0 gx-xxl-5 justify-content-center">
                    <div class="col-11 col-sm-6 col-lg-3">
                        <div class="badge bsb-tpl-bg-yellow text-primary p-3 mb-4">
                          <i class="bi bi-mic" style="display:block;font-size:1.6rem"></i>
                        </div>
                        <h4 class="mb-3">Text, Talk</h4>
                        <p class="mb-3 text-secondary">Experience seamless interaction with our smart assistant through
                            Text & Speech, allowing you to communicate effortlessly in the way that suits you best.</p>
                        <a href="#!" class="fw-bold text-decoration-none link-primary">
                            Learn More
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                fill="currentColor" class="bi bi-arrow-right-short" viewBox="0 0 16 16">
                                <path fill-rule="evenodd"
                                    d="M4 8a.5.5 0 0 1 .5-.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5A.5.5 0 0 1 4 8z" />
                            </svg>
                        </a>
                    </div>
                    <div class="col-11 col-sm-6 col-lg-3">
                        <div class="badge bsb-tpl-bg-green text-primary p-3 mb-4">
                            <img src="{{asset('./images/emotif.png')}}" style="width:26px;height:26px;transform:scale(1.5)" alt="">
                        </div>
                        <h4 class="mb-3">Emotion Analysis</h4>
                        <p class="mb-3 text-secondary">Leveraging advanced systems, our Aisha performs emotional
                            analysis on both Voice and Text inputs, ensuring a personalized and empathetic response for
                            every interaction.</p>
                        <a href="#!" class="fw-bold text-decoration-none link-primary">
                            Learn More
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                fill="currentColor" class="bi bi-arrow-right-short" viewBox="0 0 16 16">
                                <path fill-rule="evenodd"
                                    d="M4 8a.5.5 0 0 1 .5-.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5A.5.5 0 0 1 4 8z" />
                            </svg>
                        </a>
                    </div>
                    <div class="col-11 col-sm-6 col-lg-3">
                        <div class="badge bsb-tpl-bg-pink text-primary p-3 mb-4">
                          <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="currentColor" class="bi bi-headset" viewBox="0 0 16 16">
                            <path d="M8 1a5 5 0 0 0-5 5v1h1a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V6a6 6 0 1 1 12 0v6a2.5 2.5 0 0 1-2.5 2.5H9.366a1 1 0 0 1-.866.5h-1a1 1 0 1 1 0-2h1a1 1 0 0 1 .866.5H11.5A1.5 1.5 0 0 0 13 12h-1a1 1 0 0 1-1-1V8a1 1 0 0 1 1-1h1V6a5 5 0 0 0-5-5"/>
                          </svg>
                        </div>
                        <h4 class="mb-3">Real-time Feedback</h4>
                        <p class="mb-3 text-secondary">Enjoy limitless options with our assistant, seamlessly
                            integrating with your devices to provide instant feedback and enhanced control for your
                            connected home and sensors.</p>
                        <a href="#!" class="fw-bold text-decoration-none link-primary">
                            Learn More
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                fill="currentColor" class="bi bi-arrow-right-short" viewBox="0 0 16 16">
                                <path fill-rule="evenodd"
                                    d="M4 8a.5.5 0 0 1 .5-.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5A.5.5 0 0 1 4 8z" />
                            </svg>
                        </a>
                    </div>
                    <div class="col-11 col-sm-6 col-lg-3">
                        <div class="badge bsb-tpl-bg-cyan text-primary p-3 mb-4">
                          <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="currentColor" class="bi bi-heart-pulse-fill" viewBox="0 0 16 16">
                            <path d="M1.475 9C2.702 10.84 4.779 12.871 8 15c3.221-2.129 5.298-4.16 6.525-6H12a.5.5 0 0 1-.464-.314l-1.457-3.642-1.598 5.593a.5.5 0 0 1-.945.049L5.889 6.568l-1.473 2.21A.5.5 0 0 1 4 9z"/>
                            <path d="M.88 8C-2.427 1.68 4.41-2 7.823 1.143q.09.083.176.171a3 3 0 0 1 .176-.17C11.59-2 18.426 1.68 15.12 8h-2.783l-1.874-4.686a.5.5 0 0 0-.945.049L7.921 8.956 6.464 5.314a.5.5 0 0 0-.88-.091L3.732 8z"/>
                          </svg>
                        </div>
                        <h4 class="mb-3">Medical Analysis</h4>
                        <p class="mb-3 text-secondary">Daily routine analysis from the collected data to help predict
                            any anomaly or disease and also providing your respected doctor with a 24/7 health watch and
                            medicine reminders.</p>
                        <a href="#!" class="fw-bold text-decoration-none link-primary">
                            Learn More
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                fill="currentColor" class="bi bi-arrow-right-short" viewBox="0 0 16 16">
                                <path fill-rule="evenodd"
                                    d="M4 8a.5.5 0 0 1 .5-.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5A.5.5 0 0 1 4 8z" />
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </section>

        <!-- Call To Action 1 - Bootstrap Brain Component -->
        <section class="bsb-cta-1 px-2 bsb-overlay" style="background-image: url('./images/eldery.jpg');">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-md-9 col-lg-8 col-xl-8 col-xxl-7">
                        <h3 class="fs-5 mb-3 text-white text-uppercase"><mark
                                class="text-white bsb-tpl-highlight">Unlock Fresh Prospects</mark></h3>
                        <h2 class="display-3 text-white fw-bolder mb-4 pe-xl-5">We are a dedicated complete Healthcare
                            System, our first priority is your well being.</h2>
                        <a href="#!" class="btn btn-primary bsb-btn-3xl rounded mb-0 text-nowrap">Get started</a>
                    </div>
                </div>
            </div>
        </section>

        <!-- Section - Portfolio -->
        <!-- Project 2 - Bootstrap Brain Component -->
        <section id="scrollspyPortfolio" class="py-5 py-xl-8 bsb-section-py-xxl-1">
            <div class="container mb-5 mb-md-6 mb-xl-10">
                <div class="row justify-content-md-center">
                    <div class="col-12 col-md-10 col-lg-9 col-xl-8 col-xxl-7 text-center">
                        <h2 class="display-3 fw-bolder mb-4">Check our introduction to <br><mark
                                class="bsb-tpl-highlight bsb-tpl-highlight-yellow"><span
                                    class="bsb-tpl-font-hw display-1 text-primary fw-normal">kickstart</span></mark>
                            your journey.</h2>
                    </div>
                </div>
            </div>

            <div class="container overflow-hidden">
                <video id="my-video" class="video-js vjs-fluid" controls preload="auto" width="640" height="264"
                    poster="{{asset('images/eldery.jpg')}}" data-setup="{}">
                    <source src="https://vjs.zencdn.net/v/oceans.mp4" type="video/mp4" />
                    <source src="https://vjs.zencdn.net/v/oceans.webm" type="video/webm" />
                    <p class="vjs-no-js">
                        To view this video please enable JavaScript, and consider upgrading to a
                        web browser that
                        <a href="https://videojs.com/html5-video-support/" target="_blank">supports HTML5 video</a>
                    </p>
                </video>
            </div>
        </section>

        <!-- Section - About -->
        <section id="scrollspyAbout" class="bsb-tpl-bg-alice-blue py-5 py-xl-8 bsb-section-py-xxl-1">
            <!-- FAQ 1 - Bootstrap Brain Component -->
            <div class="container">
                <div class="row gy-5 gy-lg-0 align-items-lg-center">
                    <div class="col-12 col-lg-6">
                        <img class="img-fluid rounded" style="height: 70vh" loading="lazy" src="{{asset('./images/medc.png')}}"
                            alt="">
                    </div>
                    <div class="col-12 col-lg-6">
                        <div class="row justify-content-xl-end">
                            <div class="col-12 col-xl-11">
                                <h2 class="display-3 fw-bolder mb-4">Our <mark
                                        class="bsb-tpl-highlight bsb-tpl-highlight-blue"><span
                                            class="bsb-tpl-font-hw display-1 text-primary fw-normal">innovative</span></mark><br>
                                    methods will let you prefer us.</h2>
                                <p class="fs-4 mb-5">Here are the leading reasons to prefer us for your Healthcare. We
                                    believe in safety,speed and dedication without any place for mistake.</p>
                                <div class="accordion accordion-flush" id="accordionExample">
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="headingOne">
                                            <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                                data-bs-target="#collapseOne" aria-expanded="true"
                                                aria-controls="collapseOne">
                                                Very Affordable Rates </button>
                                        </h2>
                                        <div id="collapseOne" class="accordion-collapse collapse show"
                                            aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                                We offer some of the most competitive rates in the industry, without
                                                sacrificing quality. We understand that cost is an important factor when
                                                choosing a service provider, and we are committed to providing our
                                                clients with the best possible value for their money.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="headingTwo">
                                            <button class="accordion-button collapsed" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#collapseTwo"
                                                aria-expanded="false" aria-controls="collapseTwo">
                                                Contemporary Skills
                                            </button>
                                        </h2>
                                        <div id="collapseTwo" class="accordion-collapse collapse"
                                            aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                                Our team is made up of highly skilled and experienced professionals who
                                                are up-to-date on the latest trends,research and technologies. We are
                                                constantly investing in our team's development to ensure that we can
                                                provide our clients with the highest level of service.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="headingThree">
                                            <button class="accordion-button collapsed" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#collapseThree"
                                                aria-expanded="false" aria-controls="collapseThree">
                                                Top Notch Support
                                            </button>
                                        </h2>
                                        <div id="collapseThree" class="accordion-collapse collapse"
                                            aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                                We are committed to providing our clients with top-notch support. Our
                                                team is available 24/7 to answer your questions and resolve any issues
                                                you may encounter. We believe that our support is one of our greatest
                                                strengths, and we are proud to offer it to our clients.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Fact 1 - Bootstrap Brain Component -->
            <div class="container pt-5 pt-xl-8 bsb-section-pt-xxl-1">
                <div class="row gy-4">
                    <div class="col-12 col-sm-6 col-xl-3">
                        <div class="card border-0 border-bottom border-primary shadow-sm">
                            <div class="card-body text-center p-4 p-xxl-5">
                                <div
                                    class="btn btn-primary bsb-btn-circle bsb-btn-circle-4xl pe-none mb-2 bsb-tpl-bg-yellow text-primary border-0">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32"
                                        fill="currentColor" class="bi bi-person-add" viewBox="0 0 16 16">
                                        <path
                                            d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7Zm.5-5v1h1a.5.5 0 0 1 0 1h-1v1a.5.5 0 0 1-1 0v-1h-1a.5.5 0 0 1 0-1h1v-1a.5.5 0 0 1 1 0Zm-2-6a3 3 0 1 1-6 0 3 3 0 0 1 6 0ZM8 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4Z" />
                                        <path
                                            d="M8.256 14a4.474 4.474 0 0 1-.229-1.004H3c.001-.246.154-.986.832-1.664C4.484 10.68 5.711 10 8 10c.26 0 .507.009.74.025.226-.341.496-.65.804-.918C9.077 9.038 8.564 9 8 9c-5 0-6 3-6 4s1 1 1 1h5.256Z" />
                                    </svg>
                                </div>
                                <h3 class="h1 mb-2">120K</h3>
                                <p class="fs-5 mb-0 text-secondary">Happy Customers</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-xl-3">
                        <div class="card border-0 border-bottom border-primary shadow-sm">
                            <div class="card-body text-center p-4 p-xxl-5">
                                <div
                                    class="btn btn-primary bsb-btn-circle bsb-btn-circle-4xl pe-none mb-2 bsb-tpl-bg-green text-primary border-0">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32"
                                        fill="currentColor" class="bi bi-heart-pulse" viewBox="0 0 16 16">
                                        <path
                                            d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053.918 3.995.78 5.323 1.508 7H.43c-2.128-5.697 4.165-8.83 7.394-5.857.06.055.119.112.176.171a3.12 3.12 0 0 1 .176-.17c3.23-2.974 9.522.159 7.394 5.856h-1.078c.728-1.677.59-3.005.108-3.947C13.486.878 10.4.28 8.717 2.01L8 2.748ZM2.212 10h1.315C4.593 11.183 6.05 12.458 8 13.795c1.949-1.337 3.407-2.612 4.473-3.795h1.315c-1.265 1.566-3.14 3.25-5.788 5-2.648-1.75-4.523-3.434-5.788-5Z" />
                                        <path
                                            d="M10.464 3.314a.5.5 0 0 0-.945.049L7.921 8.956 6.464 5.314a.5.5 0 0 0-.88-.091L3.732 8H.5a.5.5 0 0 0 0 1H4a.5.5 0 0 0 .416-.223l1.473-2.209 1.647 4.118a.5.5 0 0 0 .945-.049l1.598-5.593 1.457 3.642A.5.5 0 0 0 12 9h3.5a.5.5 0 0 0 0-1h-3.162l-1.874-4.686Z" />
                                    </svg>
                                </div>
                                <h3 class="h1 mb-2">1890+</h3>
                                <p class="fs-5 mb-0 text-secondary">Issues Solved</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-xl-3">
                        <div class="card border-0 border-bottom border-primary shadow-sm">
                            <div class="card-body text-center p-4 p-xxl-5">
                                <div
                                    class="btn btn-primary bsb-btn-circle bsb-btn-circle-4xl pe-none mb-2 bsb-tpl-bg-pink text-primary border-0">
                                    <i class="bi bi-rocket-takeoff" style="font-size:2rem"></i>
                                </div>
                                <h3 class="h1 mb-2">250K</h3>
                                <p class="fs-5 mb-0 text-secondary">Finished Projects</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-xl-3">
                        <div class="card border-0 border-bottom border-primary shadow-sm">
                            <div class="card-body text-center p-4 p-xxl-5">
                                <div
                                    class="btn btn-primary bsb-btn-circle bsb-btn-circle-4xl pe-none mb-2 bsb-tpl-bg-cyan text-primary border-0">
                                    <i class="bi bi-award" style="font-size: 2rem"></i>
                                </div>
                                <h3 class="h1 mb-2">786+</h3>
                                <p class="fs-5 mb-0 text-secondary">Awwwards Winning</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Section - Team -->
        <!-- Team 1 - Bootstrap Brain Component -->
        <section id="scrollspyTeam" class="py-5 py-xl-8 bsb-section-py-xxl-1">
            <div class="container mb-5 mb-md-6 mb-xl-10">
                <div class="row justify-content-md-center">
                    <div class="col-12 col-md-10 col-lg-9 col-xl-8 col-xxl-7 text-center">
                        <h2 class="display-3 fw-bolder mb-4">We are a group of <br><mark
                                class="bsb-tpl-highlight bsb-tpl-highlight-yellow"><span
                                    class="bsb-tpl-font-hw display-1 text-primary fw-normal">innovative</span></mark>,
                            experienced, and proficient individuals.</h2>
                    </div>
                </div>
            </div>

            <div class="container overflow-hidden">
                <div class="row gy-4 gy-lg-0 gx-xxl-5">
                    <div class="col-12 col-md-6 col-lg-3">
                        <div class="card border-0 border-bottom border-primary shadow-sm overflow-hidden">
                            <div class="card-body p-0">
                                <figure class="m-0 p-0">
                                    <img style="height: 16rem" class="img-fluid" loading="lazy" src="./images/daya.jpg"
                                        alt="">
                                    <figcaption class="m-0 p-4">
                                        <h4 class="mb-1">Azzedine Dhiya Eddine</h4>
                                        <p class="text-secondary mb-0">Chief Executive Officer (CEO)</p>
                                    </figcaption>
                                </figure>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-3">
                        <div class="card border-0 border-bottom border-primary shadow-sm overflow-hidden">
                            <div class="card-body p-0">
                                <figure class="m-0 p-0">
                                    <img style="height: 16rem" class="img-fluid" loading="lazy" src="./images/halimi.jpg"
                                        alt="">
                                    <figcaption class="m-0 p-4">
                                        <h4 class="mb-1">Halimi Khaled</h4>
                                        <p class="text-secondary mb-0">Chief Operating Officer (COO)</p>
                                    </figcaption>
                                </figure>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-3">
                        <div class="card border-0 border-bottom border-primary shadow-sm overflow-hidden">
                            <div class="card-body p-0">
                                <figure class="m-0 p-0">
                                    <img style="height: 16rem" class="img-fluid" loading="lazy" src="./images/karim.jpg"
                                        alt="">
                                    <figcaption class="m-0 p-4">
                                        <h4 class="mb-1">Karim Aouada</h4>
                                        <p class="text-secondary mb-0">Chief Financial Officer (CFO)</p>
                                    </figcaption>
                                </figure>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-3">
                        <div class="card border-0 border-bottom border-primary shadow-sm overflow-hidden">
                            <div class="card-body p-0">
                                <figure class="m-0 p-0">
                                    <img style="height: 16rem" class="img-fluid" loading="lazy" src="./assets/img/team/team-img-4.jpg"
                                        alt="">
                                    <figcaption class="m-0 p-4">
                                        <h4 class="mb-1">Gasmi Samir</h4>
                                        <p class="text-secondary mb-0">Medical Director</p>
                                    </figcaption>
                                </figure>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Section - Pricing -->
        <!-- Pricing 1 - Bootstrap Brain Component -->
        <section id="scrollspyPricing" class="bsb-pricing-1 bsb-tpl-bg-sea-shell py-5 py-xl-8 bsb-section-py-xxl-1">
            <div class="container">
                <div class="row gy-5 gy-lg-0 align-items-center">
                    <div class="col-12 col-lg-4">
                        <h2 class="display-3 fw-bolder mb-4">Our <mark
                                class="bsb-tpl-highlight bsb-tpl-highlight-yellow"><span
                                    class="bsb-tpl-font-hw display-1 text-primary fw-normal">Pricing</span></mark></h2>
                        <p class="fs-4 mb-4 mb-xl-5">Explore our flexible pricing to find an excellent fit to get
                            started.</p>
                        <a href="#!" class="btn bsb-btn-2xl btn-primary rounded-pill">More Plans</a>
                    </div>
                    <div class="col-12 col-lg-8">
                        <div class="row justify-content-xl-end">
                            <div class="col-12 col-xl-11">
                                <div class="row gy-4 gy-md-0 gx-xxl-5">
                                    <div class="col-12 col-md-6">
                                        <div class="card border-0 border-bottom border-primary shadow-sm">
                                            <div class="card-body p-4 p-xxl-5">
                                                <h2 class="h4 mb-2">Basic</h2>
                                                <h4 class="display-3 fw-bold text-primary mb-0">$50</h4>
                                                <p class="text-secondary mb-4">USD / Month</p>
                                                <ul class="list-group list-group-flush mb-4">
                                                    <li class="list-group-item">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                            height="24" fill="currentColor" class="bi bi-check"
                                                            viewBox="0 0 16 16">
                                                            <path
                                                                d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z" />
                                                        </svg>
                                                        <span><strong>3</strong> Extra days</span>
                                                    </li>
                                                    <li class="list-group-item">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                            height="24" fill="currentColor" class="bi bi-check"
                                                            viewBox="0 0 16 16">
                                                            <path
                                                                d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z" />
                                                        </svg>
                                                        <span><strong>2</strong> Doctor Subscribtion</span>
                                                    </li>
                                                    <li class="list-group-item">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                            height="24" fill="currentColor" class="bi bi-check"
                                                            viewBox="0 0 16 16">
                                                            <path
                                                                d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z" />
                                                        </svg>
                                                        <span><strong>1</strong> Delivery for week</span>
                                                    </li>
                                                    <li class="list-group-item">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                            height="24" fill="currentColor"
                                                            class="bi bi-x text-danger" viewBox="0 0 16 16">
                                                            <path
                                                                d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z" />
                                                        </svg>
                                                        <span>Free <strong>IOT Instalation</strong></span>
                                                    </li>
                                                    <li class="list-group-item">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                            height="24" fill="currentColor"
                                                            class="bi bi-x text-danger" viewBox="0 0 16 16">
                                                            <path
                                                                d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z" />
                                                        </svg>
                                                        <span>Free <strong>Support</strong></span>
                                                    </li>
                                                </ul>
                                                <a href="#!"
                                                    class="btn bsb-btn-2xl btn-primary rounded-pill">Choose Plan</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div
                                            class="card border-0 border-bottom border-primary shadow-lg pt-md-4 pb-md-4 bsb-pricing-popular">
                                            <div class="card-body p-4 p-xxl-5">
                                                <h2 class="h4 mb-2">Pro</h2>
                                                <h4 class="display-3 fw-bold text-primary mb-0">$149</h4>
                                                <p class="text-secondary mb-4">USD / Month</p>
                                                <ul class="list-group list-group-flush mb-4">
                                                    <li class="list-group-item">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                            height="24" fill="currentColor" class="bi bi-check"
                                                            viewBox="0 0 16 16">
                                                            <path
                                                                d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z" />
                                                        </svg>
                                                        <span><strong>10</strong> Extra Days</span>
                                                    </li>
                                                    <li class="list-group-item">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                            height="24" fill="currentColor" class="bi bi-check"
                                                            viewBox="0 0 16 16">
                                                            <path
                                                                d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z" />
                                                        </svg>
                                                        <span><strong>5</strong> Doctors Subscribtions</span>
                                                    </li>
                                                    <li class="list-group-item">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                            height="24" fill="currentColor" class="bi bi-check"
                                                            viewBox="0 0 16 16">
                                                            <path
                                                                d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z" />
                                                        </svg>
                                                        <span><strong>3</strong> Delivery for week</span>
                                                    </li>
                                                    <li class="list-group-item">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                            height="24" fill="currentColor" class="bi bi-check"
                                                            viewBox="0 0 16 16">
                                                            <path
                                                                d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z" />
                                                        </svg>
                                                        <span>Free <strong>IOT Instalation</strong></span>
                                                    </li>
                                                    <li class="list-group-item">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                            height="24" fill="currentColor" class="bi bi-check"
                                                            viewBox="0 0 16 16">
                                                            <path
                                                                d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z" />
                                                        </svg>
                                                        <span>Free <strong>Support</strong></span>
                                                    </li>
                                                </ul>
                                                <a href="#!"
                                                    class="btn bsb-btn-2xl btn-primary rounded-pill">Choose Plan</a>
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

        <!-- Section - Testimonial -->
        <!-- Testimonial 3 - Bootstrap Brain Component -->
        <section class="py-5 py-xl-8 bsb-section-py-xxl-1">
            <div class="container mb-5 mb-md-6 mb-xl-10">
                <div class="row justify-content-md-center">
                    <div class="col-12 col-md-10 col-lg-9 col-xl-8 col-xxl-7 text-center">
                        <h2 class="display-3 fw-bolder mb-4">We believe in client <br><mark
                                class="bsb-tpl-highlight bsb-tpl-highlight-yellow"><span
                                    class="bsb-tpl-font-hw display-1 text-primary fw-normal">satisfaction</span></mark>.
                            Here are some testimonials by our worthy clients.</h2>
                    </div>
                </div>
            </div>

            <div class="container overflow-hidden">
                <div class="row gy-4 gy-md-0 gx-xxl-5">
                    <div class="col-12 col-md-4">
                        <div class="card border-0 border-bottom border-primary shadow-sm">
                            <div class="card-body p-4 p-xxl-5">
                                <figure>
                                    <img class="img-fluid rounded rounded-circle mb-4 border border-5" loading="lazy"
                                        src="./assets/img/testimonial/testimonial-img-1.jpg" alt="Luna John">
                                    <figcaption>
                                        <div class="bsb-ratings text-warning mb-3" data-bsb-star="5"
                                            data-bsb-star-off="0"></div>
                                        <blockquote class="bsb-blockquote-icon mb-4">We were so impressed with the work
                                            they did for us. They were able to take our vision and turn it into a
                                            reality, and they did it all on time and within budget. We would highly
                                            recommend them to anyone looking for a reliable partner.</blockquote>
                                        <h4 class="mb-2">Luna John</h4>
                                        <h5 class="fs-6 text-secondary mb-0">UX Designer</h5>
                                    </figcaption>
                                </figure>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-4">
                        <div class="card border-0 border-bottom border-primary shadow-sm">
                            <div class="card-body p-4 p-xxl-5">
                                <figure>
                                    <img class="img-fluid rounded rounded-circle mb-4 border border-5" loading="lazy"
                                        src="./assets/img/testimonial/testimonial-img-2.jpg" alt="Mark Smith">
                                    <figcaption>
                                        <div class="bsb-ratings text-warning mb-3" data-bsb-star="4"
                                            data-bsb-star-off="1"></div>
                                        <blockquote class="bsb-blockquote-icon mb-4">We were looking for a company that
                                            could help us develop a new website that was both visually appealing and
                                            user-friendly. We are so happy with the results, and we would highly
                                            recommend them to anyone looking for a new website.</blockquote>
                                        <h4 class="mb-2">Mark Smith</h4>
                                        <h5 class="fs-6 text-secondary mb-0">Marketing Specialist</h5>
                                    </figcaption>
                                </figure>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-4">
                        <div class="card border-0 border-bottom border-primary shadow-sm">
                            <div class="card-body p-4 p-xxl-5">
                                <figure>
                                    <img class="img-fluid rounded rounded-circle mb-4 border border-5" loading="lazy"
                                        src="./assets/img/testimonial/testimonial-img-4.jpg" alt="Luke Reeves">
                                    <figcaption>
                                        <div class="bsb-ratings text-warning mb-3" data-bsb-star="5"
                                            data-bsb-star-off="0"></div>
                                        <blockquote class="bsb-blockquote-icon mb-4">We were looking for a company that
                                            could help us with our branding. We needed a website and marketing
                                            materials. They were able to create a brand identity that we loved. They
                                            worked with us to develop a logo that represented our company.</blockquote>
                                        <h4 class="mb-2">Luke Reeves</h4>
                                        <h5 class="fs-6 text-secondary mb-0">Sales Manager</h5>
                                    </figcaption>
                                </figure>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>



        <!-- Section - Contact -->
        <!-- Contact 2 - Bootstrap Brain Component -->
        <section id="scrollspyContact" class="py-5 py-xl-8 bsb-section-py-xxl-1">
            <div class="container">
                <div class="row gy-3 gy-md-4 gy-lg-0 align-items-lg-center">
                    <div class="col-12 col-lg-6">
                        <img class="img-fluid rounded" loading="lazy" src="./assets/img/contact/contact-img-1.jpg"
                            alt="">
                    </div>
                    <div class="col-12 col-lg-6">
                        <div class="row justify-content-xl-center">
                            <div class="col-12 col-xl-11">
                                <h2 class="h1 mb-3">Get in touch</h2>
                                <p class="lead fs-4 text-secondary mb-5">We're always on the lookout to work with new
                                    clients. If you're interested in contacting us, please get in touch in one of the
                                    following ways.</p>
                                <div class="d-flex mb-4">
                                    <div class="me-4 text-primary">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32"
                                            fill="currentColor" class="bi bi-geo" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd"
                                                d="M8 1a3 3 0 1 0 0 6 3 3 0 0 0 0-6zM4 4a4 4 0 1 1 4.5 3.969V13.5a.5.5 0 0 1-1 0V7.97A4 4 0 0 1 4 3.999zm2.493 8.574a.5.5 0 0 1-.411.575c-.712.118-1.28.295-1.655.493a1.319 1.319 0 0 0-.37.265.301.301 0 0 0-.057.09V14l.002.008a.147.147 0 0 0 .016.033.617.617 0 0 0 .145.15c.165.13.435.27.813.395.751.25 1.82.414 3.024.414s2.273-.163 3.024-.414c.378-.126.648-.265.813-.395a.619.619 0 0 0 .146-.15.148.148 0 0 0 .015-.033L12 14v-.004a.301.301 0 0 0-.057-.09 1.318 1.318 0 0 0-.37-.264c-.376-.198-.943-.375-1.655-.493a.5.5 0 1 1 .164-.986c.77.127 1.452.328 1.957.594C12.5 13 13 13.4 13 14c0 .426-.26.752-.544.977-.29.228-.68.413-1.116.558-.878.293-2.059.465-3.34.465-1.281 0-2.462-.172-3.34-.465-.436-.145-.826-.33-1.116-.558C3.26 14.752 3 14.426 3 14c0-.599.5-1 .961-1.243.505-.266 1.187-.467 1.957-.594a.5.5 0 0 1 .575.411z" />
                                        </svg>
                                    </div>
                                    <div>
                                        <h4 class="mb-3">Address</h4>
                                        <address class="mb-0 text-secondary">Blvd Soudani Boujmaa, Guelma, Guelma,
                                            Algeria</address>
                                    </div>
                                </div>
                                <div class="d-flex mb-4">
                                    <div class="me-4 text-primary">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32"
                                            fill="currentColor" class="bi bi-telephone-outbound" viewBox="0 0 16 16">
                                            <path
                                                d="M3.654 1.328a.678.678 0 0 0-1.015-.063L1.605 2.3c-.483.484-.661 1.169-.45 1.77a17.568 17.568 0 0 0 4.168 6.608 17.569 17.569 0 0 0 6.608 4.168c.601.211 1.286.033 1.77-.45l1.034-1.034a.678.678 0 0 0-.063-1.015l-2.307-1.794a.678.678 0 0 0-.58-.122l-2.19.547a1.745 1.745 0 0 1-1.657-.459L5.482 8.062a1.745 1.745 0 0 1-.46-1.657l.548-2.19a.678.678 0 0 0-.122-.58L3.654 1.328zM1.884.511a1.745 1.745 0 0 1 2.612.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511zM11 .5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 .5.5v4a.5.5 0 0 1-1 0V1.707l-4.146 4.147a.5.5 0 0 1-.708-.708L14.293 1H11.5a.5.5 0 0 1-.5-.5z" />
                                        </svg>
                                    </div>
                                    <div>
                                        <h4 class="mb-3">Phone</h4>
                                        <p class="mb-0">
                                            <a class="link-secondary text-decoration-none"
                                                href="tel:+213659249661">(+213) 659-249661</a>
                                        </p>
                                    </div>
                                </div>
                                <div class="d-flex">
                                    <div class="me-4 text-primary">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32"
                                            fill="currentColor" class="bi bi-envelope-at" viewBox="0 0 16 16">
                                            <path
                                                d="M2 2a2 2 0 0 0-2 2v8.01A2 2 0 0 0 2 14h5.5a.5.5 0 0 0 0-1H2a1 1 0 0 1-.966-.741l5.64-3.471L8 9.583l7-4.2V8.5a.5.5 0 0 0 1 0V4a2 2 0 0 0-2-2H2Zm3.708 6.208L1 11.105V5.383l4.708 2.825ZM1 4.217V4a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v.217l-7 4.2-7-4.2Z" />
                                            <path
                                                d="M14.247 14.269c1.01 0 1.587-.857 1.587-2.025v-.21C15.834 10.43 14.64 9 12.52 9h-.035C10.42 9 9 10.36 9 12.432v.214C9 14.82 10.438 16 12.358 16h.044c.594 0 1.018-.074 1.237-.175v-.73c-.245.11-.673.18-1.18.18h-.044c-1.334 0-2.571-.788-2.571-2.655v-.157c0-1.657 1.058-2.724 2.64-2.724h.04c1.535 0 2.484 1.05 2.484 2.326v.118c0 .975-.324 1.39-.639 1.39-.232 0-.41-.148-.41-.42v-2.19h-.906v.569h-.03c-.084-.298-.368-.63-.954-.63-.778 0-1.259.555-1.259 1.4v.528c0 .892.49 1.434 1.26 1.434.471 0 .896-.227 1.014-.643h.043c.118.42.617.648 1.12.648Zm-2.453-1.588v-.227c0-.546.227-.791.573-.791.297 0 .572.192.572.708v.367c0 .573-.253.744-.564.744-.354 0-.581-.215-.581-.8Z" />
                                        </svg>
                                    </div>
                                    <div>
                                        <h4 class="mb-3">E-Mail</h4>
                                        <p>
                                            <a class="link-secondary text-decoration-none"
                                                href="mailto:azzedine.dhiya.eddine@gmail.com">Aisha@healthcare.com</a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </main>

    <!-- Footer 2 - Bootstrap Brain Component -->
    <footer class="footer">

        <!-- Widgets - Bootstrap Brain Component -->
        <section class="bg-light py-4 py-md-5 py-xl-8 border-top border-light">
            <div class="container overflow-">
                <div class="row gy-4 gy-lg-0 justify-content-xl-between">
                    <div class="col-12 col-md-4 col-lg-3 col-xl-2">
                        <div class="widget">
                            <a href="#!">
                                <img style="transform: scale(1.7)" src="./images/aisha.png" alt=""
                                    class="bsb-tpl-logo-footer">
                            </a>
                        </div>
                    </div>
                    <div class="col-12 col-md-4 col-lg-3 col-xl-2">
                        <div class="widget">
                            <h4 class="widget-title mb-4">Get in Touch</h4>
                            <address class="mb-4">Blvd Soudani Boujmaa, Guelma, Guelma, Algeria</address>
                            <p class="mb-1">
                                <a class="link-secondary text-decoration-none" href="tel:+213659249661">(+213)
                                    659-249661</a>
                            </p>
                            <p class="mb-0">
                                <a class="link-secondary text-decoration-none"
                                    href="azzedine.dhiya.eddine@gmail.com">Aisha@healthcare.com</a>
                            </p>
                        </div>
                    </div>
                    <div class="col-12 col-md-4 col-lg-3 col-xl-2">
                        <div class="widget">
                            <h4 class="widget-title mb-4">Learn More</h4>
                            <ul class="list-unstyled">
                                <li class="mb-2">
                                    <a href="#!" class="link-secondary text-decoration-none">About</a>
                                </li>
                                <li class="mb-2">
                                    <a href="#!" class="link-secondary text-decoration-none">Contact</a>
                                </li>
                                <li class="mb-2">
                                    <a href="#!" class="link-secondary text-decoration-none">Advertise</a>
                                </li>
                                <li class="mb-2">
                                    <a href="#!" class="link-secondary text-decoration-none">Terms of Service</a>
                                </li>
                                <li class="mb-0">
                                    <a href="#!" class="link-secondary text-decoration-none">Privacy Policy</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-12 col-lg-3 col-xl-4">
                        <div class="widget">
                            <h4 class="widget-title mb-4">Our Newsletter</h4>
                            <p class="mb-4">Subscribe to our newsletter to get our news & discounts delivered to you.
                            </p>
                            <form action="#!">
                                <div class="row gy-4">
                                    <div class="col-12">
                                        <div class="input-group">
                                            <span class="input-group-text" id="email-newsletter-addon">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                    fill="currentColor" class="bi bi-envelope" viewBox="0 0 16 16">
                                                    <path
                                                        d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4Zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2Zm13 2.383-4.708 2.825L15 11.105V5.383Zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741ZM1 11.105l4.708-2.897L1 5.383v5.722Z" />
                                                </svg>
                                            </span>
                                            <input type="email" class="form-control" id="email-newsletter"
                                                value="" placeholder="Email Address"
                                                aria-label="email-newsletter"
                                                aria-describedby="email-newsletter-addon" required>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="d-grid">
                                            <button class="btn btn-primary" type="submit">Subscribe</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Copyright - Bootstrap Brain Component -->
        <div class="bg-light py-4 py-md-5 py-xl-8 border-top border-light-subtle">
            <div class="container overflow-hidden">
                <div class="row gy-4 gy-md-0">
                    <div class="col-xs-12 col-md-7 order-1 order-md-0">
                        <div class="copyright text-center text-md-start">
                            &copy; 2023. All Rights Reserved.
                        </div>
                        <div class="credits text-secondary text-center text-md-start mt-2 fs-7">
                            Built by <a href="https://bootstrapbrain.com/"
                                class="link-secondary text-decoration-none">Aisha </a> with <span
                                class="text-primary">&#9829;</span>
                        </div>
                    </div>

                    <div class="col-xs-12 col-md-5 order-0 order-md-1">
                        <ul class="nav justify-content-center justify-content-md-end">
                            <li class="nav-item">
                                <a class="nav-link link-dark" href="#!">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        fill="currentColor" class="bi bi-facebook" viewBox="0 0 16 16">
                                        <path
                                            d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z" />
                                    </svg>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link link-dark" href="#!">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        fill="currentColor" class="bi bi-youtube" viewBox="0 0 16 16">
                                        <path
                                            d="M8.051 1.999h.089c.822.003 4.987.033 6.11.335a2.01 2.01 0 0 1 1.415 1.42c.101.38.172.883.22 1.402l.01.104.022.26.008.104c.065.914.073 1.77.074 1.957v.075c-.001.194-.01 1.108-.082 2.06l-.008.105-.009.104c-.05.572-.124 1.14-.235 1.558a2.007 2.007 0 0 1-1.415 1.42c-1.16.312-5.569.334-6.18.335h-.142c-.309 0-1.587-.006-2.927-.052l-.17-.006-.087-.004-.171-.007-.171-.007c-1.11-.049-2.167-.128-2.654-.26a2.007 2.007 0 0 1-1.415-1.419c-.111-.417-.185-.986-.235-1.558L.09 9.82l-.008-.104A31.4 31.4 0 0 1 0 7.68v-.123c.002-.215.01-.958.064-1.778l.007-.103.003-.052.008-.104.022-.26.01-.104c.048-.519.119-1.023.22-1.402a2.007 2.007 0 0 1 1.415-1.42c.487-.13 1.544-.21 2.654-.26l.17-.007.172-.006.086-.003.171-.007A99.788 99.788 0 0 1 7.858 2h.193zM6.4 5.209v4.818l4.157-2.408L6.4 5.209z" />
                                    </svg>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link link-dark" href="#!">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        fill="currentColor" class="bi bi-twitter" viewBox="0 0 16 16">
                                        <path
                                            d="M5.026 15c6.038 0 9.341-5.003 9.341-9.334 0-.14 0-.282-.006-.422A6.685 6.685 0 0 0 16 3.542a6.658 6.658 0 0 1-1.889.518 3.301 3.301 0 0 0 1.447-1.817 6.533 6.533 0 0 1-2.087.793A3.286 3.286 0 0 0 7.875 6.03a9.325 9.325 0 0 1-6.767-3.429 3.289 3.289 0 0 0 1.018 4.382A3.323 3.323 0 0 1 .64 6.575v.045a3.288 3.288 0 0 0 2.632 3.218 3.203 3.203 0 0 1-.865.115 3.23 3.23 0 0 1-.614-.057 3.283 3.283 0 0 0 3.067 2.277A6.588 6.588 0 0 1 .78 13.58a6.32 6.32 0 0 1-.78-.045A9.344 9.344 0 0 0 5.026 15z" />
                                    </svg>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link link-dark" href="#!">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        fill="currentColor" class="bi bi-instagram" viewBox="0 0 16 16">
                                        <path
                                            d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z" />
                                    </svg>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

    </footer>

    <!-- Javascript Files: Vendors -->
    <script src="https://unpkg.com/jquery@3.6.1/dist/jquery.min.js"></script>
    <script src="https://unpkg.com/isotope-layout@3.0.6/dist/isotope.pkgd.min.js"></script>
    <script src="https://unpkg.com/isotope-packery@2.0.1/packery-mode.pkgd.min.js"></script>
    <script src="https://unpkg.com/imagesloaded@5.0.0/imagesloaded.pkgd.min.js"></script>
    <script src="https://unpkg.com/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Javascript Files: Controllers -->
    <script src="./assets/controller/project-2.js"></script>
    <script src="./assets/controller/wave-bsb.js"></script>
    <script src="https://vjs.zencdn.net/8.10.0/video.min.js"></script>

    <!-- BSB Body End -->
</body>

</html>
