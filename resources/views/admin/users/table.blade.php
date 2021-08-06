<div class="table-responsive">
   <table class="table table-hover text-center">
      <thead>
         <tr style="background:	#B0C4DE; ">
            <th>#</th>
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
         @php
         $stt = 0;
         @endphp
         @foreach ($users as $user)
         <tr >
            <td scope="row">{{ ++$stt }}</td>
            @if(!empty($user->image))
            <td class="align-middle"><img width="60px" height="60px;"
               src="{{$user->image}}"></td>
            @else
            <td class="align-middle"><img width="60px" height="60px;"
               src="{{asset('img/users/nonavata.png')}}"></td>
            @endif
            <td class="align-middle">{{$user->name}}</td>
            <td class="align-middle">{{$user->role->name}}</td>
            <td class="align-middle">{{$user->email}}</td>
            <td class="align-middle">{{date("d-m-Y",
               strtotime($user->created_at))}}
            </td>
            <td class="align-middle">{{date("d-m-Y",
               strtotime($user->updated_at))}}
            </td>
            @if($user->role_id != "1")
            <td class="align-middle">
               <button style="background-color: #F0F8FF; color: #1E90FF;"
                  type="button" class="btn mr-2 btnEdit" data-toggle="modal"
                  data-target="#editUserModal"
                  data-url="{{route('admin.users.edit', $user->id)}}">
               <i class="fa fa-edit fa-2x"></i>
               </button>
               <button data-url="{{route('admin.users.destroy', $user->id)}}" data-toggle="modal"
                  data-target="#DeleteUser"
                  style="background-color: #F0F8FF; color: red;" type="submit"
                  class="btn btnDelete">
               <i class="fa fa-trash fa-2x"></i>
               </button>
            </td>
            @endif
         </tr>
         @endforeach
      </tbody>
   </table>
</div>
<input type="hidden" id="table" value="user">
<hr>
<div class="d-flex justify-content-center align-items-center">
   {{$users->links()}}
</div>
@include('admin.users.edit')
@include('admin.users.delete')