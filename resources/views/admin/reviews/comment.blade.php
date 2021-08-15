<ng-template #EditModal>
    <div class="modal fade" id="EditModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <form method="POST" id="formReview" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="modal-header">
                        <h5 class="modal-title">Review</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body max-h-4 o-y-s h-100">
                        <label for="comment" class="col-form-label form-control-label">Expert Review</label>
                        <p id="comment" type="text" name="comment">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close &nbsp;<i
                                class="fas fa-times-circle"></i></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</ng-template>
