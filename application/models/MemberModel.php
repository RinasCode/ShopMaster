<?php

defined('BASEPATH') or exit('No direct script access allowed');

class MemberModel extends CI_Model
{

  private $table = "member";

  public function getAll()
  {
    $data = $this->db
      ->get($this->table)
      ->result_array();

    return $data;
  }

  public function getById($id)
  {
    $data = $this->db
      ->where('id_member', $id)
      ->get($this->table)
      ->row_array();

    return $data;
  }

  public function add()
  {
    $post = $this->input->post();

    $this->nama_member = $post["nama_member"];
    $this->no_member = $post["no_member"];
    $this->alamat_member = $post["alamat_member"];
    $this->tlp_member = $post["tlp_member"];
    $this->email_member = $post["email_member"];

    return $this->db->insert($this->table, $this);
  }

  public function update()
  {
    $post = $this->input->post();

    $this->nama_member = $post["nama_member"];
    $this->no_member = $post["no_member"];
    $this->alamat_member = $post["alamat_member"];
    $this->tlp_member = $post["tlp_member"];
    $this->email_member = $post["email_member"];

    return $this->db->update($this->table, $this, array('id_member' => $post["id_member"]));
  }

  public function delete($id)
  {
    return $this->db->delete($this->table, array('id_member' => $id));
  }
}
