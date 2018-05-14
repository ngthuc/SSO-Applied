<?php
class Muser extends CI_Model{

    public function __construct(){
        parent::__construct();
    }

    public function listUser(){
        $json = json_decode(file_get_contents(base_url('user.json')));
        return $json;
    }

    public function findUser($query = null){
      if ($query) {
        $json = json_decode(file_get_contents(base_url('user.json')), TRUE);
        $all = $json['user'];
        $all = $all[$query-1];
        return $all;
        // if ($query == $all['id']) {
        //   return $all['id'];
        // } else if ($query == $all['studentID']) {
        //   return $all['studentID'];
        // } else return 'Không tìm thấy user';
      }
    }

    // public function countAll(){
    //     return $this->db->count_all("user");
    // }
    //
    // public function getList($total, $start){
    //    $this->db->limit($total, $start);
    //    $query=$this->db->get("user");
    //    return $query->result_array();
    // }
}
