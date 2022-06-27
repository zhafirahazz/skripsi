<?php
class Model_login extends CI_Model
{

    function check_email($email)
    {
        $data = $this->db->select('*')->from('register')->where('email', $email);
        $data = $data->get();
        $data = $data->row();
        return $data;
    }
}
