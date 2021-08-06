<!--Add Modal -->
<ng-template #InsertModal>
    <div class="modal fade" id="InsertModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">INSERT MOVIE</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
        <form id="InsertForm" class="form-horizontal" action="{{route('admin.movie.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label>Name</label>
                    <input id="name" type="text" class="form-control" name="name" placeholder="Enter Name">
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="Image" class="col-form-label form-control-label">Poster</label>
                            <span id="store-image" class="d-block"></span>
                            <input type="file" name="image" id="image" class="form-control">
                        </div>
                    </div>
                </div>
                
                <div class="form-group">
                    <label>Genre</label>
                    <select name="genre_id" id="genre_id" class="form-control">
                        <option value="">Select genre</option>
                        @foreach($genres as $key => $genre)
                            <option value="{{$genre->id}}">{{$genre->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label>Director</label>
                    <select name="director_id" id="director_id" class="form-control">
                        <option value="">Select director</option>
                        @foreach($directors as $key => $director)
                            <option value="{{$director->id}}">{{$director->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label>Writer</label>
                    <select name="writer_id" id="writer_id" class="form-control">
                        <option value="">Select writer</option>
                        @foreach($writers as $key => $writer)
                            <option value="{{$writer->id}}">{{$writer->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                        <label>Year</label>
                        <select name="year" id="year" class="form-control">
                            <option value="">Select year</option>
                            @foreach($arr_year as $key => $year)
                                <option value="{{$year}}">{{$year}}</option>
                            @endforeach
                        </select>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="form-group">
                        <label>Description</label>
                        <textarea id="desc" name="desc" class="form-control" aria-label="With textarea"></textarea>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                        <label>Keyword</label>
                        <input id="keyword" type="text" class="form-control" name="keyword" placeholder="Enter keyword">
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="form-group">
                        <label>Video link</label>
                        <input id="video_link" type="text" class="form-control" name="video_link" placeholder="Enter link">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                        <label>Status</label>
                        <select name="premiere" id="premiere" class="form-control">
                            <option value="">Select</option>
                            <option value="1">New</option>
                            <option value="0">Old</option>
                        </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                        <label>Quality</label>
                        <input id="quality" type="text" class="form-control" name="quality" placeholder="Enter quality">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                        <label>Age limit</label>
                        <input id="age_limit" type="text" class="form-control" name="age_limit" placeholder="Enter limit">
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="form-group">
                        <label>Country</label>
                        <input id="country" type="text" class="form-control" name="country" placeholder="Enter country">
                        </div>
                    </div>
                </div>
        </div>
            <div class="modal-footer">
            <button type="submit" class="btn btn-success">Save &nbsp;<i class="fas fa-save"></i></button>
            <button type="button" class="btn btn-danger" data-dismiss="modal">Close &nbsp;<i class="fas fa-times-circle"></i></button>
            </div>
        </form>
        </div>
    </div>
    </div> 
</ng-template>