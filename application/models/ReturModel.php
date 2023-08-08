<?php

defined('BASEPATH') or exit('No direct script access allowed');

class ReturModel extends CI_Model
{

  private $table = "retur";

  public function getAll()
  {
    $data = $this->db
      ->join('barang', 'retur.id_barang = barang.id_barang')
      ->join('jenis', 'barang.id_jenis = jenis.id_jenis')
      ->get($this->table)
      ->result_array();

    return $data;
  }

  public function getById($id)
  {
    $data = $this->db
      ->where('id_retur', $id)
      ->join('barang', 'retur.id_barang = barang.id_barang')
      ->join('jenis', 'barang.id_jenis = jenis.id_jenis')
      ->get($this->table)
      ->row_array();

    return $data;
  }

  public function getNoRetur()
  {
    $q = $this->db->query("SELECT MAX(RIGHT(no_retur ,7)) AS id_max FROM retur");
    $id = "";
    if ($q->num_rows() > 0) {
      foreach ($q->result() as $k) {
        $tmp = ((int)$k->id_max) + 1;
        $id = sprintf("%07s", $tmp);
      }
    } else {
      $id = "0000001";
    }
    return "RTR" . $id;
  }

  public function add()
  {
    $success = false;

    $post = $this->input->post();

    $this->no_retur = $post["no_retur"];
    $this->tgl_retur = date('Y-m-d');
    $this->id_barang = $post["id_barang"];
    $this->alasan_retur = $post["alasan_retur"];

    if ($this->db->insert($this->table, $this)) {
      if ($this->BarangModel->changeStatusJual($post["id_barang"], 0)) {
        $success = true;
      }
    }

    return $success;
  }

  public function update()
  {
    $post = $this->input->post();

    $this->no_retur = $post["no_retur"];
    $this->tgl_retur = date('Y-m-d');
    $this->id_barang = $post["id_barang"];
    $this->alasan_retur = $post["alasan_retur"];


    return $this->db->update($this->table, $this, array('id_retur' => $post["id_retur"]));
  }

  public function delete($id)
  {
    return $this->db->delete($this->table, array('id_retur' => $id));
  }
}
