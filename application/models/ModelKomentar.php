<?php
class ModelKomentar extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function get_comments()
    {

        return $this->db->get('komentar');
    }

    public function add_comment($data)
    {
        return $this->db->insert('komentar', $data);
    }
    public function count()
    {
        return $this->db->count_all('komentar');
    }
    public function like_comment($id)
    {
        $this->db->where('id', $id);
        $this->db->set('likes', 'likes+1', FALSE);
        $this->db->update('komentar');
    }

    public function get_likes($id)
    {
        $query = $this->db->get_where('komentar', array('id' => $id));
        return $query->row()->likes;
    }

    public function get_replies($parent_comment_id)
    {
        $this->db->where('parent_comment_id', $parent_comment_id);
        $query = $this->db->get('komentar');
        return $query->result_array();
    }

    public function count_replies($parent_comment_id)
    {
        $this->db->where('parent_comment_id', $parent_comment_id);
        return $this->db->count_all_results('komentar');
    }

    public function hapusKomentar($where = null)
    {
        $this->db->delete('komentar', $where);
    }
}
