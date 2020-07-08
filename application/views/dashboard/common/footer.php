

<!-- https://stackoverflow.com/questions/21044798/how-to-use-formdata-for-ajax-file-upload -->

 <!-- Footer -->
 <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>copyright &copy; <script> document.write(new Date().getFullYear()); </script> - developed by
              <b><a href="https://indrijunanda.gitlab.io/" target="_blank">indrijunanda</a></b>
            </span>
          </div>
        </div>
      </footer>
      <!-- Footer -->
    </div>
  </div>

  <!-- Scroll to top -->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>
   

   


  <script src="<?php echo base_url("admin/assets/vendor/jquery/")?>/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" ></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
  <script src="<?php echo base_url("admin/assets/vendor/jquery-easing/")?>/jquery.easing.min.js"></script>
  <script src="<?php echo base_url("admin/assets/js/")?>/ruang-admin.min.js"></script>
  <script src="<?php echo base_url("admin/assets/vendor/chart.js")?>/Chart.min.js"></script>
  <script src="<?php echo base_url("admin/assets/js/demo/")?>/chart-area-demo.js"></script>  
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
   <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
   <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>

  
   
   
   <script>

   tinymce.init({selector: '#description'});


 
   $(document).ready(function () {
   
      $("#admin_blog").DataTable();
 
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
         console.log(blog_id)
         $.ajax({
            type: "Post",
            url: $("meta[name='url']").attr('content') + "admin/get_blog_by_id",
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
                  $('#subtitle').val(res.data.subtitle);
                  $('#paid_amount').val(res.data.paid_amount);
                  $('#blog_type').val(res.data.paid_amount);
                 

                  let blog_type = '<option value="'+res.data.blog_type+'" selected>'+res.data.blog_type+'</option';
                  $('#blog_type').prepend(blog_type);

                  let category_id = '<option value="'+res.data.category_id+'" selected>'+res.data.category_id+'</option';
                  
                  $('#category_id').prepend(category_id);

                  let sub_category_id = '<option value="'+res.data.sub_category_id+'" selected>'+res.data.sub_category_id+'</option';
                  $('#sub_category_id').prepend(sub_category_id);

                  let  description = $("meta[name='url']").attr('content')+"assets/img/description/"+res.data.id+"."+'txt';

                 jQuery.get(description, function(des) {
                     tinymce.get('description').setContent(des.replace('n',''), {format: 'string'});
                  });
                  
                  let tagid = res.data.tag_id.split(',')
                  html='';
                  for(let i = 0; i<tagid.length; i++){
                     html+='<option value='+tagid[i]+' selected>'+tagid[i]+'</option>';


                   // $('.dropdown-menu').append('<li class="px-md-2 px-1"><div class="custom-control custom-checkbox d-flex" style="justify-content: initial;"><input formnovalidate="" type="checkbox" class="custom-control-input" style="color: inherit;"><label class="custom-control-label justify-content-start" style="color: inherit;">'+tagid[i]+'</label></div></li>');

                  // html +='<li class="badge" style="padding-left: 0px; line-height: 1.5em;"><span>'+tagid[i]+'</span><button aria-label="Remove" tabindex="-1" type="button" class="close" style="font-size: 1.5em; line-height: 0.9em; float: none;"><span aria-hidden="true">×</span></button></li>'
                }
                $("#tag_id").prepend(html); 


               //  $('.dashboardcode-bsmultiselect ul').append(html)
                  var picture  = $("meta[name='url']").attr('content')+"assets/img/"+res.data.picture; 
                  $('#preview').html('<img src="'+picture+'" width="100" height="100"/>');
                  var pic_name = $('#picture').prop("files")[0] = picture;


                  $('#imageName').val(res.data.picture);
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
               type: "POST",
               url: $("meta[name='url']").attr('content') + "admin/delete",
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
 

   $(document).ready(function () {
      $('#category_id').on('change' , function(){
         var category_id = $(this).val();
           $.ajax({
               type: "POST",
               // dataType: 'json',
               enctype: 'multipart/form-data',
               url: $("meta[name='url']").attr('content') + "admin/get_sub_category_by_id",
               data: {category_id:category_id},
               success: function (res) {
                  let data = JSON.parse(res);
                  html = '';
                  for(var i= 0 ; i<data.length; i++){
                     html+= "<option value='"+data[i].id+"'>"+data[i].sub_category_name+"</option>";
                  }
                  $('#sub_category_id').html(html)
               },
               error: function (e) {
                     $("#output").text(e.responseText);
                     console.log("ERROR : ", e);
               }
            });
         })
      });
      $('#blog_type').on("input", function(){
       let blog_type =  $(this).val();
      if(blog_type == '2'){
         $('#paid_amount_row').hide();
      }else{
         $('#paid_amount_row').show();
      }
      });
      


      if ($("#blogForm").length > 0) {
      $("#blogForm").validate({
      submitHandler: function (form) {
         
         var blog_id = $(this).data("id");

      var actionType = $('#btn-save').val();
            $('#btn-save').html('Sending..');
            var title = $('#title').val();
            var subtitle = $('#subtitle').val();
            var description = tinymce.get("description").getContent();
            var category_id = $('#category_id').val();
            var sub_category_id = $('#sub_category_id').val();
            var tag_id = $('#tag_id').val();
            var blog_type = $('#blog_type').val();
            var paid_amount = $('#paid_amount').val();
            var picture = $('#picture').prop("files")[0];
            var blog_id = $('#blog_id').val();
            var imageName = $('#imageName').val();
            
            
            // Create an FormData object 
            var data = new FormData();
            // If you want to add an extra field for the FormData


            data.append("title", title);
            data.append("subtitle", subtitle);
            data.append("category_id", category_id);
            data.append("sub_category_id", sub_category_id);
            data.append("tag_id", tag_id);
            data.append("description", description);
            data.append("blog_type", blog_type);
            data.append("paid_amount", paid_amount);
            data.append("picture", picture);
            data.append("blog_id", blog_id);
            data.append("imageName", imageName);
            
            $.ajax({
               data: data,
               url:$("meta[name='url']").attr('content') +"admin/store",
               type: "POST",
               processData: false,
               contentType: false,
               dataType: 'json',
               success: function (res) {
                 var blog = '<tr id="blog_id_' + res.data.id + '"><td>' + res.data.id +
                  '</td><td>' + res.data.title + '</td><td>' + res.data.subtitle + '</td><td>'
                   + res.data.created_at + '</td><td>' + res.data.category_id + '</td><td>' + res.data.tag_id + '</td>';
 
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
<script> 
function filePreview(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $('#blogForm + img').remove();
            $('#preview').html('<img src="'+e.target.result+'" width="100" height="100"/>');
        };
        reader.readAsDataURL(input.files[0]);
    }
}
$("#picture").change(function () {
    filePreview(this);
});

// $(function(){$("#tag_id").bsMultiSelect();});
</script>
<script src='<?php echo base_url("admin/assets/js/")?>custom.js'></script>
</body>

</html>