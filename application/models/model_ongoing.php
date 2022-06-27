<?php
class Model_ongoing extends CI_Model
{
    function insert_ongoing($data)
    {
        $this->db->insert('jenis_cost', $data);
    }
    function get_satuan()
    {
        $data = $this->db->select('*')->from('satuan');
        $data = $data->get();
        $data = $data->result();
        return $data;
    }
    function get_ongoing()
    {
        $data = $this->db->select('id, kebutuhan, jenis_cost.kuantitas, satuan.nama_satuan as satuan, jenis_cost.keterangan')
            ->from('jenis_cost')
            ->join('cost_benefit', 'jenis_cost.id_cost_benefit = cost_benefit.id_cost_benefit and jenis_cost.id_cost_benefit = 4')
            ->join('satuan', 'id_satuan = jenis_cost.satuan');
        $data = $data->get();
        $data = $data->result();
        return $data;
    }
    function delete_ongoing($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('jenis_cost');
    }
    function ubah_ongoing($id, $update)
    {
        $data = $this->db->where('id', $id)
            ->update('jenis_cost', $update);
    }
    function tampil_edit($id)
    {
        $data = $this->db->select('*')->from('jenis_cost')->where('id', $id);
        $data = $data->get();
        $data = $data->row();
        return $data;
    }
    function get_view_ongoing($id)
    {
        $data = $this->db->select('id_data, deskripsi, view_data.kuantitas, satuan.nama_satuan as satuan, harga_satuan, view_data.keterangan, jenis_cost.kuantitas as qty')
            ->from('view_data')
            ->join('jenis_cost', 'view_data.id_jenis_cb = jenis_cost.id and view_data.id_jenis_cb = ' . $id)
            ->join('satuan', 'id_satuan = view_data.satuan');
        $data = $data->get();
        $data = $data->result();
        return $data;
    }
    function insert_view_ongoing($data)
    {
        $this->db->insert('view_data', $data);
    }
    function delete_view_ongoing($id)
    {
        $this->db->where('id_data', $id);
        $this->db->delete('view_data');
    }
    function ubah_view_ongoing($id, $update)
    {
        $data = $this->db->where('id_data', $id)
            ->update('view_data', $update);
        $select = $this->db->select('id_jenis_cb')->from('view_data')->where('id_data', $id);
        $select = $select->get();
        $select = $select->row();
        return $select;
    }
    function tampil_view_edit($id)
    {
        $data = $this->db->select('*')->from('view_data')->where('id_data', $id);
        $data = $data->get();
        $data = $data->row();
        return $data;
    }
}