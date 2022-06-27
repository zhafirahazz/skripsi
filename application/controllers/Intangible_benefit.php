<?php
class Intangible_benefit extends CI_Controller
{
    function index()
    {
        $this->load->view('intangible_benefit/intangible_benefit');
    }
    function intangible_benefit()
    {
        $data['intangible_benefit'] = $this->model->get_itb();
        $this->load->view('intangible_benefit/intangible_benefit', $data);
    }
    function isi_itb() //proses isi tabel intangible_benefit
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
                        'id_cost_benefit' => 6,
                        'manfaat' => $manfaat,
                        'kuantitas' => $kuantitas,
                        'satuan' => $satuan,
                        'tarif' => $tarif,
                        'keterangan' => $keterangan
                    ];
                    $check = $this->model->insert_itb($data);
                    $this->session->set_flashdata('success', 'Data berhasil ditambahkan');
                    redirect('intangible_benefit/intangible_benefit');
                } else {
                    $this->session->set_flashdata('error', 'Kuantitas harus >= 0');
                }
            } else {
                $this->session->set_flashdata('error', 'You must fill in all of the fields');
            }
        }
        redirect('intangible_benefit/add_itb');
    }
    function add_itb() //tampilan form add
    {
        $data['satuan'] = $this->model->get_satuan();
        $this->load->view('intangible_benefit/add_itb', $data);
    }
    public function delete_itb() //proses delete data intangible_benefit
    {
        if ($this->uri->segment(3)) {
            $this->model->delete_itb($this->uri->segment(3));
            redirect('intangible_benefit/intangible_benefit');
        }
    }
    function edit_itb() //tampilan form edit
    {
        $data['satuan'] = $this->model->get_satuan();
        $id = $this->uri->segment(3);
        $data['intangible_benefit'] = $this->model->tampil_edit($id);
        $this->load->view('intangible_benefit/edit_itb', $data);
    }
    function sunting_itb() //proses edit tabel intangible_benefit
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
                        'id_cost_benefit' => 6,
                        'manfaat' => $manfaat,
                        'kuantitas' => $kuantitas,
                        'satuan' => $satuan,
                        'tarif' => $tarif,
                        'keterangan' => $keterangan
                    ];
                    $check = $this->model->ubah_itb($id, $data);
                    $this->session->set_flashdata('success', 'Data berhasil diubah');
                    redirect('intangible_benefit/intangible_benefit');
                } else {
                    $this->session->set_flashdata('error', 'Kuantitas harus >= 0');
                }
            } else {
                $this->session->set_flashdata('error', 'You must fill in all of the fields');
            }
        }
        redirect('intangible_benefit/edit_itb');
    }
    function __construct()
    {
        parent::__construct();
        $this->load->model('model_itb', 'model');
    }
}
