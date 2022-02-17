<?php

class Admin_model extends CI_Model
{

    public function deleteMember($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('user1');
    }

    public function getMemberById($id)
    {
        return $this->db->get_where('user1', ['id' => $id])->row_array();
    }

    public function getMember($limit, $start, $keyword = null)
    {
        if ($keyword) {
            $this->db->like('name', $keyword);
            $this->db->or_like('nim', $keyword);
            $this->db->or_like('majors', $keyword);
            $this->db->or_like('strata', $keyword);
            $this->db->or_like('phone_number', $keyword);
            $this->db->or_like('email', $keyword);
        }
        return $this->db->get('user1', $limit, $start)->result_array();
    }

    public function countAllMember()
    {
        return $this->db->get('user1')->num_rows();
    }

    public function getBooks($limit, $start, $keyword = null)
    {
        if ($keyword) {
            $this->db->like('title', $keyword);
            $this->db->or_like('author', $keyword);
            $this->db->or_like('publisher', $keyword);
            $this->db->or_like('publisher_year', $keyword);
            $this->db->or_like('isbn', $keyword);
            $this->db->or_like('number_of_books', $keyword);
            $this->db->or_like('location', $keyword);
            $this->db->or_like('input_date', $keyword);
        }
        return $this->db->get('books', $limit, $start)->result_array();
    }

    public function countAllBook()
    {
        return $this->db->get('books')->num_rows();
    }
}
