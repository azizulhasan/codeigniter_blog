
<!-- 37822303838-3nd4lf0b1tdrbrl98cscjnn2lqktuj6f.apps.googleusercontent.com -->
<!-- 37822303838-3nd4lf0b1tdrbrl98cscjnn2lqktuj6f.apps.googleusercontent.com -->
  <!-- Login Content -->
  <div class="container-login">
    <div class="row justify-content-center">
      <div class="col-xl-10 col-lg-12 col-md-9">
        <div class="card shadow-sm my-5">
          <div class="card-body p-0">
            <div class="row">
              <div class="col-lg-12">
                <div class="login-form">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Login</h1>
                  </div>
                  <?php   
                  ?>

                  <form id="needs-validation" action="<?php echo base_url().'admin/check'?>" method="post" encytyep='multipart/form-data'>
                            
                    <div class="form-group">
                      <input type="email" name="email" class="form-control"  aria-describedby="emailHelp"
                        placeholder="Enter Email Address">
                        <input type="number" name="type" value='1' class="d-none"  hidden>
                        <div class="invalid-feedback">This field is required.</div>
                    </div>
                    <div class="form-group">
                      <input type="password" name="password" class="form-control"  placeholder="Password">
                      <div class="invalid-feedback">This field is required.</div>
                    </div>
                    <div class="form-group">
                      <div class="custom-control custom-checkbox small" style="line-height: 1.5rem;">
                        <input type="checkbox" class="custom-control-input" id="customCheck">
                        <label class="custom-control-label" for="customCheck">Remember
                          Me</label>
                      </div>
                    </div>
                    <div class="form-group">
                      <input type="submit" class="btn btn-primary btn-block" value="Login">
                    </div>
                    <hr>
                    <!-- <a href="" class="g-signin2  btn-google btn-block" data-onsuccess="onSignIn" id="login_google" data-theme="dark" >
                      <i class="fab fa-google fa-fw"></i> Login with Google
                    </a> -->
                    <div class="fb-login-button" data-size="large" data-button-type="continue_with" data-layout="default" data-auto-logout-link="false" data-use-continue-as="false" data-width=""></div>

                  <fb:login-button 
                      scope="public_profile,email"
                      onlogin="checkLoginState();">
                    </fb:login-button>
                  </form>

                  
                 
                  
                 
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  
  
    <script>
    ///////////////////////////////
	// login_with google
	//////////////////////////////

	function onSignIn(googleUser) {
		//Useful data for your client-side scripts:
		var profile = googleUser.getBasicProfile();

		//window.location.assign("http://localhost/idb/1252639/codeigniter/blog/admin/index")

		//The ID token you need to pass to your backend:
		var id_token = googleUser.getAuthResponse().id_token;

		//Create an FormData object
		var data = new FormData();
		// If you want to add an extra field for the FormData
		data.append("name", profile.getName());
		data.append("email", profile.getEmail());
		data.append("picture", profile.getImageUrl());
		data.append("profileId", profile.getId());
		data.append("type", '1');

	for (var value of data.values()) {
   console.log(value); 
}

		$.ajax({
			data: data,
			url: $("meta[name='url']").attr("content") + "admin/check",
			type: "POST",
			processData: false,
			contentType: false,
			dataType: "json",
			success: function (res) {
				if (res.data[0].email && res.data[0].type=='1') {
					window.location.assign(
						"https://blog.azizulhasan.com/admin/index"
					);
				} else {
					window.location.assign(
						"https://blog.azizulhasan.com/admin/login"
					);
				}
			},
			error: function (data) {
				console.log("Error:", data);
			},
		});
	}

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



