<!--Add Modal -->
<ng-template #InsertModal>
    <div class="modal fade" id="InsertModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">INSERT WRITER</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form enctype="multipart/form-data" id="insertWriter" class="form-horizontal"
                          action="{{route('admin.writer.store')}}" method="post">
                        @csrf
                        <div class="form-group">
                            <label>Name</label>
                            <input id="name_insert" type="text" class="form-control" name="name"
                                   placeholder="Enter Name">
                        </div>
                        <div class="form-group">
                            <label for="Image" class="col-form-label form-control-label">Image</label>
                            <input type="file" name="image" id="image_insert" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Description</label>
                            <textarea id="desc_insert" name="desc" class="form-control"
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
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Save &nbsp;<i class="fas fa-save"></i></button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close &nbsp;<i
                            class="fas fa-times-circle"></i></button>
                </div>
                </form>
            </div>
        </div>
    </div>
</ng-template>
