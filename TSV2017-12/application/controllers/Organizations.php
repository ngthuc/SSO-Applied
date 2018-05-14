<?php
class Organizations extends CI_Controller {

	  protected $_data = array('div_alert' => 'container','type' => null,'url' => null,'content' => null);

		// Hàm khởi tạo
		function __construct() {
				// Gọi đến hàm khởi tạo của cha
				parent::__construct();
	      $this->_data['url'] = base_url();
		}

		public function index()
		{
				$this->_data['subview'] = 'dontlogin/org_view';
				$this->_data['titlePage'] = 'Chi tiết tổ chức';
				$this->load->view('main.php', $this->_data);
		}

    public function org($id = null)
		{
				$getOrg = $this->Morg->getOrgById($id);
      if ($getOrg) {
				if ($getOrg['parent'] == $getOrg['id']) {
					$parent['text'] = '<i>Không có cấp cao hơn tại cơ sở</i>';
	        $parent['id'] = $getOrg['id'];
	      } else $parent = $this->Morg->getOrgById($getOrg['parent']);

				$this->_data['subview'] = 'dontlogin/org_detail_view';
				$this->_data['titlePage'] = 'Chi tiết tổ chức';

				$this->_data['event'] = $this->Mevent->getByOrg($id);

	      $this->_data['name'] = $getOrg['text'];
				$this->_data['parent_name'] = $parent['text'];
				$this->_data['parent_id'] = $parent['id'];
				$this->_data['description'] = $getOrg['description'];
				$this->load->view('main.php', $this->_data);
			} else {
				$this->_data['subview'] = 'alert/load_alert_view';
        $this->_data['titlePage'] = 'Cảnh báo';
        $this->_data['type'] = 'warning';
        $this->_data['url'] = base_url('organizations');
        $this->_data['content'] = 'Không tồn tại tổ chức';
			}
      $this->load->view('main.php', $this->_data);
		}

		public function res()
		{
				header('Content-Type: application/json;charset=utf-8');
				$content = $this->Morg->getList();
				foreach ($content as $key => $row) {
						if ($row['parent'] == 0) {
								$parent = '#';
								$open = true;
						} else if ($row['parent'] == $row['id']) {
								$parent = '#';
								$open = true;
						} else {
								$parent = $row['parent'];
								$open = false;
						}
						$data[] = array (
							'id' => $row['id'],
							'parent' => $parent,
							'text' => $row['text'],
							'icon' => false,
							'state' => array (
								'opened' => $open
							),
							'a_attr' => array (
								'href' => base_url('organizations/org/'.$row['id'])
							)
					);
				}
				echo json_encode($data);
		}

		public function frm()
		{
				$this->_data['subview'] = 'dontlogin/frm';
				$this->_data['titlePage'] = 'Form';
				// $this->_data['content'] = $this->Morg->getList();
				$this->load->view('main.php', $this->_data);
		}

		public function req()
		{
				print_r($_POST);
		}

    public function test()
		{
	      $json = json_decode(file_get_contents(base_url('api/gets/organizations/')));
	      foreach ($json as $key => $obj) {
	        $getParent = $this->Morg->getOrgById($obj->parent);
	        if ($getParent['name'] == $obj->name) {
	          $parent = '<i>Không có cấp cao hơn tại cơ sở</i>';
	        } else $parent = $getParent['name'];
	        echo 'Tên tổ chức: '.$obj->name.'<br />Tổ chức quản lý: '.$parent.'<br />Mô tả: '.$obj->description.'<hr>';
	      }
		}
}
