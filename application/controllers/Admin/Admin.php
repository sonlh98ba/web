<?php
class Admin extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('admin_model');
    }

    function index()
    {
        $input = array();
        $input['order'] = array('id', 'asc');
        $list = $this->admin_model->get_list($input);
        $this->data['list'] = $list;
        $total = $this->admin_model->get_total();
        $this->data['total'] = $total;

        // Lấy nội dung của biến message
        $message = $this->session->flashdata('message');
        $this->data['message'] = $message;

        $this->data['temp'] = 'admin/admin/index';
        $this->load->view('admin/main', $this->data);
    }

    function check_username()
    {
        $username = $this->input->post('username');

        $where = array('username' => $username);

        // Kiểm tra username đã tồn tại hay chưa
        if ($this->admin_model->check_exists($where)) {
            $this->form_validation->set_message(__FUNCTION__, 'Tài khoản đã tồn tại');
            return false;
        }
        return true;
    }

    function add()
    {
        $this->load->library('form_validation');
        $this->load->helper('form');

        if ($this->input->post()) {
            $this->form_validation->set_rules('name', 'Tên', 'required|min_length[8]');
            $this->form_validation->set_rules('username', 'Tài khoản đăng nhập', 'required|callback_check_username');
            $this->form_validation->set_rules('password', 'Mật khẩu', 'required|min_length[6]');
            $this->form_validation->set_rules('repassword', 'Nhập lại mật khẩu', 'matches[password]');

            // Nhập liệu chính xác
            if ($this->form_validation->run()) {
                // Thêm dữ liệu vào csdl
                $name     = $this->input->post('name');
                $username = $this->input->post('username');
                $password = $this->input->post('password');
                $data = array(
                    'name' => $name,
                    'username' => $username,
                    'password' => md5($password)
                );

                if ($this->admin_model->create($data)) {
                    // Tạo nội dung thông báo
                    $this->session->set_flashdata('message', 'Thêm mới dữ liệu thành công');
                } else {
                    $this->session->set_flashdata('message', 'Thêm mới dữ liệu thất bại');
                }

                // Chuyển tới trang danh sách quản trị viên
                redirect(admin_url('admin'));
            }
        }
        $this->data['temp'] = 'admin/admin/add';
        $this->load->view('admin/main', $this->data);
    }

    function edit()
    {
        // Lấy id quản trị viên
        $id = $this->uri->rsegment('3');
        $id = intval($id);

        $this->load->library('form_validation');
        $this->load->helper('form');

        // Lấy thông tin của quan trị viên
        $info = $this->admin_model->get_info($id);
        if (!$info) {
            $this->session->set_flashdata('message', 'Không tồn tại quản trị viên');
            redirect(admin_url('admin'));
        }
        $this->data['info'] = $info;



        if ($this->input->post()) {
            $this->form_validation->set_rules('name', 'Tên', 'required|min_length[8]');
            $this->form_validation->set_rules('username', 'Tài khoản đăng nhập', 'required');

            $password = $this->input->post('password');

            if ($password) {
                $this->form_validation->set_rules('password', 'Mật khẩu', 'required|min_length[6]');
                $this->form_validation->set_rules('repassword', 'Nhập lại mật khẩu', 'matches[password]');
            }
            // Nhập liệu chính xác
            if ($this->form_validation->run()) {
                // Thêm dữ liệu vào csdl
                $name     = $this->input->post('name');
                $username = $this->input->post('username');
                $data = array(
                    'name' => $name,
                    'username' => $username,
                );

                if ($password) {
                    $data['password'] = md5($password);
                }

                if ($this->admin_model->update($id, $data)) {
                    // Tạo nội dung thông báo
                    $this->session->set_flashdata('message', 'Cập nhật dữ liệu thành công');
                } else {
                    $this->session->set_flashdata('message', 'Cập nhật dữ liệu thất bại');
                }

                // Chuyển tới trang danh sách quản trị viên
                redirect(admin_url('admin'));
            }
        }
        $this->data['temp'] = 'admin/admin/edit';
        $this->load->view('admin/main', $this->data);
    }

    function delete()
    {
        // Lấy id quản trị viên
        $id = $this->uri->rsegment('3');
        $id = intval($id);

        // Lấy thông tin của quan trị viên
        $info = $this->admin_model->get_info($id);
        if (!$info) {
            $this->session->set_flashdata('message', 'Không tồn tại quản trị viên');
            redirect(admin_url('admin'));
        }

        // Thực hiện xóa
        if ($this->admin_model->delete($id)) {
            // Tạo nội dung thông báo
            $this->session->set_flashdata('message', 'Xóa dữ liệu thành công');
        } else {
            $this->session->set_flashdata('message', 'Xóa dữ liệu thất bại');
        }

        // Chuyển tới trang danh sách quản trị viên
        redirect(admin_url('admin'));
    }

    // Đăng xuất
    function logout()
    {
        if ($this->session->userdata('login')) {
            $this->session->unset_userdata('login');
        }
        redirect(admin_url('admin'));
    }
}
