<?php
class Proyek extends CI_Controller
{
    function index()
    {
        $this->load->view('proyek');
    }
    function proyek()
    {
        $data['proyek'] = $this->model->get_proyek();
        $this->load->view('proyek', $data);
    }
    public function delete_proyek() //proses delete data nilai proyek
    {
        if ($this->uri->segment(3)) {
            $this->model->delete_proyek($this->uri->segment(3));
            redirect('proyek');
        }
    }
    function __construct()
    {
        parent::__construct();
        $this->load->model('model_proyek', 'model');
    }
}
