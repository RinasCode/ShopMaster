<?php

defined('BASEPATH') or exit('No direct script access allowed');

class BarangModel extends CI_Model
{
  private $table = "barang";

  public function getAll()
  {
    $data = $this->db
      ->join('jenis', 'barang.id_jenis=jenis.id_jenis')
      ->join('kategori', 'barang.id_kategori=kategori.id_kategori')
      ->join('supplier', 'barang.id_supplier=supplier.id_supplier')
      ->get($this->table)
      ->result_array();

    return $data;
  }

  public function getAllAvailable()
  {
    $data = $this->db
      ->where('status_jual', 0)
      ->join('jenis', 'barang.id_jenis=jenis.id_jenis')
      ->join('kategori', 'barang.id_kategori=kategori.id_kategori')
      ->join('supplier', 'barang.id_supplier=supplier.id_supplier')
      ->get($this->table)
      ->result_array();

    return $data;
  }

  public function getAllUnavailable()
  {
    $data = $this->db
      ->where('status_jual', 1)
      ->join('jenis', 'barang.id_jenis=jenis.id_jenis')
      ->join('kategori', 'barang.id_kategori=kategori.id_kategori')
      ->join('supplier', 'barang.id_supplier=supplier.id_supplier')
      ->get($this->table)
      ->result_array();

    return $data;
  }

  public function getAllForSale()
  {
    $data = $this->db
      ->where('status_jual', 0)
      ->where('status_barang', 0)
      ->join('jenis', 'barang.id_jenis=jenis.id_jenis')
      ->join('kategori', 'barang.id_kategori=kategori.id_kategori')
      ->join('supplier', 'barang.id_supplier=supplier.id_supplier')
      ->get($this->table)
      ->result_array();

    return $data;
  }

  public function getById($id)
  {
    $data = $this->db
      ->where('id_barang', $id)
      ->join('jenis', 'barang.id_jenis=jenis.id_jenis')
      ->join('kategori', 'barang.id_kategori=kategori.id_kategori')
      ->join('supplier', 'barang.id_supplier=supplier.id_supplier')
      ->get($this->table)
      ->row_array();

    return $data;
  }

  public function add()
  {
    $post = $this->input->post();

    $chk = $this->JenisModel->getById($post["id_jenis"]);

    if (count($chk) > 0) {
      $this->id_jenis = $post["id_jenis"];
    } else {
      $this->id_jenis = $this->JenisModel->add($post["id_jenis"]);
    }

    $this->imei = $post["imei"];
    $this->id_kategori = $post["id_kategori"];
    $this->id_supplier = $post["id_supplier"];
    $this->modal = $post["modal"];
    $this->harga_jual = $post["harga_jual"];
    $this->status_barang = $post["status_barang"];

    return $this->db->insert($this->table, $this);
  }

  public function update()
  {
    $post = $this->input->post();

    $chk = $this->JenisModel->getById($post["id_jenis"]);

    if (count($chk) > 0) {
      $this->id_jenis = $post["id_jenis"];
    } else {
      $this->id_jenis = $this->JenisModel->add($post["id_jenis"]);
    }

    $this->imei = $post["imei"];
    $this->id_kategori = $post["id_kategori"];
    $this->id_supplier = $post["id_supplier"];
    $this->modal = $post["modal"];
    $this->harga_jual = $post["harga_jual"];

    return $this->db->update($this->table, $this, array('id_barang' => $post['id_barang']));
  }

  public function changeStatus($id, $newStatus)
  {
    $this->status_barang = $newStatus;

    return $this->db->update($this->table, $this, array('id_barang' => $id));
  }

  public function changeStatusJual($id, $newStatus)
  {
    $this->status_jual = $newStatus;

    return $this->db->update($this->table, $this, array('id_barang' => $id));
  }

  public function delete($id)
  {
    return $this->db->delete($this->table, array('id_barang' => $id));
  }

  public function getLaporan($kategori = null)
  {
    $this->db->select('*');

    $this->db
      ->join('jenis', 'barang.id_jenis=jenis.id_jenis')
      ->join('kategori', 'barang.id_kategori=kategori.id_kategori')
      ->join('supplier', 'barang.id_supplier=supplier.id_supplier')
      ->group_by('id_barang')
      ->where('status_jual', 0);

    if ($kategori) {
      $this->db->where('barang.id_kategori', $kategori);
    }

    return $this->db->get($this->table)->result_array();
  }
}
