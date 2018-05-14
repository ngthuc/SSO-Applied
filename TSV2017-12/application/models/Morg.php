<?php
class Morg extends CI_Model{
    protected $_table = 'organizations';

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

    public function getOrgById($id){
        $this->db->where("id", $id);
        return $this->db->get($this->_table)->row_array();
    }

    public function getParentById($idparent){
        $this->db->where("id", $idparent);
        $this->db->order_by("parent","asc");
        return $this->db->get($this->_table)->row_array();
    }

    public function insertOrg($data_insert){
        $this->db->insert($this->_table,$data_insert);
    }

   // public function deleteUser($id){
   //     $this->db->where("id", $id);
   //     return $this->db->delete($this->_table);
   //  }

    // public function insertUser($data_insert){
    //     $this->db->insert($this->_table,$data_insert);
    // }

    // public function getUserById($id){
    //     $this->db->where("id", $id);
    //     return $this->db->get($this->_table)->row_array();
    // }
    //
    // public function getUserByUsername($uid){
    //     $this->db->where("username", $uid);
    //     return $this->db->get($this->_table)->row_array();
    // }
    //
    // public function updateUser($data_update, $id){
    //     $this->db->where("id", $id);
    //     $this->db->update($this->_table, $data_update);
    // }
}
