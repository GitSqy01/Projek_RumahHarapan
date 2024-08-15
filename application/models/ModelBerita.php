<?php
class ModelBerita extends CI_Model
{

    public function berita($limit, $start)
    {
        $this->db->select('*');
        $this->db->from('berita');
        $this->db->order_by('tgl_posting', 'desc');
        $this->db->limit($limit, $start);
        return $this->db->get()->result();
    }

    public function total()
    {
        $this->db->select('*');
        $this->db->from('berita');
        $this->db->order_by('tgl_posting', 'desc');
        return $this->db->get()->result();
    }

    public function detail_berita($id)
    {
        $this->db->select('*');
        $this->db->from('berita');
        $this->db->where('id', $id);
        return $this->db->get()->row();
    }

    public function latest_berita()
    {
        $this->db->select('*');
        $this->db->from('berita');
        $this->db->order_by('tgl_posting', 'desc');
        $this->db->limit(4);
        $query = $this->db->get();
        return $query->result();
    }


    // bagian si galih
    public function getBerita()
    {
        return $this->db->get('berita');
    }

    public function beritaWhere($where)
    {
        return $this->db->get_where('berita', $where);
    }
    public function getBeritaById($id)
    {
        return $this->db->get_where('berita', ['id' => $id])->row_array();
    }

    public function simpanBerita($data = null)
    {
        $this->db->insert('berita', $data);
    }

    public function updateBerita($data = null, $where = null)
    {
        $this->db->update('berita', $data, $where);
    }

    public function hapusBerita($where = null)
    {
        $this->db->delete('berita', $where);
    }
}
