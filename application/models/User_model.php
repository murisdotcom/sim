<?php

class User_model extends CI_Model
{
    public function getMember($limit, $start, $keyword = null)
    {
        if ($keyword) {
            $this->db->like('name', $keyword);
            $this->db->or_like('majors', $keyword);
            $this->db->or_like('strata', $keyword);
            $this->db->or_like('title', $keyword);
        }
        return $this->db->get('thesis', $limit, $start)->result_array();
    }

    public function getMemberById($id)
    {
        return $this->db->get_where('user1', ['id' => $id])->row_array();
    }
}
