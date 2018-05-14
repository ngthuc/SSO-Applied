<?php
class Mstaff extends CI_Model{
    protected $_table = 'staff';

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
        $this->db->where("staffID", $id);
        return $this->db->get($this->_table)->row_array();
    }

    public function insertStaff($data_insert){
        $this->db->insert($this->_table,$data_insert);
    }
}
