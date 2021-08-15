@extends('admin.layouts.common')
@section('panel')
    <div class="col-lg-12" style="margin-top:20px;">
        <div class="block margin-bottom-sm"
             style="background-color:#222222;box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.4), 0 6px 20px 0 rgba(0, 0, 0, 0.19);font-weight: bolder;">
            <div class="title"><strong>Comments</strong>
            </div>
            <div class="table-responsive">
                <table class="table">
                    <thead>

                    <tr>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Role</th>
                        <th>Email</th>
                        <th>Create At</th>
                        <th>Update At</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td class="align-middle"><img width="60px" height="60px;"
                                                          src="{{$user->image}}"></td>
                            <td class="align-middle">{{$user->name}}</td>
                            <td class="align-middle">{{$user->role->name}}</td>
                            <td class="align-middle">{{$user->email}}</td>
                            <td class="align-middle">{{date('d-m-Y', strtotime($user->created_at))}}</td>
                            <td class="align-middle">{{date('d-m-Y', strtotime($user->updated_at))}}</td>
                            @if($user->email !== 'admin@gmail.com')
                                <td class="d-flex align-items-center">
                                    <button style="background-color:green;color:#fff;" type="button"
                                            class="btn mr-2 btnEdit"
                                            data-toggle="modal" data-target="#editUserModal"
                                            data-url="{{route('admin.users.edit', $user->id)}}">
                                        Edit
                                    </button>
                                    <button data-url="{{route('admin.users.destroy', $user->id)}}"
                                            style="background-color:red;color:#fff;" type="submit" class="btn btnDelete"
                                    >Delete
                                    </button>
                                    <a href="" class="ml-2 btn btn-info">Purchase History</a></td>
                            @endif
                        </tr>
                    @endforeach
                    </tbody>

                </table>
            </div>
            <hr>
            <div class="d-flex justify-content-center align-items-center">
                {{$users->links()}}
            </div>
            @include('admin.users.edit')
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
                    $(".btnEdit").click(function () {
                        $('editUserModal').modal('show');
                        const url = $(this).attr('data-url');
                        $.ajax({
                            type: "GET",
                            url,
                            success: function (res) {
                                const options = $('#roles option')
                                const option = res.roles.map(item => {
                                    const existOption = options.length > 0 && Array.from(options).some(option => option.value == item.id);
                                    if (existOption) {
                                        return;
                                    }
                                    return `<option value="${item.id}">${item.name}</option>`
                                })
                                $("#roles").append(option).val(res.data.role_id);
                                $("#name").val(res.data.name);
                                $("#email").val(res.data.email);
                                $("#store-image").html(`<img width="150px" height="150px" id="avatar" src="${res.data.image}">`)
                                $("#store-image").append(`<input type="hidden" name="hidden_image" value="${res.data.image}"/>`)

                                $("#formEditUser").attr('action', '{{asset("/admin/users")}}/' + res.data.id);
                            }
                        })
                    })

                    $("#formEditUser").submit(function (event) {
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
                                console.log(res);
                                if (res.message) {
                                    html = `<div class="alert alert-success alert-center">${res.message}</div>`
                                    $("#formEditUser")[0].reset()
                                    $("#store-image").html('')
                                    window.location.reload();
                                }
                                $("#formEditUser").prepend(html)
                            },
                            error: function (jqXHR, textStatus, errorThrown) {
                                if (errors.responseJSON.messages.name) {
                                    const html = `<div class="alert alert-danger">${errors.responseJSON.messages.name}</div>`
                                    $("#errors-name").html(html)
                                }
                                if (errors.responseJSON.messages.email) {
                                    const html = `<div class="alert alert-danger">${errors.responseJSON.messages.email}</div>`
                                    $("#errors-email").html(html)
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
                        if (confirm("are you sure")) {
                            $.ajax({
                                type: "DELETE",
                                url,
                                data: {
                                    _token: '{{ csrf_token() }}'
                                },
                                success: function (res) {
                                    let html = '';
                                    if (res.message) {
                                        html = `<div class="alert alert-success alert-center">  ${res.message}</div>`
                                        window.location.reload();
                                    }
                                    $('body').prepend(html);
                                }
                            })
                        }
                    })
                })
            </script>
@endsection
