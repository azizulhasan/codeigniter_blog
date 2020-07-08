<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Blog extends CI_Controller 
{	
	public function __construct()
    {
		parent::__construct();
		$this->load->library('session'); 
        $this->load->database();
		$this->load->library('pagination');
		$this->load->library('table');
		$this->load->helper('url');
		$this->load->library('email');
		
		
	}
	public function check_user_logged_in(){
		$session = [
			'id'=>$this->session->userdata('id'),
			'type'=>$this->session->userdata('type'),
			'name'=>$this->session->userdata('name')
		];
		$amdin_type = $this->session->userdata("type");
		if($amdin_type){
			$login_data = $this->bmodel->view('*', 'users', $session);
			return $login_data;
		}
	}

	
	public function header()
	{
		$data['login_data']= $this->check_user_logged_in();
		echo   $this->load->view('blog/common/header',$data, true);
	}
	public function bottom()
	{
		echo   $this->load->view('blog/common/bottom','', true);
	}
	// public function index()
	// {	
	// 	$this->header();
	// 	$data['blogs']=$this->bmodel->view("*", "blogs", "", 'id desc', ['5', null]);
	// 	echo  $this->load->view('blog/index',$data, true);
	// 	$this->bottom();
	// }

	
	 
	public function craete_pagination(){
		$config = array();
        $config["base_url"] = base_url() ;
		$config["total_rows"] = $this->bmodel->get_count();
        $config["per_page"] = 5;
		$config["uri_segment"] = 1;
		$config['use_page_numbers'] = TRUE;
        $this->pagination->initialize($config);
		$page = ($this->uri->segment(1)) ? $this->uri->segment(1) : 0;
		$this->pagination->create_links();
	}


	public function index() {
		$config = array();
        $config["base_url"] = base_url() ;
		$config["total_rows"] = $this->bmodel->get_count();
        $config["per_page"] = 5;
		$config["uri_segment"] = 1;
		$config['use_page_numbers'] = TRUE;
        $this->pagination->initialize($config);
		$page = ($this->uri->segment(1)) ? $this->uri->segment(1) : 0;
        $data["links"] = $this->pagination->create_links();
		$data['blogs'] = $this->bmodel->get_blog($config["per_page"] = 5, $page, 'id desc');
		$this->header();
		$this->load->view('blog/index', $data, false);
	}
	

	public function about()
	{
		$this->header();
		echo  $this->load->view('blog/about','', true);
		$this->bottom();
	}
	public function post($id)
	{	
		$this->load->helper('url');
		$this->header();
		$data['blog'] = $this->bmodel->get_by_id($this->uri->segment(2));
		
		
		$cat_id = [
			'id'=> $data['blog']->category_id
		];
		$data['categories']  = $this->bmodel->view("*", "category", $cat_id,'' );

		$where = [
			'category_id'=> $data['blog']->category_id
		];
		$data['releted_post']  = $this->bmodel->view("*", "blogs", $where, '', ['3',rand(1,9)]);

		$where_sub_cat_id = [
			'sub_category_id'=>$data['blog']->sub_category_id
		];
		$data['tags'] = $this->bmodel->view('*', 'tag', $where_sub_cat_id, '' );
		
		echo  $this->load->view('blog/post',$data, true);
		$this->bottom();
	}



	public function contact()
	{	
		$this->header();
		echo  $this->load->view('blog/contact','', true);
		$this->bottom();
	}

	public function register()
	{  
		$this->header(); 
		echo  $this->load->view("blog/register" , '' , true);	
		$this->bottom();
	}


	public function search_keyword(){


		$config = array();
        $config["base_url"] = base_url() ;
		$config["total_rows"] = $this->bmodel->get_count();
        $config["per_page"] = 5;
		$config["uri_segment"] = 1;
		$config['use_page_numbers'] = TRUE;
        $this->pagination->initialize($config);
		$page = ($this->uri->segment(1)) ? $this->uri->segment(1) : 0;
		$data["links"] = $this->pagination->create_links();
		

		$keyword    =   $this->input->post('keyword');
		$data['search_results'] = $this->bmodel->get_blog($config["per_page"] = 5, $page, 'id desc', $keyword);
		$data['keyword'] = $keyword;
		 
		$this->header(); 
		echo  $this->load->view('blog/result_view',$data, true);
		$this->bottom();
   
	}

	public function category_post(){
		 $data['blog_by_category'] = $this->bmodel->get_by_id('', $this->uri->segment(2), 'id desc');
		 $data['cat_name']=   $this->bmodel->get_all_category( $this->uri->segment(2));
		$this->header(); 
		echo  $this->load->view('blog/category_view',$data, true);
		$this->bottom();
	}

	public function tag_post(){
		 $data['blog_by_tag'] = $this->bmodel->get_by_id('', $this->uri->segment(2), 'id desc');
		 $data['tag_name']=   $this->bmodel->get_all_category( $this->uri->segment(2));
		$this->header(); 
		echo  $this->load->view('blog/tag_view',$data, true);
		$this->bottom();
	}


	


	public function user_subscriber()
	{

    

		$data = array(
				'email' => $this->input->post('email'),
				'contact' => $this->input->post('contact'),
				'type' => 2,
		);
		$id = $this->bmodel->InsertData('users', $data);
		$result = $this->bmodel->view("*","users", ['id'=>$id]);
		

	$to =  $this->input->post('email');  // User email pass here
    $subject = 'test';

    $from = 'azizulhasan.cr@gmail.com';              // Pass here your mail id

    $emailContent = '<!DOCTYPE><html><head></head><body><table width="600px" style="border:1px solid #cccccc;margin: auto;border-spacing:0;"><tr><td style="background:#000000;padding-left:3%"><img src="http://codingmantra.co.in/assets/logo/logo.png" width="300px" vspace=10 /></td></tr>';
    $emailContent .='<tr><td style="height:20px"></td></tr>';


    $emailContent .= "this is testing purpose";  //   Post message available here


    $emailContent .='<tr><td style="height:20px"></td></tr>';
    $emailContent .= "<tr><td style='background:#000000;color: #999999;padding: 2%;text-align: center;font-size: 13px;'><p style='margin-top:1px;'><a href='http://codingmantra.co.in/' target='_blank' style='text-decoration:none;color: #60d2ff;'>www.codingmantra.co.in</a></p></td></tr></table></body></html>";

    $config['protocol']    = 'smtp';
    $config['smtp_host']    = 'ssl://smtp.gmail.com';
    $config['smtp_port']    = '465';
    $config['smtp_timeout'] = '3';

    $config['smtp_user']    = 'azizulhasan.cr@gmail.com';    //Important
    $config['smtp_pass']    = 'IwillbeRich40';  //Important

    $config['charset']    = 'utf-8';
    $config['newline']    = "\r\n";
    $config['mailtype'] = 'html'; // or html
    $config['validation'] = TRUE; // bool whether to validate email or not 
	$this->load->library('session'); 
	$this->load->library('email'); 
    $this->email->initialize($config);
    $this->email->set_mailtype("html");
    $this->email->from($from);
    $this->email->to($to);
    $this->email->subject($subject);
    $this->email->message($emailContent);
	
         //Send mail 
         
		($this->email->send() && $result)?$status=1:$status=0;
        
		echo json_encode(array("status" => $status,  'data' => $result));
	}





public function send()
{

	


    $to =  $this->input->post('from');  // User email pass here
    $subject = 'Welcome To CodingMantra';

    $from = 'azizulhasan.cr@gmail.com';              // Pass here your mail id

    $emailContent = '<!DOCTYPE><html><head></head><body><table width="600px" style="border:1px solid #cccccc;margin: auto;border-spacing:0;"><tr><td style="background:#000000;padding-left:3%"><img src="http://codingmantra.co.in/assets/logo/logo.png" width="300px" vspace=10 /></td></tr>';
    $emailContent .='<tr><td style="height:20px"></td></tr>';


    $emailContent .= "this is testing purpose";  //   Post message available here


    $emailContent .='<tr><td style="height:20px"></td></tr>';
    $emailContent .= "<tr><td style='background:#000000;color: #999999;padding: 2%;text-align: center;font-size: 13px;'><p style='margin-top:1px;'><a href='http://codingmantra.co.in/' target='_blank' style='text-decoration:none;color: #60d2ff;'>www.codingmantra.co.in</a></p></td></tr></table></body></html>";
                


    $config['protocol']    = 'smtp';
    $config['smtp_host']    = 'ssl://smtp.gmail.com';
    $config['smtp_port']    = '465';
    $config['smtp_timeout'] = '3';

    $config['smtp_user']    = 'azizulhasan.cr@gmail.com';    //Important
    $config['smtp_pass']    = 'IwillbeRich40';  //Important

    $config['charset']    = 'utf-8';
    $config['newline']    = "\r\n";
    $config['mailtype'] = 'html'; // or html
    $config['validation'] = TRUE; // bool whether to validate email or not 
	$this->load->library('session'); 
	$this->load->library('email'); 
    $this->email->initialize($config);
    $this->email->set_mailtype("html");
    $this->email->from($from);
    $this->email->to($to);
    $this->email->subject($subject);
    $this->email->message($emailContent);
	$this->email->send();
    $this->session->set_flashdata('msg',"Mail has been sent successfully");
    $this->session->set_flashdata('msg_class','alert-success');
	return redirect('post/'.$this->input->post('blog_id'));
	
}

	public function register_add(){
		
		$this->header();
		echo  $this->load->view('blog/register_add','', true);
		$this->bottom();
	}
	//--------------------------------------------------------------------

}
