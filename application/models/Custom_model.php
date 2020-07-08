<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Custom_model extends CI_Model {

	


	public function CropImg($source, $dest, $width, $height, $x, $y){

		$this->load->library('image_lib');
		$config['image_library'] = 'gd2';
		$config['library_path'] = '/usr/bin/';
		$config['source_image'] = $source;
		$config['create_thumb'] = false;
		$config['maintain_ratio'] = false;
		
		$config['x_axis'] = $x;
		$config['y_axis'] = $y;
		$config['new_image']  = $dest;
		$config['width']  = $width;
		$config['height'] = $height;
		
		$this->image_lib->initialize($config);
		$this->image_lib->crop();
		$this->image_lib->clear();
        
    }




    public function ResizeImg($source, $dest, $width, $height){

		$this->load->library('image_lib');
		
		$config['source_image'] = $source;
		$config['new_image'] = $dest;
		$config['maintain_ratio'] = false;
		$config['width']         = $width;
		$config['height']       = $height;
		
		$this->image_lib->initialize($config);
		$this->image_lib->resize();
		$this->image_lib->clear();
        
	}
	public function WaterMark($source, $dest, $watermark_url){

		$this->load->library('image_lib');
		
		$config['source_image'] = $source;
		$config['new_image'] = $dest;
		$config['wm_overlay_path'] = $watermark_url;
		$config['wm_type']         = 'overlay';
		$config['wm_opacity']       = 90;
		$config['wm_vrt_alignment']       = 'bottom';
		$config['wm_hor_alignment']       = 'right';
			
		$this->image_lib->initialize($config);
		$this->image_lib->watermark();
	
        
    }



    public function UploadImg($dest, $name, $field, $max_size = 1000, $max_width = 6000, $max_height = 6000, $allowed_types = 'gif|jpg|png'){

        $this->load->library('upload');
        $config['upload_path'] = "./{$dest}";
        $config['allowed_types'] = $allowed_types;
        $config['max_size']     = $max_size;
        $config['max_width'] = $max_width;
        $config['max_height'] = $max_height;
        $config['file_name'] = $name;

        $this->upload->initialize($config);
        $this->upload->do_upload($field);

        
    }

}


?>

