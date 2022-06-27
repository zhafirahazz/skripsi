<?php
class Startup extends CI_Controller
{
    function index()
    {
        $this->load->view('startup/startup');
    }
    function startup()
    {
        $data['startup'] = $this->model->get_startup();
        $this->load->view('startup/startup', $data);
    }
    function isi_startup() //proses isi tabel start up
    {
        if (isset($_POST['tambah'])) {
            $kebutuhan = $this->input->post('kebutuhan');
            $kuantitas = $this->input->post('kuantitas');
            $satuan = $this->input->post('satuan');
            $keterangan = $this->input->post('keterangan');
            if ($kebutuhan and $satuan and $keterangan) {
                if ($kuantitas >= 0) {
                    $data = [
                        'id_cost_benefit' => 2,
                        'kebutuhan' => $kebutuhan,
                        'kuantitas' => $kuantitas,
                        'satuan' => $satuan,
                        'keterangan' => $keterangan
                    ];
                    $check = $this->model->insert_startup($data);
                    $this->session->set_flashdata('success', 'Data berhasil ditambahkan');
                    redirect('startup/startup');
                } else {
                    $this->session->set_flashdata('error', 'Kuantitas harus >= 0');
                }
            } else {
                $this->session->set_flashdata('error', 'You must fill in all of the fields');
            }
        }
        redirect('startup/add_startup');
    }
    function add_startup() //tampilan form add
    {
        $data['satuan'] = $this->model->get_satuan();
        $this->load->view('startup/add_startup', $data);
    }
    public function delete_startup() //proses delete data start up
    {
        if ($this->uri->segment(3)) {
            $this->model->delete_startup($this->uri->segment(3));
            redirect('startup/startup');
        }
    }
    function edit_startup() //tampilan form edit
    {
        $data['satuan'] = $this->model->get_satuan();
        $id = $this->uri->segment(3);
        $data['startup'] = $this->model->tampil_edit($id);
        $this->load->view('startup/edit_startup', $data);
    }
    function sunting_startup() //proses edit tabel start up
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
                        'id_cost_benefit' => 2,
                        'id' => $id,
                        'kebutuhan' => $kebutuhan,
                        'kuantitas' => $kuantitas,
                        'satuan' => $satuan,
                        'keterangan' => $keterangan
                    ];
                    $check = $this->model->ubah_startup($id, $data);
                    $this->session->set_flashdata('success', 'Data berhasil diubah');
                    redirect('startup/startup');
                } else {
                    $this->session->set_flashdata('error', 'Kuantitas harus >= 0');
                }
            } else {
                $this->session->set_flashdata('error', 'You must fill in all of the fields');
            }
        }
        redirect('startup/edit_startup');
    }
    function view_startup() //tampilan view data
    {
        if ($this->uri->segment(3)) {
            $id = $this->uri->segment(3);
            $data['view_persiapan'] = $this->model->get_view_startup($id);
            $this->load->view('startup/view_startup', $data);
        } else {
            redirect('startup/startup');
        }
    }
    function isi_view_startup() //proses isi tabel view data
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
                    $check = $this->model->insert_view_startup($data);
                    $this->session->set_flashdata('success', 'Data berhasil ditambahkan');
                    redirect('startup/view_startup/' . $id);
                } else {
                    $this->session->set_flashdata('error', 'Kuantitas harus >= 0');
                }
            } else {
                $this->session->set_flashdata('error', 'You must fill in all of the fields');
            }
        }
        redirect('startup/add_view_startup');
    }
    function add_view_startup() //tampilan form add view data
    {
        $data['satuan'] = $this->model->get_satuan();
        $this->load->view('startup/add_view_startup', $data);
    }
    function edit_view_startup()
    { //tampilan form edit view data
        $data['satuan'] = $this->model->get_satuan();
        $id = $this->uri->segment(3);
        $data['view_persiapan'] = $this->model->tampil_view_edit($id);
        $this->load->view('startup/edit_view_startup', $data);
    }
    function sunting_view_startup() //proses edit view data
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
                    $check = $this->model->ubah_view_startup($id, $data);
                    $this->session->set_flashdata('success', 'Data berhasil diubah');
                    redirect('startup/view_startup/' . $check->id_jenis_cb);
                } else {
                    $this->session->set_flashdata('error', 'Kuantitas harus >= 0');
                }
            } else {
                $this->session->set_flashdata('error', 'You must fill in all of the fields');
            }
        }
        redirect('startup/edit_view_startup');
    }
    public function delete_view_startup() //proses delete view data
    {
        if ($this->uri->segment(3)) {
            $this->model->delete_view_startup($this->uri->segment(3));
            redirect('startup/view_startup/' . $this->uri->segment(4));
        }
    }
    function __construct()
    {
        parent::__construct();
        $this->load->model('model_startup', 'model');
    }
}
