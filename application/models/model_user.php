<?php
class Model_user extends CI_Model
{
    function get_users()
    {
        $data = $this->db->select('id, first_name, last_name, role.nama_role as role, email, approved')
            ->from('register')->join('role', 'register.role = role.id_role');
        $data = $data->get();
        $data = $data->result();
        return $data;
    }
    function acc_user($id)
    {
        $this->db->set('approved', 1);
        $this->db->where('id', $id);
        $this->db->update('register');
    }
    function delete_user($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('register');
    }
}
