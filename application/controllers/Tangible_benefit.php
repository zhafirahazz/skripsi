<?php
class Tangible_benefit extends CI_Controller
{
    function index()
    {
        $this->load->view('tangible_benefit/tangible_benefit');
    }
    function tangible_benefit()
    {
        $data['tangible_benefit'] = $this->model->get_tb();
        $this->load->view('tangible_benefit/tangible_benefit', $data);
    }
    function isi_tb() //proses isi tabel tangible_benefit
    {
        if (isset($_POST['tambah'])) {
            $manfaat = $this->input->post('manfaat');
            $kuantitas = $this->input->post('kuantitas');
            $satuan = $this->input->post('satuan');
            $tarif = $this->input->post('tarif');
            $keterangan = $this->input->post('keterangan');
            if ($manfaat and $satuan and $tarif and $keterangan) {
                if ($kuantitas >= 0) {
                    $data = [
                        'id_cost_benefit' => 5,
                        'manfaat' => $manfaat,
                        'kuantitas' => $kuantitas,
                        'satuan' => $satuan,
                        'tarif' => $tarif,
                        'keterangan' => $keterangan
                    ];
                    $check = $this->model->insert_tb($data);
                    $this->session->set_flashdata('success', 'Data berhasil ditambahkan');
                    redirect('tangible_benefit/tangible_benefit');
                } else {
                    $this->session->set_flashdata('error', 'Kuantitas harus >= 0');
                }
            } else {
                $this->session->set_flashdata('error', 'You must fill in all of the fields');
            }
        }
        redirect('tangible_benefit/add_tb');
    }
    function add_tb() //tampilan form add
    {
        $data['satuan'] = $this->model->get_satuan();
        $this->load->view('tangible_benefit/add_tb', $data);
    }
    public function delete_tb() //proses delete data tangible_benefit
    {
        if ($this->uri->segment(3)) {
            $this->model->delete_tb($this->uri->segment(3));
            redirect('tangible_benefit/tangible_benefit');
        }
    }
    function edit_tb() //tampilan form edit
    {
        $data['satuan'] = $this->model->get_satuan();
        $id = $this->uri->segment(3);
        $data['tangible_benefit'] = $this->model->tampil_edit($id);
        $this->load->view('tangible_benefit/edit_tb', $data);
    }
    function sunting_tb() //proses edit tabel tangible_benefit
    {
        if (isset($_POST['edit'])) {
            $id = $this->input->post('ambil_id');
            $manfaat = $this->input->post('manfaat');
            $kuantitas = $this->input->post('kuantitas');
            $satuan = $this->input->post('satuan');
            $tarif = $this->input->post('tarif');
            $keterangan = $this->input->post('keterangan');
            if ($manfaat and $satuan and $tarif and $keterangan) {
                if ($kuantitas >= 0) {
                    $data = [
                        'id_cost_benefit' => 5,
                        'manfaat' => $manfaat,
                        'kuantitas' => $kuantitas,
                        'satuan' => $satuan,
                        'tarif' => $tarif,
                        'keterangan' => $keterangan
                    ];
                    $check = $this->model->ubah_tb($id, $data);
                    $this->session->set_flashdata('success', 'Data berhasil diubah');
                    redirect('tangible_benefit/tangible_benefit');
                } else {
                    $this->session->set_flashdata('error', 'Kuantitas harus >= 0');
                }
            } else {
                $this->session->set_flashdata('error', 'You must fill in all of the fields');
            }
        }
        redirect('tangible_benefit/edit_tb');
    }
    function __construct()
    {
        parent::__construct();
        $this->load->model('model_tb', 'model');
    }
}
