@extends('web.layout.layout')
@section("title","Create Contact")
@section("main")
    <!-- content begin -->
    <div class="no-bottom no-top" id="content">
        <div id="top"></div>

        <!-- section begin -->
        @include('web.html.breadcrumb')
        <!-- section close -->

        <section aria-label="section">
            <div class="container">
                <div class="row g-custom-x">
                    <div class="col-lg-8 mb-sm-30">

                        <h3>Do you have any question?</h3>

                        <form name="contactForm" id="contact_form" class="form-border" method="post" action="{{url("contact/create")}}">
                            @csrf
                            <div class="row">
                                <div class="col-md-4 mb10">
                                    <div class="field-set">
                                        <input type="text" name="name" id="name" class="form-control"
                                               placeholder="Your Name" required>
                                    </div>
                                </div>
                                <div class="col-md-4 mb10">
                                    <div class="field-set">
                                        <input type="text" name="email" id="email" class="form-control"
                                               placeholder="Your Email" required>
                                    </div>
                                </div>
                                <div class="col-md-4 mb10">
                                    <div class="field-set">
                                        <input type="text" name="phone" id="phone" class="form-control"
                                               placeholder="Your Phone" required>
                                    </div>
                                </div>
                            </div>

                            <div class="field-set mb20">
                                <textarea name="message" id="message" class="form-control" placeholder="Your Message"
                                          required></textarea>
                            </div>
                            <div class="g-recaptcha" data-sitekey="6LdW03QgAAAAAJko8aINFd1eJUdHlpvT4vNKakj6"></div>
                            <div id='submit' class="mt20">
                                <input type='submit' id='send_message' value='Send Message' class="btn-main">
                            </div>

                            <div id="success_message" class='success'>
                                Your message has been sent successfully. Refresh this page if you want to send more
                                messages.
                            </div>
                            <div id="error_message" class='error'>
                                Sorry there was an error sending your form.
                            </div>
                        </form>
                    </div>
                    <div class="col-lg-4">
                        <div class="de-box mb30">
                            <h4 style="margin-bottom: 20px">VIE Office</h4>
                            <address class="s1">
                                <span style="margin-bottom: 25px"><i class="id-color fa fa-map-marker fa-lg"></i>No. 8A Ton That Thuyet, My Dinh, Nam Tu Liem, Hanoi, Vietnam</span>
                                <span style="margin-bottom: 25px"><i class="id-color fa fa-phone fa-lg"></i>Contact info: +1 333 9296</span>
                                <span style="margin-bottom: 25px"><i class="id-color fa fa-envelope-o fa-lg"></i><a
                                        href="#">contact@example.com</a></span>
                            </address>
                        </div>
                    </div>
                </div>
            </div>

        </section>

    </div>
    <!-- content close -->

    <a href="#" id="back-to-top"></a>
@endsection
