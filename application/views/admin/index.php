<div class="container">
     
<!-- https://www.cloudways.com/blog/the-basics-of-file-upload-in-php/#html -->
<!-- https://www.codexworld.com/preview-image-before-upload-jquery/  i intigrate this -->
     
      <a href="javascript:void(0)" class="btn btn-info ml-3" id="create-new-blog">Add New</a>
      <br><br>
      <table class="table table-bordered table-striped" id="admin_blog">
         <thead>
            <tr>
               <th>ID</th>
               <th>Title</th>
               <th>Created At</th>
               <th>Catergory</th>
               <th>SubCategory</th>
               <th>Picture</th>
               <th>Action</th>
            </tr>
         </thead>
         <tbody id="blog_list">
            <?php if($blogs): 
            $blogs= $blogs->result_array();
            for($i =0; $i<count($blogs); $i++){ ?>
               <tr id="blog_id_<?php echo $blogs[$i]['id'];?>">
               <td><?php echo $blogs[$i]['id'];?></td>
               <td><?php echo $blogs[$i]['title'];?></td>
               <td><?php echo $blogs[$i]['created_at'];?></td>
               <td><?php echo $blogs[$i]['category_name'];?></td>
               <td><?php echo $blogs[$i]['sub_category_name'];?></td>
               <td>
                  <img src="<?php echo base_url("assets/img/").$blogs[$i]['picture'];?>" alt="<?php echo $blogs[$i]['category_name'];?>">
               </td>
               <td>
                  <a href="javascript:void(0)"  data-id="<?php echo $blogs[$i]['id'];?>" class="btn btn-info edit-blog">Edit</a>
                  <a href="javascript:void(0)" data-id="<?php echo $blogs[$i]['id'];?>" class="btn btn-danger delete-user delete-blog">Delete</a>
               </td>
            </tr>
               
          <?php  } 
         endif; ?> 
         </tbody>
      </table>
   </div>
 
   <!-- Model for add edit blog -->
   <div class="modal fade" id="ajax-blog-modal"  aria-hidden="true">
      <div class="modal-dialog modal-lg">
         <div class="modal-content">
            <div class="modal-header">
               <h4 class="modal-title text-center" id="blogCrudModal"></h4>
            </div>
            <div class="modal-body">
               <form id="blogForm" action="" name="blogForm" method="post" class="form-horizontal" enctype="multipart/form-data">
                  <input type="hidden" name="blog_id" id="blog_id">
                  <input type="hidden" id="imageName" name="imageName" value="" />
                  <div class="form-group">
                     <label for="title" class="col-sm-2 control-label">Title</label>
                     <div class="col-sm-12">
                        <input type="text" class="form-control" id="title" name="title" placeholder="Enter Tilte" value="" maxlength="50" required="">
                     </div>
                  </div>
                  <div class="form-group">
                     <label for="title" class="col-sm-2 control-label">Sub Title</label>
                     <div class="col-sm-12">
                        <input type="text" class="form-control" id="subtitle" name="subtitle" placeholder="Enter Tilte" value="" maxlength="50" required="">
                     </div>
                  </div>
                  <div class="form-group">
                     <label for="name" class="col-sm-2 control-label">Description</label>
                     <div class="col-sm-12">
                     <!-- tinymc is not woring -->
                     <!-- <textarea  name="text_description" rows='10' cols='70' id="text_description"></textarea> -->
                     <textarea  name="description" rows='30' cols='70' id="description"></textarea>
                     </div>
                  </div>
                  <div class="form-group">
                     <label for="category_id" class="col-sm-2 control-label">Category</label>
                     <div class="col-sm-12">
                       <select class="form-control" name="category_id" id="category_id" >
                       <option value="0">Select Category</option>
                       <?php if($categories): ?>   
                      <?php foreach($categories as $category):?>
                       <option value="<?php echo $category->id ?>" ><?php echo $category->category_name ?></option>
                          <?php endforeach; ?>
                          <?php endif; ?>
                       </select>
                     </div>
                  </div>
                  <div class="form-group">
                     <label for="sub_category_id" class="col-sm-2 control-label">Sub Category</label>
                     <div class="col-sm-12">
                       <select class="form-control" name="sub_category_id" id="sub_category_id" >
                        <option value="0">Select Sub Category</option>
                       </select>
                     </div>
                  </div>
                  <div class="form-group">
                     <label for="tag_id" class="col-sm-2 control-label">Tags</label>
                     <div class="col-sm-12">
                       <select class="form-control" id="tag_id"    name='tag_id[]'   multiple="multiple">
                       <option value="0">Select Tag</option>
                       <?php if($tags): ?>   
                      <?php foreach($tags as $tag):?>
                       <option value="<?php echo $tag->id ?>"><?php echo $tag->tag_name ?></option>
                          <?php endforeach; ?>
                          <?php endif; ?>
                       </select>
                     </div>
                  </div>
                   
                  <div class="form-group">
                  <label for="" class="col-sm-2 control-label">Blog Status</label>
                     <div class="col-sm-12">
                        
                     <select name="blog_type" id="blog_type" class="form-control">
                     <option value="0">Select Blog Status</option>
                        <option value="1">Paid</option>
                        <option value="2">Unpaid</option>
                     </select>
                           
                        
                     </div>
                  </div>
                  <div class="form-group" id="paid_amount_row">
                     <label for="paid_amount" class="col-sm-2 control-label">Paid Amount</label>
                     <div class="col-sm-12">
                        <input type="text" class="form-control" id="paid_amount" name="paid_amount">
                     </div>
                  </div>
                  

                  <div class="form-group">
                     <label class="col-sm-2 control-label">Blog Image</label>
                     <div class="col-sm-12">
                     <input id="picture" type="file" accept="image/*" name="picture" />
                     <div id="preview" style="float:right;right:0;"></div>
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

   