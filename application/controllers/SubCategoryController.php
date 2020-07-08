<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SubCategoryController extends CI_Controller {


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
        //     '0'=> 'sub_category.css',
            
        // ];
        // $data['livejs']=[
        //     '0'=> 'https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js',
            
        // ];
		echo   $this->load->view('admin/common/header','', true);
	}
	public function footer()
	{

        $data['jsdata']=[
            '0'=> 'sub_category.js',
            
        ];
        // $data['livejs']=[
        //     '0'=> 'https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js',
            
        // ];
		echo   $this->load->view('admin/common/footer',$data, true);
	}



    public function sub_category_management()
    {
        $this->header();
		$data['categories']=$this->bmodel->view("*", 'category' , '', 'id DESC' );




		$data['sub_categories']=$this->db->query("select sc.* , c.category_name category_name from category c, sub_category sc where c.id = sc.category_id");
		echo $this->load->view("admin/sub_category_manage", $data,  true);
		$this->footer();
    }



    public function store()
	{
		$id = $this->input->post('id');
		
		$data = array(
			'sub_category_name' => $this->input->post('sub_category_name'),
			'category_id' => $this->input->post('category_id')
        );
        $status = false;
		if($id){
			$data = [
				'id'=> $id,
				'sub_category_name'=> $this->input->post('sub_category_name'),
				'category_id'=> $this->input->post('category_id')
			];
			$this->db->replace('sub_category', $data);
			$data=$this->db->query("select sc.* , c.category_name category_name from category c, sub_category sc where c.id = sc.category_id and sc.id='".$id."'");
			$data =$data->result_array();
            if($data){
                $status = true;
            }
		}
		else{
		$last_id = $this->bmodel->InsertData('sub_category', $data);
		$data=$this->db->query("select sc.* , c.category_name category_name from category c, sub_category sc where c.id = sc.category_id and sc.id='".$last_id."'");

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
		
		$data = $this->bmodel->view('*', 'sub_category', ['id'=> $id]);
		if($data){
		$arr = array('success' => true, 'data' => $data);
		}else{
			$arr = array('success' => false, 'data' => '');
		}
		
		echo json_encode($arr); 
	}
    

    public function delete()
	{	$id = $this->input->post('id');
		 $status = $this->bmodel->delete('sub_category',$id);
		
		 if($status){
			echo json_encode(array("status" => TRUE));
		 }else{
			 echo json_encode(array("status" => FALSE));
		 }
		
	}

}