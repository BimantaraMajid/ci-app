<?php
class Pagination extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("Pagination_model");
        $this->load->library("pagination");
    }
    public function index()
    {
        $data['judul'] = "Pagination";        

        $cari = $this->input->post('cari');
        $keyword = $this->input->post('keyword');
        if ($cari) {
            $data['keyword'] = $keyword;
            $this->session->set_userdata('keyword', $data['keyword']);
        }
        else{
            $data['keyword'] = $this->session->userdata('keyword');
        }

        $config['total_rows'] = $this->Pagination_model->countMahasiswa($data['keyword']);        
        $config['per_page'] = 5;
        $this->pagination->initialize($config);

        $data['total_pencarian'] = $config['total_rows'];
        $data['start'] = $this->uri->segment(3);
        $data["mahasiswa"] = $this->Pagination_model->getAllMahasiswa($config['per_page'], $data['start'], $data['keyword']);

        $this->load->view("templates/header",$data);
        $this->load->view("pagination/index",$data);
        $this->load->view("templates/footer");
    }
}