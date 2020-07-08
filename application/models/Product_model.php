<?php
defined('BASEPATH') OR exit('No direct script access allowed');
  
class Product_model extends CI_Model
{
  
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
  
  
    public function get_all_products()
    {
        $this->db->from('products');
        $query=$this->db->get();
        return $query->result();
    }
      
  
    public function get_by_id($id)
    {
        $this->db->from('products');
        $this->db->where('id',$id);
        $query = $this->db->get();
  
        return $query->row();
    }
  
       public function create($data){
         
           $this->db->insert('products', $data);
       return $this->db->insert_id();
       }
 
    public function update($data)
    {
        $where = array('id' => $this->input->post('product_id'));
         $this->db->update('products', $data, $where);
         return $this->db->affected_rows();
 
    }
  
    public function delete()
    {
        $id = $this->input->post('product_id');
        $this->db->where('id', $id);
        $this->db->delete('products');
    }





    public function CropImg($source, $dest, $width, $height, $x, $y){

		$this->load->library('image_lib');
		$config['image_library'] = 'gd2';
		$config['library_path'] = '';
		$config['source_image'] = $source;
		$config['create_thumb'] = false;
		$config['maintain_ratio'] = false;
		$config['x_axis'] = $x;
		$config['y_axis'] = $y;
		$config['new_image'] = $dest;
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
		$config['width']  = $width;
		$config['height'] = $height;
		$this->image_lib->initialize($config);
		$this->image_lib->resize();
		$this->image_lib->clear();
	}

	public function UploadImg($dest, $name, $field, $max_size = 10000, $max_width = 6000, $max_height = 6000, $allowed_types = 'gif|jpg|png|jpeg'){
		$this->load->library('upload');
		$config['upload_path'] = "./{$dest}";
		$config['allowed_types'] = $allowed_types;
		$config['max_size'] = $max_size;
		$config['max_width']  = $max_width;
		$config['max_height'] = $max_height;
		$config['file_name'] = $name;
		$this->upload->initialize($config);
		$this->upload->do_upload($field);
	}

	public function watermarkImg($source, $dest, $watermark_url)
	{
		$this->load->library('image_lib');
		$config['source_image'] = $source;
		$config['new_image'] = $dest;
		$config['wm_overlay_path'] = $watermark_url;

		$config['wm_type'] = 'overlay';
    //the overlay image
		$config['wm_opacity'] = 90;
		$config['wm_vrt_alignment'] = 'bottom';
		$config['wm_hor_alignment'] = 'right';
		$this->image_lib->initialize($config);

		$this->image_lib->watermark();
	}

  
  
}