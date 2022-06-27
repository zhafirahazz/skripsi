<?php
class Project_related extends CI_Controller
{
    function index()
    {
        $this->load->view('project_related/project_related');
    }
    function project_related()
    {
        $data['project_related'] = $this->model->get_pr();
        $this->load->view('project_related/project_related', $data);
    }
    function isi_pr() //proses isi tabel project related
    {
        if (isset($_POST['tambah'])) {
            $kebutuhan = $this->input->post('kebutuhan');
            $kuantitas = $this->input->post('kuantitas');
            $satuan = $this->input->post('satuan');
            $keterangan = $this->input->post('keterangan');
            if ($kebutuhan and $satuan and $keterangan) {
                if ($kuantitas >= 0) {
                    $data = [
                        'id_cost_benefit' => 3,
                        'kebutuhan' => $kebutuhan,
                        'kuantitas' => $kuantitas,
                        'satuan' => $satuan,
                        'keterangan' => $keterangan
                    ];
                    $check = $this->model->insert_pr($data);
                    $this->session->set_flashdata('success', 'Data berhasil ditambahkan');
                    redirect('project_related/project_related');
                } else {
                    $this->session->set_flashdata('error', 'Kuantitas harus >= 0');
                }
            } else {
                $this->session->set_flashdata('error', 'You must fill in all of the fields');
            }
        }
        redirect('project_related/add_pr');
    }
    function add_pr() //tampilan form add
    {
        $data['satuan'] = $this->model->get_satuan();
        $this->load->view('project_related/add_pr', $data);
    }
    public function delete_pr() //proses delete data project related
    {
        if ($this->uri->segment(3)) {
            $this->model->delete_pr($this->uri->segment(3));
            redirect('project_related/project_related');
        }
    }
    function edit_pr() //tampilan form edit
    {
        $data['satuan'] = $this->model->get_satuan();
        $id = $this->uri->segment(3);
        $data['project_related'] = $this->model->tampil_edit($id);
        $this->load->view('project_related/edit_pr', $data);
    }
    function sunting_pr() //proses edit tabel project related
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
                        'id_cost_benefit' => 3,
                        'id' => $id,
                        'kebutuhan' => $kebutuhan,
                        'kuantitas' => $kuantitas,
                        'satuan' => $satuan,
                        'keterangan' => $keterangan
                    ];
                    $check = $this->model->ubah_pr($id, $data);
                    $this->session->set_flashdata('success', 'Data berhasil diubah');
                    redirect('project_related/project_related');
                } else {
                    $this->session->set_flashdata('error', 'Kuantitas harus >= 0');
                }
            } else {
                $this->session->set_flashdata('error', 'You must fill in all of the fields');
            }
        }
        redirect('project_related/edit_pr');
    }
    function view_pr() //tampilan view data
    {
        if ($this->uri->segment(3)) {
            $id = $this->uri->segment(3);
            $data['view_project_related'] = $this->model->get_view_pr($id);
            $this->load->view('project_related/view_pr', $data);
        } else {
            redirect('project_related/project_related');
        }
    }
    function isi_view_pr() //proses isi tabel view data
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
                    $check = $this->model->insert_view_pr($data);
                    $this->session->set_flashdata('success', 'Data berhasil ditambahkan');
                    redirect('project_related/view_pr/' . $id);
                } else {
                    $this->session->set_flashdata('error', 'Kuantitas harus >= 0');
                }
            } else {
                $this->session->set_flashdata('error', 'You must fill in all of the fields');
            }
        }
        redirect('project_related/add_view_pr');
    }
    function add_view_pr() //tampilan form add view data
    {
        $data['satuan'] = $this->model->get_satuan();
        $this->load->view('project_related/add_view_pr', $data);
    }
    function edit_view_pr()
    { //tampilan form edit view data
        $data['satuan'] = $this->model->get_satuan();
        $id = $this->uri->segment(3);
        $data['view_project_related'] = $this->model->tampil_view_edit($id);
        $this->load->view('project_related/edit_view_pr', $data);
    }
    function sunting_view_pr() //proses edit view data
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
                    $check = $this->model->ubah_view_pr($id, $data);
                    $this->session->set_flashdata('success', 'Data berhasil diubah');
                    redirect('project_related/view_pr/' . $check->id_jenis_cb);
                } else {
                    $this->session->set_flashdata('error', 'Kuantitas harus >= 0');
                }
            } else {
                $this->session->set_flashdata('error', 'You must fill in all of the fields');
            }
        }
        redirect('project_related/edit_view_pr');
    }
    public function delete_view_pr() //proses delete view data
    {
        if ($this->uri->segment(3)) {
            $this->model->delete_view_project_related($this->uri->segment(3));
            redirect('project_related/view_pr/' . $this->uri->segment(4));
        }
    }
    function __construct()
    {
        parent::__construct();
        $this->load->model('model_pr', 'model');
    }
}
