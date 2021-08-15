<ng-template #EditModal>
    <div class="modal fade" id="EditModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form method="POST" id="formEditMovie" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="modal-header">
                        <h5 class="modal-title">Edit Movie</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body max-h-4 o-y-s h-100">
                        <div class="form-group">
                        <label>Name</label>
                        <input id="name_edit" type="text" class="form-control" name="name">
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="Image" class="col-form-label form-control-label">Image</label>
                                    <span id="store-image" class="d-block">
                                    </span>
                                    <input type="file" name="image" id="image" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Genre</label>
                            <select name="genre_id" id="genre_edit" class="form-control">
                                @foreach($genres as $key => $genre)
                                    <option value="{{$genre->id}}">{{$genre->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Director</label>
                            <select name="director_id" id="director_edit" class="form-control">
                                @foreach($directors as $key => $director)
                                    <option value="{{$director->id}}">{{$director->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Writer</label>
                            <select name="writer_id" id="writer_edit" class="form-control">
                                @foreach($writers as $key => $writer)
                                    <option value="{{$writer->id}}">{{$writer->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                <label>Year</label>
                                <select name="year" id="year_edit" class="form-control">
                                    @foreach($arr_year as $key => $year)
                                        <option value="{{$year}}">{{$year}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="form-group">
                            <label>Description</label>
                            <textarea id="desc_edit" name="desc" class="form-control" aria-label="With textarea"></textarea>
                            </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                <label>Keyword</label>
                                <input id="keyword_edit" type="text" class="form-control" name="keyword">
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="form-group">
                                <label>Video link</label>
                                <input id="video_link_edit" type="text" class="form-control" name="video_link">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                <label>Status</label>
                                <select name="premiere" id="premiere_edit" class="form-control">
                                    <option value="1">New</option>
                                    <option value="0">Old</option>
                                </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                <label>Quality</label>
                                <input id="quality_edit" type="text" class="form-control" name="quality">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                <label>Age limit</label>
                                <input id="age_limit_edit" type="text" class="form-control" name="age_limit">
                                </div>
                            </div>
                            <div class="col-md-9">
                                <div class="form-group">
                                <label>Country</label>
                                <input id="country_edit" type="text" class="form-control" name="country">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" name="upload" id="btnUpdate" class="btn btn-success">Save &nbsp;<i
                                class="fas fa-save"></i></button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close &nbsp;<i
                                class="fas fa-times-circle"></i></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</ng-template>
