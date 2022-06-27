<?php
class Ongoing extends CI_Controller
{
    function index()
    {
        $this->load->view('ongoing/ongoing');
    }
    function ongoing()
    {
        $data['ongoing'] = $this->model->get_ongoing();
        $this->load->view('ongoing/ongoing', $data);
    }
    function isi_ongoing() //proses isi tabel ongoing
    {
        if (isset($_POST['tambah'])) {
            $kebutuhan = $this->input->post('kebutuhan');
            $kuantitas = $this->input->post('kuantitas');
            $satuan = $this->input->post('satuan');
            $keterangan = $this->input->post('keterangan');
            if ($kebutuhan and $satuan and $keterangan) {
                if ($kuantitas >= 0) {
                    $data = [
                        'id_cost_benefit' => 4,
                        'kebutuhan' => $kebutuhan,
                        'kuantitas' => $kuantitas,
                        'satuan' => $satuan,
                        'keterangan' => $keterangan
                    ];
                    $check = $this->model->insert_ongoing($data);
                    $this->session->set_flashdata('success', 'Data berhasil ditambahkan');
                    redirect('ongoing/ongoing');
                } else {
                    $this->session->set_flashdata('error', 'Kuantitas harus >= 0');
                }
            } else {
                $this->session->set_flashdata('error', 'You must fill in all of the fields');
            }
        }
        redirect('ongoing/add_ongoing');
    }
    function add_ongoing() //tampilan form add
    {
        $data['satuan'] = $this->model->get_satuan();
        $this->load->view('ongoing/add_ongoing', $data);
    }
    public function delete_ongoing() //proses delete data ongoing
    {
        if ($this->uri->segment(3)) {
            $this->model->delete_ongoing($this->uri->segment(3));
            redirect('ongoing/ongoing');
        }
    }
    function edit_proc() //tampilan form edit
    {
        $data['satuan'] = $this->model->get_satuan();
        $id = $this->uri->segment(3);
        $data['ongoing'] = $this->model->tampil_edit($id);
        $this->load->view('ongoing/edit_ongoing', $data);
    }
    function sunting_ongoing() //proses edit tabel ongoing
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
                        'id_cost_benefit' => 4,
                        'id' => $id,
                        'kebutuhan' => $kebutuhan,
                        'kuantitas' => $kuantitas,
                        'satuan' => $satuan,
                        'keterangan' => $keterangan
                    ];
                    $check = $this->model->ubah_ongoing($id, $data);
                    $this->session->set_flashdata('success', 'Data berhasil diubah');
                    redirect('ongoing/ongoing');
                } else {
                    $this->session->set_flashdata('error', 'Kuantitas harus >= 0');
                }
            } else {
                $this->session->set_flashdata('error', 'You must fill in all of the fields');
            }
        }
        redirect('ongoing/edit_ongoing');
    }
    function view_ongoing() //tampilan view data
    {
        if ($this->uri->segment(3)) {
            $id = $this->uri->segment(3);
            $data['view_operasional'] = $this->model->get_view_ongoing($id);
            $this->load->view('ongoing/view_ongoing', $data);
        } else {
            redirect('ongoing/ongoing');
        }
    }
    function isi_view_ongoing() //proses isi tabel view data
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
                    $check = $this->model->insert_view_ongoing($data);
                    $this->session->set_flashdata('success', 'Data berhasil ditambahkan');
                    redirect('ongoing/view_ongoing/' . $id);
                } else {
                    $this->session->set_flashdata('error', 'Kuantitas harus >= 0');
                }
            } else {
                $this->session->set_flashdata('error', 'You must fill in all of the fields');
            }
        }
        redirect('ongoing/add_view_ongoing');
    }
    function add_view_ongoing() //tampilan form add view data
    {
        $data['satuan'] = $this->model->get_satuan();
        $this->load->view('ongoing/add_view_ongoing', $data);
    }
    function edit_view_ongoing()
    { //tampilan form edit view data
        $data['satuan'] = $this->model->get_satuan();
        $id = $this->uri->segment(3);
        $data['view_operasional'] = $this->model->tampil_view_edit($id);
        $this->load->view('ongoing/edit_view_ongoing', $data);
    }
    function sunting_view_ongoing() //proses edit view data
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
                    $check = $this->model->ubah_view_ongoing($id, $data);
                    $this->session->set_flashdata('success', 'Data berhasil diubah');
                    redirect('ongoing/view_ongoing/' . $check->id_jenis_cb);
                } else {
                    $this->session->set_flashdata('error', 'Kuantitas harus >= 0');
                }
            } else {
                $this->session->set_flashdata('error', 'You must fill in all of the fields');
            }
        }
        redirect('ongoing/edit_view_ongoing');
    }
    public function delete_view_ongoing() //proses delete view data
    {
        if ($this->uri->segment(3)) {
            $this->model->delete_view_ongoing($this->uri->segment(3));
            redirect('ongoing/view_ongoing/' . $this->uri->segment(4));
        }
    }
    function __construct()
    {
        parent::__construct();
        $this->load->model('model_ongoing', 'model');
    }
}
