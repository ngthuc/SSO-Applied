<?php
class Mauth extends CI_Model {
  /* Gán tên bảng cần xử lý*/
  private $_name = 'account';
  private $_role = 'roles';

  function __construct(){
        parent::__construct();
    }

  /**
   * Get all users in DB
   * @param null
   * @return array
   */
  function a_fCheckUser( $a_UserInfo )
  {
    $a_User	=	$this->db->select()
              ->where('username', $a_UserInfo['username'])
              ->where('password', $a_UserInfo['password'])
              ->get($this->_name)
              ->row_array();
    if(count($a_User) >0){
      return $a_User;
    } else {
      return false;
    }
  }

  function a_fHasRole( $a_RoleName )
  {
    $a_Role	=	$this->db->select()
              ->where('roleName', $a_RoleName)
              ->get($this->_role)
              ->row_array();
    if(count($a_Role) >0){
      return $a_Role;
    } else {
      return false;
    }
  }
}
