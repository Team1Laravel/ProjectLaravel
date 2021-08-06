<!-- DELETE MODAL -->
<ng-template #DeleteModal>
    <div class="modal fade" id="DeleteModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="icon-box">
                        <i class="fas fa-trash-alt" style="
                color: #f15e5e;
                font-size: 46px;
                display: inline-block;
                padding-top: 13px!important;
                width: 80px;
                height: 80px;
                margin: 0 40% !important;
                border-radius: 50%;
                z-index: 9;
                text-align: center;
                border: 3px solid #f15e5e;
            "></i>
                    </div>
                    <p style="
                color: inherit;
                text-decoration: none;
                font-size: 20px;
                text-align: center;
                font-weight: 600;
                margin-top: 3em;
            ">
                        Are you sure to delete ?
                    </p>
                </div>
                <div class="modal-footer">
                    <div style="margin:0 auto;">
                        <button
                            id="deleteMovie"
                            type="submit" class="btn btn-success"
                            style="margin-right: 13px"
                        >Confirm
                        </button>
                        <button
                            type="button"
                            class="btn btn-danger"
                            data-dismiss="modal"
                        >Close &nbsp;
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</ng-template>
