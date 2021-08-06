<?php
use App\Models\ViewMovie;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use App\Models\MovieGenre;
$directors = DB::select('select * from directors');
$writers = DB::select('select * from writers');
$moviegenres = DB::select('select * from genres_movies');
$genres = DB::select('select * from genres');
$current = Carbon::now()->format("Y");
$current = Carbon::now()->format("Y");
$year = $current - 10;
$arr_year = [];
$stars = [];
for ($i=0; $i<= 10; $i++) {
    array_push($arr_year,$year+$i);
}
?>
<div class="table-responsive">
   <table class="table table-hover text-center">
      <thead>
         <tr style="background:	#B0C4DE;">
            <th>#</th>
            <th>Title</th>
            <th>Poster</th>
            <th>Director</th>
            <th>Writer</th>
            <th>Genre</th>
            <th>Action</th>
         </tr>
      </thead>
      <tbody id="myTable">
         @php 
         $stt = 0;
         @endphp
         @foreach ($movies as $movie)
         <tr>
            <td scope="row">{{ ++$stt }}</td>
            <td>{{$movie->name}}</td>
            @if(!empty($movie->image))
            <td class="align-middle"><img width="60px" height="60px;"
               src="{{asset('img/catalogs/'.$movie->image)}}">
            </td>
            @else
            <td class="align-middle"><img width="60px" height="60px;"
               src="{{asset('img/users/nonavata.png')}}"></td>
            @endif
            <td>{{ $movie->director_name }}</td>
            <td>{{ $movie->writer_name }}</td>
            
            <td><?php 
                $str = "";
                foreach($moviegenres as $mg => $value)
                {
                    if($value->movie_id == $movie->id)
                    {
                        $str .= $value->name.", "; 
                    }
                }
                echo substr($str, 0,strlen($str)-2);
            ?></td>
            <td class="align-middle">
               <button style="background-color: #F0F8FF; color: #1E90FF;"
                  type="button" class="btn mr-2 btnEdit" data-toggle="modal"
                  data-target="#EditModal"
                  data-url="{{route('admin.movies.edit', $movie->id)}}">
               <i class="fa fa-edit fa-2x"></i>
               </button>
               <button data-url="{{route('admin.movies.destroy', $movie->id)}}"
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
   <input type="hidden" id="table" value="movie">
   <div style="margin-left: 45%">
                {{$movies->links()}}
            </div>
</div>
@include('admin.movies.edit')
@include('admin.movies.create')
@include('admin.movies.delete')