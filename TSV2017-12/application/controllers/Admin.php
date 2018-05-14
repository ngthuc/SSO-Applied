<?php
class Admin extends CI_Controller {

	  protected $_data = array('div_alert' => 'container','type' => null,'url' => null,'content' => null);

		// Hàm khởi tạo
		function __construct() {
				// Gọi đến hàm khởi tạo của cha
				parent::__construct();
	      $this->_data['url'] = base_url();
				$this->load->model('Mstaff');
				$this->load->model('Mstudent');
				$this->load->model('Mdevice');
				$this->load->model('Mkey');
				$this->load->model('Mregister');
				$this->load->model('Mattendance');
		}

		public function index()
		{
      $this->_data['subview'] = 'admin/admin_view';
      $this->_data['titlePage'] = 'Trang quản trị';
      $this->load->view('main.php', $this->_data);
		}

		public function event()
		{
      $this->_data['subview'] = 'admin/event/events_admin_view.php';
      $this->_data['titlePage'] = 'Quản lý sự kiện';
			$this->_data['content'] = $this->Mevent->getList();
      $this->load->view('main.php', $this->_data);
		}

		public function edit_event($id = null)
		{
      $this->_data['subview'] = 'admin/event/event_edit_view.php';
      $this->_data['titlePage'] = 'Chỉnh sửa sự kiện';
			$this->_data['content'] = $this->Mevent->getById($id);
      $this->load->view('main.php', $this->_data);
		}

		public function attendance($event = null)
		{
			$result = $this->Mattendance->getByEvent($event);
			$event = $this->Mevent->getById($event);
			if ($event) {
				if ($result) {
					$this->_data['subview'] = 'admin/attendance/attendance_detail_view.php';
					$this->_data['titlePage'] = 'Chi tiết điểm danh';
					$this->_data['content'] = $result;
		      $this->_data['event'] = $event['nameEvent'];
		      $this->load->view('main.php', $this->_data);
				} else {
					$this->_data['subview'] = 'alert/load_alert_view';
	        $this->_data['titlePage'] = 'Cảnh báo';
					$this->_data['type'] = 'warning';
	        $this->_data['url'] = base_url('admin/attendance');
	        $this->_data['content'] = 'Sự kiện chưa được điểm danh';
					$this->load->view('main.php', $this->_data);
				}
			} else {
					$this->_data['subview'] = 'admin/attendance/attendance_admin_view.php';
					$this->_data['titlePage'] = 'Quản lý điểm danh';
					$this->load->view('main.php', $this->_data);
			}
		}

		public function edit_attendance($idCard = null)
		{
			$result = $this->Mattendance->getByCard($idCard);
			if ($result) {
					$this->_data['subview'] = 'admin/attendance/attendance_edit_view.php';
					$this->_data['titlePage'] = 'Chi tiết điểm danh';
					$this->_data['idCard'] = $idCard;
					$this->_data['content'] = $result;
					$this->load->view('main.php', $this->_data);
			} else {
					$this->load->view('alert/load_alert_view',$this->_data);
			}
		}

		public function analytics()
		{
      $this->_data['subview'] = 'admin/report/report_admin_view.php';
      $this->_data['titlePage'] = 'Báo cáo - Thống kê';
      $this->load->view('main.php', $this->_data);
		}

		public function organizations()
		{
      $this->_data['subview'] = 'admin/org/org_admin_view.php';
      $this->_data['titlePage'] = 'Quản lý tổ chức và đơn vị';
			$this->_data['content'] = $this->Morg->getList();
      $this->load->view('main.php', $this->_data);
		}

