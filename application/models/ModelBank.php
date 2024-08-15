<?php

class ModelBank extends CI_Model
{
    public function tampil_data()
    {
        return $this->db->get('bank')->result_array();
    }
}
