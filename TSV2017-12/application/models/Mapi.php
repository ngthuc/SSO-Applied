<?php
class Mapi extends CI_Model{

    public function __construct(){
        parent::__construct();
    }

    public function getKey(){

        return $json;
    }

    public function getList($table = null, $where = null, $id = null){
        if ($table) {
            $this->db->select('*');
            if ($where && $id) {
                $this->db->where($where, $id);
            }
            return $this->db->get($table)->result_array();
        } else return $table;
    }

   public function countAll($table = null){
        return $this->db->count_all($table);
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
