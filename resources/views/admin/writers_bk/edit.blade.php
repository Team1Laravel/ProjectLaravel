<ng-template #EditModal>
    <div class="modal fade" id="EditModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form method="POST" id="formEditWriter" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="modal-header">
                        <h5 class="modal-title">Edit Writer</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body max-h-4 o-y-s h-100">
                        <div class="form-group">
                            <label for="name" class="col-form-label form-control-label">Name</label>
                            <input id="name_edit" type="text" class="form-control" name="name">
                        </div>
                        <div class="form-group">
                            <label for="Image" class="col-form-label form-control-label">Image</label>
                            <span id="store-image" class="d-block">
                            </span>
                            <input type="file" name="image" id="image" class="form-control">
                        </div>
                        <div id="errors-image"></div>
                        <div class="form-group">
                            <label>Description</label>
                            <textarea id="desc_edit" name="desc" class="form-control"
                                      aria-label="With textarea"></textarea>
                        </div>
                        <div class="form-group">
                            <label>Facebook</label>
                            <input id="facebook_edit" type="text" class="form-control" name="facebook">
                        </div>
                        <div class="form-group">
                            <label>Twitter</label>
                            <input id="twitter_edit" type="text" class="form-control" name="twitter">
                        </div>
                        <div class="form-group">
                            <label>Wiki</label>
                            <input id="wiki_edit" type="text" class="form-control" name="wiki">
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
