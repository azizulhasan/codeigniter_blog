<div class="container">
     
<!-- https://www.cloudways.com/blog/the-basics-of-file-upload-in-php/#html -->
<!-- https://www.codexworld.com/preview-image-before-upload-jquery/  i intigrate this -->
     
      <a href="javascript:void(0)" class="btn btn-info ml-3" id="create-new-sub_category">Add New Sub Category</a>
      <br><br>


      <table class="table table-bordered table-striped" id="admin_sub_category">
         <thead>
            <tr>
               <th>ID</th>
               <th>Sub Category Name</th>
               <th>Category Name</th>
               <th>Action</th>
            </tr>
         <tbody id="sub_category_list">
            <?php if($sub_categories):

            $sub_category = $sub_categories->result_array(); 
            for($i = 0; $i<count($sub_category); $i++){?>

            <tr id="sub_category_id_<?php echo $sub_category[$i]['id'];?>">
               <td><?php echo $sub_category[$i]['id'];?></td>
               <td><?php echo $sub_category[$i]['sub_category_name'];?></td>
               <td><?php echo $sub_category[$i]['category_name'];?></td>
               <td>
                  <a href="javascript:void(0)"  data-id="<?php echo $sub_category[$i]['id'];?>" class="btn btn-info edit-sub_category">Edit</a>
                  <a href="javascript:void(0)" data-id="<?php echo $sub_category[$i]['id'];?>" class="btn btn-danger delete-user delete-sub_category">Delete</a>
               </td>
            </tr>

           <?php  }
               
             endif; ?> 
         </tbody>
      </table>
   </div>





   <!-- Model for add edit blog -->
   <div class="modal fade" id="ajax-blog-modal"  aria-hidden="true">
      <div class="modal-dialog modal-md">
         <div class="modal-content">
            <div class="modal-header">
               <h4 class="modal-sub_category_name text-center" id="sub_categoryCrudModal"></h4>
            </div>
            <div class="modal-body">
               <form id="sub_categoryForm" action="" name="sub_categoryForm" method="post" class="form-horizontal" enctype="multipart/form-data">
                  <input type="hidden" name="sub_category_id" id="sub_category_id">
                  <div class="form-group">
                     <label for="sub_category_name" class="col-sm-12 control-label">Sub Category Name</label>
                     <div class="col-sm-12">
                        <input type="text" class="form-control" id="sub_category_name" name="sub_category_name" placeholder="Enter Sub Category" value="" maxlength="50" required="">
                     </div>
                  </div>
                  <div class="form-group">
                     <label for="category_id" class="col-sm-12 control-label">Sub Category Name</label>
                     <div class="col-sm-12">
                        <select class="form-control" name="category_id" id="category_id">
                           <option value="0">Select A Category</option>
                           <?php 
                              foreach( $categories as $category){
                                 echo "<option value='$category->id'>$category->category_name</option>";
                              }
                           ?>
                        </select>
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

   