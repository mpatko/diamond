<?php
class Product extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('product_crud','product');
    }

    public function insert() {
        header('Content-Type: application/json');
        if(!isset($_POST) || empty($_POST)) {
            echo json_encode(array('status'=>false,'error'=>'Data not found'));
            return false;
        }
        if($this->product->insert($_POST))
            echo json_encode(array('status'=>true,'result'=>'Product inserted successfully'));
        else
            echo json_encode(array('status'=>false,'error'=>'Product not inserted'));
    }

    public function delete() {
        header('Content-Type: application/json');
        if(!isset($_POST) || empty($_POST)) {
            echo json_encode(array('status'=>false,'error'=>'Data not found'));
            return false;
        }
        if($this->product->delete($_POST['id']))
            echo json_encode(array('status'=>true,'result'=>'Product deleted successfully'));
        else
            echo json_encode(array('status'=>false,'error'=>'Product not deleted'));
    }

    public function update($id) {
        header('Content-Type: application/json');
        if(!isset($_POST) || empty($_POST)) {
            echo json_encode(array('status'=>false,'error'=>'Data not found'));
            return false;
        }
        if($this->product->update($id,$_POST))
            echo json_encode(array('status'=>true,'result'=>'Product updated successfully'));
        else
            echo json_encode(array('status'=>false,'error'=>'Product not updated'));
    }

    public function get($id=null) {
        header('Content-Type: application/json');
        $this->load->library('PHPExcel');
        $this->load->library('PHPExcel/IOFactory');
        $objPHPExcel = new PHPExcel();

        $query = $this->product->get_products($id);
        if(!$query) {
            echo json_encode(array('status'=>false,'error'=>'Data not found'));
            return false;
        }
        $fields = $query->list_fields();
        $result = $query->result();
        if(empty($result)) {
            echo json_encode(array('status'=>true,'result'=>'Products not found'));
            return false;
        }

        $col = 0;
        foreach ($fields as $field)
        {
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($col, 1, $field);
            $col++;
        }
        $row = 3;
        foreach($result as &$data)
        {
            $col = 0;
            foreach ($fields as $field)
            {
                if($field == 'created_date')
                    $data->$field = date('d/m/Y H:i',$data->$field);
                $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($col, $row, $data->$field);
                $col++;
            }
            $row++;
        }
        $objPHPExcel->setActiveSheetIndex(0);
        $objWriter = IOFactory::createWriter($objPHPExcel, 'Excel5');

        $filepath = 'products/Products_'.date('dmyHis').'.xls';
        $objWriter->save($filepath);
        echo json_encode(array('status'=>true,'result'=>$result,'download_link'=> base_url().$filepath));
    }
}