<?php

defined('BASEPATH') or exit('No direct script access allowed');

class KategoriModel extends CI_Model
{

  private $table = "kategori";

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
      ->where('id_kategori', $id)
      ->get($this->table)
      ->row_array();

    return $data;
  }

  public function add()
  {
    $post = $this->input->post();

    $this->nama_kategori = $post["nama_kategori"];

    return $this->db->insert($this->table, $this);
  }

  public function update()
  {
    $post = $this->input->post();

    $this->nama_kategori = $post["nama_kategori"];

    return $this->db->update($this->table, $this, array("id_kategori" => $post['id_kategori']));
  }

  public function delete($id)
  {
    return $this->db->delete($this->table, array('id_kategori' => $id));
  }
}
