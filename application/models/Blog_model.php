<?php
defined('BASEPATH') OR exit('No direct script access allowed');
  
class Blog_model extends CI_Model
{
  
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->library('pagination');
	}


    
	public $Id;
	public $blog_id;
    public function InsertData($table, $data){

        if($this->db->insert($table, $data)){

            $this->Id = $this->db->insert_id();

            return $this->Id;
        }
        return false;
    }
    public function update($table,$data, $id)

    {
        $where = array('id' => $id);
         $this->db->update($table, $data, $where);
         return $this->db->affected_rows();
 
    }
        public function view($select, $table, $where = null, $order =null,  $limit = null, $join = null, $keyword=null, $group_by = null){

            $this->db->select($select);
            $this->db->from($table);
            if($join){
                foreach($join as $key => $value){
                    $this->db->join($key, $value);
                }
            }
            if($where){
                $this->db->where($where);
            }
            if($order){
                $this->db->order_by($order);
            }
            if($keyword){
                $this->db->like('title',$keyword);
            }
            if($group_by){

                $this->db->group_by($group_by);
            }
            if($limit ){
                $this->db->limit($limit[0], $limit[1]);
            }
            return $this->db->get()->result();
        }


        
        
     
        protected $table = 'blogs';
        private $blog_comment = 'blog_comment';
        public function get_count() {
            return $this->db->count_all($this->table);
        }
        public function get_blog($limit, $start=0 , $order=null, $keyword=null) {
            
            if($order){
                $this->db->order_by($order);
            }
            if($keyword){
                $this->db->like('title',$keyword);
                $query  =   $this->db->get('blogs');
                return $query->result();
            }
            $this->db->limit($limit, $start);
            $query = $this->db->get($this->table);
            return $query->result();

        }


        public function get_by_id($id=null, $category_id=null, $order_by=null)
        {
            if($id){
                $this->db->from('blogs');
                $this->db->where('id',$id);
                $query = $this->db->get();
                return $query->row();
            }
            if($category_id){
                $this->db->from('blogs');
                $this->db->where('category_id',$category_id);
                $this->db->order_by($order_by);
                return $this->db->get()->result();
                
                
            }
        }
   
		
  
    public function get_all_blogs()
    {
        $this->db->from('blogs');
        $query=$this->db->get();
		return $query->result();
	}
	
	public function get_all_category($id=null)
    {
        $this->db->from('category');
        if($id){
            $this->db->where("id", $id);
        }
        
        $query=$this->db->get();
		return $query->result();
    }
    
	public function get_all_sub_category()
    {
        $this->db->from('sub_category');
        $query=$this->db->get();
		return $query->result();
	}
	public function get_all_tag()
    {
        $this->db->from('tag');
        $query=$this->db->get();
		return $query->result();
    }
  
    
    public function get_sub_category_by_id($category_id="")
    {
        $this->db->from('sub_category');
        $query = $this->db->get();
    }
  
      
    
  
    public function delete($table , $id)
    {
        $this->db->where('id', $id);
        if($this->db->delete($table)){
            return $status=true;
        }else{
            return $status = false;
        }
        
    }


    public function search($keyword)
    {
        $this->db->like('title',$keyword);
        $query  =   $this->db->get('blogs');
        return $query->result();
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