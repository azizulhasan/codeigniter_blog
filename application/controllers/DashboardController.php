<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DashboardController extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url', 'form');
		$this->load->model('bmodel');
        $this->load->library("form_validation");
    }
    
    public function header($data)
	{
		echo  $this->load->view('dashboard/common/header',$data, true);
	}

	public function footer()
	{
		echo   $this->load->view('dashboard/common/footer','', true);
    }
    
    public function index(){
		$type =  $this->uri->segment(2);
        if($type==='3'){
			$data['title']="Advertiser login";
			$this->header($data);
        	echo  $this->load->view('dashboard/index','', true);
			$this->footer();
		}else{

			return redirect( base_url("/"), "refresh" );
		}

    }

	
	
}





