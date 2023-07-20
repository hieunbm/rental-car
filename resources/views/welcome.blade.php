@extends('web.layout.layout')
@section("main")
    <style>
        .ratings i{
            color:#cecece;
            font-size:16px;
        }

        .rating-color{
            color:#fbc634 !important;
        }

        .title-car h4 {
            text-transform: capitalize;
            height: 26px;
            overflow: hidden;
            display: block;
            display: -webkit-box;
            -webkit-box-orient: vertical;
            -webkit-line-clamp: 1;
            text-overflow: ellipsis;
        }
    </style>
    <div class="no-bottom no-top" id="content">
        <div id="top"></div>
        <section id="section-hero" aria-label="section" class="jarallax no-top no-bottom" data-video-src="https://www.youtube.com/watch?v=5qbjKpxfD64">
            <div class="overlay-bg no-top no-bottom">
                <div class="v-center">
                    <div class="container position-relative z1000">
                        <div class="spacer-double d-lg-none d-sm-block"></div>
                        <div class="spacer-double d-lg-none d-sm-block"></div>
                        <div class="spacer-double d-lg-none d-sm-block"></div>
                        <div class="row align-items-center">
                            <div class="col-lg-6 text-light pt-5">
                                <h4><span class="id-color">Fast and Easy Way to Rent a Car</span></h4>
                                <div class="spacer-10"></div>
                                <h1 class="mb-2">Explore the world with comfortable car</h1>
                                <div class="spacer-10"></div>
                                <p class="lead">Embark on unforgettable adventures and discover the world in unparalleled comfort and style with our fleet of exceptionally comfortable cars.</p>
                            </div>

                            <div class="col-lg-6">

                            </div>
                            <div class="col-lg-12 text-light" style="background-size: 100%; background-repeat: no-repeat;">
                                <div class="container-timeline" style="background-size: 100%; background-repeat: no-repeat;">
                                    <ul>
                                        <li>
                                            <h4>Choose a vehicle</h4>
                                            <p>Unlock unparalleled adventures and memorable journeys with our vast fleet of vehicles tailored to suit every need, taste, and destination.</p>
                                        </li>
                                        <li>
                                            <h4>Pick location &amp; date</h4>
                                            <p>Pick your ideal location and date, and let us take you on a journey filled with convenience, flexibility, and unforgettable experiences.</p>
                                        </li>
                                        <li>
                                            <h4>Make a booking</h4>
                                            <p>Secure your reservation with ease, unlocking a world of possibilities and embarking on your next adventure with confidence.</p>
                                        </li>
                                        <li>
                                            <h4>Sit back &amp; relax</h4>
                                            <p>Hassle-free convenience as we take care of every detail, allowing you to unwind and embrace a journey filled comfort.</p>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="spacer-double d-lg-none d-sm-block"></div>
                        <div class="spacer-double d-lg-none d-sm-block"></div>
                    </div>

                    <div class="position-absolute d-flex bottom-20">
                        <div class="de-marquee-list d-marquee-small">
                            <div class="d-item">
                                <span class="d-item-txt">SUV</span>
                                <span class="d-item-display">
                                <i class="d-item-dot"></i>
                              </span>
                                <span class="d-item-txt">Hatchback</span>
                                <span class="d-item-display">
                                <i class="d-item-dot"></i>
                              </span>
                                <span class="d-item-txt">Crossover</span>
                                <span class="d-item-display">
                                <i class="d-item-dot"></i>
                              </span>
                                <span class="d-item-txt">Convertible</span>
                                <span class="d-item-display">
                                <i class="d-item-dot"></i>
                              </span>
                                <span class="d-item-txt">Sedan</span>
                                <span class="d-item-display">
                                <i class="d-item-dot"></i>
                              </span>
                                <span class="d-item-txt">Sports Car</span>
                                <span class="d-item-display">
                                <i class="d-item-dot"></i>
                              </span>
                                <span class="d-item-txt">Coupe</span>
                                <span class="d-item-display">
                                <i class="d-item-dot"></i>
                              </span>
                                <span class="d-item-txt">Minivan</span>
                                <span class="d-item-display">
                                <i class="d-item-dot"></i>
                              </span>
                                <span class="d-item-txt">Station Wagon</span>
                                <span class="d-item-display">
                                <i class="d-item-dot"></i>
                              </span>
                                <span class="d-item-txt">Pickup Truck</span>
                                <span class="d-item-display">
                                <i class="d-item-dot"></i>
                              </span>
                                <span class="d-item-txt">Minivans</span>
                                <span class="d-item-display">
                                <i class="d-item-dot"></i>
                              </span>
                                <span class="d-item-txt">Exotic Cars</span>
                                <span class="d-item-display">
                                <i class="d-item-dot"></i>
                              </span>
                            </div>
                        </div>

                        <div class="de-marquee-list d-marquee-small">
                            <div class="d-item">
                                <span class="d-item-txt">SUV</span>
                                <span class="d-item-display">
                                <i class="d-item-dot"></i>
                              </span>
                                <span class="d-item-txt">Hatchback</span>
                                <span class="d-item-display">
                                <i class="d-item-dot"></i>
                              </span>
                                <span class="d-item-txt">Crossover</span>
                                <span class="d-item-display">
                                <i class="d-item-dot"></i>
                              </span>
                                <span class="d-item-txt">Convertible</span>
                                <span class="d-item-display">
                                <i class="d-item-dot"></i>
                              </span>
                                <span class="d-item-txt">Sedan</span>
                                <span class="d-item-display">
                                <i class="d-item-dot"></i>
                              </span>
                                <span class="d-item-txt">Sports Car</span>
                                <span class="d-item-display">
                                <i class="d-item-dot"></i>
                              </span>
                                <span class="d-item-txt">Coupe</span>
                                <span class="d-item-display">
                                <i class="d-item-dot"></i>
                              </span>
                                <span class="d-item-txt">Minivan</span>
                                <span class="d-item-display">
                                <i class="d-item-dot"></i>
                              </span>
                                <span class="d-item-txt">Station Wagon</span>
                                <span class="d-item-display">
                                <i class="d-item-dot"></i>
                              </span>
                                <span class="d-item-txt">Pickup Truck</span>
                                <span class="d-item-display">
                                <i class="d-item-dot"></i>
                              </span>
                                <span class="d-item-txt">Minivans</span>
                                <span class="d-item-display">
                                <i class="d-item-dot"></i>
                              </span>
                                <span class="d-item-txt">Exotic Cars</span>
                                <span class="d-item-display">
                                <i class="d-item-dot"></i>
                              </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="section-cars">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 offset-lg-3 text-center">
                        <h2>Our Vehicle Fleet</h2>
                        <p>Driving your dreams to reality with an exquisite fleet of versatile vehicles for unforgettable journeys.</p>
                        <div class="spacer-20"></div>
                    </div>

                    <div class="clearfix"></div>

                    <div id="items-carousel" class="owl-carousel wow fadeIn">
                        @foreach($car as $c)
                        <div class="col-lg-12">
                            <div class="de-item mb30">
                                <div class="d-img">
                                    <img src="{{$c->thumbnail}}" class="img-fluid" alt="">
                                </div>
                                <div class="d-info">
                                    <div class="d-text">
                                        <div style="display: flex" class="title-car">
                                            <h4 style="width: 65%">{{$c->model}}</h4>
                                            <div class="d-item_like">
                                                <div class="ratings">
                                                    <i class="fa fa-star rating-color"></i>
                                                    <i class="fa fa-star rating-color"></i>
                                                    <i class="fa fa-star rating-color"></i>
                                                    <i class="fa fa-star rating-color"></i>
                                                    <i class="fa fa-star"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="d-atr-group">
                                            <span class="d-atr"><img src="images/icons/1.svg" alt="">{{$c->seats}}</span>
                                            <span class="d-atr"><img src="images/icons/2.svg" alt="">{{$c->price}}</span>
                                            <span class="d-atr"><img src="images/icons/3.svg" alt="">{{$c->price}}</span>
                                            <span class="d-atr"><img src="images/icons/4.svg" alt="">{{$c->carType->name}}</span>
                                        </div>
                                        <div class="d-price">
                                            Daily rate from <span>{{$c->price}}</span>
                                            <a class="btn-main" href="{{url("/car",["car"=>$c->slug])}}">Rent Now</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>

                </div>
            </div>
        </section>

        <section class="text-light jarallax">
            <img src="images/background/2.jpg" class="jarallax-img" alt="">
            <div class="container">
                <div class="row g-5">
                    <div class="col-lg-6 wow fadeInRight">
                        <h2>We offer customers a wide range of <span class="id-color">commercial cars</span> and <span class="id-color">luxury cars</span> for any occasion.</h2>
                    </div>
                    <div class="col-lg-6 wow fadeInLeft">
                        At our car rental agency, we believe that everyone deserves to experience the pleasure of driving a reliable and comfortable vehicle, regardless of their budget. We have curated a diverse fleet of well-maintained cars, ranging from sleek sedans to spacious SUVs, all at competitive prices. With our streamlined rental process, you can quickly and conveniently reserve your desired vehicle. Whether you need transportation for a business trip, family vacation, or simply want to enjoy a weekend getaway, we have flexible rental options to accommodate your schedule.
                    </div>
                </div>
                <div class="spacer-double"></div>
                <div class="row text-center">
                    <div class="col-md-3 col-sm-6 mb-sm-30">
                        <div class="de_count transparent text-light wow fadeInUp">
                            <h3 class="timer" data-to="{{$countCar}}" data-speed="3000">0</h3>
                            Cars
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 mb-sm-30">
                        <div class="de_count transparent text-light wow fadeInUp">
                            <h3 class="timer" data-to="{{$countBrand}}" data-speed="3000">0</h3>
                            Brands
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 mb-sm-30">
                        <div class="de_count transparent text-light wow fadeInUp">
                            <h3 class="timer" data-to="{{$countRental}}" data-speed="3000">0</h3>
                            Rentals
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 mb-sm-30">
                        <div class="de_count transparent text-light wow fadeInUp">
                            <h3 class="timer" data-to="{{$countRental}}" data-speed="3000">0</h3>
                            Rentals
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section aria-label="section">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 offset-lg-3 text-center">
                        <h2>Our Features</h2>
                        <p>Discover a world of convenience, safety, and customization, paving the way for unforgettable adventures and seamless mobility solutions.</p>
                        <div class="spacer-20"></div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="col-lg-3">
                        <div class="box-icon s2 p-small mb20 wow fadeInRight" data-wow-delay=".5s">
                            <i class="fa bg-color fa-trophy"></i>
                            <div class="d-inner">
                                <h4>First class services</h4>
                                Where luxury meets exceptional care, creating unforgettable moments and exceeding your every expectation.
                            </div>
                        </div>
                        <div class="box-icon s2 p-small mb20 wow fadeInL fadeInRight" data-wow-delay=".75s">
                            <i class="fa bg-color fa-road"></i>
                            <div class="d-inner">
                                <h4>24/7 road assistance</h4>
                                Reliable support when you need it most, keeping you on the move with confidence and peace of mind.
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <img src="images/misc/car-2.png" alt="" class="img-fluid wow fadeInUp">
                    </div>

                    <div class="col-lg-3">
                        <div class="box-icon s2 d-invert p-small mb20 wow fadeInL fadeInLeft" data-wow-delay="1s">
                            <i class="fa bg-color fa-tag"></i>
                            <div class="d-inner">
                                <h4>Quality at Minimum Expense</h4>
                                Unlocking affordable brilliance with elevating quality while minimizing costs for maximum value.
                            </div>
                        </div>
                        <div class="box-icon s2 d-invert p-small mb20 wow fadeInL fadeInLeft" data-wow-delay="1.25s">
                            <i class="fa bg-color fa-map-pin"></i>
                            <div class="d-inner">
                                <h4>Free Pick-Up & Drop-Off</h4>
                                Enjoy free pickup and drop-off services, adding an extra layer of ease to your car rental experience.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="section-img-with-tab" class="bg-dark text-light">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-5 offset-lg-7">

                        <h2>Only Quality For Clients</h2>
                        <div class="spacer-20"></div>

                        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">Luxury</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Comfort</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#pills-contact" type="button" role="tab" aria-controls="pills-contact" aria-selected="false">Prestige</button>
                            </li>
                        </ul>
                        <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab"><p>We offer a meticulously curated collection of the most sought-after luxury vehicles on the market. Whether you prefer the sporty allure of a high-performance sports car, the sophistication of a sleek and luxurious sedan, or the versatility of a premium SUV, we have the perfect car to match your discerning taste.</p></div>
                            <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab"><p>We prioritize your comfort and convenience throughout your journey. We understand that a comfortable ride can make a world of difference, whether you're embarking on a business trip or enjoying a leisurely vacation. That's why we offer a wide range of well-maintained, comfortable cars that cater to your specific needs.</p></div>
                            <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab"><p>We understand that prestige goes beyond luxury. It's about making a statement, embracing sophistication, and indulging in the finer things in life. That's why we offer an exclusive selection of prestigious cars that exude elegance, style, and status.</p></div>
                        </div>

                    </div>
                </div>
            </div>

            <div class="image-container col-md-6 pull-right" data-bgimage="url(images/misc/e2.jpg) center"></div>
        </section>

        <section id="section-testimonials" class="no-bottom">
            <div class="container-fluid">
                <div class="row g-0 align-items-center">

                    <div class="col-md-4">
                        <div class="de-image-text">
                            <div class="d-text">
                                <div class="d-quote id-color"><i class="fa fa-quote-right"></i></div>
                                <h4>Excellent Service! Car Rent Service!</h4>
                                <blockquote>
                                    I have been using Rentaly for my Car Rental needs for over 5 years now. I have never had any problems with their service. Their customer support is always responsive and helpful. I would recommend Rentaly to anyone looking for a reliable Car Rental provider.
                                    <span class="by">Stepanie Hutchkiss</span>
                                </blockquote>
                            </div>
                            <img src="images/testimonial/1.jpg" class="img-fluid" alt="">
                        </div>
                    </div>


                    <div class="col-md-4">
                        <div class="de-image-text">
                            <div class="d-text">
                                <div class="d-quote id-color"><i class="fa fa-quote-right"></i></div>
                                <h4>Excellent Service! Car Rent Service!</h4>
                                <blockquote>
                                    We have been using Rentaly for our trips needs for several years now and have always been happy with their service. Their customer support is Excellent Service! and they are always available to help with any issues we have. Their prices are also very competitive.
                                    <span class="by">Jovan Reels</span>
                                </blockquote>
                            </div>
                            <img src="images/testimonial/2.jpg" class="img-fluid" alt="">
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="de-image-text">
                            <div class="d-text">
                                <div class="d-quote id-color"><i class="fa fa-quote-right"></i></div>
                                <h4>Excellent Service! Car Rent Service!</h4>
                                <blockquote>
                                    Endorsed by industry experts, Rentaly is the Car Rental solution you can trust. With years of experience in the field, we provide fast, reliable and secure Car Rental services.
                                    <span class="by">Kanesha Keyton</span>
                                </blockquote>
                            </div>
                            <img src="images/testimonial/3.jpg" class="img-fluid" alt="">
                        </div>
                    </div>

                </div>
            </div>
        </section>

        <section id="section-faq">
            <div class="container">
                <div class="row">
                    <div class="col text-center">
                        <h2>Have Any Questions?</h2>
                        <div class="spacer-20"></div>
                    </div>
                </div>
                <div class="row g-custom-x">
                    <div class="col-md-6 wow fadeInUp">
                        <div class="accordion secondary">
                            <div class="accordion-section">
                                <div class="accordion-section-title" data-tab="#accordion-1">
                                    How do I get started with Car Rental?
                                </div>
                                <div class="accordion-section-content" id="accordion-1">
                                    <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio.</p>
                                </div>
                                <div class="accordion-section-title" data-tab="#accordion-2">
                                    What is difference for each plan?
                                </div>
                                <div class="accordion-section-content" id="accordion-2">
                                    <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio.</p>
                                </div>
                                <div class="accordion-section-title" data-tab="#accordion-3">
                                    What kind of Car Rental do I need?
                                </div>
                                <div class="accordion-section-content" id="accordion-3">
                                    <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio.</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 wow fadeInUp">
                        <div class="accordion secondary">
                            <div class="accordion-section">
                                <div class="accordion-section-title" data-tab="#accordion-b-4">
                                    Why do I need domain name?
                                </div>
                                <div class="accordion-section-content" id="accordion-b-4">
                                    <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio.</p>
                                </div>
                                <div class="accordion-section-title" data-tab="#accordion-b-5">
                                    What my website protected from hackers?
                                </div>
                                <div class="accordion-section-content" id="accordion-b-5">
                                    <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio.</p>
                                </div>
                                <div class="accordion-section-title" data-tab="#accordion-b-6">
                                    How do I backup my website?
                                </div>
                                <div class="accordion-section-content" id="accordion-b-6">
                                    <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="section-call-to-action" class="bg-color-2 pt60 pb60 text-light">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 offset-lg-1">
                        <h2 class="s2">Call us for further information. Rentaly customer care is here to help you anytime.</h2>
                    </div>

                    <div class="col-lg-5 text-lg-center text-sm-center">
                        <div class="phone-num-big">
                            <i class="fa fa-phone"></i>
                            <span class="pnb-text">
                                    Call Us Now
                                </span>
                            <span class="pnb-num">
                                    1 200 333 800
                                </span>
                        </div>
                        <a href="{{url("/contact")}}" class="btn-main">Contact Us</a>
                    </div>
                </div>
            </div>
        </section>

    </div>
@endsection
