<?php
class Index extends CI_Controller {

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
}
