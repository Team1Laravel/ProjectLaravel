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
                        <th>Name</th>
                        <th>Image</th>
                        <th>Detail</th>
                        <th>Nation</th>
                        <th>Facebook</th>
                        <th>Twitter</th>
                        <th>Wiki</th>
                        <th>Birth day</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody id="myTable">
                    @foreach ($casts as $cast)
                        <tr>
                            <th scope="row">{{$cast->id}}</th>
                            <td>{{$cast->name}}</td>
                            <td class="align-middle"><img width="60px" height="60px;"
                                                          src="{{asset('img/cast/'.$cast->image)}}">
                            </td>
                            <td>{{$cast->detail}}</td>
                            <td>{{$cast->nation}}</td>
                            <td>{{$cast->facebook}}</td>
                            <td>{{$cast->twitter}}</td>
                            <td>{{$cast->wiki}}</td>
                            <td class="align-middle">{{date('d-m-Y', strtotime($cast->birth))}}</td>
                            <td class="d-flex align-items-center">
                                <button
                                    type="button"
                                    class="btn btn-warning mr-2 btnEdit"
                                    data-toggle="modal"
                                    data-url="{{route('admin.cast.edit', $cast->id)}}"
                                    data-target="#EditForm">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button data-url="{{route('admin.cast.destroy', $cast->id)}}"
                                        class="btn btn-danger btnDelete"
                                        data-toggle="modal"
                                        data-target="#DeleteCast">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                                <a href="" class="ml-2 btn btn-info"><i class="fas fa-eye"></i></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>

                </table>
            </div>
            <hr>
            <div style="margin-left: 45%">
                {{$casts->links()}}
            </div>
            @include('admin.casts.edit')
            @include('admin.casts.create')
            @include('admin.casts.delete')
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
            $("#InsertCast").submit(function (e) {
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

            $(".btnEdit").click(function () {
                $('#EditModal').modal('show');
                const url = $(this).attr('data-url');
                $.ajax({
                    type: "GET",
                    url,
                    success: function (res) {
                        console.log(res);
                        $("#name_edit").val(res.data.name);
                        $("#store-image").html(`<img width="150px" height="150px" id="avatar" src={{asset("/img/cast")}}/${res.data.image}>`)
                        $("#store-image").append(`<input type="hidden" name="hidden_image" value="${res.data.image}"/>`)
                        $("#detail_edit").val(res.data.detail);
                        $("#birth_edit").val(res.data.birth);
                        $("#nation_edit").val(res.data.nation);
                        $("#facebook_edit").val(res.data.facebook);
                        $("#twitter_edit").val(res.data.twitter);
                        $("#wiki_edit").val(res.data.wiki);
                        $("#EditCast").attr('action', '{{asset("/admin/cast")}}/' + res.data.id);
                    }
                })
            })

            $("#EditCast").submit(function (event) {
                event.preventDefault();
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

                    success: function (res) {
                        let html = '';
                        if (res.message) {
                            html = `<div class="alert alert-success alert-center">${res.message}</div>`
                            $("#EditCast")[0].reset()
                            $("#store-image").html('')
                            window.location.reload();
                        }
                        $("#EditCast").prepend(html)
                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        if (errors.responseJSON.messages.name) {
                            const html = `<div class="alert alert-danger">${errors.responseJSON.messages.name}</div>`
                            $("#errors-name").html(html)
                        }
                        if (errors.responseJSON.messages.image) {
                            const html = `<div class="alert alert-danger">${errors.responseJSON.messages.image}</div>`
                            $("#errors-image").html(html)
                        }
                    }
                })

            })

            $(".btnDelete").click(function () {
                const url = $(this).attr('data-url');
                $("#deleteCast").click(function () {
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

