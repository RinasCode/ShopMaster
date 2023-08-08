<?php

defined('BASEPATH') or exit('No direct script access allowed');

class SupplierModel extends CI_Model
{

  private $table = "supplier";

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
      ->where('id_supplier', $id)
      ->get($this->table)
      ->row_array();

    return $data;
  }

  public function add()
  {
    $post = $this->input->post();

    $this->nama_supplier = $post["nama_supplier"];
    $this->tlp_supplier = $post["tlp_supplier"];
    $this->rek_supplier = $post["rek_supplier"];
    $this->bank_supplier = $post["bank_supplier"];
    $this->an_rek_supplier = $post["an_rek_supplier"];
    $this->alamat_supplier = $post["alamat_supplier"];
    $this->email_supplier = $post["email_supplier"];

    return $this->db->insert($this->table, $this);
  }

  public function update()
  {
    $post = $this->input->post();

    $this->nama_supplier = $post["nama_supplier"];
    $this->tlp_supplier = $post["tlp_supplier"];
    $this->rek_supplier = $post["rek_supplier"];
    $this->bank_supplier = $post["bank_supplier"];
    $this->an_rek_supplier = $post["an_rek_supplier"];
    $this->alamat_supplier = $post["alamat_supplier"];
    $this->email_supplier = $post["email_supplier"];

    return $this->db->update($this->table, $this, array("id_supplier" => $post['id_supplier']));
  }

  public function delete($id)
  {
    return $this->db->delete($this->table, array('id_supplier' => $id));
  }
}
