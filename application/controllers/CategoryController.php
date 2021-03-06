<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CategoryController extends CI_Controller {


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
        //     '0'=> 'category.css',
            
        // ];
        // $data['livejs']=[
        //     '0'=> 'https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js',
            
        // ];
		echo   $this->load->view('admin/common/header','', true);
	}
	public function footer()
	{

        $data['jsdata']=[
            '0'=> 'category.js',
            
        ];
        // $data['livejs']=[
        //     '0'=> 'https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js',
            
        // ];
		echo   $this->load->view('admin/common/footer',$data, true);
	}



    public function category_management()
    {
        $this->header();
		$data['categories']=$this->bmodel->view("*", 'category' , '', 'id DESC' );
		echo $this->load->view("admin/category_manage", $data,  true);
		$this->footer();
    }



    public function store()
	{
		$id = $this->input->post('id');
		
		$data = array(
			'category_name' => $this->input->post('category_name')
        );
        $status = false;
		if($id){
			$data = [
				'id'=> $id,
				'category_name'=> $this->input->post('category_name')
			];
			$this->db->replace('category', $data);
			$data = $this->bmodel->view('*', 'category', ['id'=> $id]);
            if($data){
                $status = true;
            }
		}
		else{
		$id = $this->bmodel->InsertData('category', $data);
        $data = $this->bmodel->view("*" , 'category', ['id'=>$id]);
            if($data){
                $status = true;
            }
		}
		echo json_encode(array("status" => $status,  'data' => $data));
	}
	

	public function get_by_id()
	{
		$id = $this->input->post('id');
		
		$data = $this->bmodel->view('*', 'category', ['id'=> $id]);
		if($data){
		$arr = array('success' => true, 'data' => $data);
		}else{
			$arr = array('success' => false, 'data' => '');
		}
		
		echo json_encode($arr); 
	}
    

    public function delete()
	{	$id = $this->input->post('id');
		 $status = $this->bmodel->delete('category',$id);
		
		 if($status){
			echo json_encode(array("status" => TRUE));
		 }else{
			 echo json_encode(array("status" => FALSE));
		 }
		
	}

	
    

}