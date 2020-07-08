<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LoginController extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url', 'form');
		$this->load->model('bmodel');
		$this->load->library("form_validation");
		
	}
	public function footer()
	{
		echo   $this->load->view('admin/common/footer','', true);
	}

	public function loginHeader()
	{
		echo   $this->load->view('admin/common/loginHeader','', true);
	}

	public function login()
	{
		
		$type = $this->session->userdata("type");
		if($type=='1'){
			echo $this->session->userdata("type").'true';
		$this->loginHeader();
		$data['title'] = "Admin Login";
		// echo  $this->load->view('admin/index','', true);
		redirect( base_url("admin/index"), "refresh" );
		$this->footer();
		}else{
		$this->loginHeader();
		$data['title'] = "Admin Login";
		echo  $this->load->view('admin/login','', true);
		$this->footer();
		echo $this->session->userdata("type").'false';
		}
	}

	
	public function check(){
		$google_data =[

				'email' => $this->input->post('email'),
				'profile_id' => $this->input->post('profileId'),
				'name' => $this->input->post('name'),
				'picture' => $this->input->post('picture'),
				'type' => $this->input->post('type')
				];
				// print_r($google_data);
		if($this->input->post('profileId')){
			$firstlogin = $this->bmodel->view('*', "users", $google_data);
			// print_r($firstlogin);
			// exit;
			if(empty($firstlogin)){
				$id = $this->bmodel->insertData("users", $google_data);
				$results = $this->bmodel->view('*', "users", ['id'=>$id]);
				if($results){
					foreach($results as $result){
						$session = [
							"id" => $result->id,
							"name" => $result->name,
							"profile_id" => $result->profile_id,
							"type" => $result->type
						];
						$this->session->set_userdata($session);
					}
					echo json_encode(array("status" => "1,newlogin",  'data' => $results));
				}
			}else{
				
				$results = $this->bmodel->view('*', "users", $google_data);
				
				if($results){
					foreach($results as $result){
						$session = [
							"id" => $result->id,
							"name" => $result->name,
							"type" => $result->type
						];
						$this->session->set_userdata($session);
					}
					echo json_encode(array("status" => "2,priouslogin",  'data' => $results));
				}
				else{
					redirect( base_url("admin/login"), "refresh" );
				}
			}

		}else{
			
			$manual_data =[
				'email' => $this->input->post('email'),
				'password' => $this->input->post('password'),
				'type' => $this->input->post('type')
				];
			$results = $this->bmodel->view('*', "users", $manual_data);
			if($results){
				foreach($results as $result){
					$data = [
							"id" => $result->id,
							"name" => $result->name,
							"type" => $result->type
					];
					$this->session->set_userdata($data);
					redirect(base_url( "admin/index" ), "refresh");
				}
			}
			else{
				redirect( base_url("admin/login"), "refresh" );
			}
		}
	}



	// $users=$this->db->query("select u.id,u.username,r.name role from users u, roles r where r.id=u.role_id");


	public function register_confirm(){
		// $this->form_validation->set_rules('full_name', 'Full Name', 'required');
		// $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
		// $this->form_validation->set_rules('password', 'Password', 'required|min_length[6]|max_length[12]');
		// $this->form_validation->set_rules('re_password', 'Retype Password', 'required|matches[password]');

		// if($this->form_validation->run() == FALSE){
		// 	$data['title'] = "Register";    
		// 	$data['register_content'] = $this->load->view("admin/register", $data, true);     
		// 	$this->load->view("page/mofiz", $data);
		// }
		// else{
         

			$data = [
				"name" => $this->input->post("full_name"),
				"email" => $this->input->post("email"),
				"password" => md5($this->input->post("password")),
				"re_password" => md5($this->input->post("re_password")),            
				"picture" => fileExtension('pic')
			];
			
			if($this->bmodel->InsertData("users", $data)){
            $id = $this->bmodel->Id;
				// if($data['picture']){
				// 	$this->load->model("custom_model");
				// 	$this->custom_model->UploadImg(
				// 		"assets/img/users",
				// 		"{$id}.{$data['picture']}",
				// 		"pic"
				// 	);            

				// 	$this->custom_model->ResizeImg(
				// 		"assets/img/users/{$id}.{$data['picture']}",
				// 		"assets/img/users/{$id}-md.{$data['picture']}",
				// 		"800",
				// 		"450"
				// 	);

				// 	list($width, $height) = getimagesize("assets/img/users/{$id}.{$data['picture']}");
				// 	$x_axis = floor($width - 200/2);
				// 	$y_axis = floor($height - 100/2);

				// 	$this->custom_model->CropImg(
				// 		"assets/img/users/{$id}.{$data['picture']}",
				// 		"./assets/img/users/{$id}-cr.{$data['picture']}",
				// 		"200",
				// 		"100",
				// 		$x_axis,
				// 		$y_axis
				// 	);

				// 	$this->custom_model->watermarkImg(
				// 		"assets/img/users/{$id}.{$data['picture']}",
				// 		"assets/img/users/{$id}-w.{$data['picture']}",
				// 		"assets/img/users/logo.png"					
				// 	);
            	// }

				$this->session->set_flashdata('success', 'Save Successfully');
				redirect(base_url("admin/register_add"), "refresh");
				//$this->session->set_userdata('success', 'Save Successfully'); //keep data long time
				//$this->session->userdata('success'); //read data
				//$this->session->unset_userdata('success', 'Save Successfully'); //delete data 
			}		
			else{
				$data['msg']= $this->session->set_flashdata('success', 'Save Successfully');
				  
					
				$this->load->view("admin/regiser_add", $data);	
			}			
		// }
	}
}
