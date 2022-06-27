<?php
class Model_proyek extends CI_Model
{
    function get_proyek()
    {
        $data = $this->db->select('cost_benefit.nama_cost_benefit, view_data.kuantitas, view_data.harga_satuan, jenis_cost.kuantitas as qty')
        ->from('cost_benefit')
        ->join('jenis_cost', 'cost_benefit.id_cost_benefit = jenis_cost.id_cost_benefit')
        ->join('view_data', 'jenis_cost.id = view_data.id_jenis_cb')
        ->group_by('jenis_cost.id_cost_benefit');
        $data = $data->get();
        $data = $data->result();
        return $data;
        
    }
    function delete_proyek()
    {

    }
}