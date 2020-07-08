<?php

//  function fileExtension($field) {
//    if($_FILES[$field]['name'] != ""){
//       $ext = pathinfo($_FILES[$field]['name']);
//       $ext = strtolower($ext['extension']);
//       if($ext != "jpg" && $ext != "png" && $ext != "gif" && $ext != "jpeg"){
//          return "";
//       }
      
//       return $ext;
//    }
//    return "";
// }

function fileExtension($field="" , $path=null, $imageName=null) {
  $data=array();
if($_FILES[$field]['name']){
   $fname = pathinfo($_FILES[$field]['name']);
   $fileName = $_FILES[$field]['name'];
   $fileType = $_FILES[$field]['type'];
   $fileError = $_FILES[$field]['error'];
   $fileSize = $_FILES[$field]['size'];
   $fileTempName = $_FILES[$field]['tmp_name'];
   $ext = explode('.', $fileName);
   $fname = $fname['filename'];
   $actualExt = strtolower(end($ext));
   $allowdFile= ['jpg', 'png', 'jpeg', 'gif'];
   if(in_array($actualExt,$allowdFile)){
     if($fileError== 0){
       if($fileSize < 500000){
         $fname = str_replace([' ', '/', '.','-', '&','^','(',')','%','#','$','@','!','~','`',','],['_'] , $fname);
         $name = uniqid(rand(1000,9999)).time().'_'.$fname.'.'.$actualExt;

          if($path!=""){
            $files = scandir($path);
            foreach ($files as $key => $value) {
              if(file_exists($path.$value) ){
                if( $value == $imageName){
                  unlink($path.$value);
                }
              }
            }
          }
          $data['message'] = $name;
          
       }else{
         $data['message'] = "Your File Size is Too Big";
         
       }
     }else{
      $data['message'] = "There was an error during upload file!";
      
     }
   }else{
    $data['message'] ="you can't upload ".$actualExt." type file";
   
   }
 }
 else{
  $data['message'] = "Please upload file";
  
 }
 return $data['message'];
}




function textFile($field, $id){
        
           if (!is_dir('assets/img/description/')) {
            mkdir("assets/img/description/", 0777, TRUE);
               write_file("assets/img/description/{$id}.txt", $field);
            }else{
               write_file("assets/img/description/{$id}.txt", $field);
            }
   }
  

   function shorten_string($string, $wordsreturned, $link='', $readmore='')
   {
     $retval = $string;
     $string = preg_replace('/(?<=\S,)(?=\S)/', ' ', $string);
     $string = str_replace("\n", " ", $string);
     $array = explode(" ", $string);
     if (count($array)<=$wordsreturned)
     {
       $retval = $string;
     }
     else
     {
       array_splice($array, $wordsreturned);
       $retval = implode(" ", $array)."<a href='{$link}' >{$readmore}</a>";
     }
     return $retval;
   }


   ////////////////////////////////////////////
   // Delete Prious user Image During deleting user
   ////////////////////////////////////////////
   function delete_previous_image($imgpath,$imageName ){
		$link_array = explode('/',$imageName);
		$img = end($link_array);
    $files = scandir($imgpath);
			foreach ($files as $key => $value) {

        // echo $imgpath.$value."<br/>";
			if(file_exists($imgpath.$value)){
				if( $value == $img){
          
          unlink($imgpath.$value);
          
					}
				}
			
			}
	}