<?php
class Hometemp extends CI_Controller {
    protected $_data;

		// Hàm khởi tạo
		function __construct() {
				// Gọi đến hàm khởi tạo của cha
				parent::__construct();
        $this->_data['idTable'] = '';
		}

		public function index()
		{
      $this->_data['subview'] = 'index_view';
      $this->_data['titlePage'] = 'Trang chủ';
      $this->_data['urlFormPage'] = 'home/query';
      $this->load->view('main.php', $this->_data);
		}

    public function query()
    {
      $this->_data['subview'] = 'process_query';
      $this->_data['titlePage'] = 'Trang chủ';
      $this->_data['query'] = $_POST['query'];
      $this->_data['resultUser'] = $this->Muser->findUser($_POST['query']);

      $this->load->view('main.php', $this->_data);
    }

    public function table()
    {
      $this->_data['subview'] = 'table_view';
      $this->_data['titlePage'] = 'Bảng tính';
      $this->_data['idTable'] = 'student-table';

      $this->_data['resultTable'] = $this->Muser->listUser();
      $this->load->view('main.php', $this->_data);
    }

    public function cit()
    {
      $this->_data['subview'] = 'cit_view';
      $this->_data['titlePage'] = 'Khoa CNTT&TT';
      $this->load->view('main.php', $this->_data);
    }

    public function org()
    {
      $this->_data['subview'] = 'tree_view';
      $this->_data['titlePage'] = 'Tổ chức';
      $this->load->view('main.php', $this->_data);
    }
}
