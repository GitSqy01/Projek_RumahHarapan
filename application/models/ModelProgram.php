<?php

class ModelProgram extends CI_Model
{
    public function tampil_data()
    {
        return $this->db->get('donasi');
    }
    public function get_latest_program($limit = 3)
    {
        $this->db->select('*');
        $this->db->from('donasi');
        $this->db->order_by('created_at', 'desc');
        $this->db->limit($limit);
        $query = $this->db->get();
        return $query->result();
    }
    public function detail_program($donasi_id)
    {
        $result = $this->db->where('donasi_id', $donasi_id)->get('donasi');
        if ($result->num_rows() > 0) {
            return $result->result();
        } else {
            return false;
        }
    }

    public function get_donasi_by_id($donasi_id)
    {
        return $this->db->get_where('donasi', array('donasi_id' => $donasi_id))->row_array();
    }


    public function get_transaksi_by_id($transaksi_id)
    {
        $this->db->select('transaksi.*, donasi.judul as judul_donasi'); // Pilih judul dari tabel donasi
        $this->db->from('transaksi');
        $this->db->join('donasi', 'donasi.donasi_id = transaksi.donasi_id'); // Join dengan tabel donasi
        $this->db->where('transaksi.id_transaksi', $transaksi_id);
        return $this->db->get()->row_array();
    }

    public function update_status_transaksi($transaksi_id, $status)
    {
        $this->db->where('id_transaksi', $transaksi_id);
        $this->db->update('transaksi', array('status' => $status));
    }

    public function get_program_donasi_by_kategori($kategori_id)
    {
        $this->db->where('kategori_id', $kategori_id);
        return $this->db->get('donasi')->result_array();
    }

    // Fungsi untuk mengubah status menjadi terkumpul jika dana terkumpul mencukupi
    public function update_status_terkumpul()
    {
        $this->db->where('dana_terkumpul = dana_dibutuhkan');
        $this->db->set('status', 'terkumpul');
        $this->db->update('donasi');
    }

    public function update_dana_terkumpul($donasi_id, $jumlah_donasi)
    {
        $this->db->set('dana_terkumpul', 'dana_terkumpul + ' . $jumlah_donasi, FALSE); // Hindari escaping
        $this->db->where('donasi_id', $donasi_id);
        $this->db->update('donasi');
    }
}
