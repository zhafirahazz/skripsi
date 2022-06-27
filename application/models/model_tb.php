<?php
class Model_tb extends CI_Model
{
    function insert_tb($data)
    {
        $this->db->insert('jenis_benefit', $data);
    }
    function get_satuan()
    {
        $data = $this->db->select('*')->from('satuan');
        $data = $data->get();
        $data = $data->result();
        return $data;
    }
    function get_tb()
    {
        $data = $this->db->select('id, manfaat, jenis_benefit.kuantitas, satuan.nama_satuan as satuan, tarif, jenis_benefit.keterangan')
            ->from('jenis_benefit')
            ->join('cost_benefit', 'jenis_benefit.id_cost_benefit = cost_benefit.id_cost_benefit and jenis_benefit.id_cost_benefit = 5')
            ->join('satuan', 'id_satuan = jenis_benefit.satuan');
        $data = $data->get();
        $data = $data->result();
        return $data;
    }
    function delete_tb($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('jenis_benefit');
    }
    function ubah_tb($id, $update)
    {
        $data = $this->db->where('id', $id)
            ->update('jenis_benefit', $update);
    }
    function tampil_edit($id)
    {
        $data = $this->db->select('*')->from('jenis_benefit')->where('id', $id);
        $data = $data->get();
        $data = $data->row();
        return $data;
    }
}