		public function permissions($do = null, $name = null)
		{
      if ($do == 'custom') {
				$this->_data['subview'] = 'admin/permission/custom_permission_view.php';
				$this->_data['titlePage'] = 'Tùy biến phân quyền';
				$this->_data['role'] = $this->Mrole->getRoleByName($name);
	      $this->_data['count'] = $this->Mrole->countAllByName($name);
	      $this->load->view('main.php', $this->_data);
			} else if ($do == 'add') {
				$this->_data['subview'] = 'admin/permission/add_permission_view.php';
				$this->_data['titlePage'] = 'Thêm nhóm quyền';
	      $this->load->view('main.php', $this->_data);
			} else {
				$this->_data['subview'] = 'admin/permission/permission_admin_view.php';
	      $this->_data['titlePage'] = 'Quản lý phân quyền và quyền truy cập';
				$this->_data['content'] = $this->Mrole->getList();
	      $this->load->view('main.php', $this->_data);
			}
		}

		public function admin_account()
		{
      $this->_data['subview'] = 'admin/account/index_account_view.php';
      $this->_data['titlePage'] = 'Quản lý tài khoản và người dùng';
      $this->load->view('main.php', $this->_data);
		}

		public function rfid_account()
		{
			$this->_data['subview'] = 'admin/account/rfid_admin_view.php';
			$this->_data['titlePage'] = 'Quản lý thẻ RFID';
			$this->_data['content'] = $this->Mrfid->getList();
			$this->load->view('main.php', $this->_data);
		}

		public function rfid_detail($id = null, $isStudent = null)
		{
			$this->_data['subview'] = 'admin/account/rfid_detail_view.php';
			$this->_data['titlePage'] = 'Quản lý thẻ RFID - Chi tiết định danh';
			$this->_data['idCard'] = $id;
			if ($isStudent == 'student') {
				$this->_data['typeID'] = 'studentID';
				$this->_data['typeName'] = 'Student';
				$this->_data['content'] = $this->Mstudent->getById($id);
			} else {
				$this->_data['typeID'] = 'staffID';
				$this->_data['typeName'] = 'Staff';
				$this->_data['content'] = $this->Mstaff->getById($id);
			}
			$this->load->view('main.php', $this->_data);
		}

		public function user_account()
		{
      $this->_data['subview'] = 'admin/account/account_admin_view.php';
      $this->_data['titlePage'] = 'Quản lý tài khoản';
			$this->_data['content'] = $this->Maccount->getList();
      $this->load->view('main.php', $this->_data);
		}

		public function edit_account($uid = null)
		{
			$existAccount = $this->Maccount->getByUsername($uid);
      if ($existAccount) {
				$this->_data['subview'] = 'admin/account/account_edit_view.php';
				$this->_data['titlePage'] = 'Chỉnh sửa tài khoản';
	      $this->_data['uid'] = $uid;
				$this->_data['content'] = $existAccount;
			}
      $this->load->view('main.php', $this->_data);
		}

		public function device_api()
		{
      $this->_data['subview'] = 'admin/device/index_admin_view.php';
      $this->_data['titlePage'] = 'Quản lý thiết bị và API';
      $this->load->view('main.php', $this->_data);
		}

		public function device_admin($id = null)
		{
			$existDevice = $this->Mdevice->getById($id);
			if ($existDevice) {
				$this->_data['subview'] = 'admin/device/device_edit_view.php';
	      $this->_data['titlePage'] = 'Cấp phát API cho thiết bị';
				$this->_data['id'] = $id;
				$this->_data['device'] = $existDevice;
			} else {
				$this->_data['subview'] = 'admin/device/devices_admin_view.php';
	      $this->_data['titlePage'] = 'Quản lý thiết bị và API';
				$this->_data['content'] = $this->Mdevice->getList();
			}
      $this->load->view('main.php', $this->_data);
		}

		public function api_admin($id = null)
		{
			$existApi = $this->Mkey->getById($id);
			if($existApi) {
				$this->_data['subview'] = 'admin/device/api_add_view.php';
	      $this->_data['titlePage'] = 'Cấp phát API cho thiết bị';
				$this->_data['idApi'] = $id;
			} else {
				$this->_data['subview'] = 'admin/device/api_admin_view.php';
	      $this->_data['titlePage'] = 'Quản lý thiết bị và API';
				$this->_data['content'] = $this->Mkey->getList();
			}
      $this->load->view('main.php', $this->_data);
		}
}
