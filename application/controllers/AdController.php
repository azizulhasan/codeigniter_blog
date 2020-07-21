<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdController extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url', 'form');
		$this->load->model('bmodel');
		$this->load->library("form_validation");
		$admin_type = $this->session->userdata('type');
		if($admin_type !='6'){
			return redirect(base_url('/') , "refresh");
		}
    }
    
    public function header($data)
	{
		echo  $this->load->view('advertiser/common/header',$data, true);
	}

	public function footer()
	{
		echo   $this->load->view('advertiser/common/footer','', true);
    }
    
    public function index(){
		
			$data['title']="Advertiser login";
			$this->header($data);
        	echo  $this->load->view('advertiser/index','', true);
			$this->footer();
		

    }

	
	
}





