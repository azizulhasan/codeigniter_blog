

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
   

   


  <script src="<?php echo base_url("advertiser/assets/vendor/jquery/")?>/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" ></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
  <script src="<?php echo base_url("advertiser/assets/vendor/jquery-easing/")?>/jquery.easing.min.js"></script>
  <script src="<?php echo base_url("advertiser/assets/js/")?>/ruang-admin.min.js"></script>
  <script src="<?php echo base_url("advertiser/assets/vendor/chart.js")?>/Chart.min.js"></script>
  <script src="<?php echo base_url("advertiser/assets/js/demo/")?>/chart-area-demo.js"></script>  
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>

  
   
   
   
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
<script src='<?php echo base_url("advertiser/assets/js/")?>custom.js'></script>
</body>

</html>