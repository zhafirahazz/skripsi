<?php
class User extends CI_Controller
{
    function index()
    {
        $this->load->view('user/homepage');
    }
    function review()
    {
        $data['users'] = $this->model->get_users();
        $this->load->view('user/review', $data);
    }
    function accept()
    {
        if ($this->uri->segment(3)) {
            $this->model->acc_user($this->uri->segment(3));
            redirect('user/review');
        }
    }
    public function delete()
    {
        if ($this->uri->segment(3)) {
            $this->model->delete_user($this->uri->segment(3));
            redirect('user/review');
        }
    }
    function logout()
    {
        $this->session->sess_destroy();
        redirect('login');
    }
    function __construct()
    {
        parent::__construct();
        $this->load->model('model_user', 'model');
    }
}
