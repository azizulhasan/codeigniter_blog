<header class="masthead" style="background-image: url('<?php echo base_url('assets/img');?>/home-bg.jpg')">
   
   </header>
   <section class="bg-light">
       <div class="container">
             <div class="row justify-content-center">
                 <div class="col-12 col-md-7 col-lg-5">
                     <div class="register-div">
                         <h2 class="logo my-5">Register as Subscriber</h2>
                         <!-- form er error check korar jonno-->
                         
                         <?php if($success = $this->session->flashdata('msg')){ ?>
                         <p style="color: green;"><strong>Success!</strong> <?php echo  $success; ?><p>
                         <?php }elseif($err = $this->session->flashdata('err')){?>
                             <p style="color: red;"><strong>Error!</strong> <?php echo  $err; ?><p>
                        <?php }?>
                          <?php 
                        
                         ?> 
                         <form id="needs-validation" action="<?php echo base_url("blog/register_confirm") ;?>" enctype="multipart/form-data" method="post">
 
                             <div class="form-group">
                                 <label>Full Name</label>
                                 <input class="form-control input-lg" placeholder="Enter first name" value="<?php echo set_value('fullname'); ?>"  name="name" type="text" />
                                 <input type="number" value="4" name="type" hidden/>
                                 <div class="invalid-feedback">This field is required.</div>
                             </div>
 
                             <div class="form-group">
                                 <label>Enter You Email</label>
                                 <input class="form-control input-lg" placeholder="Enter email address" value="<?php echo set_value('email'); ?>" name="email" type="text" />
                                 <div class="invalid-feedback">This field is required.</div>
                             </div>
 
                             <div class="form-group">
                                 <label>Create Password</label>
                                 <input class="form-control input-lg" placeholder="Create strong password" value="<?php echo set_value('password'); ?>"name="password" type="password" />
                                 <div class="invalid-feedback">This field is required.</div>
                             </div>
 
                             <div class="form-group">
                                 <label>Confirm Password</label>
                                 <input class="form-control input-lg" placeholder="Confirm password" value="<?php echo set_value('repassword'); ?>" name="repassword" type="password" />
                                 <div class="invalid-feedback">This field is required.</div>
                             </div>
                             <div class="form-group">
                                 <label>Upload You Picture</label>
                                 <input class="form-control" value="<?php echo set_value('picture'); ?>" name="picture" type="file" />
                                 <div class="invalid-feedback">This field is required.</div>
                             </div>
                             <div class="checkbox">
                                 <label class="form-control form-checkbox">
                                     <input type="checkbox"  class="form-control-input" name="is_checked">
                                     <!-- <span class="form-control-indicator"></span> -->
                                     <span class="form-control-description">I agree to the Conditions <a href="javascript:void(0);" class="btn-link">Terms and Privacy</a>.</span>
                                 </label>
                             </div>
                             <input type="submit" value="register" class="btn btn-primary btn-block mt-2">
                             <!-- login with social media -->
                             <!-- <a href="" class="g-signin2  btn-google btn-block" data-onsuccess="onSignIn" id="login_google" data-theme="dark" >
                             <i class="fab fa-google fa-fw"></i> Login with Google
                             </a> -->
                             <div class="fb-login-button" data-size="large" data-button-type="continue_with" data-layout="default" data-auto-logout-link="false" data-use-continue-as="false" data-width=""></div>
                             <!-- login with social media -->
 
                             <small class="text-muted mt-5 mb-1 d-block">Already have registered for add? <a href="<?php echo base_url(). 'admin/login';?>">Login Now!</a></small>
                         </form>
                     </div>
                 </div>
             </div>
         </div>
   </section>
         <style>
             #mainNav .navbar-brand {
                     font-weight: 800;
                     color: #000;
             }
             #mainNav .navbar-nav>li.nav-item>a {
                     padding: 10px 20px;
                     color: #000;
             }
             @media only screen and (min-width: 992px)
             {
                 #mainNav.is-fixed .navbar-nav>li.nav-item>a {
                 color: #000 !important;
             }
             }
 
             @media only screen and (min-width: 992px)
                 {
                     #mainNav .navbar-nav>li.nav-item>a {
                     padding: 10px 20px;
                     color: #000 !important;
             }
                 }
 
             @media only screen and (min-width: 992px)
                 {
                     #mainNav .navbar-brand {
                     padding: 10px 20px;
                     color: #000 !important;
                 }
                 }
 
             @media only screen and (min-width: 992px)
                 {
                     #mainNav .navbar-nav>li.nav-item>a {
                     padding: 10px 20px;
                     color: #000 !important;
                 }
             }
         </style>
 
         <script src="<?php echo base_url('assets/vendor/jquery')?>/jquery.min.js"></script>
    <script>
     ///////////////////////////////
     // login_with google
     //////////////////////////////
     
     
 
 // 	function onSignIn(googleUser) {
 // 		//Useful data for your client-side scripts:
 // 		var profile = googleUser.getBasicProfile();
 
 // 		//window.location.assign("http://localhost/idb/1252639/codeigniter/blog/admin/index")
 
 // 		//The ID token you need to pass to your backend:
 // 		var id_token = googleUser.getAuthResponse().id_token;
 
 // 		//Create an FormData object
 // 		var data = new FormData();
 // 		// If you want to add an extra field for the FormData
 // 		data.append("name", profile.getName());
 // 		data.append("email", profile.getEmail());
 // 		data.append("profileId", profile.getId());
 // 		data.append("picture", profile.getImageUrl());
 //         data.append("type", '3');
         
 //     // console.log('ID: ' + profile.getId());
 // //   console.log('Full Name: ' + profile.getName());
 // //   console.log('Given Name: ' + profile.getGivenName());
 // //   console.log('Family Name: ' + profile.getFamilyName());
 // //   console.log('Image URL: ' + profile.getImageUrl());
 // //   console.log('Email: ' + profile.getEmail());
 
     
 
 // 		$.ajax({
 // 			data: data,
 // 			url: $("meta[name='url']").attr("content") + "admin/check",
 // 			type: "POST",
 // 			processData: false,
 // 			contentType: false,
 // 			dataType: "json",
 // 			success: function (res) {
 //                 console.log(res.status)
 // 				if (res.data[0].email && res.data[0].type=='3') {
 // 					let login = `
 //           <span>${profile.getGivenName()}</span>
 //           <img src="${profile.getImageUrl()}" alt="${profile.getGivenName()}" height='25' width='25'>
 //          `;
 // 					console.log(login);
 // 					$("#login_nav").show();
 // 					$("#navbarDropdown").html(login);
 // 				}
 // 			},
 // 			error: function (data) {
 // 				console.log("Error:", data);
 // 			},
 // 		});
 //     }
     
     $("#front_logout").on("click", function () {
         var postId =
             "<?php $url =  current_url(); $link = $_SERVER['PHP_SELF'];$link_array = explode('/',$url);$postId = end($link_array);?>";
 
         $.ajax({
             data: [{ url: "post" }],
             url: $("meta[name='url']").attr("content") + "admin/register_add/logout",
             type: "POST",
             processData: false,
             contentType: false,
             dataType: "json",
             success: function (res) {
                 console.log(res.status);
                 if (res.status == 1) {
                     $("#login_nav").hide();
                 }
             },
             error: function (data) {
                 console.log("Error:", data);
             },
         });
     });
 
   window.fbAsyncInit = function() {
     FB.init({
       appId      : '272839410446482',
       xfbml      : true,
       version    : 'v7.0'
     });
     FB.AppEvents.logPageView();
   };
 
   (function(d, s, id){
      var js, fjs = d.getElementsByTagName(s)[0];
      if (d.getElementById(id)) {return;}
      js = d.createElement(s); js.id = id;
      js.src = "https://connect.facebook.net/en_US/sdk.js";
      fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
 
 
 
    
 
 function checkLoginState() {
   FB.getLoginStatus(function(response) {
     statusChangeCallback(response);
   });
 }
 
 
 // {
 //     status: 'connected',
 //     authResponse: {
 //         accessToken: '...',
 //         expiresIn:'...',
 //         signedRequest:'...',
 //         userID:'...'
 //     }
 // }
 
 </script>