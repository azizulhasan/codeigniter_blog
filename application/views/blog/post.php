

  <!-- Page Header -->
  <header class="masthead" style="background-image: url('img/post-bg.jpg')">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-md-12 mx-auto">
          <div class="post-heading">
            <h1><?php echo $blog->title ?></h1>
            <h2 class="subheading"><?php echo $blog->subtitle ?></h2>
            <span class="meta">Posted by
             <?php 
              if($blog->created_by_id== 1){
                $postedBy = 'Admin';
              }else{
                $postedBy = "Editor";
              }
              ?>
              <a href="#"><?php echo $postedBy ?></a>
              on <?php echo $blog->created_at ?></span>
          </div>
        </div>
      </div>
    </div>
  </header>
  <!-- Post Content -->
  <article>
    <div class="container">
      <div class="row">
        <div class="col-md-8 border border-1">
          
            <?php 
            if(!file_exists("assets/img/description/".$blog->id.".txt")){
                  $url = base_url()."assets/img/description/placeholder.txt";
            }else if(filesize("assets/img/description/".$blog->id.".txt")<1){
              $url = base_url()."assets/img/description/placeholder.txt";
            }else{
              $url = base_url()."assets/img/description/".$blog->id.".txt";
            }

            

            echo  file_get_contents($url);
             ?>


             <!-- ******************************
             TAG
             ****************************** -->
              <div class="related_tag">
                <p class="py-3 text-danger">tags: </p>
                <?php if($tags):
                  foreach($tags as $tag): 
                  ?>
                  <a href="<?php echo base_url().'tag/'.$tag->id;?>"><?php echo $tag->tag_name.' '; ?></a>
                  
                <?php 
                  endforeach;
                endif;
                ?>
                
            </div>
             <!-- ******************************
             TAG
             ****************************** -->
          
            
          <?php if($releted_post): ?>   
            <div class="row">
            <h2 style="display:block;width:100%">Releted Post </h2>
          <?php foreach($releted_post as $post):?>
          <div class="col-lg-3 col-md-4 ">
            <?php 
            if(!file_exists('assets/img/'.$post->picture)){
                  $image = base_url().'assets/img/placeholder.jpg';
            }else if($post->picture==""){
              $image = base_url().'assets/img/placeholder.jpg';
            }else{
              $image = base_url().'assets/img/'.$post->picture;
              // echo $image;
            }
            ?>
            <a href="">
            <img style="border:1px solid blue;" hieght="150" width="100%" src="<?php echo $image;?>" alt="">
            </a>
            <a href="<?php echo base_url().'post/'.$post->id;?>">
            <h5 class="post-title">
              <?php echo $post->title; ?>
            </h5>
            </a>
            <p>
            <?php $url =  base_url()."assets/img/description/".$post->id.".txt";
            $description =  file_get_contents($url);
              if($description!=""){
                $link =  base_url().'post/'.$blog->id;
              echo  shorten_string($description, '10' ,   $link, " Read More" );
              }
             ?>
            </p>
          </div>
          <?php endforeach;?>
          </div>
          <?php endif; ?> 
          

          <!-- **********************************
          Social Media Sharing
          ********************************** -->
            <div class="sharethis-inline-share-buttons"></div>

          <!-- **********************************
          Social Media Sharing End
          ********************************** -->

          



        <div class="subscribe_blog">
            <h4>Subscribe with google or facebook</h4>
            <!-- login with fb google -->
            <a href="" class="g-signin2  btn-google btn-block" data-onsuccess="onSignIn" id="login_google" data-theme="dark" >
              <i class="fab fa-google fa-fw"></i> Login with Google
            </a>
            <!-- <fb:login-button 
              scope="public_profile,email"
              onlogin="checkLoginState();">
            </fb:login-button> -->
            <div
              class="fb-like"
              data-share="true"
              data-width="450"
              data-show-faces="true" id="face_book_share">
            </div>
            
             <!-- login with fb google end--> 
            
             <!-- login with fb google end--> 
        </div>



        </div>
      <div class="col-md-4 border border-1">
        <form  id="search_form" class="navbar-form" role="search" action="<?php echo base_url().'/search/search_keyword';?>"  method="post">
          <div class="input-group">
          <input type="text" class="form-control py-2" placeholder="Search" name= "keyword"  ">
            <div class="input-group-btn">
            <button class="btn btn-primary" type="submit" value = "Search">search</button>
            </div>
          </div>
        </form>

        <div class="col-12 px-0">
        <h5 class="pt-3">Category</h5>
          <?php if($categories):
            foreach($categories as $category): 
            ?>
            <a href="<?php echo base_url().'category/'.$category->id;?>"><?php echo $category->category_name.' '; ?></a>
            
          <?php 
            endforeach;
          endif;
          ?>
        </div>

        <div class="col-12 py-2 px-0">
          <button type="button" class="btn  btn-danger" data-toggle="modal" data-target="#subscribe_blog">subscribe</button>
        </div>

        <!--  -->

        <div class="col-12 px-0 py-2">
        <h6 class="pt-3 ">Subscribe with google or facebook</h6>
              <!-- login with fb google -->
            <a href="" class="g-signin2  btn-google btn-block" data-onsuccess="onSignIn" id="login_google" data-theme="dark" >
              <i class="fab fa-google fa-fw"></i> Login with Google
            </a>
            <fb:login-button 
              scope="public_profile,email"
              onlogin="checkLoginState();"  >
            </fb:login-button>
             <!-- login with fb google end--> 
        </div>
        <!-- add registration part -->
        <div class="col-12 px-0 py-4">
          <h4 class="text-center">Register for Add</h4>
          <a href="<?php echo base_url().'blog/register_add'?>">
              <img class="img_responsive " src="<?php echo base_url().'assets/img/advertise.png'?>" alt="">
              <p class="add_content">Add To This Place</p>
          </a>
        </div>
        <!-- add registration part end -->
      </div>
      </div>
    </div>
  </article>
  <hr>
<!-- http://localhost/idb/1252639/codeigniter/blog/index.php/post/48  -->
  <!-- Modal -->
<div class="modal fade" id="subscribe_blog" tabindex="-1" role="dialog" aria-labelledby="subscribe_blogLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="subscribe_blogLabel">Subscribe our blog</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form >
          <div class="form-group">
            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
          </div>
          <div class="form-group">
            <input type="number" class="form-control" id="exampleInputnumber1" placeholder="phone number">
          </div>
          <button type="button" id="subscribe_form"  class="btn btn-primary">Subscribe</button>
      </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<?php $url =  current_url(); $link = $_SERVER['PHP_SELF'];$link_array = explode('/',$url);$postId = end($link_array);?>

<script src="<?php echo base_url('assets/vendor/jquery')?>/jquery.min.js"></script>
   <script >
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
		data.append("profileId", profile.getId());
    data.append("type", "4");
    
    // console.log(profile.getName())
    // console.log(profile.getEmail())


   
		$.ajax({
			data: data,
			url: $("meta[name='url']").attr("content") + "admin/check",
			type: "POST",
			processData: false,
			contentType: false,
			dataType: "json",
			success: function (res) {
        console.log(res)

				if (res.data[0].email) {
					let login = `
          <span>${profile.getGivenName()}</span>
          <img src="${profile.getImageUrl()}" alt="${profile.getGivenName()}" height='25' width='25'>
         `;
					console.log(login);
					$("#login_nav").show();
					$("#navbarDropdown").html(login);
				}
			},
			error: function (data) {
				console.log("Error:", data);
			}
		});
  }
      



	// });
   </script>