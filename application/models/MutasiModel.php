<?php
defined('BASEPATH') or exit('No direct script access allowed');

class MutasiModel extends CI_Model
{

  private $table = "mutasi";

  public function getAll()
  {
    $data = $this->db
      ->join('barang', 'mutasi.id_barang = barang.id_barang')
      ->join('jenis', 'barang.id_jenis = jenis.id_jenis')
      ->get($this->table)
      ->result_array();

    return $data;
  }

  public function add()
  {
    $post = $this->input->post();

    $this->id_barang = $post["id_barang"];
    $this->dari = $post["dari"];
    $this->ke = $post["ke"];
    $this->tgl_mutasi = date('Y-m-d');

    if ($this->db->insert($this->table, $this)) {
      return $this->BarangModel->changeStatus($post['id_barang'], $post['ke']);
    }

    return false;
  }
}
