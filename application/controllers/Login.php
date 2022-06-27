<?php
class Login extends CI_Controller
{
    function index()
    {
        $this->load->view('login');
    }
    function login()
    {
        if (isset($_POST['masuk'])) {
            $email = $this->input->post('email');
            $password = $this->input->post('password');
            if ($email and $password) {
                $check = $this->model->check_email($email);
                if ($check) {
                    $hash = $check->password;
                    if (password_verify($password, $hash)) {
                        if ($check->approved == 1) {
                            $this->session->set_userdata(['email' => $email, 'role' => $check->role, 'firstname' => $check->first_name, 'lastname' => $check->last_name]);
                            redirect('user');
                        } else {
                            $this->session->set_flashdata('error', 'Pending');
                        }
                    } else {
                        $this->session->set_flashdata('error', 'Password invalid!');
                    }
                } else {
                    $this->session->set_flashdata('error', 'Email belum terdaftar');
                }
            } else {
                $this->session->set_flashdata('error', 'You must fill in all of the fields');
            }
            redirect('login');
        }
    }
    function __construct()
    {
        parent::__construct();
        $this->load->model('model_login', 'model');
    }
}
