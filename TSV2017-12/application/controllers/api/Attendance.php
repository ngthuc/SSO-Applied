<?php
// API for a attentdance
class Attendance extends CI_Controller {

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
				$this->_data['content'] = 'API Điểm danh - Access Denied';
				$this->load->view('alert/load_alert_view',$this->_data);
		}

		public function posts()
		{
				if (!empty($_POST['APIkey'])) {
					$getKey = hash('sha256', $_POST['APIkey']);
					$existKey = $this->Mkey->getByKey($getKey);
					$keyOrigin = $existKey['encriptApi'];
					if ($keyOrigin == $getKey) {
							$json = json_decode($_POST['data'], TRUE);
							foreach ($json as $key => $row) {
								$data['idEvent'] = $row['idEvent'];
								$data['idCard'] = $row['idCard'];
								$data['timeIn'] = $row['timeIn'];
								$data['timeOut'] = $row['timeOut'];

								$checkIdCard = $this->Mattendance->getByCard($row['idCard']);
								if (empty($checkIdCard)) {
									$this->Mattendance->insertAttendance($data);
								} else {
									$this->Mattendance->updateUserAttendance($data,$row['idEvent'],$row['idCard']);
								}
							}
							echo 'OK';
					}
				} else {
					echo "Access Denied";
				}
		}
}
