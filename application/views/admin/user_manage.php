



<div class="container">
     
<!-- https://www.cloudways.com/blog/the-basics-of-file-upload-in-php/#html -->
<!-- https://www.codexworld.com/preview-image-before-upload-jquery/  i intigrate this -->
     
      <a href="javascript:void(0)" class="btn btn-info ml-3" id="create-new-user">Add New User</a>
      <br><br>
         <?php if($message = $this->session->flashdata('msg')){ ?>
            
            <div class="alert mx-auto alert-success" role="alert">
                  <?php echo  $message; ?>
               </div>
            <?php } ?>

      <table class="table table-bordered table-striped" id="admin_user">
         <thead>
            <tr>
               <th>ID</th>
               <th>Name</th>
               <th>Email</th>
               <th>Contact</th>
               <th>Position</th>
               <th>Picture</th>
               <th>Action</th>
            </tr>
         <tbody id="user_list">
            <?php if($users): ?>   
            <?php foreach($users as $user):?>
            <tr id="user_id_<?php echo $user->id;?>">
               <td><?php echo $user->id;?></td>
               <td><?php echo $user->name;?></td>
               <td><?php echo $user->email;?></td>
               <td><?php echo $user->contact;?></td>
               <td><?php echo $user->type;?></td>
               <td>
               <?php ;
               $picture =  substr($user->picture, 0, 5);
               
               if($picture =='https'){
                  $img = $user->picture;
               }else{
                  $img = base_url("admin/assets/img/users/").$user->picture;
               }
               ?>
               <img src="<?php echo $img;?>" alt="<?php echo $user->name;?>">
            
            
            </td>
               <td>
                  <a href="javascript:void(0)"  data-id="<?php echo $user->id;?>" class="btn btn-info edit-user">Edit</a>
                  <a href="javascript:void(0)" data-id="<?php echo $user->id;?>" class="btn btn-danger delete-user delete-user">Delete</a>
               </td>
            </tr>
            <?php endforeach;?>
            <?php endif; ?> 
         </tbody>
      </table>
   </div>





   <!-- Model for add edit blog -->
   <div class="modal fade" id="ajax-user-modal"  aria-hidden="true">
      <div class="modal-dialog modal-lg">
         <div class="modal-content">
            <div class="modal-header">
               <h4 class="modal-user_name text-center" id="userCrudModal"></h4>
            </div>
            <div class="modal-body">
               <form id="userForm" action="" name="userForm" method="post" class="form-horizontal" enctype="multipart/form-data" >
                  <input type="hidden" name="user_id" id="user_id">
                   <input type="hidden" id="before_img" name="before_img" value="" />
                  <div class="form-group">
                     <label for="user_name" class="col-sm-2 control-label">Name</label>
                     <div class="col-sm-12">
                        <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name" value="" maxlength="50" required="">
                     </div>
                  </div>
                  <div class="form-group">
                     <label for="email" class="col-sm-2 control-label"> Email</label>
                     <div class="col-sm-12">
                        <input type="email" class="form-control" id="email" name="email" placeholder="Enter Email" value="" maxlength="50" required="">
                     </div>
                  </div>
                  <div class="form-group">
                     <label for="contact" class="col-sm-2 control-label">Contact</label>
                     <div class="col-sm-12">
                        <input type="number" class="form-control" id="contact" name="contact" placeholder="Enter contact" value="" maxlength="50" required="">
                     </div>
                  </div>
                  <div class="form-group">
                     <label for="password" class="col-sm-2 control-label">Password</label>
                     <div class="col-sm-12">
                        <input type="password" class="form-control" id="password" name="password" placeholder="Enter Password" value="" maxlength="50" required="">
                     </div>
                  </div>
                  <div class="form-group">
                     <label for="repassword" class="col-sm-2 control-label">Confirm Password</label>
                     <div class="col-sm-12">
                        <input type="repassword" class="form-control" id="repassword" name="repassword" placeholder="Confirm Password" value="" maxlength="50" required="">
                     </div>
                  </div>
                  <div class="form-group">
                     <label for="picture" class="col-sm-2 control-label">Picture</label>
                     <div class="col-sm-12">
                        <input type="file" class="form-control" id="picture" name="picture" placeholder="Enter picture" value="" maxlength="50" >
                     </div>
                  </div>
                  <div class="form-group">
                     <label for="type" class="col-sm-2 control-label">Position</label>
                     <div class="col-sm-12">
                        <select name="type" class="form-control" id="type">
                          

                           <?php 
                              if(isset($usertype) ){
                                 foreach($usertype as $user){ 
                                 echo "<option value='".$user->id."'>$user->position_name</option>";

                                }
                              }
                           ?>
                        </select>
                     </div>
                  </div>


                  <div class="col-sm-offset-2 col-sm-10">
                     <button type="submit" class="btn btn-primary" id="btn-save" value="create">Create User
                     </button>
                  </div>
               </form>
            </div>
            <div class="modal-footer">
            </div>
         </div>
      </div>
   </div>

   