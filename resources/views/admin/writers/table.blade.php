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
      <tbody id="myTable" >
         @php 
         $stt = 0;
         @endphp
         @foreach ($writers as $writer)
         <tr>
            <th scope="row">{{ ++$stt }}</th>
            <td>{{$writer->name}}</td>
            @if(!empty($writer->image))
            <td class="align-middle"><img width="60px" height="60px;"
               src="{{asset('img/writers/'.$writer->image)}}">
            </td>
            @else
            <td class="align-middle"><img width="60px" height="60px;"
               src="{{asset('img/users/nonavata.png')}}"></td>
            @endif
            <td>{{$writer->desc}}</td>
            <td>{{$writer->facebook}}</td>
            <td>{{$writer->twitter}}</td>
            <td>{{$writer->wiki}}</td>
            <td class="align-middle">
               <button style="background-color: #F0F8FF; color: #1E90FF;"
                  type="button" class="btn mr-2 btnEdit" data-toggle="modal"
                  data-target="#EditModal"
                  data-url="{{route('admin.writer.edit', $writer->id)}}">
               <i class="fa fa-edit fa-2x"></i>
               </button>
               <button data-url="{{route('admin.writer.destroy', $writer->id)}}"
                  style="background-color: #F0F8FF; color: red;" type="submit"
                  class="btn btnDelete" data-toggle="modal"
                  data-target="#DeleteModal">
               <i class="fa fa-trash fa-2x"></i>
               </button>
         </tr>
         @endforeach
      </tbody>
   </table>
</div>
<input type="hidden" id="table" value="writer">
<hr>
<div style="margin-left: 45%" id="aaaaa">
   {{$writers->links()}}
</div>
@include('admin.writers.edit')
@include('admin.writers.create')
@include('admin.writers.delete')