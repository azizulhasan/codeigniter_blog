<div class="container">
     
<!-- https://www.cloudways.com/blog/the-basics-of-file-upload-in-php/#html -->
<!-- https://www.codexworld.com/preview-image-before-upload-jquery/  i intigrate this -->
     
      <a href="javascript:void(0)" class="btn btn-info ml-3" id="create-new-tag">Add New Tag</a>
      <br><br>


      <table class="table table-bordered table-striped" id="admin_tag">
         <thead>
            <tr>
               <th>ID</th>
               <th>Tag Name</th>
               <th>Category Name</th>
               <th>Action</th>
            </tr>
         <tbody id="tag_list">
            <?php if($tags):

            $tag = $tags->result_array(); 
            for($i = 0; $i<count($tag); $i++){?>

            <tr id="tag_id_<?php echo $tag[$i]['id'];?>">
               <td><?php echo $tag[$i]['id'];?></td>
               <td><?php echo $tag[$i]['tag_name'];?></td>
               <td><?php echo $tag[$i]['category_name'];?></td>
               <td>
                  <a href="javascript:void(0)"  data-id="<?php echo $tag[$i]['id'];?>" class="btn btn-info edit-tag">Edit</a>
                  <a href="javascript:void(0)" data-id="<?php echo $tag[$i]['id'];?>" class="btn btn-danger delete-user delete-tag">Delete</a>
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
               <h4 class="modal-tag_name text-center" id="tagCrudModal"></h4>
            </div>
            <div class="modal-body">
               <form id="tagForm" action="" name="tagForm" method="post" class="form-horizontal" enctype="multipart/form-data">
                  <input type="hidden" name="tag_id" id="tag_id">
                  <div class="form-group">
                     <label for="tag_name" class="col-sm-12 control-label">Tag Name</label>
                     <div class="col-sm-12">
                        <input type="text" class="form-control" id="tag_name" name="tag_name" placeholder="Enter Tag" value="" maxlength="50" required="">
                     </div>
                  </div>
                  <div class="form-group">
                     <label for="category_id" class="col-sm-12 control-label">Tag Name</label>
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

   