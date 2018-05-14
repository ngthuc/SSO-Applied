<?php
class Mrole extends CI_Model{
    protected $_table = 'roles';

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

    public function countAllByName($name){
        $this->db->where("roleName", $name);
        return $this->db->count_all($this->_table);
    }

    public function getRoleByName($name){
        $this->db->where("roleName", $name);
        return $this->db->get($this->_table)->row_array();
    }

    public function insertRole($data_insert){
        $this->db->insert($this->_table,$data_insert);
    }

    public function updateRole($data_update, $role){
        $this->db->where("roleName", $role);
        $this->db->update($this->_table, $data_update);
    }

    public function deleteRole($role){
        $this->db->where("roleName", $role);
        return $this->db->delete($this->_table);
    }
}
