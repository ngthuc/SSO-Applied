<?php
class Mdevice extends CI_Model{
    protected $_table = 'devices';

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

    public function getById($id){
        $this->db->where("id", $id);
        return $this->db->get($this->_table)->row_array();
    }

    public function getByIdApi($idApi){
        $this->db->where("idApi", $idApi);
        return $this->db->get($this->_table)->row_array();
    }

    public function insertDevice($data_insert){
        $this->db->insert($this->_table,$data_insert);
    }

    public function updateDevice($data_update, $id){
        $this->db->where("id", $id);
        $this->db->update($this->_table, $data_update);
    }

    public function deleteDevice($id){
        $this->db->where("id", $id);
        return $this->db->delete($this->_table);
    }
}
