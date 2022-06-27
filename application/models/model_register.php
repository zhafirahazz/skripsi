<?php
class Model_register extends CI_Model
{

    function check_email($email)
    {
        $data = $this->db->select('*')->from('register')->where('email', $email);
        $data = $data->get();
        $data = $data->row();
        return $data;
    }
    function insert_data($data)
    {
        $this->db->insert('register', $data);
    }
    function get_role()
    {
        $data = $this->db->select('*')->from('role');
        $data = $data->get();
        $data = $data->result();
        return $data;
    }
}
