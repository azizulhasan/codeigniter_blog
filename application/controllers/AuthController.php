<?php
defined('BASEPATH') OR exit('No direct script access allowed');



class AuthController extends CI_Controller
{
	public function header(){
		echo  $this->load->view('sms/includes/header', '',  true);
	}
	public function footer(){
		echo  $this->load->view('sms/includes/footer', '',  true);
	}

	public function login()
	{
		 $this->header();
		echo  $this->load->view("sms/view/login/login", '',  true);
		 $this->footer();
        
	}

	public function logout()
	{
		echo $this->header();
		echo  $this->load->view("sms/view/login/logout", '',  true);
		echo $this->footer();
		
		
	}

	public function register()
	{
		echo helper('form');
		echo $this->header();
		echo  $this->load->view("sms/view/login/register", '',  true);
		echo $this->footer();
		
	}


	

}





