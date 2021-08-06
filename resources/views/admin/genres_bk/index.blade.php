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
                    data-target="#InsertModal">
                Add new &nbsp;<i class="fas fa-plus-circle"></i>
            </button>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Create At</th>
                        <th>Update At</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody id="myTable">
                    @foreach ($genres as $genre)
                        <tr>
                            <td class="id" scope="row">{{$genre->id}}</td>
                            <td class="name">{{$genre->name}}</td>
                            <td class="align-middle">{{date('d-m-Y', strtotime($genre->created_at))}}</td>
                            <td class="align-middle">{{date('d-m-Y', strtotime($genre->updated_at))}}</td>
                            <td class="d-flex align-items-center">
                                <button
                                    data-toggle="modal"
                                    data-target="#editGenreModal"
                                    data-url="{{route('admin.genre.edit', $genre->id)}}"
                                    class="btn btn-warning mr-2 btnEdit"
                                    data-ID-update="{{$genre->id}}">
                                    <i class="fas fa-edit"></i>
                                </button>
                            <!-- <button
                                    class="btn btn-danger"
                                    data-toggle="modal"
                                    data-url="{{route('admin.genre.destroy', $genre->id)}}"
                                    id="btnDeleteGenre"
                                    data-target="#DeleteModal">
                                    <i class="fas fa-trash-alt"></i>
                            </button> -->
                                <button data-url="{{route('admin.genre.destroy', $genre->id)}}"
                                        class="btn btn-danger btnDelete"
                                        data-toggle="modal"
                                        data-target="#DeleteModal">
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
                {{$genres->links()}}
            </div>
            @include('admin.genres.edit')
            @include('admin.genres.create')
            @include('admin.genres.delete')
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
            $("#formInsert").submit(function (e) {
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
                $('editGenreModal').modal('show');
                const url = $(this).attr('data-url');
                $.ajax({
                    type: "GET",
                    url,
                    success: function (res) {
                        $("#name_update").val(res.data.name);
                        $("#formEditGenre").attr('action', '{{asset("/admin/genre")}}/' + res.data.id);
                    }
                })
            })

            $("#formEditGenre").submit(function (event) {
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
                            $("#formEditGenre")[0].reset()
                            $("#store-image").html('')
                            window.location.reload();
                        }
                        $("#formEditGenre").prepend(html)
                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        if (errors.responseJSON.messages.name) {
                            const html = `<div class="alert alert-danger">${errors.responseJSON.messages.name}</div>`
                            $("#errors-name").html(html)
                        }
                    }
                })

            })

            // --------------------DELETE--------------------------------
            $(".btnDelete").click(function () {
                const url = $(this).attr('data-url');
                $("#deleteGenre").click(function () {
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




