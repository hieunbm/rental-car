@extends("admin.layout.layout")
@section("title","Contact Query")
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
        <div class="row">
            <div class="col-xl-12">
                <div class="card custom-card">
                    <div class="card-header justify-content-between">
                        <div class="card-title">Car Type</div>
                        <div class="prism-toggle">
                            <button class="btn btn-sm btn-primary-light">Show<i
                                    class="ri-code-line ms-2 d-inline-block align-middle"></i></button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table align-middle">
                                <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">User ID</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Phone</th>
                                    <th scope="col" class="w-25">Message</th>
                                    <th scope="col">Created At</th>
                                    <th scope="col">Update At</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($contactquery as $cq)
                                    <tr>
                                        <th scope="row">{{$cq->id}}</th>
                                        <th scope="row">{{$cq->user_id}}</th>
                                        <td>{{$cq->name}}</td>
                                        <td>{{$cq->email}}</td>
                                        <td>{{$cq->phone}}</td>
                                        <td>{{$cq->message}}</td>
                                        <td><span class="badge bg-outline-secondary">{{$cq->created_at}}</span></td>
                                        <td><span class="badge bg-outline-success">{{$cq->updated_at}}</span></td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
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
