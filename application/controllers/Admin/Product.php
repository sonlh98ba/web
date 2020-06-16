<?php
class Product extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('product_model');
    }

    function index()
    {
        // Lấy nội dung của biến message
        $message = $this->session->flashdata('message');
        $this->data['message'] = $message;

        // Load view
        $this->data['temp'] = 'admin/product/index';
        $this->load->view('admin/main', $this->data);
    }
}
