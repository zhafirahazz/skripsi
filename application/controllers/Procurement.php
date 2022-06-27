<?php
class Procurement extends CI_Controller
{
    function index()
    {
        $this->load->view('procurement/procurement');
    }
    function procurement()
    {
        $data['procurement'] = $this->model->get_procurement();
        $this->load->view('procurement/procurement', $data);
    }
    function isi_proc() //proses isi tabel procurement
    {
        if (isset($_POST['tambah'])) {
            $kebutuhan = $this->input->post('kebutuhan');
            $kuantitas = $this->input->post('kuantitas');
            $satuan = $this->input->post('satuan');
            $keterangan = $this->input->post('keterangan');
            if ($kebutuhan and $satuan and $keterangan) {
                if ($kuantitas >= 0) {
                    $data = [
                        'id_cost_benefit' => 1,
                        'kebutuhan' => $kebutuhan,
                        'kuantitas' => $kuantitas,
                        'satuan' => $satuan,
                        'keterangan' => $keterangan
                    ];
                    $check = $this->model->insert_proc($data);
                    $this->session->set_flashdata('success', 'Data berhasil ditambahkan');
                    redirect('procurement/procurement');
                } else {
                    $this->session->set_flashdata('error', 'Kuantitas harus >= 0');
                }
            } else {
                $this->session->set_flashdata('error', 'You must fill in all of the fields');
            }
        }
        redirect('procurement/add_proc');
    }
    function add_proc() //tampilan form add
    {
        $data['satuan'] = $this->model->get_satuan();
        $this->load->view('procurement/add_proc', $data);
    }
    public function delete_proc() //proses delete data procurement
    {
        if ($this->uri->segment(3)) {
            $this->model->delete_procurement($this->uri->segment(3));
            redirect('procurement/procurement');
        }
    }
    function edit_proc() //tampilan form edit
    {
        $data['satuan'] = $this->model->get_satuan();
        $id = $this->uri->segment(3);
        $data['procurement'] = $this->model->tampil_edit($id);
        $this->load->view('procurement/edit_proc', $data);
    }
    function sunting_proc() //proses edit tabel procurement
    {
        if (isset($_POST['edit'])) {
            $id = $this->input->post('ambil_id');
            $kebutuhan = $this->input->post('kebutuhan');
            $kuantitas = $this->input->post('kuantitas');
            $satuan = $this->input->post('satuan');
            $keterangan = $this->input->post('keterangan');
            if ($kebutuhan and $satuan and $keterangan) {
                if ($kuantitas >= 0) {
                    $data = [
                        'id_cost_benefit' => 1,
                        'id' => $id,
                        'kebutuhan' => $kebutuhan,
                        'kuantitas' => $kuantitas,
                        'satuan' => $satuan,
                        'keterangan' => $keterangan
                    ];
                    $check = $this->model->ubah_proc($id, $data);
                    $this->session->set_flashdata('success', 'Data berhasil diubah');
                    redirect('procurement/procurement');
                } else {
                    $this->session->set_flashdata('error', 'Kuantitas harus >= 0');
                }
            } else {
                $this->session->set_flashdata('error', 'You must fill in all of the fields');
            }
        }
        redirect('procurement/edit_proc');
    }
    function view_proc() //tampilan view data
    {
        if ($this->uri->segment(3)) {
            $id = $this->uri->segment(3);
            $data['view_procurement'] = $this->model->get_view_proc($id);
            $this->load->view('procurement/view_proc', $data);
        } else {
            redirect('procurement/procurement');
        }
    }
    function isi_view_proc() //proses isi tabel view data
    {
        if (isset($_POST['tambah_view_data'])) {
            $id = $this->input->post('ambil_data');
            $deskripsi = $this->input->post('deskripsi');
            $kuantitas = $this->input->post('kuantitas');
            $satuan = $this->input->post('satuan');
            $harga_satuan = $this->input->post('harga_satuan');
            $keterangan = $this->input->post('keterangan');
            if ($deskripsi and $satuan and $harga_satuan and $keterangan) {
                if ($kuantitas >= 0) {
                    $data = [
                        'id_jenis_cb' => $id,
                        'deskripsi' => $deskripsi,
                        'kuantitas' => $kuantitas,
                        'satuan' => $satuan,
                        'harga_satuan' => $harga_satuan,
                        'keterangan' => $keterangan
                    ];
                    $check = $this->model->insert_view_proc($data);
                    $this->session->set_flashdata('success', 'Data berhasil ditambahkan');
                    redirect('procurement/view_proc/' . $id);
                } else {
                    $this->session->set_flashdata('error', 'Kuantitas harus >= 0');
                }
            } else {
                $this->session->set_flashdata('error', 'You must fill in all of the fields');
            }
        }
        redirect('procurement/add_view_proc');
    }
    function add_view_proc() //tampilan form add view data
    {
        $data['satuan'] = $this->model->get_satuan();
        $this->load->view('procurement/add_view_proc', $data);
    }
    function edit_view_proc()
    { //tampilan form edit view data
        $data['satuan'] = $this->model->get_satuan();
        $id = $this->uri->segment(3);
        $data['view_procurement'] = $this->model->tampil_view_edit($id);
        $this->load->view('procurement/edit_view_proc', $data);
    }
    function sunting_view_proc() //proses edit view data
    {
        if (isset($_POST['sunting_view_data'])) {
            $id = $this->input->post('ambil_data');
            $deskripsi = $this->input->post('deskripsi');
            $kuantitas = $this->input->post('kuantitas');
            $satuan = $this->input->post('satuan');
            $harga_satuan = $this->input->post('harga_satuan');
            $keterangan = $this->input->post('keterangan');
            if ($deskripsi and $satuan and $harga_satuan and $keterangan) {
                if ($kuantitas >= 0) {
                    $data = [
                        'deskripsi' => $deskripsi,
                        'kuantitas' => $kuantitas,
                        'satuan' => $satuan,
                        'harga_satuan' => $harga_satuan,
                        'keterangan' => $keterangan
                    ];
                    $check = $this->model->ubah_view_proc($id, $data);
                    $this->session->set_flashdata('success', 'Data berhasil diubah');
                    redirect('procurement/view_proc/' . $check->id_jenis_cb);
                } else {
                    $this->session->set_flashdata('error', 'Kuantitas harus >= 0');
                }
            } else {
                $this->session->set_flashdata('error', 'You must fill in all of the fields');
            }
        }
        redirect('procurement/edit_view_proc');
    }
    public function delete_view_proc() //proses delete view data
    {
        if ($this->uri->segment(3)) {
            $this->model->delete_view_procurement($this->uri->segment(3));
            redirect('procurement/view_proc/' . $this->uri->segment(4));
        }
    }
    function __construct()
    {
        parent::__construct();
        $this->load->model('model_procurement', 'model');
    }
}
