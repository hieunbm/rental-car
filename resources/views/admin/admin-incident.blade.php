@extends("admin.layout.layout")
@section("title","Incident")
@section("main")
    <!-- Page Header -->
    @include("admin.html.content-header")
    <!-- Page Header Close -->

    {{--    Start Row--}}
    <div class="row">
        <div class="col-xl-12">
            <div class="card custom-card">
                <div class="card-header justify-content-between flex-wrap">
                    <div class="card-title">Incidents</div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table text-nowrap">
                            <thead class="table-primary">
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">TITLE</th>
                                <th scope="col">RENTAL ID</th>
                                <th scope="col">DESCRIPTION</th>
                                <th scope="col">EXPENCE</th>
                                <th scope="col">
                                    CREATE AT
                                    <br>
                                    UPDATE AT
                                </th>
                                <th>STATUS</th>
                                <th scope="col">ACTION</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($incidents as $item)
                                <tr>
                                    <th>{{$item->id}}</th>
                                    <td>{{$item->title}}</td>
                                    <td>{{$item->rental_id}}</td>
                                    <td>{{$item->description}}</td>
                                    <td>{{$item->expense}}</td>
                                    <td>
                                        {{$item->created_at}}
                                        <br>
                                        {{$item->updated_at}}
                                    </td>
                                    <td>{{$item->status}}</td>
                                    <td>
                                        <div class="hstack gap-2 fs-15">
                                            <a href="#" class="btn btn-icon btn-sm btn-info-transparent rounded-pill"><i class="ri-edit-line"></i></a>
                                            <a href="#" class="btn btn-icon btn-sm btn-danger-transparent rounded-pill"><i class="ri-delete-bin-line"></i></a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="d-flex align-items-center">
                        <div>Showing 6 Entries <i class="bi bi-arrow-right ms-2 fw-semibold"></i></div>
                        <div class="ms-auto">
                            {!! $incidents->appends(app("request")->input())->links("pagination::bootstrap-4") !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{--    End Row--}}

@endsection
