<?php
class Index extends CI_Controller {
    protected $_data;

    // Hàm khởi tạo
    function __construct() {
        // Gọi đến hàm khởi tạo của cha
        parent::__construct();
        $this->_data['idTable'] = '';
    }

		public function index()
		{
      $this->_data['subview'] = 'dontlogin/index_view';
      $this->_data['titlePage'] = 'Trang chủ';
      $this->_data['content'] = $this->Mevent->getList();
      $this->load->view('main.php', $this->_data);
		}
}
