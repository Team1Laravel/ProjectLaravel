<div class="modal fade" id="editUserModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form method="POST" id="formEditUser" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="modal-header">
                    <h5 class="modal-title">Edit User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body max-h-4 o-y-s h-100">

                    <div class="form-group">
                        <label for="name" class="col-form-label form-control-label">Name</label>
                        <input id="name" type="text" class="form-control" name="name">
                    </div>

                    <div id="errors-name"></div>

                    <div class="form-group">
                        <label for="email" class="col-form-label form-control-label">Email</label>
                        <input class="form-control" id="email" name="email"/>
                    </div>

                    <div id="errors-email"></div>

                    <div class="form-group">
                        <label for="roles" class="col-form-label form-control-label">Roles</label>
                        <select class="form-control" id="roles" name="role_id"></select>
                    </div>

                    <div class="form-group">
                        <label for="Image" class="col-form-label form-control-label">Image</label>
                        <span id="store-image" class="d-block">

                        </span>
                        <input type="file" name="image" id="image" class="form-control">
                    </div>

                    <div id="errors-image"></div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button name="upload" id="btnUpdate" type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
