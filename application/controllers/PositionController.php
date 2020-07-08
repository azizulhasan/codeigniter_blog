<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class PositionController extends CI_Controller
{

	public function __construct(){

        parent::__construct();

        $admin_type = $this->session->userdata("type");
		if(!$admin_type=='1'){
            return redirect( base_url("/"), "refresh" );
		}

    }
	public function header()
	{
		echo   $this->load->view('admin/common/header','', true);
	}
	public function footer()
	{

        $data['jsdata']=[
            '0'=> 'position.js',
            
		];
		
        // $data['livejs']=[
        //     '0'=> 'https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js',
            
		// ];
		
		echo   $this->load->view('admin/common/footer',$data, true);
	}

    public function position_management()
    {
        $this->header();
		$data['positions']=$this->bmodel->view("*", 'position_manage' , '', 'id DESC' );
		echo $this->load->view("admin/position_manage", $data,  true);
		$this->footer();
    }



    public function store()
	{
		$id = $this->input->post('id');
		
		$data = array(
			'position_name' => $this->input->post('position_name')
        );
        $status = false;
		if($id){
			$data = [
				'id'=> $id,
				'position_name'=> $this->input->post('position_name')
			];
			$this->db->replace('position_manage', $data);
			$data = $this->bmodel->view('*', 'position_manage', ['id'=> $id]);
            if($data){
                $status = true;
            }
		}
		else{
		$id = $this->bmodel->InsertData('position_manage', $data);
        $data = $this->bmodel->view("*" , 'position_manage', ['id'=>$id]);
            if($data){
                $status = true;
            }
		}
		echo json_encode(array("status" => $status,  'data' => $data));
	}
	

	public function get_by_id()
	{
		$id = $this->input->post('id');
		
		$data = $this->bmodel->view('*', 'position_manage', ['id'=> $id]);
		if($data){
		$arr = array('success' => true, 'data' => $data);
		}else{
			$arr = array('success' => false, 'data' => '');
		}
		
		echo json_encode($arr); 
	}
    

    public function delete()
	{	$id = $this->input->post('id');
		 $status = $this->bmodel->delete('position_manage',$id);
		
		 if($status){
			echo json_encode(array("status" => TRUE));
		 }else{
			 echo json_encode(array("status" => FALSE));
		 }
		
	}

	
    public function create_role()
    {
        $data =[
			'name' => $this->input->post('name', true),
			'email' => $this->input->post('email'),
			'contact' => $this->input->post('contact'),
			'password' => $this->input->post('password'),
			'type' => $this->input->post('type'),
		];
		
		$result = $this->bmodel->InsertData('users', $data);

		if($result){
			$this->session->set_flashdata('msg',"Role Created Sucessfully");
			return redirect('admin/position_management');
			// $this->load->view("admin/position_management", '',  true);
		}
	}
	

	

}