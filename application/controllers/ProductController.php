<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
 
class ProductController extends CI_Controller {
 
 
public function __construct()
    {
        parent::__construct();
    $this->load->helper('url');
        $this->load->model('Product_model');
    }
 
 
    public function index()
    {
 
        $data['products']=$this->Product_model->get_all_Products();
        $this->load->view('product/product_list',$data);
        // echo 'adslfkjasdf';
    }
 
    public function get_product_by_id()
    {
        $id = $this->input->post('id');
         
        $data = $this->Product_model->get_by_id($id);
          
        $arr = array('success' => false, 'data' => '');
        if($data){
        $arr = array('success' => true, 'data' => $data);
        }
        echo json_encode($arr);
    }
 
    public function store()
    {
        $data = array(
                'title' => $this->input->post('title'),
                'product_code' => $this->input->post('product_code'),
                'description' => $this->input->post('description'),
                // 'picture' => fileExtension('picture') ,
                'created_at' => date('Y-m-d H:i:s'),
            );
         
        $status = false;
 
        $id = $this->input->post('product_id');
 
        if($id){
           $update = $this->Product_model->update($data);
           $status = true;
        }else{
           $id = $this->Product_model->create($data);
           $status = true;
        }
 
        $data = $this->Product_model->get_by_id($id);
 
        echo json_encode(array("status" => $status , 'data' => $data));
    }
 
    public function delete()
    {
        $this->Product_model->delete();
        echo json_encode(array("status" => TRUE));
    }
 
 
 
}