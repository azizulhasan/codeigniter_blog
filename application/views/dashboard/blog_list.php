<!-- <!DOCTYPE html>
<html lang="en">
   <head> 
   
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
   <link  href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script> 
   <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
   <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
   <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
   <style type="text/css">
      .error{
      color: red;
      }
   </style>
   </head>
   <body> -->
   <div class="container">
     
     
     
      <a href="javascript:void(0)" class="btn btn-info ml-3" id="create-new-blog">Add New</a>
      <br><br>
      <table class="table table-bordered table-striped" id="blog_list">
         <thead>
            <tr>
               <th>ID</th>
               <th>Title</th>
               <th>blog Code</th>
               <th>Descriptionn</th>
               <th>Action</th>
            </tr>
         </thead>
         <tbody>
            <?php if($blogs): ?>   
            <?php foreach($blogs as $blog):?>
            <tr id="blog_id_<?php echo $blog->id;?>">
               <td><?php echo $blog->id;?></td>
               <td><?php echo $blog->title;?></td>
               <td><?php echo $blog->title;?></td>
               <td><?php echo $blog->title;?></td>
               <td>
                  <a href="javascript:void(0)"  data-id="<?php echo $blog->id;?>" class="btn btn-info edit-blog">Edit</a>
                  <a href="javascript:void(0)" data-id="<?php echo $blog->id;?>" class="btn btn-danger delete-user delete-blog">Delete</a>
               </td>
            </tr>
            <?php endforeach;?>
            <?php endif; ?> 
         </tbody>
      </table>
   </div>
 
   <!-- Model for add edit blog -->
   <div class="modal fade" id="ajax-blog-modal" aria-hidden="true">
      <div class="modal-dialog">
         <div class="modal-content">
            <div class="modal-header">
               <h4 class="modal-title" id="blogCrudModal"></h4>
            </div>
            <div class="modal-body">
               <form id="blogForm" action="" name="blogForm" class="form-horizontal" enctype="multipart/form-data">
                  <input type="hidden" name="blog_id" id="blog_id">
                  <div class="form-group">
                     <label for="name" class="col-sm-2 control-label">Title</label>
                     <div class="col-sm-12">
                        <input type="text" class="form-control" id="title" name="title" placeholder="Enter Tilte" value="" maxlength="50" required="">
                     </div>
                  </div>
                  <!-- <div class="form-group">
                     <label for="name" class="col-sm-2 control-label">blog Code</label>
                     <div class="col-sm-12">
                        <input type="text" class="form-control" id="blog_code" name="blog_code" placeholder="Enter blog Code" value="" maxlength="50" required="">
                     </div>
                  </div> -->
                  <!-- <div class="form-group">
                     <label class="col-sm-2 control-label">Description</label>
                     <div class="col-sm-12">
                        <input type="text" class="form-control" id="description" name="description" placeholder="Enter Description" value="" required="">
                     </div>
                  </div> -->
                  <div class="form-group">
                     <label class="col-sm-2 control-label">blog Image</label>
                     <div class="col-sm-12">
                        <input type="file" class="form-control" id="picture" name="img">
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


   <script>
   var SITEURL = '<?php echo base_url(); ?>';
 
   $(document).ready(function () {
 
      $("#blog_list").DataTable();
 
      /*  When user click add user button */
 
      $('#create-new-blog').click(function () {
         $('#btn-save').val("create-blog");
         $('#blog_id').val('');
         $('#blogForm').trigger("reset");
         $('#blogCrudModal').html("Add New blog");
         $('#ajax-blog-modal').modal('show');
      });
 
      /* When click edit user */
 
      $('body').on('click', '.edit-blog', function () {
 
         var blog_id = $(this).data("id");
 
         console.log(blog_id);
 
         $.ajax({
            type: "Post",
            url: SITEURL + "blog/get_blog_by_id",
            data: {
               id: blog_id
            },
            dataType: "json",
            success: function (res) {
               if (res.success == true) {
                  $('#title-error').hide();
                  $('#blog_code-error').hide();
                  $('#description-error').hide();
                  $('#blogCrudModal').html("Edit blog");
                  $('#btn-save').val("edit-blog");
                  $('#ajax-blog-modal').modal('show');
                  $('#blog_id').val(res.data.id);
                  $('#title').val(res.data.title);
                  $('#description').val(res.data.description);
                  $('#picture').val(res.data.picture);
               }
            },
            error: function (data) {
               console.log('Error:', data);
            }
         });
      });
 
      $('body').on('click', '.delete-blog', function () {
 
         var blog_id = $(this).data("id");
 
         if (confirm("Are You sure want to delete !")) {
            $.ajax({
               type: "Post",
               url: SITEURL + "blog/delete",
               data: {
                  blog_id: blog_id
               },
               dataType: "json",
               success: function (data) {
                  $("#blog_id_" + blog_id).remove();
               },
               error: function (data) {
                  console.log('Error:', data);
               }
            });
         }
      });
 
   });
 
   if ($("#blogForm").length > 0) {
      $("#blogForm").validate({
 
         submitHandler: function (form) {
 
            var actionType = $('#btn-save').val();
 
            $('#btn-save').html('Sending..');
 
            $.ajax({
               data: $('#blogForm').serialize(),
               url: SITEURL + "blog/store",
               type: "POST",
               dataType: 'json',
               success: function (res) {
                  
                 var blog = '<tr id="blog_id_' + res.data.id + '"><td>' + res.data.id + '</td><td>' + res.data.title + '</td><td>' + res.data.title + '</td><td>' + res.data.title + '</td><td>' + res.data.description + '</td>';
 
                    blog += '<td><a href="javascript:void(0)" id="" data-id="' + res.data.id + '" class="btn btn-info edit-blog">Edit</a><a href="javascript:void(0)" id="" data-id="' + res.data.id + '" class="btn btn-danger delete-user delete-blog">Delete</a></td></tr>';
                 
                 if (actionType == "create-blog") {
                   
                     $('#blog_list').prepend(blog);
                 } else {
                     $("#blog_id_" + res.data.id).replaceWith(blog);
                 }
 
                  $('#blogForm').trigger("reset");
                  $('#ajax-blog-modal').modal('hide');
                  $('#btn-save').html('Save Changes');
               },
               error: function (data) {
                  console.log('Error:', data);
                  $('#btn-save').html('Save Changes');
               }
            });
         }
      })
   } 
</script>




