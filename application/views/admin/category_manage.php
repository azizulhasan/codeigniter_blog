<div class="container">
     
<!-- https://www.cloudways.com/blog/the-basics-of-file-upload-in-php/#html -->
<!-- https://www.codexworld.com/preview-image-before-upload-jquery/  i intigrate this -->
     
      <a href="javascript:void(0)" class="btn btn-info ml-3" id="create-new-category">Add New Category</a>
      <br><br>


      <table class="table table-bordered table-striped" id="admin_category">
         <thead>
            <tr>
               <th>ID</th>
               <th>Category Name</th>
               <th>Action</th>
            </tr>
         <tbody id="category_list">
            <?php if($categories): ?>   
            <?php foreach($categories as $category):?>
            <tr id="category_id_<?php echo $category->id;?>">
               <td><?php echo $category->id;?></td>
               <td><?php echo $category->category_name;?></td>
               <td>
                  <a href="javascript:void(0)"  data-id="<?php echo $category->id;?>" class="btn btn-info edit-category">Edit</a>
                  <a href="javascript:void(0)" data-id="<?php echo $category->id;?>" class="btn btn-danger delete-user delete-category">Delete</a>
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
               <h4 class="modal-category_name text-center" id="categoryCrudModal"></h4>
            </div>
            <div class="modal-body">
               <form id="categoryForm" action="" name="categoryForm" method="post" class="form-horizontal" >
                  <input type="hidden" name="category_id" id="category_id">
                  
                  <div class="form-group">
                     <label for="category_name" class="col-sm-2 control-label">Category Name</label>
                     <div class="col-sm-12">
                        <input type="text" class="form-control" id="category_name" name="category_name" placeholder="Enter Category" value="" maxlength="50" required="">
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

   