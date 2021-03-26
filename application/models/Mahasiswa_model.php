<?php

class Mahasiswa_model extends CI_Model
{
    public function getAllMahasiswa()
    {
        // var_dump($this->db->get('mahasiswa')->result_array);
        return $this->db->get('mahasiswa')->result_array();
    }
}