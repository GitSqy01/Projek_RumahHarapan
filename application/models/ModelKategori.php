<?php

class ModelKategori extends CI_Model
{
    public function tampil_data()
    {
        return $this->db->get('kategori')->result_array();
    }
}
