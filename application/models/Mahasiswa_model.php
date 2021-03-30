<?php

class Mahasiswa_model extends CI_Model
{
    public function getAllMahasiswa()
    {
        // var_dump($this->db->get('mahasiswa')->result_array);
        return $this->db->get('mahasiswa')->result_array();
    }

    public function getMahasiswaById($id)
    {
        $res = $this->db->get_where("mahasiswa", ["id" => $id]);
        return $res->row_array();
    }

    public function cariDataMahasiswa($kata)
    {
        $keyword = $kata["keyword"];
        $this->db->like("nama",$keyword);
        $this->db->or_like("jurusan",$keyword);
        $res = $this->db->get("mahasiswa");
        // var_dump($res->result_array());
        return $res->result_array();
    }

    public function tambahDataMahasiswa()
    {
        $data = [
            "nama" => $this->input->post('nama',true),
            "nrp" => $this->input->post('nrp',true),
            "email" => $this->input->post('email',true),
            "jurusan" => $this->input->post('jurusan',true)
        ];
        $this->db->insert('mahasiswa', $data);
    }

    public function generateData()
    {
        for ($i=0; $i < 100; $i++) {
            $data = [
                "nama" => "Bimantara $i",
                "nrp" => "31116$i",
                "email" => "bimantara$i@gmail.com",
                "jurusan" => "Teknik Informatika"
            ];
            $this->db->insert('mahasiswa', $data);
        }
    }

    public function ubahDataMahasiswa()
    {
        $data = [
            "nama" => $this->input->post('nama',true),
            "nrp" => $this->input->post('nrp',true),
            "email" => $this->input->post('email',true),
            "jurusan" => $this->input->post('jurusan',true)
        ];
        $this->db->where('id',$this->input->post('id'));
        $this->db->update('mahasiswa', $data);
    }

    public function hapusDataMahasiswa($id)
    {
        $this->db->delete('mahasiswa',['id' => $id] );
    }
}