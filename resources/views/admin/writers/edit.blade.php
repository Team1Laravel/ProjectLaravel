<ng-template #EditModal>
   <div class="modal fade" id="EditModal" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
         <div class="modal-content" style="background-color:#F0F8FF">
            <form method="POST" id="formEditWriter" enctype="multipart/form-data">
               @csrf
               @method('PUT')
               <div class="modal-header">
                  <h5 class="modal-title">Edit Writer</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                  </button>
               </div>
               <div class="modal-body ">
               <div class="row">
               		<div class="col-md-6">
               			<div class="text-input">
                          <label for="input1" >Name</label> 
                         <input type="text" minlength="5" maxlength="200" id="name_edit" class="form-control "  name="name" required="required">                
                      </div>
               		</div>
               		<div class="col-md-6">
               				<div class="text-input">
                             <label for="input1" >Facebook</label> 
                             <input type="text" id="facebook_edit" minlength="30" maxlength="1000" class="form-control "  name="facebook" required="required">
                                             
                          </div>
               		</div>
               		<div class="col-md-6">
               				<div class="text-input">
                             <label for="input1" >Twitter</label>
                             <input type="text" id="twitter_edit" class="form-control "  name="twitter">
                                              
                          </div>
               		</div>
               		<div class="col-md-6">
               				 <div class="text-input">
                             <label for="input1" >Wiki</label>
                             <input type="text" id="wiki_edit" minlength="30" maxlength="1000" class="form-control "  name="wiki" required="required">
                                              
                          </div>
               		</div>
               		<div class="col-md-6">
               				<div class="form-group">
                             <label>Description</label>
                             <textarea id="desc_edit" rows="7"  minlength="100" maxlength="200" name="desc" class="form-control"
                                aria-label="With textarea" required="required"></textarea>
                          </div>
                  
               		</div>
               		<div class="col-md-6">
               			 <div class="form-group">
                     <label for="Image" class="col-form-label form-control-label">Image</label>
                     <div class="file-upload">
                        <div class="image-upload-wrap">
                           <input class="file-upload-input" name="image" id="store-image"
                              type='file' onchange="readURL(this);" accept="image/*" />
                           <div class="drag-text">
                              <h3>Drag and drop a file or select add Image</h3>
                           </div>
                        </div>
                        <div class="file-upload-content">
                           <img class="file-upload-image" src="#" alt="your image" />
                           <div class="image-title-wrap">
                              <button type="button" onclick="removeUpload()"
                                 class="remove-image">
                              Remove <span class="image-title">Uploaded Image</span>
                              </button>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div id="errors-image"></div>
               		</div>
               </div>
                  
                 
                  
                  
                 
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