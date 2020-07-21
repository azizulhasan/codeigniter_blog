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
        <div class="col-lg-8 col-md-10 mx-auto">
          <div class="site-heading">
            <h1>Clean Blog</h1>
            <span class="subheading">A Blog Theme by Start Bootstrap</span>
          </div>
        </div>
      </div>
    </div>
  </header>

  <!-- Main Content -->
  <div class="container">
    <div class="row ">
      <?php if($blogs): ?>  
        <?php foreach($blogs as $blog):?>
          <div class="col-md-10 border border-dark pl-0">
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


              <div class="row">
                  <div class="col-lg-4 col-md-6">
                  <?php 
                  if(file_exists(base_url().'assets/img/'.$blog->picture)){
                       
                        
                        $image = base_url().'assets/img/placeholder.jpg';

                  }else{
                     $image = base_url().'assets/img/'.$blog->picture;
                  }
                  
                  ?>
                    <img width='100%' height="170" style="border:1px solid blue;" src="<?php echo  $image?>" alt="">
                  </div>
                  <div class="col-lg-8 col-md-6 ">
                  
                  <?php 

                   
                  if(file_exists(base_url()."assets/img/description/".$blog->id.".txt")){
                        $url = base_url()."assets/img/description/placeholder.txt";
                  }else{
                    $url = base_url()."assets/img/description/".$blog->id.".txt";
                  }

                    
                    $description =  file_get_contents($url);
                    if($description!=""){
                      $link =  base_url().'post/'.$blog->id.'/'.$blog->title;
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
      <p ><?php echo $links; ?></p>
     
  
</div>
    


 <?php $this->load->view('blog/common/bottom'); ?>
 
 

  