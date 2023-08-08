<?php

defined('BASEPATH') or exit('No direct script access allowed');

class PenjualanModel extends CI_Model
{

  private $table = "penjualan";
  private $detail = "detail_penjualan";

  public function getAll()
  {
    $data = $this->db
      ->get($this->table)
      ->result_array();

    return $data;
  }

  public function getDetail()
  {
    $data = $this->db
      ->join('barang', 'detail_penjualan.id_barang = barang.id_barang')
      ->join('jenis', 'barang.id_jenis = jenis.id_jenis')
      ->get($this->detail)
      ->result_array();

    return $data;
  }

  public function getById($id)
  {
    $data = $this->db
      ->where('detail_penjualan.id_penjualan', $id)
      ->join($this->table, 'detail_penjualan.id_penjualan = penjualan.id_penjualan')
      ->join('barang', 'detail_penjualan.id_barang = barang.id_barang')
      ->join('jenis', 'barang.id_jenis = jenis.id_jenis')
      ->join('kategori', 'barang.id_kategori = kategori.id_kategori')
      ->join('member', 'penjualan.id_member = member.id_member')
      ->get($this->detail)
      ->result_array();

    return $data;
  }

  public function getInvoice()
  {
    $q = $this->db->query("SELECT MAX(RIGHT(no_invoice ,6)) AS id_max FROM penjualan");
    $id = "";
    if ($q->num_rows() > 0) {
      foreach ($q->result() as $k) {
        $tmp = ((int)$k->id_max) + 1;
        $id = sprintf("%06s", $tmp);
      }
    } else {
      $id = "000001";
    }
    return "INV" . $id;
  }

  public function add()
  {
    $insertId = null;

    $post = $this->input->post();

    $this->id_member = $post['member'];
    $this->no_invoice = $post['no_invoice'];
    $this->tgl_penjualan = date('Y-m-d');
    $this->total_penjualan = $post['total_penjualan'];

    if ($this->db->insert($this->table, $this)) {
      $insertId = $this->db->insert_id();

      foreach ($post['barang'] as $barang) {
        $array = array(
          'id_penjualan' => $insertId,
          'id_barang' => $barang
        );

        if ($this->db->insert($this->detail, $array)) {
          $this->BarangModel->changeStatusJual($barang, 1);
        }
      }
    }

    return $insertId;
  }

  public function getLaporan($mulai = null, $akhir = null, $kategori = null)
  {
    $this->db->select('penjualan.*, nama_member, nama_jenis, harga_jual');

    $this->db
      ->join($this->table, 'detail_penjualan.id_penjualan = penjualan.id_penjualan')
      ->join('barang', 'detail_penjualan.id_barang = barang.id_barang')
      ->join('jenis', 'barang.id_jenis = jenis.id_jenis')
      ->join('kategori', 'barang.id_kategori = kategori.id_kategori')
      ->join('member', 'penjualan.id_member = member.id_member');

    if ($mulai) {
      $this->db->where('tgl_penjualan >=', $mulai);
    }

    if ($akhir) {
      $this->db->where('tgl_penjualan <=', $akhir);
    }

    if ($kategori) {
      $this->db->where('barang.id_kategori', $kategori);
    }

    return $this->db->get($this->detail)->result_array();
  }
}
