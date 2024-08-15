<?php

class ModelGaleri extends CI_Model
{
    public function tampil_data()
    {
        return $this->db->get('galeri');
    }
    public function detail_galeri($id)
    {
        $result = $this->db->where('id', $id)->get('galeri');
        if ($result->num_rows() > 0) {
            return $result->result();
        } else {
            return false;
        }
    }

    // bagian si galih
    public function getGaleri()
    {
        return $this->db->get('galeri');
    }

    public function galeriWhere($where)
    {
        return $this->db->get_where('galeri', $where);
    }

    public function getGaleriById($id)
    {
        return $this->db->get_where('galeri', ['id' => $id])->row_array();
    }

    public function simpanGaleri($data = null)
    {
        $this->db->insert('galeri', $data);
    }

    public function updateGaleri($data = null, $where = null)
    {
        $this->db->update('galeri', $data, $where);
    }

    public function hapusGaleri($where = null)
    {
        $this->db->delete('galeri', $where);
    }
}
