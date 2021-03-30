<?php

class Mahasiswa extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Mahasiswa_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data["judul"] = "Daftar Mahasiswa";
        $data["mahasiswa"] = $this->Mahasiswa_model->getAllMahasiswa();
        if ($this->input->post('keyword')) {
            $data["mahasiswa"] = $this->Mahasiswa_model->cariDataMahasiswa($_POST);
        }
        $this->load->view("templates/header",$data);
        $this->load->view("mahasiswa/index",$data);
        $this->load->view("templates/footer");
    }
    
    public function detail($id)
    {
        $data["judul"] = "Detil Mahasiswa";
        $data["mahasiswa"] = $this->Mahasiswa_model->getMahasiswaById($id);
        $this->load->view("templates/header",$data);
        $this->load->view("mahasiswa/detail",$data);
        $this->load->view("templates/footer");
    }

    public function tambah()
    {
        $data["judul"] = "Tambah Mahasiswa";
        $this->form_validation->set_rules('nama','Nama', 'trim|required');
        $this->form_validation->set_rules('nrp','NRP', 'required|numeric');
        $this->form_validation->set_rules('email','Email', 'required|valid_email');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view("templates/header",$data);
            $this->load->view("mahasiswa/tambah",$data);
            $this->load->view("templates/footer");
        }
        else{
            $this->Mahasiswa_model->tambahDataMahasiswa();
            $this->session->set_flashdata('mahasiswa', 'Ditambahkan');
            redirect('mahasiswa');
        }
    }
    
    public function ubah($id)
    {
        $data["judul"] = "Tambah Mahasiswa";
        $data["mahasiswa"] = $this->Mahasiswa_model->getMahasiswaById($id);
        $data['jurusan'] = ["Teknik Informatika", "Akutansi"];
        $this->form_validation->set_rules('nama','Nama', 'trim|required');
        $this->form_validation->set_rules('nrp','NRP', 'required|numeric');
        $this->form_validation->set_rules('email','Email', 'required|valid_email');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view("templates/header",$data);
            $this->load->view("mahasiswa/ubah",$data);
            $this->load->view("templates/footer");
        }
        else{
            $this->Mahasiswa_model->ubahDataMahasiswa();
            $this->session->set_flashdata('mahasiswa', 'Diubah');
            redirect('mahasiswa');
        }
    }

    public function hapus($id)
    {
        $this->Mahasiswa_model->hapusDataMahasiswa($id);
        $this->session->set_flashdata('mahasiswa', "Dihapus");
        redirect('mahasiswa');
    }

    public function generate()
    {
        $this->Mahasiswa_model->generateData();
    }
}