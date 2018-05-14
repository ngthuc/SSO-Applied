<?php
class Maccount extends CI_Model{
    protected $_table = 'account';

    public function __construct(){
        parent::__construct();
    }

    public function getList($where = null, $id = null){
        $this->db->select('*');
        if ($where && $id) {
            $this->db->where($where, $id);
        }
        return $this->db->get($this->_table)->result_array();
    }

    public function countAll(){
        return $this->db->count_all($this->_table);
    }

    public function getByUsername($user){
        $this->db->where("username", $user);
        return $this->db->get($this->_table)->row_array();
    }

    public function insertUser($data_insert){
        $this->db->insert($this->_table,$data_insert);
    }

    public function updateUser($data_update, $id){
        $this->db->where("username", $id);
        $this->db->update($this->_table, $data_update);
    }

    public function deleteUser($id){
        $this->db->where("username", $id);
        return $this->db->delete($this->_table);
    }
}
