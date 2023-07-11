@extends('web.layout.layout')
@section("title","Receive")
@section("main")
    <!-- Thông báo -->
    <div id="status-message"></div>

    <div class="no-bottom no-top" id="content">
        <div id="top"></div>

        <!-- section begin -->
        @include('web.html.breadcrumb')
        <!-- section close -->

        <section aria-label="section">
            <div class="container">
                <div class="row g-custom-x">
                    <div class="col-lg-12 mb-sm-30">

                        <h3>The process of receiving the car</h3>

                        <form name="contactForm" enctype="multipart/form-data" id="contact_form" class="form-border" method="post" action="{{url("/receive", ["rental" => $rental->id])}}">
                            @csrf
                            <div class="row">
                                <div class="col-md-6 mb10">
                                    <script class="jsbin" src="https://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
                                    <div class="file-upload">
                                        <button class="file-upload-btn" type="button" onclick="$('#file-upload-input-1').trigger( 'click' )">Add Image</button>

                                        <div class="image-upload-wrap" id="image-upload-wrap-1">
                                            <input name="thumbnail_1" class="file-upload-input" id="file-upload-input-1" type='file' onchange="readURL1(this);" accept="image/*" />
                                            <div class="drag-text">
                                                <h3>Drag and drop a file or select add Image</h3>
                                            </div>
                                        </div>
                                        <div class="file-upload-content" id="file-upload-content-1">
                                            <img class="file-upload-image" id="file-upload-image-1" src="#" alt="your image" />
                                            <div class="image-title-wrap">
                                                <button type="button" onclick="removeUpload1()" class="remove-image">Remove <span class="image-title" id="image-title-1">Uploaded Image</span></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 mb10">
                                    <script class="jsbin" src="https://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
                                    <div class="file-upload">
                                        <button class="file-upload-btn" type="button" onclick="$('#file-upload-input-2').trigger( 'click' )">Add Image</button>

                                        <div class="image-upload-wrap" id="image-upload-wrap-2">
                                            <input name="thumbnail_2" class="file-upload-input" id="file-upload-input-2" type='file' onchange="readURL2(this);" accept="image/*" />
                                            <div class="drag-text">
                                                <h3>Drag and drop a file or select add Image</h3>
                                            </div>
                                        </div>
                                        <div class="file-upload-content" id="file-upload-content-2">
                                            <img class="file-upload-image" id="file-upload-image-2" src="#" alt="your image" />
                                            <div class="image-title-wrap">
                                                <button type="button" onclick="removeUpload2()" class="remove-image">Remove <span class="image-title" id="image-title-2">Uploaded Image</span></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="field-set mb20">
                                <textarea name="note" id="message" class="form-control" placeholder="Your Message"
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
                </div>
            </div>
        </section>
    </div>
    <style>
        .file-upload {
            background-color: #ffffff;
            width: 600px;
            margin: 0 auto;
            padding: 20px;
        }

        .file-upload-btn {
            width: 100%;
            margin: 0;
            color: #fff;
            background: #1FB264;
            border: none;
            padding: 10px;
            border-radius: 4px;
            border-bottom: 4px solid #15824B;
            transition: all .2s ease;
            outline: none;
            text-transform: uppercase;
            font-weight: 700;
        }

        .file-upload-btn:hover {
            background: #1AA059;
            color: #ffffff;
            transition: all .2s ease;
            cursor: pointer;
        }

        .file-upload-btn:active {
            border: 0;
            transition: all .2s ease;
        }

        .file-upload-content {
            display: none;
            text-align: center;
        }

        .file-upload-input {
            position: absolute;
            margin: 0;
            padding: 0;
            width: 50%;
            height: 50%;
            outline: none;
            opacity: 0;
            cursor: pointer;
        }

        .image-upload-wrap {
            margin-top: 20px;
            border: 4px dashed #1FB264;
            position: relative;
        }

        .image-dropping,
        .image-upload-wrap:hover {
            background-color: #1FB264;
            border: 4px dashed #ffffff;
        }

        .image-title-wrap {
            padding: 0 15px 15px 15px;
            color: #222;
        }

        .drag-text {
            text-align: center;
        }

        .drag-text h3 {
            font-weight: 100;
            text-transform: uppercase;
            color: #15824B;
            padding: 60px 0;
        }

        .file-upload-image {
            max-height: 200px;
            max-width: 200px;
            margin: auto;
            padding: 20px;
        }

        .remove-image {
            width: 200px;
            margin: 0;
            color: #fff;
            background: #cd4535;
            border: none;
            padding: 10px;
            border-radius: 4px;
            border-bottom: 4px solid #b02818;
            transition: all .2s ease;
            outline: none;
            text-transform: uppercase;
            font-weight: 700;
        }

        .remove-image:hover {
            background: #c13b2a;
            color: #ffffff;
            transition: all .2s ease;
            cursor: pointer;
        }

        .remove-image:active {
            border: 0;
            transition: all .2s ease;
        }
    </style>
    <script>
        function readURL1(input) {
            if (input.files && input.files[0]) {

                var reader = new FileReader();

                reader.onload = function(e) {
                    $('#image-upload-wrap-1').hide();

                    $('#file-upload-image-1').attr('src', e.target.result);
                    $('#file-upload-content-1').show();

                    $('#image-title-1').html(input.files[0].name);
                };

                reader.readAsDataURL(input.files[0]);

            } else {
                removeUpload1();
            }
        }

        function removeUpload1() {
            $('#file-upload-input-1').replaceWith($('#file-upload-input-1').clone());
            $('#file-upload-content-1').hide();
            $('#image-upload-wrap-1').show();
        }
        $('#image-upload-wrap-1').bind('dragover', function () {
            $('#image-upload-wrap-1').addClass('image-dropping');
        });
        $('#image-upload-wrap-1').bind('dragleave', function () {
            $('#image-upload-wrap-1').removeClass('image-dropping');
        })

        function readURL2(input) {
            if (input.files && input.files[0]) {

                var reader = new FileReader();

                reader.onload = function(e) {
                    $('#image-upload-wrap-2').hide();

                    $('#file-upload-image-2').attr('src', e.target.result);
                    $('#file-upload-content-2').show();

                    $('#image-title-2').html(input.files[0].name);
                };

                reader.readAsDataURL(input.files[0]);

            } else {
                removeUpload2();
            }
        }

        function removeUpload2() {
            $('#file-upload-input-2').replaceWith($('#file-upload-input-2').clone());
            $('#file-upload-content-2').hide();
            $('#image-upload-wrap-2').show();
        }
        $('#image-upload-wrap-2').bind('dragover', function () {
            $('#image-upload-wrap-2').addClass('image-dropping');
        });
        $('#image-upload-wrap-2').bind('dragleave', function () {
            $('#image-upload-wrap-2').removeClass('image-dropping');
        })
    </script>
@endsection

