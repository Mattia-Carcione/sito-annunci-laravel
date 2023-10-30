<x-layout>
    <main>

        <!-- Masthead-->
        <header id="intro" class="mask p-0 z-0" style="background-color: rgba(0, 0, 0, 1);">


            <div id="header-home"
                class="bg-image text-dark text-center cover-container d-flex p-3 flex-column p-0 m-0 mx-auto align-items-center"
                style="height: 100vh;">
                <div class="pt-5 d-flex justify-content-center d-block">
                    <ul class="d-flex flex-row pt-5">
                        <li class="me-3 me-lg-0">
                            <form class="d-flex" role="search" action="{{ route('announcements.search') }}"
                                method="GET">
                                <input class="form-control me-2" style="width: 400px; border-radius:20px;" name="searched" type="search" placeholder="Search"
                                    aria-label="Search">
                                <button class="btn" style="background-color: #C5DCDC"
                                    type="submit">{{ __('ui.search') }}</button>
                            </form>
                        </li>

                    </ul>
                </div>

                {{-- <img src="https://www.logicinbound.com/wp-content/uploads/2018/01/shutterstock_779835055-1080x778.jpg" class="object-fit-cover position-absolute opacity-50" style="width: 100%; height: 100%" alt=""> --}}

            </div>
        </header>
        <div class="w-50 position-relative w-75 px-5 text-center mx-auto" style="filter:none; top:-25%;">
            @if (session()->has('access.denied'))
                <div class="flex flex-row justify-content-center alert alert-danger">
                    {{ session('access.denied') }}
                </div>
            @endif
            @if (session()->has('message'))
                <div class="flex flex-row justify-content-center alert alert-success">
                    {{ session('message') }}
                </div>
            @endif

            <h1 class="fw-bolder" style="text-shadow: 1px 1px 4px white">
                FindEasy.com</h1>
            <p class="lead fw-bolder" style="text-shadow: 1px 1px 4px white">{{ __('ui.subtitle') }}</p>
        </div>

        <!-- Portfolio Section-->
        <section class="page-section portfolio" id="portfolio">
            <div class="container">
                <!-- Portfolio Section Heading-->
                <h2 class="page-section-heading text-center text-uppercase text-secondary p-0"
                    style="color: #2c3e50 !important ">{{ __('ui.announcements') }}</h2>
                <!-- Icon Divider-->
                <div class="divider-custom">
                    <div class="divider-custom-line"></div>
                    <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                    <div class="divider-custom-line"></div>
                </div>
                <!-- annunci -->
                <div class="container">

                    <div class="row justify-content-center mb-3 p-4">
                        @forelse ($announcements as $announcement)
                            <div class="product-card col-12 col-md-4 m-2">
                                @if ($announcement->created_at->diffInHours(now()) <= 24)
                                    <div class="badge rounded-pill mb-2" style="background-color: #5478F0;">New</div>
                                @endif

                                <img src="{{ !$announcement->images()->get()->isEmpty()? $announcement->images()->first()->getUrl(300, 300): 'https://www.venetoformazione.it/wp-content/uploads/2022/02/ottimizzare-immagini-display-retina.jpg' }}"
                                    alt="" class="img-fluid">
                                <div class="product-details">
                                    <span class="product-catagory">{{ $announcement->category->name }}</span>
                                    <h4><a style="color: #5478F0"
                                            href="{{ route('announcements.show', $announcement) }}">{{ $announcement->title }}</a>
                                    </h4>
                                    <p class="description-overflow descrizione" id="descrizione">
                                        {{ $announcement->description }}
                                    </p>
                                    <span href="" class="btn-hidden">{{__('ui.showMore')}}</span>
                                    <p class="card-footer my-2">{{__('ui.date')}} {{$announcement->created_at->format('d/m/Y')}}    {{__('ui.author')}} {{$announcement->user->name ?? ''}}</p>
                                    <div class="product-bottom-details">
                                        <div class="product-price">€{{ $announcement->price }}</div>
                                        <div class="product-links">
                                            <a href=""><i class="fa fa-heart"></i></a>
                                            <a href=""><i class="fa fa-shopping-cart"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @empty
                        @endforelse
                    </div>

                </div>

                {{--                 <!-- Categories Section-->
        <section class="page-section portfolio" id="portfolio">
            <div class="container">
                <!-- Categories Section Heading-->
                <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Categorie</h2>
                <!-- Icon Divider-->
                <div class="divider-custom">
                    <div class="divider-custom-line"></div>
                    <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                    <div class="divider-custom-line"></div>
                </div>
                <!-- Portfolio Grid Items-->
                <div class="row justify-content-center">
                    <!-- Portfolio Item 1-->
                    <div class="col-md-6 col-lg-4 mb-5">
                        <div class="portfolio-item mx-auto" data-bs-toggle="modal" data-bs-target="#portfolioModal1">
                            <div
                                class="portfolio-item-caption d-flex align-items-center justify-content-center h-100 w-100">
                                <div class="portfolio-item-caption-content text-center text-white"><i
                                        class="fas fa-plus fa-3x"></i></div>
                            </div>
                            <img class="img-fluid" src="assets/img/portfolio/cabin.png" alt="..." />
                        </div>
                    </div>
                    <!-- Portfolio Item 2-->
                    <div class="col-md-6 col-lg-4 mb-5">
                        <div class="portfolio-item mx-auto" data-bs-toggle="modal" data-bs-target="#portfolioModal2">
                            <div
                                class="portfolio-item-caption d-flex align-items-center justify-content-center h-100 w-100">
                                <div class="portfolio-item-caption-content text-center text-white"><i
                                        class="fas fa-plus fa-3x"></i></div>
                            </div>
                            <img class="img-fluid" src="assets/img/portfolio/cake.png" alt="..." />
                        </div>
                    </div>
                    <!-- Portfolio Item 3-->
                    <div class="col-md-6 col-lg-4 mb-5">
                        <div class="portfolio-item mx-auto" data-bs-toggle="modal" data-bs-target="#portfolioModal3">
                            <div
                                class="portfolio-item-caption d-flex align-items-center justify-content-center h-100 w-100">
                                <div class="portfolio-item-caption-content text-center text-white"><i
                                        class="fas fa-plus fa-3x"></i></div>
                            </div>
                            <img class="img-fluid" src="assets/img/portfolio/circus.png" alt="..." />
                        </div>
                    </div>
                    <!-- Portfolio Item 4-->
                    <div class="col-md-6 col-lg-4 mb-5 mb-lg-0">
                        <div class="portfolio-item mx-auto" data-bs-toggle="modal" data-bs-target="#portfolioModal4">
                            <div
                                class="portfolio-item-caption d-flex align-items-center justify-content-center h-100 w-100">
                                <div class="portfolio-item-caption-content text-center text-white"><i
                                        class="fas fa-plus fa-3x"></i></div>
                            </div>
                            <img class="img-fluid" src="assets/img/portfolio/game.png" alt="..." />
                        </div>
                    </div>
                    <!-- Portfolio Item 5-->
                    <div class="col-md-6 col-lg-4 mb-5 mb-md-0">
                        <div class="portfolio-item mx-auto" data-bs-toggle="modal" data-bs-target="#portfolioModal5">
                            <div
                                class="portfolio-item-caption d-flex align-items-center justify-content-center h-100 w-100">
                                <div class="portfolio-item-caption-content text-center text-white"><i
                                        class="fas fa-plus fa-3x"></i></div>
                            </div>
                            <img class="img-fluid" src="assets/img/portfolio/safe.png" alt="..." />
                        </div>
                    </div>
                    <!-- Portfolio Item 6-->
                    <div class="col-md-6 col-lg-4">
                        <div class="portfolio-item mx-auto" data-bs-toggle="modal" data-bs-target="#portfolioModal6">
                            <div
                                class="portfolio-item-caption d-flex align-items-center justify-content-center h-100 w-100">
                                <div class="portfolio-item-caption-content text-center text-white"><i
                                        class="fas fa-plus fa-3x"></i></div>
                            </div>
                            <img class="img-fluid" src="assets/img/portfolio/submarine.png" alt="..." />
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- About Section-->
        <section class="page-section header-color-personal text-white mb-0" id="about">
            <div class="container">
                <!-- About Section Heading-->
                <h2 class="page-section-heading text-center text-uppercase text-white">About</h2>
                <!-- Icon Divider-->
                <div class="divider-custom divider-light">
                    <div class="divider-custom-line"></div>
                    <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                    <div class="divider-custom-line"></div>
                </div>
                <!-- About Section Content-->
                <div class="row">
                    <div class="col-lg-4 ms-auto">
                        <p class="lead">Freelancer is a free bootstrap theme created by Start Bootstrap. The download
                            includes the complete source files including HTML, CSS, and JavaScript as well as optional
                            SASS stylesheets for easy customization.</p>
                    </div>
                    <div class="col-lg-4 me-auto">
                        <p class="lead">You can create your own custom avatar for the masthead, change the icon in the
                            dividers, and add your email address to the contact form to make it fully functional!</p>
                    </div>
                </div>
                <!-- About Section Button-->
                <div class="text-center mt-4">
                    <a class="btn btn-xl btn-outline-light" href="https://startbootstrap.com/theme/freelancer/">
                        <i class="fas fa-download me-2"></i>
                        Free Download!
                    </a>
                </div>
            </div>
        </section>
        <!-- Contact Section-->
        <section class="page-section" id="contact">
            <div class="container">
                <!-- Contact Section Heading-->
                <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Contact Me</h2>
                <!-- Icon Divider-->
                <div class="divider-custom">
                    <div class="divider-custom-line"></div>
                    <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                    <div class="divider-custom-line"></div>
                </div>
                <!-- Contact Section Form-->
                <div class="row justify-content-center">
                    <div class="col-lg-8 col-xl-7">
                        <!-- * * * * * * * * * * * * * * *-->
                        <!-- * * SB Forms Contact Form * *-->
                        <!-- * * * * * * * * * * * * * * *-->
                        <!-- This form is pre-integrated with SB Forms.-->
                        <!-- To make this form functional, sign up at-->
                        <!-- https://startbootstrap.com/solution/contact-forms-->
                        <!-- to get an API token!-->
                        <form id="contactForm" data-sb-form-api-token="API_TOKEN">
                            <!-- Name input-->
                            <div class="form-floating mb-3">
                                <input class="form-control" id="name" type="text"
                                    placeholder="Enter your name..." data-sb-validations="required" />
                                <label for="name">Full name</label>
                                <div class="invalid-feedback" data-sb-feedback="name:required">A name is required.
                                </div>
                            </div>
                            <!-- Email address input-->
                            <div class="form-floating mb-3">
                                <input class="form-control" id="email" type="email"
                                    placeholder="name@example.com" data-sb-validations="required,email" />
                                <label for="email">Email address</label>
                                <div class="invalid-feedback" data-sb-feedback="email:required">An email is required.
                                </div>
                                <div class="invalid-feedback" data-sb-feedback="email:email">Email is not valid.</div>
                            </div>
                            <!-- Phone number input-->
                            <div class="form-floating mb-3">
                                <input class="form-control" id="phone" type="tel"
                                    placeholder="(123) 456-7890" data-sb-validations="required" />
                                <label for="phone">Phone number</label>
                                <div class="invalid-feedback" data-sb-feedback="phone:required">A phone number is
                                    required.</div>
                            </div>
                            <!-- Message input-->
                            <div class="form-floating mb-3">
                                <textarea class="form-control" id="message" type="text" placeholder="Enter your message here..."
                                    style="height: 10rem" data-sb-validations="required"></textarea>
                                <label for="message">Message</label>
                                <div class="invalid-feedback" data-sb-feedback="message:required">A message is
                                    required.</div>
                            </div>
                            <!-- Submit success message-->
                            <!---->
                            <!-- This is what your users will see when the form-->
                            <!-- has successfully submitted-->
                            <div class="d-none" id="submitSuccessMessage">
                                <div class="text-center mb-3">
                                    <div class="fw-bolder">Form submission successful!</div>
                                    To activate this form, sign up at
                                    <br />
                                    <a
                                        href="https://startbootstrap.com/solution/contact-forms">https://startbootstrap.com/solution/contact-forms</a>
                                </div>
                            </div>
                            <!-- Submit error message-->
                            <!---->
                            <!-- This is what your users will see when there is-->
                            <!-- an error submitting the form-->
                            <div class="d-none" id="submitErrorMessage">
                                <div class="text-center text-danger mb-3">Error sending message!</div>
                            </div>
                            <!-- Submit Button-->
                            <button class="btn btn-primary btn-xl disabled" id="submitButton"
                                type="submit">Send</button>
                        </form>
                    </div>
                </div>
            </div>
        </section> --}}
                <!-- Footer-->

                <!-- Copyright Section-->

                <!-- Portfolio Modals-->
                <!-- Portfolio Modal 1-->
                <div class="portfolio-modal modal fade" id="portfolioModal1" tabindex="-1"
                    aria-labelledby="portfolioModal1" aria-hidden="true">
                    <div class="modal-dialog modal-xl">
                        <div class="modal-content">
                            <div class="modal-header border-0"><button class="btn-close" type="button"
                                    data-bs-dismiss="modal" aria-label="Close"></button></div>
                            <div class="modal-body text-center pb-5">
                                <div class="container">
                                    <div class="row justify-content-center">
                                        <div class="col-lg-8">
                                            <!-- Portfolio Modal - Title-->
                                            <h2 class="portfolio-modal-title text-secondary text-uppercase mb-0">Log
                                                Cabin</h2>
                                            <!-- Icon Divider-->
                                            <div class="divider-custom">
                                                <div class="divider-custom-line"></div>
                                                <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                                                <div class="divider-custom-line"></div>
                                            </div>
                                            <img class="img-fluid" src="assets/img/portfolio/cabin.png"
                                                alt="..." />
                                        </div>
                                    </div>
                                    <!-- Portfolio Item 2-->
                                    <div class="col-md-6 col-lg-4 mb-5">
                                        <div class="portfolio-item mx-auto" data-bs-toggle="modal"
                                            data-bs-target="#portfolioModal2">
                                            <div
                                                class="portfolio-item-caption d-flex align-items-center justify-content-center h-100 w-100">
                                                <div class="portfolio-item-caption-content text-center text-white"><i
                                                        class="fas fa-plus fa-3x"></i></div>
                                            </div>
                                            <img class="img-fluid" src="assets/img/portfolio/cake.png" alt="..." />
                                        </div>
                                    </div>
                                    <!-- Portfolio Item 3-->
                                    <div class="col-md-6 col-lg-4 mb-5">
                                        <div class="portfolio-item mx-auto" data-bs-toggle="modal"
                                            data-bs-target="#portfolioModal3">
                                            <div
                                                class="portfolio-item-caption d-flex align-items-center justify-content-center h-100 w-100">
                                                <div class="portfolio-item-caption-content text-center text-white"><i
                                                        class="fas fa-plus fa-3x"></i></div>
                                            </div>
                                            <img class="img-fluid" src="assets/img/portfolio/circus.png"
                                                alt="..." />
                                        </div>
                                    </div>
                                    <!-- Portfolio Item 4-->
                                    <div class="col-md-6 col-lg-4 mb-5 mb-lg-0">
                                        <div class="portfolio-item mx-auto" data-bs-toggle="modal"
                                            data-bs-target="#portfolioModal4">
                                            <div
                                                class="portfolio-item-caption d-flex align-items-center justify-content-center h-100 w-100">
                                                <div class="portfolio-item-caption-content text-center text-white"><i
                                                        class="fas fa-plus fa-3x"></i></div>
                                            </div>
                                            <img class="img-fluid" src="assets/img/portfolio/game.png"
                                                alt="..." />
                                        </div>
                                    </div>
                                    <!-- Portfolio Item 5-->
                                    <div class="col-md-6 col-lg-4 mb-5 mb-md-0">
                                        <div class="portfolio-item mx-auto" data-bs-toggle="modal"
                                            data-bs-target="#portfolioModal5">
                                            <div
                                                class="portfolio-item-caption d-flex align-items-center justify-content-center h-100 w-100">
                                                <div class="portfolio-item-caption-content text-center text-white"><i
                                                        class="fas fa-plus fa-3x"></i></div>
                                            </div>
                                            <img class="img-fluid" src="assets/img/portfolio/safe.png"
                                                alt="..." />
                                        </div>
                                    </div>
                                    <!-- Portfolio Item 6-->
                                    <div class="col-md-6 col-lg-4">
                                        <div class="portfolio-item mx-auto" data-bs-toggle="modal"
                                            data-bs-target="#portfolioModal6">
                                            <div
                                                class="portfolio-item-caption d-flex align-items-center justify-content-center h-100 w-100">
                                                <div class="portfolio-item-caption-content text-center text-white"><i
                                                        class="fas fa-plus fa-3x"></i></div>
                                            </div>
                                            <img class="img-fluid" src="assets/img/portfolio/submarine.png"
                                                alt="..." />
                                        </div>
                                    </div>
                                </div>
                            </div>
        </section>

    </main>

</x-layout>
