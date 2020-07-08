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
            <h4>Your Search Category  : 
            <?php foreach($cat_name as $cat_name):
            echo $cat_name->category_name;
                endforeach;
                ?> 
            
            </h4>
            
          </div>
        </div>
      </div>
    </div>
  </header>

  <!-- Main Content -->
  <div class="container">
  <?php if($blog_by_category): ?>   
    <?php foreach($blog_by_category as $single_result):?>
       <div class="row">
            <div id="blog_list" class="col-lg-8 col-md-10 mx-auto">
                  <a class="single_blog" id="<?php echo $single_result->id; ?>" href="<?php echo base_url().'post/'.$single_result->id;?>">
                <h2 class="post-title">
                  <?php echo $single_result->title; ?>
                </h2>
              </a>
              <p class="post-meta">Posted by

              <?php 
              if($single_result->created_by_id== 1){
                $postedBy = 'Admin';
              }else{
                $postedBy = "Editor";
              }
              ?>
                <a href="<?php echo base_url().'post/'.$single_result->created_by_id;?>"><?php echo $postedBy; ?></a>
                on <?php echo $single_result->created_at; ?></p>
            </div>
        </div>
        
        <div class='row'>
            <div id="blog_list" class="col-lg-8 col-md-10 mx-auto">
                <div class="row">
                  <div class="col-lg-4 col-md-6">


                  <?php 
                  // if function base_url() is not being echo then this condition will always became false.
                  if(strval(file_exists(base_url().'assets/img/'.$single_result->picture))){
                        
                        $image = base_url().'assets/img/placeholder.jpg';
                  }else{
                    
                    $image = base_url().'assets/img/'.$single_result->picture;
                  }
                  
                  ?>
                    <img width='100%' height="170" style="border:1px solid blue;" src="<?php echo  $image?>" alt="">
                  </div>
                  <div class="col-lg-8 col-md-6 ">
                  
                  <?php 
                  if(strval(file_exists(base_url()."assets/img/description/".$single_result->id.".txt"))){
                        $url = base_url()."assets/img/description/placeholder.txt";
                  }else{
                    $url = base_url()."assets/img/description/".$single_result->id.".txt";
                  }

                    
                    $description =  file_get_contents($url);
                    if($description!=""){
                      $link =  base_url().'post/'.$single_result->id.'/'.$single_result->title;
                    echo shorten_string(
                      $description
                      
                      , '25' ,   $link, ' Read More');
                    }
                  ?>
                  </div>
                </div>
            </div>
        </div>
       
    
      <?php endforeach;?>
      
      <?php endif; ?>
      <style>
        .blog_descrip p{
          margin:0;
          line-height:1.2;
        }
      </style>
      <p ><?php

      if(count($blog_by_category)>5){
        echo $links; 
      }
      
      
      ?></p>
     
  </div>
 
 
 

  