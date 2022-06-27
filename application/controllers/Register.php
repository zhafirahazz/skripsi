<?php
class Register extends CI_Controller
{

    function index()
    {
        $data['roles'] = $this->model->get_role();
        $this->load->view('register', $data);
    }

    function register()
    {
        if (isset($_POST['daftar'])) {
            $firstname = $this->input->post('firstname');
            $lastname = $this->input->post('lastname');
            $role = $this->input->post('role');
            $email = $this->input->post('email');
            $password = $this->input->post('password');
            $confirmpassword = $this->input->post('confirmpassword');
            if ($firstname and $lastname and $role and $email and $password and $confirmpassword) {
                if ($password == $confirmpassword) {
                    if (strlen($password) >= 6) {
                    } else {
                        $this->session->set_flashdata('error', 'Password must be at least 6 characters');
                    }
                } else {
                    $this->session->set_flashdata('error', 'Confirm password must be the same as password');
                }
                $check = $this->model->check_email($email);
                if (!$check) {
                    $password = password_hash($password, PASSWORD_DEFAULT);
                    $data = [
                        'first_name' => $firstname,
                        'last_name' => $lastname,
                        'role' => $role,
                        'email' => $email,
                        'password' => $password,
                        'approved' => 0
                    ];
                    $insert = $this->model->insert_data($data);
                    $this->session->set_userdata(['email' => $email]);
                    redirect('login');
                } else {
                    $this->session->set_flashdata('error', 'E-mail has been registered');
                }
            } else {
                $this->session->set_flashdata('error', 'You must fill in all of the fields');
            }
            redirect('register');
        }
    }
    function __construct()
    {
        parent::__construct();
        $this->load->model('model_register', 'model');
    }
}
