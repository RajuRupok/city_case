@extends('layouts.citizen.app')

@section('page_title', '| Homepage')

@section('stylesheet_links')
    {{--  External CSS  --}}

@endsection

@section('stylesheet')
    {{--  External CSS  --}}

@endsection

@section('content')
<!-- ======= Hero Section ======= -->
<section id="hero" class="d-flex align-items-center">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 pt-5 pt-lg-0 order-2 order-lg-1 d-flex flex-column justify-content-center">
                <h1 data-aos="fade-up">{{ __('City Case Managerment') }}</h1>
                <h2 data-aos="fade-up" data-aos-delay="400">{{ __('Assign your area problems and we here to solve those.') }}</h2>
                <div data-aos="fade-up" data-aos-delay="800">
                    @auth
                        <a href="{{ route('citizen.case.create') }}" class="btn-get-started text-bold">{{ __('Create Case') }}</a>
                    @else
                        <a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#loginToCCM" class="btn-get-started text-bold">{{ __('Create Case') }}</a>
                    @endauth
                </div>
            </div>
            <div class="col-lg-6 order-1 order-lg-2 hero-img text-center" data-aos="fade-left" data-aos-delay="200">
                <img src="{{ asset('frontend/assets/img/sylhet_city_corporation.png') }}" class="img-fluid animated" alt="" />
            </div>
        </div>
    </div>
</section>
<!-- End Hero -->

<!-- ======= About Us Section ======= -->
<section id="about" class="about">
    <div class="container">
        <div class="section-title" data-aos="fade-up">
            <h2>About Us</h2>
        </div>

        <div class="row content">
            <div class="col-lg-6" data-aos="fade-up" data-aos-delay="150">
                <p>
                    Sylhet City Corporation area 27.36 sq km, located in between 24°51´ and 24°55´ north latitudes and in between 91°50´ and 91°54´ east longitudes. It is bounded by sylhet sadarr upazila on the north, dakshin surma upazila on the south, Sylhet Sadar upazila on the east, Dakshin Surma and Sylhet Sadar upazilas on the west.
                </p>
            </div>
            <div class="col-lg-6 pt-4 pt-lg-0" data-aos="fade-up" data-aos-delay="300">
                <p>
                    Population  Total 270606; male 142320, female 128286. Water bodies Main River: Surma. Administration Sylhet Municipality was formed in 1867 and it was turned into City Corporation on April 9, 2001.
                </p>
                <a href="{{ route('about') }}" class="btn-learn-more">Learn More</a>
            </div>
        </div>
    </div>
</section>
<!-- End About Us Section -->

<!-- ======= Counts Section ======= -->
<section id="counts" class="counts">
    <div class="container">
        <div class="row">
            <div class="image col-xl-5 d-flex align-items-stretch justify-content-center justify-content-xl-start" data-aos="fade-right" data-aos-delay="150">
                <img src="{{ asset('frontend/assets/img/SylhetCityCorporation.jpg') }}" alt="" class="img-fluid img-thumbnail" />
            </div>

            <div class="col-xl-7 d-flex align-items-stretch pt-4 pt-xl-0" data-aos="fade-left" data-aos-delay="300">
                <div class="content d-flex flex-column justify-content-center">
                    <div class="row">
                        <div class="col-md-6 d-md-flex align-items-md-stretch">
                            <div class="count-box">
                                <i class="bi bi-emoji-smile"></i>
                                <span data-purecounter-start="0" data-purecounter-end="65" data-purecounter-duration="1" class="purecounter"></span>
                                <p><strong>Happy Clients</strong> consequuntur voluptas nostrum aliquid ipsam architecto ut.</p>
                            </div>
                        </div>

                        <div class="col-md-6 d-md-flex align-items-md-stretch">
                            <div class="count-box">
                                <i class="bi bi-journal-richtext"></i>
                                <span data-purecounter-start="0" data-purecounter-end="85" data-purecounter-duration="1" class="purecounter"></span>
                                <p><strong>Projects</strong> adipisci atque cum quia aspernatur totam laudantium et quia dere tan</p>
                            </div>
                        </div>

                        <div class="col-md-6 d-md-flex align-items-md-stretch">
                            <div class="count-box">
                                <i class="bi bi-clock"></i>
                                <span data-purecounter-start="0" data-purecounter-end="18" data-purecounter-duration="1" class="purecounter"></span>
                                <p><strong>Years of experience</strong> aut commodi quaerat modi aliquam nam ducimus aut voluptate non vel</p>
                            </div>
                        </div>

                        <div class="col-md-6 d-md-flex align-items-md-stretch">
                            <div class="count-box">
                                <i class="bi bi-award"></i>
                                <span data-purecounter-start="0" data-purecounter-end="15" data-purecounter-duration="1" class="purecounter"></span>
                                <p><strong>Awards</strong> rerum asperiores dolor alias quo reprehenderit eum et nemo pad der</p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End .content-->
            </div>
        </div>
    </div>
