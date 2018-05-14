<?php
// Test controller
class Test extends CI_Controller {

	  protected $_data = array('div_alert' => 'container','type' => null,'url' => null,'content' => null);

		// Hàm khởi tạo
		function __construct() {
				// Gọi đến hàm khởi tạo của cha
				parent::__construct();
	      $this->_data['url'] = base_url();
		}

    public function index()
		{
      $this->_data['subview'] = 'dontlogin/frm';
      $this->_data['titlePage'] = 'Test API';
      $this->load->view('main.php', $this->_data);
		}
}
