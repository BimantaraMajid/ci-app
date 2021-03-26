<?php

class About extends CI_Controller
{
    public function index($nama = "NULL")
    {
        $data["judul"] = "Halaman About";
        $data["nama"] = $nama;
        $this->load->view("templates/header", $data);
        $this->load->view("about/index");
        $this->load->view("templates/footer");
    }
}