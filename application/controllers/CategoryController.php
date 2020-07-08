<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CategoryController extends CI_Controller {


	public function __construct(){

        parent::__construct();

        $admin_type = $this->session->userdata("type");
		if(!$admin_type=='1'){
            return redirect( base_url("/"), "refresh" );
		}

    }

    public function index(){
        
    }
    public function edit_category_view($id){
        $data['category'] = $this->bmodel->view('*', 'category', ['id'=>$id]);
        // print_r($data);

        $this->load->view('admin/edit_category_view', $data);
    }
    public function update_category($id){
        $data = [
            'category_name'=> $this->input->post('category_name'),
        ];
        $this->bmodel->update('category', $data,$id);
        $data= $this->bmodel->view('*', 'category', ['id'=>$id]);
        print_r($data);


        // $this->load->view('admin/edit_category_view', $data);
    }


}