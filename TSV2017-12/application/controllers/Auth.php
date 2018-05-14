<?php
class Auth extends CI_Controller {

    protected $_data = array('div_alert' => 'container','type' => null,'url' => null,'content' => null);

    protected $_uid = '';

    protected $_pwd = '';

		// Hàm khởi tạo
		function __construct() {
				// Gọi đến hàm khởi tạo của cha
				parent::__construct();
        $this->_data['url'] = base_url();
		}

		public function index()
		{
        $this->_data['subview'] = 'alert/load_alert_view';
        $this->_data['titlePage'] = 'Xác thực';
        $this->_data['type'] = 'warning';
        $this->_data['url'] = base_url();
        $this->_data['content'] = 'Access Denied';
        $this->load->view('main.php', $this->_data);
		}

    public function login(){
        if (isset($_POST['loginSubmit'])) {
          $this->_uid = $_POST['uid'];
          $this->_pwd = $_POST['pwd'];
        }
        $a_UserInfo['username'] = $this->input->post('uid');
        // $a_UserInfo['password'] = $this->input->post('pwd');
			  $a_UserInfo['password'] = md5($this->input->post('pwd'));
        $a_UserChecking = $this->Mauth->a_fCheckUser( $a_UserInfo );
        $a_HasRole = $this->Mauth->a_fHasRole( $a_UserChecking['rolename'] );

        $this->_data['subview'] = 'alert/load_alert_view';
        $this->_data['titlePage'] = 'Đăng nhập';
        $this->_data['url'] = $_GET['next'];

        if($a_UserChecking){
          $this->session->set_userdata('user', $a_UserChecking);
  				$this->session->set_userdata('access', $a_HasRole);
  				$this->_data['type'] = 'success';
          $this->_data['content'] = 'Đăng nhập thành công với tài khoản '.$this->_uid;
    		} else{
          $this->_data['type'] = 'warning';
          $this->_data['content'] = 'Đăng nhập thất bại với tài khoản '.$this->_uid;
    		}

        $this->load->view('main.php', $this->_data);
    }

    public function logout()
		{
        $this->session->unset_userdata('user');	// Unset session of user
        $this->session->unset_userdata('access');	// Unset session of user
        $this->_data['subview'] = 'alert/load_alert_view';
        $this->_data['titlePage'] = 'Đăng xuất';
        $this->_data['type'] = 'success';
        $this->_data['url'] = $_GET['next'];
        $this->_data['content'] = 'Đăng xuất thành công';
        $this->load->view('main.php', $this->_data);
		}

    public function success()
		{
        $this->_data['subview'] = 'alert/load_alert_view';
        $this->_data['titlePage'] = 'Thông báo';
        $this->_data['type'] = 'success';
        $user = $this->session->userdata('user');
        $this->_data['content'] = 'Đăng nhập thành công với tài khoản ' . $user['username'];
        $this->load->view('main.php', $this->_data);
		}
}
