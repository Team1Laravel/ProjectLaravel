<div class="table-responsive">
   <table class="table table-hover text-center">
      <thead>
         <tr  style="background:	#B0C4DE;">
            <th>#</th>
            <th>Name</th>
            <th>Create At</th>
            <th>Update At</th>
            <th>Action</th>
         </tr>
      </thead>
      <tbody id="myTable">
         @php 
         $stt = 0;
         @endphp
         @foreach ($genres as $genre)
         <tr>
            <td class="id" scope="row">{{ ++$stt }}</td>
            <td class="name">{{$genre->name}}</td>
            <td class="align-middle">{{date('d-m-Y', strtotime($genre->created_at))}}</td>
            <td class="align-middle">{{date('d-m-Y', strtotime($genre->updated_at))}}</td>
            <td class="align-middle">
               <button style="background-color: #F0F8FF; color: #1E90FF;"
                  type="button" class="btn mr-2 btnEdit" data-toggle="modal"
                  data-target="#editGenreModal"
                  data-url="{{route('admin.genre.edit', $genre->id)}}" data-ID-update="{{$genre->id}}">
               <i class="fa fa-edit fa-2x"></i>
               </button>
               <button data-url="{{route('admin.genre.destroy', $genre->id)}}"
                  style="background-color: #F0F8FF; color: red;" type="submit"
                  class="btn btnDelete" data-toggle="modal"
                  data-target="#DeleteModal">
               <i class="fa fa-trash fa-2x"></i>
               </button>
            </td>
         </tr>
         
         @endforeach
      </tbody>
   </table>
   <input type="hidden" id="table" value="genre">
</div>
<hr>
<div style="margin-left: 45%">
   {{$genres->links()}}
</div>
@include('admin.genres.edit')
@include('admin.genres.create')
@include('admin.genres.delete')