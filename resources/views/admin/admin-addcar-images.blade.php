@extends("admin.layout.layout")
@section("title", "Add Gallery")
@section("main")
    <!-- Page Header -->
    @include("admin.html.content-header")
    <!-- Page Header Close -->

    <!-- Start: Row -->
    <div class="row">
        <div class="col-xl-12">
            <div class="card custom-card">
                <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <div class="card-header justify-content-between">
                            <div class="card-title"><a href="{{url("/admin/add-car")}}">Add Car Details</a></div>
                        </div>
                    </li>
                    <li class="nav-item" role="presentation">
                        <div class="card-header justify-content-between">
                            <div class="card-title"><a href="{{url("/admin/add-car/images")}}">Add Gallery</a></div>
                        </div>
                    </li>
                </ul>

                <form action="{{url("admin/add-car/images")}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card custom-card"> <div class="card-header"> <div class="card-title"> Multiple Upload </div> </div> <div class="card-body"> <div class="filepond--root multiple-filepond filepond--hopper" data-style-button-remove-item-position="left" data-style-button-process-item-position="right" data-style-load-indicator-position="right" data-style-progress-indicator-position="right" data-style-button-remove-item-align="false" data-style-image-edit-button-edit-item-position="bottom center" style="height: 76px;"><input class="filepond--browser" type="file" id="filepond--browser-r6c1lbu9e" name="filepond" aria-controls="filepond--assistant-r6c1lbu9e" aria-labelledby="filepond--drop-label-r6c1lbu9e" accept="" multiple=""><a class="filepond--credits" aria-hidden="true" href="https://pqina.nl/" target="_blank" rel="noopener noreferrer" style="transform: translateY(68px);">Powered by PQINA</a><div class="filepond--drop-label" style="transform: translate3d(0px, 0px, 0px); opacity: 1;"><label for="filepond--browser-r6c1lbu9e" id="filepond--drop-label-r6c1lbu9e" aria-hidden="true">Drag &amp; Drop your files or <span class="filepond--label-action" tabindex="0">Browse</span></label></div><div class="filepond--list-scroller" style="transform: translate3d(0px, 60px, 0px);"><ul class="filepond--list" role="list"></ul></div><div class="filepond--panel filepond--panel-root" data-scalable="true"><div class="filepond--panel-top filepond--panel-root"></div><div class="filepond--panel-center filepond--panel-root" style="transform: translate3d(0px, 8px, 0px) scale3d(1, 0.6, 1);"></div><div class="filepond--panel-bottom filepond--panel-root" style="transform: translate3d(0px, 68px, 0px);"></div></div><span class="filepond--assistant" id="filepond--assistant-r6c1lbu9e" role="status" aria-live="polite" aria-relevant="additions"></span><div class="filepond--drip"></div><fieldset class="filepond--data"></fieldset></div> </div> </div>
                </form>
            </div>
        </div>
    </div>
    <!-- End: Row -->
@endsection
