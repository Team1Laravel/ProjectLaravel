<div class="modal fade" id="editUserModal" tabindex="-1" role="dialog" aria-hidden="true" >
   <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content" style="background-color:#F0F8FF">
         <form method="POST" id="formEditUser" enctype="multipart/form-data" >
            @csrf
            @method('PUT')
            <div class="modal-header" >
               <h5 class="modal-title">Edit User</h5>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
               </button>
            </div>
            <div class="modal-body max-h-4 o-y-s h-100" >
            <div class="row">
            	<div class="col-md-6">
            		<div class="text-input">
                      <label for="input1" >Name</label>   
                      <input type="text" id="name" minlength="5" maxlength="200"class="form-control "  name="name"  required="required">
                   </div>
            	</div>
                	<div class="col-md-6"> 
                	<div class="text-input">
                      <label for="input1" >Email</label>    
                      <input type="email" id="email" minlength="10" maxlength="1000" class="form-control "  name="email"  required="required">
                   </div>
                   
               </div>
               <div class="col-md-6">
                   		<div class="form-group">
                          <label for="roles" class="col-form-label form-control-label">Roles</label>
                          <select class="form-control" id="roles" name="role_id"></select>
                       </div>
                   </div>
            </div>
               
            </div>
            <div class="modal-footer" >
               <button type="submit" name="upload" id="btnUpdate" class="btn btn-success">Save &nbsp;<i
                  class="fa fa-save"></i></button>
               <button type="button" class="btn btn-danger" data-dismiss="modal">Close &nbsp;<i
                  class="fa fa-times-circle"></i></button>
            </div>
         </form>
      </div>
   </div>
</div>