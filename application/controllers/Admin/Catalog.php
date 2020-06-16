<?php
class Catalog extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('catalog_model');
    }

    function index()
    {
        $input = array();
        $input['order'] = array('id', 'desc');
        $list = $this->catalog_model->get_list($input);
        $this->data['list'] = $list;

        // Lấy nội dung của biến message
        $message = $this->session->flashdata('message');
        $this->data['message'] = $message;

        // Load view
        $this->data['temp'] = 'admin/catalog/index';
        $this->load->view('admin/main', $this->data);
    }

    function add()
    {
        // Load thư viện validate dữ liệu
        $this->load->library('form_validation');
        $this->load->helper('form');

        if ($this->input->post()) {
            $this->form_validation->set_rules('name', 'Tên danh mục', 'required');

            // Nhập liệu chính xác
            if ($this->form_validation->run()) {
                // Thêm dữ liệu vào csdl
                $name     = $this->input->post('name');
                $parent_id = $this->input->post('parent_id');
                $sort_order = $this->input->post('sort_order');
                $data = array(
                    'name' => $name,
                    'parent_id' => $parent_id,
                    'sort_order' => intval($sort_order)
                );

                if ($this->catalog_model->create($data)) {
                    // Tạo nội dung thông báo
                    $this->session->set_flashdata('message', 'Thêm mới dữ liệu thành công');
                } else {
                    $this->session->set_flashdata('message', 'Thêm mới dữ liệu thất bại');
                }

                // Chuyển tới trang danh sách quản trị viên
                redirect(admin_url('catalog'));
            }
        }

        // Lấy danh sách danh mục cha
        $input = array();
        $input['where'] = array('parent_id' => 0);
        $list = $this->catalog_model->get_list($input);
        $this->data['list'] = $list;

        $this->data['temp'] = 'admin/catalog/add';
        $this->load->view('admin/main', $this->data);
    }

    function edit()
    {
        // Load thư viện validate dữ liệu
        $this->load->library('form_validation');
        $this->load->helper('form');

        $id = $this->uri->rsegment(3);
        $info = $this->catalog_model->get_info($id);
        if (!$info) {
            $this->session->set_flashdata('message', 'Không tồn tại danh mục này');
            redirect(admin_url('catalog'));
        }

        $this->data['info'] = $info;

        if ($this->input->post()) {
            $this->form_validation->set_rules('name', 'Tên danh mục', 'required');

            // Nhập liệu chính xác
            if ($this->form_validation->run()) {
                // Thêm dữ liệu vào csdl
                $name     = $this->input->post('name');
                $parent_id = $this->input->post('parent_id');
                $sort_order = $this->input->post('sort_order');
                $data = array(
                    'name' => $name,
                    'parent_id' => $parent_id,
                    'sort_order' => intval($sort_order)
                );

                if ($this->catalog_model->update($id, $data)) {
                    // Tạo nội dung thông báo
                    $this->session->set_flashdata('message', 'Cập nhật dữ liệu thành công');
                } else {
                    $this->session->set_flashdata('message', 'Cập nhật dữ liệu thất bại');
                }

                // Chuyển tới trang danh sách quản trị viên
                redirect(admin_url('catalog'));
            }
        }

        // Lấy danh sách danh mục cha
        $input = array();
        $input['where'] = array('parent_id' => 0);
        $list = $this->catalog_model->get_list($input);
        $this->data['list'] = $list;

        $this->data['temp'] = 'admin/catalog/edit';
        $this->load->view('admin/main', $this->data);
    }

    function delete()
    {
        // Lấy id quản trị viên
        $id = $this->uri->rsegment(3);
        $id = intval($id);

        // Lấy thông tin của quan trị viên
        $info = $this->catalog_model->get_info($id);
        if (!$info) {
            $this->session->set_flashdata('message', 'Không tồn tại danh mục');
            redirect(admin_url('catalog'));
        }

        // Thực hiện xóa
        if ($this->catalog_model->delete($id)) {
            // Tạo nội dung thông báo
            $this->session->set_flashdata('message', 'Xóa dữ liệu thành công');
        } else {
            $this->session->set_flashdata('message', 'Xóa dữ liệu thất bại');
        }

        // Chuyển tới trang danh sách quản trị viên
        redirect(admin_url('catalog'));
    }
}
