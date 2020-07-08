<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TagController extends CI_Controller {


	public function __construct(){

        parent::__construct();

        $admin_type = $this->session->userdata("type");
		if(!$admin_type=='1'){
            return redirect( base_url("/"), "refresh" );
		}

    }
	public function header()
	{

		// $data['cssdata']=[
        //     '0'=> 'tag.css',
            
        // ];
        // $data['livejs']=[
        //     '0'=> 'https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js',
            
        // ];
		echo   $this->load->view('admin/common/header','', true);
	}
	public function footer()
	{

        $data['jsdata']=[
            '0'=> 'tag.js',
            
        ];
        // $data['livejs']=[
        //     '0'=> 'https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js',
            
        // ];
		echo   $this->load->view('admin/common/footer',$data, true);
	}



    public function tag_management()
    {
        $this->header();
		$data['categories']=$this->bmodel->view("*", 'category' , '', 'id DESC' );
		$data['tags']=$this->db->query("select t.* , c.category_name category_name from tag t, category c where c.id = t.category_id");
		echo $this->load->view("admin/tag_manage", $data,  true);
		$this->footer();
    }



    public function store()
	{
		$id = $this->input->post('id');
		
		$data = array(
			'tag_name' => $this->input->post('tag_name'),
			'category_id' => $this->input->post('category_id')
        );
        $status = false;
		if($id){
			$data = [
				'id'=> $id,
				'tag_name'=> $this->input->post('tag_name'),
				'category_id'=> $this->input->post('category_id')
			];
			$this->db->replace('tag', $data);
			$data=$this->db->query("select t.* , c.category_name category_name from tag t, category c where c.id = t.category_id and t.id='".$id."'");
			$data =$data->result_array();
            if($data){
                $status = true;
            }
		}
		else{
		$last_id = $this->bmodel->InsertData('tag', $data);
		$data=$this->db->query("select t.* , c.category_name category_name from tag t, category c where c.id = t.category_id and t.id='".$last_id."'");

		$data =$data->result_array();
            if($data){
                $status = true;
            }
		}
		echo json_encode(array("status" => $status,  'data' => $data));
	}
	

	public function get_by_id()
	{
		$id = $this->input->post('id');
		
		$data = $this->bmodel->view('*', 'tag', ['id'=> $id]);
		if($data){
		$arr = array('success' => true, 'data' => $data);
		}else{
			$arr = array('success' => false, 'data' => '');
		}
		
		echo json_encode($arr); 
	}
    

    public function delete()
	{	$id = $this->input->post('id');
		 $status = $this->bmodel->delete('tag',$id);
		
		 if($status){
			echo json_encode(array("status" => TRUE));
		 }else{
			 echo json_encode(array("status" => FALSE));
		 }
		
	}

}