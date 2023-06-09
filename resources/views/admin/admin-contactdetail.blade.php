@extends("admin.layout.layout")
@section("title","Contact Query Detail")
@section("main")

    <!-- Start::row-1 -->
    <div class="row">
        <div class="col-xl-12">
            <div class="card custom-card mt-4">
                <div class="card-body">
                    <div class="contact-header">
                        <div class="d-sm-flex d-block align-items-center justify-content-between">
                            <div class="h5 fw-semibold mb-0">@yield("title")</div>
                            <div class="d-flex mt-sm-0 mt-2 align-items-center">
                                <div class="input-group">
                                    <input type="text" class="form-control bg-light border-0" placeholder="Search Contact" aria-describedby="search-contact-member" />
                                    <button class="btn btn-light" type="button" id="search-contact-member"><i class="ri-search-line text-muted"></i></button>
                                </div>
                                <div class="dropdown ms-2">
                                    <button class="btn btn-icon btn-primary-light btn-wave" type="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="ti ti-dots-vertical"></i></button>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="#">Delete All</a></li>
                                        <li><a class="dropdown-item" href="#">Copy All</a></li>
                                        <li><a class="dropdown-item" href="#">Move To</a></li>
                                    </ul>
                                </div>
                                <button class="btn btn-icon btn-secondary-light ms-2" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add Contact"><i class="ri-add-line"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-sm-12">
            <div class="card custom-card">
                <div class="card-body contact-action">
                    <div class="d-flex align-items-top">
                        <div class="d-flex flex-fill flex-wrap gap-2">
                            <div class="avatar avatar-xl avatar-rounded me-3"><img src="../dashboard/images/faces/4.jpg" alt="" /></div>
                            <div>
                                <h6 class="mb-1 fw-semibold">Melissa Jane</h6>
                                <p class="mb-1">melissajane2134@gmail.com</p>
                                <p class="fw-semibold fs-11 mb-0 text-primary">+1(555) 354 2345</p>
                            </div>
                        </div>

                        <div class="d-flex flex-fill flex-wrap gap-2 align-self-center" style="width: 400px;">
                            <p>Message: Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                        </div>

                        <div class="display-id">
                            <div>
                                <p>Id :<span>1</span></p>
                            </div>
                            <div>
                                <p>Id Customer :<span>16</span></p>
                            </div>
                            <div>
                                <p>Status <span class="badge bg-secondary">Secondary</span></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <nav aria-label="Page navigation">
            <ul class="pagination justify-content-end">
                <li class="page-item disabled"><a class="page-link" href="#">Previous</a></li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">Next</a></li>
            </ul>
        </nav>
    </div>
    <!--End::row-1 -->
@endsection
