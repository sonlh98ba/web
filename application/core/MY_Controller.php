<?php
class MY_Controller extends CI_Controller
{
    public $data = array();

    function __construct()
    {
        // Kế thừa từ CI_Controller
        parent::__construct();

        $controller = $this->uri->segment(1);
        switch ($controller) {
            case 'admin': {
                    // xử lý dữ liệu khi truy cập vào admin
                    $this->load->helper('admin');
                    $this->_check_login();
                    break;
                }
            default: {
                    // Xử lý dữ liệu ở trang ngoài
                }
        }
    }
    // Kiểm tra trạng thái login
    private function _check_login()
    {
        $controller = $this->uri->rsegment('1');
        $controller = strtolower($controller);

        $login = $this->session->userdata('login');

        // Chưa đăng nhập thì chuyển về trang login
        if (!$login && $controller != 'login') {
            redirect(admin_url('login'));
        }

        // Đã đăng nhập thì không cho vào trang login nữa
        if ($login && $controller == 'login') {
            redirect(admin_url('home'));
        }
    }
}
