<ng-template #EditModal>
    <div class="modal fade" id="editGenreModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form method="POST" id="formEditGenre" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="modal-header">
                        <h5 class="modal-title">Edit Genre</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body max-h-4 o-y-s h-100">
                        <div class="form-group">
                            <label for="name" class="col-form-label form-control-label">Name</label>
                            <input id="name_update" type="text" class="form-control" name="name">
                        </div>
                        <div id="errors-name"></div>
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
