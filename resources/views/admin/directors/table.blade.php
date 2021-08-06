<div class="table-responsive">
   <table class="table table-hover text-center">
      <thead>
         <tr style="background:	#B0C4DE;">
            <th>#</th>
            <th>Name</th>
            <th>Image</th>
            <th>Description</th>
            <th>Facebook</th>
            <th>Twitter</th>
            <th>Wiki</th>
            <th>Action</th>
         </tr>
      </thead>
      <tbody id="myTable">
         @php 
         $stt = 0;
         @endphp
         @foreach ($directors as $director)
         <tr>
            <th scope="row">{{ ++$stt }}</th>
            <td>{{$director->name}}</td>
            @if(!empty($director->image))
            <td class="align-middle"><img width="60px" height="60px;"
               src="{{asset('img/director/'.$director->image)}}">
            </td>
            @else
            <td class="align-middle"><img width="60px" height="60px;"
               src="{{asset('img/users/nonavata.png')}}"></td>
            @endif
            <td>{{$director->desc}}</td>
            <td>{{$director->facebook}}</td>
            <td>{{$director->twitter}}</td>
            <td>{{$director->wiki}}</td>
            <td class="align-middle">
               <button style="background-color: #F0F8FF; color: #1E90FF;"
                  type="button" class="btn mr-2 btnEdit" data-toggle="modal"
                  data-target="#EditModal"
                  data-url="{{route('admin.director.edit', $director->id)}}">
               <i class="fa fa-edit fa-2x"></i>
               </button>
               <button onclick="deleteThis('{{route('admin.director.destroy', $director->id)}}')" data-url="{{route('admin.director.destroy', $director->id)}}"
                  style="background-color: #F0F8FF; color: red;" type="submit"
                  class="btn btnDelete" data-toggle="modal"
                  data-target="#deleteModalDirector">
               <i class="fa fa-trash fa-2x"></i>
               </button>
         </tr>
         @endforeach
      </tbody>
   </table>
</div>
<input type="hidden" id="table" value="director">
<hr>
<div style="margin-left: 45%"  >
   {{$directors->links()}}
</div>
@include('admin.directors.edit')
@include('admin.directors.create')
@include('admin.directors.delete')