<?php
class Index extends CI_Controller {
    protected $_data = array('div_alert' => 'container','type' => null,'url' => null,'content' => null);

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

    public function profile($user = null)
		{
      if(isset($user)) {
        $existAccount = $this->Maccount->getByUsername($user);
        if ($existAccount) {
          $this->_data['subview'] = 'dontlogin/account_view.php';
          $this->_data['titlePage'] = 'Tài khoản: ' . $user;
          $this->_data['uid'] = $user;
          $this->_data['content'] = $existAccount;
        }
      } else {
          $this->_data['subview'] = 'alert/load_alert_view';
          $this->_data['titlePage'] = 'Thông báo';
          $this->_data['type'] = 'info';
          $this->_data['url'] = base_url();
          $this->_data['content'] = 'Không tồn tại tài khoản';
      }
      $this->load->view('main.php', $this->_data);
		}
}