</section>
<!-- End Counts Section -->

<!-- ======= Features Section ======= -->
<section id="features" class="features">
    <div class="container">
        <div class="section-title" data-aos="fade-up">
            <h2>{{ __('Services') }}</h2>
            <p>{{ __('All services that are provided by Us') }}</p>
        </div>

        <div class="row" data-aos="fade-up" data-aos-delay="300">
            @foreach ($services as $service)
                <div class="col-md-4 mb-4">
                    <div class="icon-box">
                        <i class="ri-quill-pen-line" style="color: var(--primaryColor);"></i>
                        <h3>
                            <a href="javascript:void(0);">{{ $service->name }}</a>
                        </h3>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
<!-- End Features Section -->

<!-- ======= Contact Section ======= -->
<section id="contact" class="contact">
    <div class="container">
        <div class="section-title" data-aos="fade-up">
            <h2>Contact Us</h2>
        </div>

        <div class="row">
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                <div class="contact-about">
                    <h3>CCM</h3>
                    <p>Cras fermentum odio eu feugiat. Justo eget magna fermentum iaculis eu non diam phasellus. Scelerisque felis imperdiet proin fermentum leo. Amet volutpat consequat mauris nunc congue.</p>
                    <div class="social-links">
                        <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
                        <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                        <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
                        <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 mt-4 mt-md-0" data-aos="fade-up" data-aos-delay="200">
                <div class="info">
                    <div>
                        <i class="ri-map-pin-line"></i>
                        <p>
                            Sylhet City Corporation<br />
                            Sylhet, Bangladesh
                        </p>
                    </div>

                    <div>
                        <i class="ri-mail-send-line"></i>
                        <p>info@ccm.com</p>
                    </div>

                    <div>
                        <i class="ri-phone-line"></i>
                        <p>+1 5589 55488 55s</p>
                    </div>
                </div>
            </div>

            <div class="col-lg-5 col-md-12" data-aos="fade-up" data-aos-delay="300">
                <form action="forms/contact.php" method="post" role="form" class="php-email-form">
                    <div class="form-group">
                        <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required />
                    </div>
                    <div class="form-group">
                        <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required />
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required />
                    </div>
                    <div class="form-group">
                        <textarea class="form-control" name="message" rows="5" placeholder="Message" required></textarea>
                    </div>
                    <div class="my-3">
                        <div class="loading">Loading</div>
                        <div class="error-message"></div>
                        <div class="sent-message">Your message has been sent. Thank you!</div>
                    </div>
                    <div class="text-center"><button type="submit">Send Message</button></div>
                </form>
            </div>
        </div>
    </div>
</section>
<!-- End Contact Section -->
@endsection


@section('script_links')
    {{--  External Javascript  --}}

@endsection

@section('scripts')
    {{--  External Javascript  --}}

@endsection
