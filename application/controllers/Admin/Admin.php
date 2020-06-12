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

        $this->data['temp'] = 'admin/admin/index';
        $this->load->view('admin/main', $this->data);
    }
}
