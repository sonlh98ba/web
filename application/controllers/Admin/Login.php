<?php
class Login extends MY_Controller
{
    function index()
    {
        $this->load->library('form_validation');
        $this->load->helper('form');
        if ($this->input->post()) {
            $this->form_validation->set_rules('login', 'login', 'callback_check_login');
            if ($this->form_validation->run()) {
                $this->session->set_userdata('login', true);

                redirect(admin_url('home'));
            }
        }
        $this->load->view('admin/login/index');
    }

    // Kiểm tra username và password
    function check_login()
    {
        $username = $this->input->post('username');

        // Mã hóa để so sánh
        $password = md5($this->input->post('password'));

        $this->load->model('admin_model');
        $where = array('username' => $username, 'password' => $password);

        if ($this->admin_model->check_exists($where)) {
            return true;
        }
        $this->form_validation->set_message(__FUNCTION__, 'Đăng nhập thất bại');
        return false;
    }
}
