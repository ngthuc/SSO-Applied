<?php
class Events extends CI_Controller {

	  protected $_data = array('div_alert' => 'container','type' => null,'url' => null,'content' => null);

		// Hàm khởi tạo
		function __construct() {
				// Gọi đến hàm khởi tạo của cha
				parent::__construct();
	      $this->_data['url'] = base_url();
		}

		public function index()
		{
      $this->_data['subview'] = 'dontlogin/events_view';
      $this->_data['titlePage'] = 'Sự kiện';
			$this->_data['content'] = $this->Mevent->getList();
      $this->load->view('main.php', $this->_data);
		}

    public function event($id = null)
		{
				$isExistId = $this->Mevent->getById($id);
      if ($isExistId) {
				$this->_data['subview'] = 'dontlogin/event_detail_view';
				$this->_data['titlePage'] = 'Chi tiết sự kiện';
				$this->_data['contentPage'] = $isExistId;
				if (isset($_POST['checked'])) {
					$this->_data['personalJoined'] = $_POST['personalid'];
					$this->_data['isJoined'] = 'YES';
				} else {
					$this->_data['personalJoined'] = null;
					$this->_data['isJoined'] = 'NO';
				}
			} else {
				$this->_data['subview'] = 'alert/load_alert_view';
        $this->_data['titlePage'] = 'Cảnh báo';
        $this->_data['type'] = 'warning';
        $this->_data['url'] = base_url('events');
        $this->_data['content'] = 'Không tồn tại sự kiện';
			}
      $this->load->view('main.php', $this->_data);
		}

		public function org($id = null)
		{
				$isExistOrg = $this->Mevent->getByOrg($id);
      if ($isExistOrg) {
				$this->_data['subview'] = 'dontlogin/events_org_view';
	      $this->_data['titlePage'] = 'Chi tiết sự kiện theo tổ chức';
				$this->_data['contentPage'] = $isExistOrg;
	      $this->_data['nameOrg'] = $this->Morg->getOrgById($id);
			} else {
				$this->_data['subview'] = 'alert/load_alert_view';
        $this->_data['titlePage'] = 'Cảnh báo';
        $this->_data['type'] = 'warning';
        $this->_data['url'] = base_url('events');
        $this->_data['content'] = 'Access Denied';
			}
      $this->load->view('main.php', $this->_data);
		}
}
