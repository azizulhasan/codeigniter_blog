<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BlogCrudController extends CI_Controller {


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
            '0'=> 'blog.css',
            
        ];
		echo   $this->load->view('admin/common/header',$data, true);
	}
	public function footer()
	{

        $data['jsdata']=[
            '0'=> 'blogcrud.js',
            
        ];
        $data['livejs']=[
            '0'=> 'https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js',
            
        ];
		echo   $this->load->view('admin/common/footer',$data, true);
	}

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
			$this->session->unset_userdata(['id','name', 'type']);
			return redirect( base_url("/"), "refresh" );
		// }
		
	}

	


	public function index()
	{
		
		$this->header();

		$data['blogs']  = $this->db->query("select c.category_name category_name, sc.sub_category_name sub_category_name, b.*  from category c, sub_category sc, blogs b where c.id = b.category_id and sc.id = b.sub_category_id");


		// $data['blogs']=$this->bmodel->get_all_blogs();

		$data['categories']=$this->bmodel->get_all_category();
		$data['sub_categories']=$this->bmodel->get_all_sub_category();
		$data['tags']=$this->bmodel->get_all_tag();

		echo $this->load->view('admin/index',$data, true  );
		$this->footer();


	}

			
	public function get_blog_by_id()
	{

		$id = $this->input->post('id');
		$result  = $this->db->query("select c.category_name category_name, sc.sub_category_name sub_category_name, b.*  from category c, sub_category sc, blogs b where c.id = b.category_id and sc.id = b.sub_category_id and b.id='".$id."'");
		$data = $result->result_array();

		$tag = $this->db->query("select tag_id from blogs where id='".$id."'");
		$tag =$tag->result_array();
		$tagId = explode(",",$tag[0]['tag_id']);
		$tagName = array();
		for( $i = 0; $i <count($tagId) ;$i++){
			$tag_name = $this->db->query("select id tId, tag_name, category_id cId from tag where id = '".$tagId[$i]."'");
			$tagName = $tag_name->result_array();
			array_push($data, $tagName[0]);
			
		}
		


		// $data = $this->bmodel->get_by_id($id);
		
		$arr = array('success' => false, 'data' => '');
		if($data){
		$arr = array('success' => true, 'data' => $data);
		}

		
		echo json_encode($arr); 


		
	}

	public function get_sub_category()
	{
		
		$where =[
			'category_id'=> $this->input->post('category_id')
		];
		
		$data = $this->bmodel->view("*", "sub_category", $where);
		$tag= $this->bmodel->view("*", "tag", $where);
		
		
		$arr = array('success' => false, 'data' => '');
		if($data){
		$arr = array('success' => true, 'data' => $data, 'tag'=>$tag);
		}


		echo json_encode($arr); 
	}

	public function store()
	{



		$data = array(
			'title' => $this->input->post('title'),
			'blog_slug' => $this->input->post('title'),
			'subtitle' => $this->input->post('subtitle'),
			'category_id' => $this->input->post('category_id'),
			'sub_category_id' => $this->input->post('sub_category_id'),
			'blog_type' => $this->input->post('blog_type'),
			'paid_amount' => $this->input->post('paid_amount'),
			'tag_id' => $this->input->post('tag_id'),
			'created_by_id' => $this->session->userdata('type'),
			'created_at' => date('Y-m-d H:i:s'),
		);

		

		$id = $this->input->post('blog_id');
		$imageName = $this->input->post('picture');
		$imgpath = "assets/img/";
		$status = false;
		if($id){
			if($imageName==null){
				$picture = fileExtension('picture', $imgpath,$imageName );
				$data += ['picture'=> $picture];
				$destination = "assets/img/".$picture;
				move_uploaded_file($_FILES['picture']['tmp_name'], $destination);
			}
			
			$data = $this->bmodel->update('blogs', $data, $id);
			$data = $this->bmodel->view('*','blogs',['id'=> $id]);
			textFile($this->input->post('description') ,  $id);
			$status = true;
		}else{
			$picture = fileExtension('picture');
			$data +=['picture'=> $picture];
			$id = $this->bmodel->InsertData('blogs', $data);
			$data = $this->bmodel->view('*','blogs',['id'=> $id]);
			textFile($this->input->post('description') ,  $id);
			$destination = "assets/img/".$picture;
			move_uploaded_file($_FILES['picture']['tmp_name'], $destination);
			$status = true;

		}
		echo json_encode(array("status" => $status,  'data' => $data));
	}

	
	public function delete()
	{
		
		$id = $this->input->post('id');
		$imageName = $this->input->post('picture');
		$imgpath = "assets/img/";
		delete_previous_image($imgpath, $imageName);

		$status = $this->bmodel->delete('blogs',$id);
		
		if($status){
			echo json_encode(array("status" => TRUE));
		 }else{
			 echo json_encode(array("status" => FALSE));
		 }
	}

	public function register_confirm(){
		

		$this->form_validation->set_rules('name', 'Full Name', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required|min_length[3]|max_length[12]');
		$this->form_validation->set_rules('repassword', 'Retype Password', 'required|matches[password]');

		$this->form_validation->set_rules('is_checked', 'Terms & Conditions', 'required');

		
		

		if($this->form_validation->run() == FALSE){
			$data['title'] = "Register";    
			$this->session->set_flashdata('err',  validation_errors());
			return redirect(base_url("admin/register_add"), "refresh");     
			
		}else{
			$picture = fileExtension('picture');
			$destination = "assets/img/users/".$picture;
			move_uploaded_file($_FILES['picture']['tmp_name'], $destination);
			$data = [
				'name' 		=> $this->input->post('name'),
				'email'		=> $this->input->post('email'),
				'picture' 	=> $picture,
				'password' 	=> $this->input->post('password'),
				'type' 	=> $this->input->post('type'),
			];
			if($this->bmodel->InsertData("users", $data)){
				$id = $this->bmodel->Id;
				$results = $this->bmodel->view('*', 'users', ['id'=>$id] );
				foreach($results as $result){
					$session = [
						"id" => $result->id,
						"name" => $result->name,
						"type" => $result->type
					];
					$this->session->set_userdata($session);
				}
				$this->session->set_flashdata('msg', 'Register Successful');
				redirect(base_url("admin/register_add"), 'refresh');
			}else{
				$this->session->set_flashdata('msg', 'Something Went Wront');
				return redirect(base_url("admin/register_add"), "refresh");
			}	
		}
	}
	
	//--------------------------------------------------------------------

}
