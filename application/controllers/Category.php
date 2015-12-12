<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('category_crud','category');
    }

    public function insert() {
        header('Content-Type: application/json');
        if(!isset($_POST) || empty($_POST)) {
            echo json_encode(array('status'=>false,'error'=>'Data not found'));
            return false;
        }
        if($this->category->insert($_POST))
            echo json_encode(array('status'=>true,'result'=>'Category inserted successfully'));
        else
            echo json_encode(array('status'=>false,'error'=>'Category not inserted'));
    }

    public function delete() {
        header('Content-Type: application/json');
        if(!isset($_POST) || empty($_POST)) {
            echo json_encode(array('status'=>false,'error'=>'Data not found'));
            return false;
        }
        if($this->category->delete($_POST['id']))
            echo json_encode(array('status'=>true,'result'=>'Category deleted successfully'));
        else
            echo json_encode(array('status'=>false,'error'=>'Category not deleted'));
    }

    public function update($id) {
        header('Content-Type: application/json');
        if(!isset($_POST) || empty($_POST)) {
            echo json_encode(array('status'=>false,'error'=>'Data not found'));
            return false;
        }
        if($this->category->update($id,$_POST))
            echo json_encode(array('status'=>true,'result'=>'Category updated successfully'));
        else
            echo json_encode(array('status'=>false,'error'=>'Category not updated'));
    }

    public function get() {
        header('Content-Type: application/json');
        $data = $this->category->get_category_list();
        if($data)
            echo json_encode(array('status'=>true,'result'=>$data));
        else
            echo json_encode(array('status'=>false,'error'=>'Data not found'));
    }
}