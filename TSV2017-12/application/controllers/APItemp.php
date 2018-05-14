<?php
class APItemp extends CI_Controller {

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
				$this->_data['content'] = 'Access Denied';
				$this->load->view('alert/load_alert_view',$this->_data);
		}

		public function gets($table = null, $where = null, $id = null)
		{
				if ($table == 'rfid' || $table == 'student' || $table == 'staff' || $table == 'attendance') {
					// Require API Key
					// if (isset($_POST['key'])) {
					// 	if ($_POST['key'])
					// }
					if ($where && $id) {
						// Get table with select
						$result = $this->Mapi->getList($table,$where,$id);
						echo json_encode($result);
					} else {
						// Get table without where
						$result = $this->Mapi->getList($table);
						echo json_encode($result);
					}
				} else if ($table == 'event' || $table == 'organizations') {
					// Public API
					if ($where && $id) {
						// Get table with select
						$result = $this->Mapi->getList($table,$where,$id);
						echo json_encode($result);
					} else {
						// Get table without where
						$result = $this->Mapi->getList($table);
						echo json_encode($result);
					}
				} else {
						$this->_data['type'] = 'warning';
						$this->_data['content'] = 'Access Denied';
						$this->load->view('alert/load_alert_view',$this->_data);
				}
		}

		public function post($table = null, $json = null)
		{
				if ($table) {
						echo $table;
						echo '<br />';
						print_r($json);
				} else {

				}
		}
}
