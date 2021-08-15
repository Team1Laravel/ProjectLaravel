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
                        <th>Image</th>
                        <th>Description</th>
                        <th>Facebook</th>
                        <th>Twitter</th>
                        <th>Wiki</th>
                        <th>Create At</th>
                        <th>Update At</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody id="myTable">
                    @foreach ($writers as $writer)
                        <tr>
                            <th scope="row">{{$writer->id}}</th>
                            <td>{{$writer->name}}</td>
                            <td class="align-middle"><img width="60px" height="60px;"
                                                          src="{{asset('img/writers/'.$writer->image)}}">
                            </td>
                            <td>{{$writer->desc}}</td>
                            <td>{{$writer->facebook}}</td>
                            <td>{{$writer->twitter}}</td>
                            <td>{{$writer->wiki}}</td>
                            <td class="align-middle">{{date('d-m-Y', strtotime($writer->created_at))}}</td>
                            <td class="align-middle">{{date('d-m-Y', strtotime($writer->updated_at))}}</td>
                            <td class="d-flex align-items-center">
                                <button
                                    data-toggle="modal"
                                    data-target="#EditModal"
                                    data-url="{{route('admin.writer.edit', $writer->id)}}"
                                    class="btn btn-warning mr-2 btnEdit"
                                >
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button data-url="{{route('admin.writer.destroy', $writer->id)}}"
                                        type="submit"
                                        class="btn btn-danger btnDelete"
                                        data-toggle="modal"
                                        data-target="#DeleteModal">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                                <a href="" class="ml-2 btn btn-info"><i class="fas fa-eye"></i></a></td>
                        </tr>
                    @endforeach
                    </tbody>

                </table>
            </div>
            <hr>
            <div style="margin-left: 45%">
                {{$writers->links()}}
            </div>
            @include('admin.writers.edit')
            @include('admin.writers.create')
            @include('admin.writers.delete')
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
            $("#insertWriter").submit(function (e) {
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
                        $("#name_edit").val(res.data.name);
                        $("#store-image").html(`<img width="150px" height="150px" id="avatar" src={{asset("/img/writers")}}/${res.data.image}>`)
                        $("#store-image").append(`<input type="hidden" name="hidden_image" value="${res.data.image}"/>`)
                        $("#desc_edit").val(res.data.desc);
                        $("#facebook_edit").val(res.data.facebook);
                        $("#twitter_edit").val(res.data.twitter);
                        $("#wiki_edit").val(res.data.wiki);
                        $("#formEditWriter").attr('action', '{{asset("/admin/writer")}}/' + res.data.id);
                    }
                })
            })

            $("#formEditWriter").submit(function (event) {
                event.preventDefault();
                const url = $(this).attr("action");
                const formData = new FormData(this);
                console.log(formData);
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
                            $("#formEditWriter")[0].reset()
                            $("#store-image").html('')
                            window.location.reload();
                        }
                        $("#formEditWriter").prepend(html)
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
            // --------------------DELETE--------------------------------
            $(".btnDelete").click(function () {
                const url = $(this).attr('data-url');
                $("#deleteWriter").click(function () {
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

