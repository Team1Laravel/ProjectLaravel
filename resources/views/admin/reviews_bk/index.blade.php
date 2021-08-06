@extends('admin.layouts.common')
@section('panel')
    <div class="col-lg-12" style="margin-top:20px;">
        <div class="block margin-bottom-sm"
             style="background-color:#222222;box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.4), 0 6px 20px 0 rgba(0, 0, 0, 0.19);font-weight: bolder;">
            <!-- Button Add Genre modal -->
            <div class="row">
                <div style="margin-left: 15px" class="title"><strong>{{$title}}</strong></div>
                <div class="col-md-4">
                    <div class="col-md-10">
                        <input class="form-control" id="myInput" type="text" placeholder="Search..">
                    </div>
                </div>
            </div>
            <button style="float:left;margin: 20px 0" type="button" class="btn btn-success" data-toggle="modal"
                    data-target="#InsertForm">
                Add new &nbsp;<i class="fas fa-plus-circle"></i>
            </button>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Expert name</th>
                        <th>Image</th>
                        <th>Point</th>
                        <th>Create at</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody id="myTable">
                    @foreach ($chuyen_gia_danh_gia as $chuyen_gia)
                        <tr>
                            <th scope="row">{{$chuyen_gia->id}}</th>
                            <td>{{$chuyen_gia->name}}</td>
                            <td class="align-middle"><img width="60px" height="60px;"
                                                          src="{{asset('img/reviewers/'.$chuyen_gia->image)}}">
                            </td>
                            <td>{{$chuyen_gia->point}}</td>
                            <td class="align-middle">{{date('d-m-Y', strtotime($chuyen_gia->created_at))}}</td>
                            <td class="d-flex align-items-center">
                                <button data-url="{{route('admin.review.destroy', $chuyen_gia->id)}}"
                                        type="submit"
                                        class="btn btn-danger btnDelete"
                                        data-toggle="modal"
                                        data-target="#DeleteModal">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                                <button
                                    style="margin-left: 10px"
                                    data-toggle="modal"
                                    data-target="#EditModal"
                                    data-url="{{route('admin.review.edit', $chuyen_gia->id)}}"
                                    class="btn btn-warning mr-2 btnEdit"
                                ><i class="fas fa-eye"></i></button>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>

                </table>
            </div>
            <hr>
            <div style="margin-left: 45%">
                {{$chuyen_gia_danh_gia->links()}}
            </div>
            @include('admin.reviews.create')
            @include('admin.reviews.delete')
            @include('admin.reviews.comment')
        </div>
    </div>

@endsection

@section('scripts')
    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $(document).ready(function () {
            // --------------------INSERT--------------------------------
            $("#InsertChuyenGiaDanhGia").submit(function (e) {
                e.preventDefault();
                const url = $(this).attr("action");
                const formData = new FormData(this);
                $.ajax({
                    url,
                    method: "POST",
                    data: formData,
                    dataType: 'json',
                    processData: false,
                    contentType: false,
                    cache: false,
                    success: function (response) {
                        console.log(response);
                        let html = '';
                        if (response.message) {
                            html = `<div class="alert alert-success alert-center">${response.message}</div>`
                            window.location.reload();
                        }
                        $('body').prepend(html);
                    }
                });
            });
            // --------------------UPDATE--------------------------------
            $(".btnEdit").click(function () {
                $('#EditModal').modal('show');
                const url = $(this).attr('data-url');
                $.ajax({
                    type: "GET",
                    url,
                    success: function (res) {
                        document.getElementById('comment').innerHTML = res.data.comment;
                    }
                })
            })

            // --------------------DELETE--------------------------------
            $(".btnDelete").click(function () {
                const url = $(this).attr('data-url');
                $("#deleteReview").click(function () {
                    $.ajax({
                        type: "DELETE",
                        url,
                        data: {
                            _token: '{{ csrf_token() }}'
                        },
                        success: function (res) {
                            console.log(res)
                            let html = '';
                            if (res.message) {
                                html = `<div class="alert alert-success alert-center">  ${res.message}</div>`
                                window.location.reload();
                            }
                            $('body').prepend(html);
                        }
                    })
                })
            })
        });
    </script>
@endsection















