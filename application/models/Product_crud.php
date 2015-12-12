<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product_crud extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }

    public function insert($data)
    {
        $data['created'] = time();
        if(isset($data['id']))
            unset($data['id']);
        return $this->db->insert('product', $data);

    }

    public function delete($id)
    {
        return $this->db->delete('product', array('id' => $id));
    }

    public function update($id,$data)
    {
        if(isset($data['id']))
            unset($data['id']);
        if(isset($data['created']))
            unset($data['created']);
        return $this->db->update('product', $data, array('id' => $id));
    }

    public function get_products($cat_id = null)
    {
        $this->db->select('P.id,P.created as created_date,P.title,P.description,C.name as category');
        $this->db->from('product P, category C');
        if($cat_id == null)
            $this->db->where('P.cat_id=C.id');
        else
            $this->db->where('P.cat_id=C.id AND C.id='.$cat_id);
        $this->db->order_by('P.created', 'DESC');
        return $this->db->get();
    }

}