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
    }
}
