<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class M_auth extends CI_Model
{
  public function create($data)
  {
    $this->db->insert('users', $data);
  }

  public function read_condition($condition)
  {
    $this->db->select('*');
    $this->db->from('users');
    $this->db->where($condition);

    $query = $this->db->get();
    return $query;
  }
}
