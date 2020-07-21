<!-- worked -->

<!-- https://www.guru99.com/codeigniter-pagination.html -->
<!-- 
comment system
https://www.roytuts.com/nested-comments-using-codeigniter-ajax/ -->


<?php $this->load->view('blog/common/header'); ?>
  <!-- Page Header -->
  <header class="masthead" style="background-image: url('<?php echo base_url('assets/img');?>/home-bg.jpg')">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class=" col-md-12 mx-auto">
          <div class="site-heading">
            <h4>Your Search Keywors : <?php echo $keyword; ?> </h4>
            
          </div>
        </div>
      </div>
    </div>
  </header>

     <!-- Main Content -->
     <div class="container">
    <div class="row ">
      <?php if($search_results):
      
        
        ?>  
        <?php foreach($search_results as $blog):?>
          <div class="col-md-10 border border-dark pl-0">
            <div class="row">
              <div class="col-lg-12">
                <a class="single_blog" id="<?php echo $blog->id; ?>" href="<?php echo base_url().'post/'.$blog->id;?>">
                  <h2 class="post-title">
                    <?php echo $blog->title; ?>
                  </h2>
              </a>
              <p class="post-meta">Posted by
                <?php 
                if($blog->created_by_id== 1){
                  $postedBy = 'Admin';
                }else{
                  $postedBy = "Editor";
                }
                ?>
                  <a href="<?php echo base_url().'post/'.$blog->created_by_id;?>"><?php echo $postedBy; ?></a>
                  on <?php echo $blog->created_at; ?>
              </p>
              </div>
            </div>


              <div class="row">
                  <div class="col-lg-4 col-md-6">
                  <?php 

                

                 $files = scandir('assets/img/');
                 foreach ($files as $key => $value) {
                  if(file_exists('assets/img/'.$blog->picture) ){
                      $image = base_url().'assets/img/'.$blog->picture;
                    break;
                  }else{
                    $image = base_url().'assets/img/placeholder.jpg';
                  break;
                  }
                }
                  ?>
                  
                  
                    <img width='100%' height="170" style="border:1px solid blue;" src="<?php echo  $image?>" alt="">
                  </div>
              <div class="col-lg-8 col-md-6 ">
                  <?php 

                    $url = base_url()."assets/img/description/".$blog->id.".txt";

                    $description =  file_get_contents($url);
                    
                    if($description){
                       $link =  base_url().'post/'.$blog->id.'/'.$blog->id;
                    echo shorten_string(
                      $description
                      , '30' ,   $link, ' Read More');
                    }else{
                      $url = base_url()."assets/img/description/placeholder.txt";
                      $description =  file_get_contents($url);
                       $link =  base_url().'post/'.$blog->id.'/'.$blog->id;
                    echo shorten_string(
                      $description
                      , '25' ,   $link, ' Read More');
                    }


                    ?>
              </div>
            </div>

          </div>
        <?php endforeach;?>
        <?php endif; ?>
      
        

    </div>
      



  
      <style>
        .blog_descrip p{
          margin:0;
          line-height:1.2;
        }
      </style>
      <p ><?php 
      if(isset($links)){
        echo $links;
      }
      
      ?></p>
     
  
</div>
 

  