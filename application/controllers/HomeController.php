<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class HomeController extends CI_Controller
{
	public function header(){
		return  $this->load->view('sms/includes/frontInclude/header', '',  true);
	}
	public function footer(){
		return  $this->load->view('sms/includes/frontInclude/footer', '',  true);
	}

	public function index()
	{
		echo $this->header();
		echo  $this->load->view("sms/view/front/index",'',  true);
		echo $this->footer();
	}

	public function about(){
		echo $this->header();
		echo  $this->load->view("sms/view/front/about",'',  true);
		echo $this->footer();
	}

	public function contact()
	{
		echo $this->header();
		echo  $this->load->view("sms/view/front/contact", '',  true);
		echo $this->footer();
	}

	public function blog()
	{
		echo $this->header();
		echo  $this->load->view("sms/view/front/blog", '',  true);
		echo $this->footer();
	}
	public function blog_single()
	{
		echo $this->header();
		echo  $this->load->view("sms/view/front/blog-single", '',  true);
		echo $this->footer();
	}
	public function pricing()
	{
		echo $this->header();
		echo  $this->load->view("sms/view/front/pricing", '',  true);
		echo $this->footer();
	}
	public function courses()
	{
		echo $this->header();
		echo  $this->load->view("sms/view/front/courses", '',  true);
		echo $this->footer();
	}
	public function teacher()
	{
		echo $this->header();
		echo  $this->load->view("sms/view/front/teacher", '',  true);
		echo $this->footer();
	}
	public function gallery()
	{
		echo $this->header();
		echo  $this->load->view("sms/view/front/index", '',  true);
		echo $this->footer();
	}

}





