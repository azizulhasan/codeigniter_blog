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

	public function loginHeader($data)
	{
		echo   $this->load->view('admin/common/loginHeader',$data, true);
	}

	public function login()
	{
		
		$type = $this->session->userdata("type");
		echo $type;
		if($type=='1'){
			$data['title'] = "Admin Login";
			$this->loginHeader($data);
			redirect( base_url("admin/index"), "refresh" );
			$this->footer();
		}else if($this->uri->segment(1)=="blog"){
			$data['title'] = "User Login";
			$this->loginHeader($data);
			echo  $this->load->view('blog/login','', true);
			$this->footer();
		}else{
			$data['title'] = "Admin Login";
			$this->loginHeader($data);
			echo  $this->load->view('admin/login','', true);
			$this->footer();
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
					if($this->uri->segment(1)=='admin'){
						redirect( base_url("admin/login"), "refresh" );
					}else{
						redirect( base_url("blog/login"), "refresh" );
					}
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

					if($result->id==1){
						redirect( base_url("admin/index"), "refresh" );
					}else{
						redirect( base_url("/"), "refresh" );
					}
				}
			}
			else{
				if($this->uri->segment(1)=='admin'){
					redirect( base_url("admin/login"), "refresh" );
				}else{
					redirect( base_url("blog/login"), "refresh" );
				}
			}
		}
	}



	// $users=$this->db->query("select u.id,u.username,r.name role from users u, roles r where r.id=u.role_id");


	public function logout()
	{
		// if($this->uri->segment(1)=='post'){
		// 	$this->session->unset_userdata(['id','name','type']);
		// 	echo json_encode(array('status'=>1));
		// 	// return redirect( base_url("post/".$this->uri->segment(2)), "refresh" );
		// }elseif($this->session->userdata('id')=='4'||$this->session->userdata('id')=='3'){
		// 	$this->session->unset_userdata(['id','name', 'type']);
		// 	return redirect( base_url("/"), "refresh" );
		// }
		// else{
			$this->session->sess_destroy();
			return redirect( base_url("/"), "refresh" );
		// }
		
	}
	
}
