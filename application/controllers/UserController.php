<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class UserController extends CI_Controller
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

		$data['cssdata']=[
            '0'=> 'user.css',
            
        ];
        // $data['livejs']=[
        //     '0'=> 'https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js',
            
        // ];
		echo   $this->load->view('admin/common/header',$data, true);
	}
	public function footer()
	{

        $data['jsdata']=[
            '0'=> 'user.js',
            
        ];
        // $data['livejs']=[
        //     '0'=> 'https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js',
            
        // ];
		echo   $this->load->view('admin/common/footer',$data, true);
	}

    public function user_management()
    {
		echo $this->header();
		$data['usertype'] = $this->bmodel->view('*', 'position_manage');
		
		$data['users']=$this->bmodel->view("*", 'users' , '', 'id DESC' );
		echo $this->load->view("admin/user_manage", $data,  true);
		echo $this->footer();
	}
	
    public function store()
    {


		// $this->form_validation->set_rules('name', 'Full Name', 'required');
		// $this->form_validation->set_rules('email', 'Email', 'required');
		// $this->form_validation->set_rules('type', 'Type', 'required');
		// $this->form_validation->set_rules('contact', 'Contact', 'required|number|min_length[6]|max_length[11]');
		// $this->form_validation->set_rules('password', 'Password', 'required|min_length[3]|max_length[12]');
		// $this->form_validation->set_rules('repassword', 'Retype Password', 'required|matches[password]');

		// if($this->form_validation->run() == FALSE){
		// 	$data['title'] = "User Register";    
		// 	$this->session->set_flashdata('msg',  validation_errors());
		// 	return redirect(base_url("admin/user_management"), "refresh");   
		  
			
		// }else{

			$id = $this->input->post('id');
			$bfore_picture = $this->input->post('bfore_picture');
			$imgpath = "admin/assets/img/users/";

		
			
			if($id){
				if($_FILES){
					$picture = fileExtension('picture',$imgpath, $bfore_picture);
				}
			}
			else{
				$picture = fileExtension('picture');
			}
			$destination = "admin/assets/img/users/".$picture;
			$data =[
			'name' => $this->input->post('name', true),
			'email' => $this->input->post('email'),
			'contact' => $this->input->post('contact'),
			'password' => $this->input->post('password'),
			'picture' => $picture,
			'type' => $this->input->post('type'),
			];
			$status = false;
			if($id){
				$data += ['id'=> $id];
				$this->db->replace('users', $data);
				$data = $this->bmodel->view('*', 'users', ['id'=> $id]);
				move_uploaded_file($_FILES['picture']['tmp_name'], $destination);
				$msg ="User Updated Sucessfully";
				$status = true;
			}else{

				$id = $this->bmodel->InsertData('users', $data);
				$data = $this->bmodel->view('*', 'users', ['id'=> $id]);
				if($data){
					$msg ="User Created Sucessfully";
					$status = true;
					move_uploaded_file($_FILES['picture']['tmp_name'], $destination);
					
				}
			}
			echo json_encode(['status'=> $status,'msg'=> $msg, 'data'=> $data]);
		
			
		// }
        
	}

	public function get_by_id(){
		
		$data = $this->bmodel->view('*', 'users' ,['id'=>$this->input->post('id')]);
		$arr = array('success' => false, 'data' => '');
		if($data){
		$arr = array('success' => true, 'data' => $data);
		}
		echo json_encode($arr); 
	}

	public function delete()
	{


		$id = $this->input->post('id');
		$imageName = $this->input->post('picture');
		$imgpath = "admin/assets/img/users/";
		delete_previous_image($imgpath, $imageName);
		$status = $this->bmodel->delete('users',$id);
		if($status){
			echo json_encode(array("status" => TRUE));
		 }else{
			 echo json_encode(array("status" => FALSE));
		 }
	
	}	
	
	
	

	

}