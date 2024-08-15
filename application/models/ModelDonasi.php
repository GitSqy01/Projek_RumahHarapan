<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ModelDonasi extends CI_Model
{

    //Manajemen Donasi
    public function getDonasi()
    {
        return $this->db->get('donasi');
    }

    public function donasiWhere($where)
    {
        return $this->db->get_where('donasi', $where);
    }

    public function simpanDonasi($data = null)
    {
        $this->db->insert('donasi', $data);
    }

    public function updateDonasi($data = null, $where = null)
    {
        $this->db->update('donasi', $data, $where);
    }

    public function hapusDonasi($where = null)
    {
        $this->db->delete('donasi', $where);
    }

    public function total($field, $where)
    {
        $this->db->select_sum($field);
        if (!empty($where) && count($where) > 0) {
            $this->db->where($where);
        }
        $this->db->from('donasi');
        return $this->db->get()->row($field);
    }

    public function total_dana_terkumpul()
    {
        $query = $this->db->select_sum('dana_terkumpul')->get('donasi');
        return $query->row()->dana_terkumpul;
    }

    //Manajemen Kategori
    public function getKategori()
    {
        return $this->db->get('kategori');
    }

    public function kategoriWhere($where)
    {
        return $this->db->get_where('kategori', $where);
    }

    public function simpanKategori($data = null)
    {
        $this->db->insert('kategori', $data);
    }

    public function hapusKategori($where = null)
    {
        $this->db->delete('kategori', $where);
    }

    public function updateKategori($where = null, $data = null)
    {
        $this->db->update('kategori', $data, $where);
    }

    public function joinKategoriDonasi($where)
    {
        $this->db->from('donasi');
        $this->db->join('kategori', 'kategori.kategori_id = donasi.kategori_id');
        $this->db->where($where);
        return $this->db->get();
    }

    public function getLimitDonasi()
    {
        $this->db->limit(5);
        return $this->db->get('donasi');
    }



    //Manajemen Data Bank
    public function getBank()
    {
        return $this->db->get('bank');
    }

    public function bankWhere($where)
    {
        return $this->db->get_where('bank', $where);
    }

    public function simpanBank($data = null)
    {
        $this->db->insert('bank', $data);
    }

    public function hapusBank($where = null)
    {
        $this->db->delete('bank', $where);
    }

    public function updateBank($where = null, $data = null)
    {
        $this->db->update('bank', $data, $where);
    }
}
