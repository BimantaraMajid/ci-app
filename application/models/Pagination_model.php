<?php

class Pagination_model extends CI_Model
{
    public function getAllMahasiswa($limit, $start, $keyword = null)
    {
        // var_dump($this->db->get('mahasiswa')->result_array);
        if($keyword){
            $this->db->like('nama', $keyword);
            $this->db->or_like('email', $keyword);
        }
        
        return $this->db->get('mahasiswa', $limit, $start)->result_array();
    }
    
    public function countMahasiswa($keyword)
    {
        $this->db->or_like('email', $keyword);
        $this->db->like('nama', $keyword);
        return $this->db->get('mahasiswa')->num_rows();
    }
}