<?php
class Category_crud extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }

    public function insert($data)
    {
        if(isset($data['id']))
            unset($data['id']);
        return $this->db->insert('category', $data);
    }

    public function delete($id)
    {
        return $this->db->delete('category', array('id' => $id));
    }

    public function update($id,$data)
    {
        if(isset($data['id']))
            unset($data['id']);
        return $this->db->update('category', $data, array('id' => $id));
    }

    public function get_category_list()
    {
        $query = $this->db->get('category');
        return $query->result();
    }

}