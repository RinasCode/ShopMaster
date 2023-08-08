<?php

defined('BASEPATH') or exit('No direct script access allowed');

class JenisModel extends CI_Model
{

  private $table = "jenis";

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
      ->where('id_jenis', $id)
      ->get($this->table)
      ->result_array();

    return $data;
  }

  public function add($nama)
  {
    $this->nama_jenis = $nama;
    $this->db->insert($this->table, $this);
    return $this->db->insert_id();
  }
}
