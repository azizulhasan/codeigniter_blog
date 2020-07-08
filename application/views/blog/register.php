  <header class="masthead" style="background-image: url('<?php echo base_url('assets/img');?>/home-bg.jpg')">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <div class="site-heading">
            <h1>Clean Blog</h1>
            <span class="subheading">A Blog Theme by Start Bootstrap</span>
          </div>
        </div>
      </div>
    </div>
  </header>
  <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-md-7 col-lg-5">
                    <div class="register-div">
                        <p class="logo mb-1">WOW - Admin</p>
                        <p class="mb-4" style="color: #a5b5c5">Create an account.</p>

                        <!-- form er error check korar jonno-->
                        <?php 
                        $success =$this->session->flashdata('success');
                        if($success){
                            echo $success;
                        }
                        
                        
                        ?>
                        <form id="needs-validation" action="<?php echo base_url("admin/register-confirm") ;?>" enctype="multipart/form-data" method="post">

                            <div class="form-group">
                                <label>Full Name</label>
                                <input class="form-control input-lg" placeholder="Enter first name" value="<?php echo set_value('fullname'); ?>"  name="fullname" type="text" />
                                <!-- <div class="invalid-feedback">This field is required.</div> -->
                            </div>

                            <div class="form-group">
                                <label>Email</label>
                                <input class="form-control input-lg" placeholder="Enter email address" value="<?php echo set_value('email'); ?>" name="email" type="text" />
                                <!-- <div class="invalid-feedback">This field is required.</div> -->
                            </div>

                            <div class="form-group">
                                <label>Create Password</label>
                                <input class="form-control input-lg" placeholder="Create strong password" value="<?php echo set_value('password'); ?>"name="password" type="password" />
                                <!-- <div class="invalid-feedback">This field is required.</div> -->
                            </div>

                            <div class="form-group">
                                <label>Confirm Password</label>
                                <input class="form-control input-lg" placeholder="Confirm password" value="<?php echo set_value('repassword'); ?>" name="repassword" type="repassword" />
                                <!-- <div class="invalid-feedback">This field is required.</div> -->
                            </div>
                            <div class="form-group">
                                <label>File upload</label>
                                <input class="form-control" value="<?php echo set_value('pic'); ?>" name="pic" type="file" />
                                <!-- <div class="invalid-feedback">This field is required.</div> -->
                            </div>

                            <!-- <div class="checkbox">
                                <label class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input">
                                    <span class="custom-control-indicator"></span>
                                    <span class="custom-control-description">I agree to the Grapes <a href="javascript:void(0);" class="btn-link">Terms and Privacy</a>.</span>
                                </label>
                            </div> -->
                            <input type="submit" value="register" class="btn btn-primary mt-2">

                            <small class="text-muted mt-5 mb-1 d-block">Already have an account? <a href="<?php echo base_url(). 'admin/login';?>">Login Now!</a></small>
                        </form>
                    </div>
                </div>
            </div>
        </div>