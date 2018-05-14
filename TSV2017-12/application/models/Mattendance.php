<?php
class Mattendance extends CI_Model{
    protected $_table = 'attendance';

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

    public function countAll($idEvent = null){
        $this->db->where("idEvent", $idEvent);
        return $this->db->count_all($this->_table);
    }

    public function getByEvent($id){
        $this->db->where("idEvent", $id);
        return $this->db->get($this->_table)->result_array();
    }

    public function getByCard($pid){
        $this->db->where("idCard", $pid);
        return $this->db->get($this->_table)->row_array();
    }

    public function insertAttendance($data_insert){
        $this->db->insert($this->_table,$data_insert);
    }

    public function updateUserAttendance($data_update, $id, $pid){
        $this->db->where("id", $id);
        $this->db->where("idCard", $pid);
        $this->db->update($this->_table, $data_update);
    }

    public function deleteUserAttendance($id){
        $this->db->where("idCard", $id);
        return $this->db->delete($this->_table);
    }
}
