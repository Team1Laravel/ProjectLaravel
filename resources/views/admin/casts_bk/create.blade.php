<!--Add Modal -->
<ng-template #InsertModal>
    <div class="modal fade" id="InsertForm" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form enctype="multipart/form-data" id="InsertCast" class="form-horizontal"
                          action="{{route('admin.cast.store')}}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Name</label>
                                    <input id="name_insert" type="text" class="form-control" name="name"
                                           placeholder="Enter Name">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Nation</label>
                                    <input id="nation_insert" type="text" class="form-control" name="nation"
                                           placeholder="Enter Nation">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Movie</label>
                            <select name="movie_id" id="movie_id" class="form-control">
                                <option value="">Select Movie</option>
                                @foreach($movies as $key => $movie)
                                    <option value="{{$movie->id}}">{{$movie->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="Image" class="col-form-label form-control-label">Image</label>
                            <input type="file" name="image" id="image_insert" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="example-date-input" class="col-2 col-form-label">Date</label>
                            <input class="form-control" type="date" name="birth" id="birth_insert" class="form-control"
                                   id="example-date-input">
                        </div>
                        <div class="form-group">
                            <label>Detail</label>
                            <textarea id="detail" name="detail" class="form-control"
                                      aria-label="With textarea"></textarea>
                        </div>
                        <div class="form-group">
                            <label>Facebook</label>
                            <input id="facebook_insert" type="text" class="form-control" name="facebook"
                                   placeholder="Enter fb link...">
                        </div>
                        <div class="form-group">
                            <label>Twitter</label>
                            <input id="twitter_insert" type="text" class="form-control" name="twitter"
                                   placeholder="Enter twitter link...">
                        </div>
                        <div class="form-group">
                            <label>Wiki</label>
                            <input id="wiki_insert" type="text" class="form-control" name="wiki"
                                   placeholder="Enter wiki link...">
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-success">Save &nbsp;<i class="fas fa-save"></i>
                            </button>
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close &nbsp;<i
                                    class="fas fa-times-circle"></i></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</ng-template>
