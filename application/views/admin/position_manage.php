<div class="container">
     
<!-- https://www.cloudways.com/blog/the-basics-of-file-upload-in-php/#html -->
<!-- https://www.codexworld.com/preview-image-before-upload-jquery/  i intigrate this -->
     
      <a href="javascript:void(0)" class="btn btn-info ml-3" id="create-new-position">Add New Position</a>
      <br><br>


      <table class="table table-bordered table-striped" id="admin_position">
         <thead>
            <tr>
               <th>ID</th>
               <th>Postion Name</th>
               <th>Action</th>
            </tr>
         <tbody id="position_list">
            <?php if($positions): ?>   
            <?php foreach($positions as $position):?>
            <tr id="position_id_<?php echo $position->id;?>">
               <td><?php echo $position->id;?></td>
               <td><?php echo $position->position_name;?></td>
               <td>
                  <a href="javascript:void(0)"  data-id="<?php echo $position->id;?>" class="btn btn-info edit-position">Edit</a>
                  <a href="javascript:void(0)" data-id="<?php echo $position->id;?>" class="btn btn-danger delete-user delete-position">Delete</a>
               </td>
            </tr>
            <?php endforeach;?>
            <?php endif; ?> 
         </tbody>
      </table>
   </div>





   <!-- Model for add edit blog -->
   <div class="modal fade" id="ajax-blog-modal"  aria-hidden="true">
      <div class="modal-dialog modal-md">
         <div class="modal-content">
            <div class="modal-header">
               <h4 class="modal-position_name text-center" id="positionCrudModal"></h4>
            </div>
            <div class="modal-body">
               <form id="positionForm" action="" name="positionForm" method="post" class="form-horizontal" enctype="multipart/form-data">
                  <input type="hidden" name="position_id" id="position_id">
                  <input type="hidden" id="imageName" name="imageName" value="" />
                  <div class="form-group">
                     <label for="position_name" class="col-sm-2 control-label">Postion Name</label>
                     <div class="col-sm-12">
                        <input type="text" class="form-control" id="position_name" name="position_name" placeholder="Enter Postion" value="" maxlength="50" required="">
                     </div>
                  </div>
                  <div class="col-sm-offset-2 col-sm-10">
                     <button type="submit" class="btn btn-primary" id="btn-save" value="create">Save changes
                     </button>
                  </div>
               </form>
            </div>
            <div class="modal-footer">
            </div>
         </div>
      </div>
   </div>

   