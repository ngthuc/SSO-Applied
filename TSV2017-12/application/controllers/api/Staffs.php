<?php
// API for many staff
class Staffs extends CI_Controller {

	  protected $_data = array('isCss' => null,'div_alert' => 'container','type' => null,'url' => null,'content' => null);

		// Hàm khởi tạo
		function __construct() {
				// Gọi đến hàm khởi tạo của cha
				parent::__construct();
	      $this->_data['url'] = base_url();
		}

		public function index()
		{
				$this->_data['type'] = 'warning';
				$this->_data['content'] = 'API cán bộ - Access Denied';
				$this->load->view('alert/load_alert_view',$this->_data);
		}

		public function get($id = null, $key = null)
		{
				if ($key) {
						$getKey = hash('sha256', $key);
						$existKey = $this->Mkey->getByKey($getKey);
						$keyOrigin = $existKey['encriptApi'];
						if ($keyOrigin == $getKey) {
								header('Content-Type: application/json;charset=utf-8');
								$existEvent = $this->Mstaff->getById($id);
								if ($existEvent) {
										echo json_encode($existEvent);
								}
						} else {
							$this->_data['type'] = 'warning';
							$this->_data['content'] = 'API sự kiện - Access Denied';
							$this->load->view('alert/load_alert_view',$this->_data);
						}
				}
				else {
					$this->_data['type'] = 'warning';
					$this->_data['content'] = 'API sự kiện - Access Denied';
					$this->load->view('alert/load_alert_view',$this->_data);
				}
		}

		public function gets($key = null)
		{
				if ($key) {
						$getKey = hash('sha256', $key);
						$existKey = $this->Mkey->getByKey($getKey);
						$keyOrigin = $existKey['encriptApi'];
						if ($keyOrigin == $getKey) {
								header('Content-Type: application/json;charset=utf-8');
								$existEvent = $this->Mstaff->getList();
								if ($existEvent) {
										echo json_encode($existEvent);
								}
						} else {
							$this->_data['type'] = 'warning';
							$this->_data['content'] = 'API sự kiện - Access Denied';
							$this->load->view('alert/load_alert_view',$this->_data);
						}
				}
				else {
					$this->_data['type'] = 'warning';
					$this->_data['content'] = 'API sự kiện - Access Denied';
					$this->load->view('alert/load_alert_view',$this->_data);
				}
		}
}
