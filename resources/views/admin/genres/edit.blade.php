<ng-template #EditModal>
    <div class="modal fade" id="editGenreModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content" style="background-color:#F0F8FF">
                <form method="POST" id="formEditGenre" enctype="multipart/form-data" >
                    @csrf
                    @method('PUT')
                    <div class="modal-header">
                        <h5 class="modal-title">Edit Genre</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body max-h-4 o-y-s h-100">

                        <div class="text-input">
                         <label for="input1" >Name</label>      
                         <input type="text" id="name_update" minlength="5" maxlength="200" class="form-control "  name="name" required="required">
                                       
                   		 </div>
                        <div id="errors-name"></div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" name="upload" id="btnUpdate" class="btn btn-success">Save &nbsp;<i
                                class="fa fa-save"></i></button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close &nbsp;<i
                                class="fa fa-times-circle"></i></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</ng-template>
