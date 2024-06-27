<x-layouts.wrapper>
    <section x-data="{show : false}" id="scrollspyHero" class="bsb-hero-2 relative bsb-tpl-bg-blue py-5 py-xl-8 py-xxl-10">
        <div class="container overflow-hidden">
            <div class="row gy-3 gy-lg-0 align-items-lg-center justify-content-lg-between">
                <div class="col-12 col-lg-6 order-1 order-lg-0">
                    <h1 class="display-3 fw-bolder mb-3">{{ __('index.header.first_line') }} <br><mark
                            class="bsb-tpl-highlight bsb-tpl-highlight-blue"><span
                                class="bsb-tpl-font-hw display-2 text-primary fw-normal">
                                {{ __('index.header.special_word') }}
                            </span></mark>{!! __('index.header.second_line') !!}</h1>
                    <p class="fs-4 mb-5">{{ __('index.header.subheading') }}</p>
                    <div class="d-grid gap-2 d-sm-flex">
                        <button @click="show = true" type="button" class="btn btn-primary bsb-btn-3xl rounded-pill">
                            Start now <i class="bi bi-arrow-right"></i>
                        </button>

                        <button class="btn btn-outline-primary bsb-btn-3xl rounded-pill">
                            <i class="bi bi-play-circle"></i>
                            <span>
                                {{ __('index.header.vid_btn') }}
                            </span>
                        </button>
                    </div>
                </div>
                <div class="col-12 col-lg-5 text-center">
                    <img class="img-fluid" loading="lazy" src="./images/aisha.png" alt="aisha logo">
                </div>
            </div>
        </div>

        <div x-show="show" x-transition class="absolute w-full h-full top-0 left-0 bg-black bg-opacity-50 flex justify-center items-center flex-wrap">
            <div class="w-10/12 p-6 h-11/12 max-h-screen overflow-auto gap-4 bg-white rounded-lg shadow-lg flex flex-col">
                <div class="header flex justify-between items-center">
                    <h1 class="font-semibold drop-shadow text-2xl text-sky-500 capitalize">
                        Continue as :
                    </h1>

                    <i @click="show=false" class="bi bi-x-lg cursor-pointer text-2xl text-red-500 hover:text-red-700 anim-300"></i>
                </div>
                <div class="w-full h-auto flex-wrap h-auto flex justify-center gap-3">
                    <div class="min-w-[350px] hover:scale-105 anim-300 w-72 h-96 bg-slate-100 rounded-lg shadow-md p-4 flex gap-2 flex-col items-center">
                        <div class="mx-auto w-32 h-32 rounded-full overflow-hidden bg-sky-500">
                            <img src="{{asset('./images/doc-avatar.jpg')}}" class="w-full h-full object-cover" alt="doctor avatar">
                        </div>
        
                        <h2 class="text-xl text-slate-800 text-center font-bold uppercase tracking-wide">
                            Doctor
                        </h2>

                        <p class="text-slate-600 drop-shadow text-center">
                            help improve your patients experience
                            by degetalize the transactions with the help of
                            the power of <span class="font-semibold text-sky-700">Artificial Intelegence</span>
                        </p>

                        <a href="{{ route('filament.doctor.auth.register') }}" class="flex gap-2 font-semibold  text-sky-500 hover:text-sky-600 anim-300">
                            continue <i class="bi bi-arrow-right"></i>
                        </a>
                    </div>

                    <div class="min-w-[350px] hover:scale-105 anim-300 w-72 h-96 bg-slate-100 rounded-lg shadow-md p-4 flex gap-2 flex-col items-center">
                        <div class="mx-auto w-32 h-32 rounded-full overflow-hidden bg-sky-500">
                            <img src="{{asset('./images/pharmacy-avatar.jpg')}}" class="w-full h-full object-cover" alt="doctor avatar">
                        </div>
        
                        <h2 class="text-xl text-slate-800 text-center font-bold uppercase tracking-wide">
                            Pharmacy
                        </h2>

                        <p class="text-slate-600 drop-shadow text-center">
                           make the business easy with our stock manager and delivery system that
                           help people to find you with <span class="font-semibold text-sky-700">our system</span>
                        </p>

                        <a href="{{ route('filament.pharmacy.auth.register') }}" class="flex gap-2 font-semibold  text-sky-500 hover:text-sky-600 anim-300">
                            continue <i class="bi bi-arrow-right"></i>
                        </a>
                    </div>

                    <div class="min-w-[350px] hover:scale-105 anim-300 w-72 h-96 bg-slate-100 rounded-lg shadow-md p-4 flex gap-2 flex-col items-center">
                        <div class="mx-auto w-32 h-32 rounded-full overflow-hidden bg-white">
                            <img src="{{asset('./images/patient-avatar.jpg')}}" class="w-full h-full" alt="doctor avatar">
                        </div>
        
                        <h2 class="text-xl text-slate-800 text-center font-bold uppercase tracking-wide">
                            Patient
                        </h2>

                        <p class="text-slate-600 drop-shadow text-center">
                           improve you healthcare experience and be so close to your doctors and 
                           discover your health state with <span class="font-semibold text-sky-700">Artificial Intelegence</span>
                        </p>

                        <a href="{{ route('filament.patient.auth.register') }}" class="flex gap-2 font-semibold  text-sky-500 hover:text-sky-600 anim-300">
                            continue <i class="bi bi-arrow-right"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

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
                                    <div id="collapseOne" class="accordion-collapse show"
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
                                    <div id="collapseTwo" class="accordion-collapse"
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
                                    <h4 class="mb-1">Karim Aouaouda</h4>
                                    <p class="text-secondary mb-0">Software Engineer and ( CEO )</p>
                                </figcaption>
                            </figure>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-3">
                    <div class="card border-0 border-bottom border-primary shadow-sm overflow-hidden">
                        <div class="card-body p-0">
                            <figure class="m-0 p-0">
                                <img style="height: 16rem" class="img-fluid" loading="lazy" src="{{ asset('./images/kirati.jpg') }}"
                                     alt="">
                                <figcaption class="m-0 p-4">
                                    <h4 class="mb-1">Dr.A Kirati</h4>
                                    <p class="text-secondary mb-0">Health Specialist</p>
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
                                <img class="img-fluid w-24 h-24 rounded object-cover bg-white rounded-circle mb-4 border border-5" loading="lazy"
                                     src="{{ asset('./images/bachir_bien.jpg') }}" alt="Luna John">
                                <figcaption>
                                    <div class="bsb-ratings text-warning mb-3" data-bsb-star="5"
                                         data-bsb-star-off="0"></div>
                                    <blockquote class="bsb-blockquote-icon mb-4">I am a person who suffers
                                         from summer allergies that cause me shortness of breath.
                                          Aisha helped me remember my oxygen spray before bed and during
                                           sleep in some seizures. It also helped me remember the times for my
                                            medications and appointments with doctors,
                                         which contributed to a noticeable improvement in my condition compared to previous years.</blockquote>
                                    <h4 class="mb-2">Mohammed Bachir Hammouche</h4>
                                    <h5 class="fs-6 text-secondary mb-0">DZ Telecom</h5>
                                </figcaption>
                            </figure>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-4">
                    <div class="card border-0 border-bottom border-primary shadow-sm">
                        <div class="card-body p-4 p-xxl-5">
                            <figure>
                                <img class="w-24 h-24 object-cover rounded-full border-5 border-sky-300" loading="lazy"
                                     src="{{ asset('./images/billel_bien.jpg') }}" alt="Mark Smith">
                                <figcaption>
                                    <div class="bsb-ratings text-warning mb-3" data-bsb-star="4"
                                         data-bsb-star-off="1"></div>
                                    <blockquote class="bsb-blockquote-icon mb-4">I suffer from excessive thinking and obsessive thoughts,
                                         which leads to a lot of insomnia and excessive thinking that affects my mental and physical health.
                                          After dealing with Aisha, she guided me and improved my way of thinking about problems and matters. 
                                        I think in a positive way, which led to a great extent to the gradual disappearance of these symptoms..</blockquote>
                                    <h4 class="mb-2">Gueffel Bilal</h4>
                                    <h5 class="fs-6 text-secondary mb-0">Chicken Seller</h5>
                                </figcaption>
                            </figure>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-4">
                    <div class="card border-0 border-bottom border-primary shadow-sm">
                        <div class="card-body p-4 p-xxl-5">
                            <figure>
                                <img class="img-fluid w-24 !h-24 object-cover rounded-circle mb-4 border border-5" loading="lazy"
                                     src="{{ asset('./images/samer_bien.jpg') }}" alt="Luke Reeves">
                                <figcaption>
                                    <div class="bsb-ratings text-warning mb-3" data-bsb-star="5"
                                         data-bsb-star-off="0"></div>
                                    <blockquote class="bsb-blockquote-icon mb-4">I was addicted to smoking,
                                         which caused me to be irritable and anxious.
                                          I began to suffer from many financial and family problems.
                                           After adopting and trying the Aisha project,
                                            I noticed a lot of support from doctors and constant monitoring of activities to help me quit. 
                                        I am now clean for more then three months into.</blockquote>
                                    <h4 class="mb-2">Bazine Samer</h4>
                                    <h5 class="fs-6 text-secondary mb-0">Bank Manager</h5>
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

    @vite('resources/js/alpine.js')

</x-layouts.wrapper>
