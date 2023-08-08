<?php

defined('BASEPATH') or exit('No direct script access allowed');

class PembelianModel extends CI_Model
{

  private $table = "pembelian";
  private $detail = "detail_pembelian";

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
      ->join('barang', 'detail_pembelian.id_barang = barang.id_barang')
      ->join('jenis', 'barang.id_jenis = jenis.id_jenis')
      ->get($this->detail)
      ->result_array();

    return $data;
  }

  public function getById($id)
  {
    $data = $this->db
      ->where('detail_pembelian.id_pembelian', $id)
      ->join($this->table, 'detail_pembelian.id_pembelian = pembelian.id_pembelian')
      ->join('barang', 'detail_pembelian.id_barang = barang.id_barang')
      ->join('jenis', 'barang.id_jenis = jenis.id_jenis')
      ->join('kategori', 'barang.id_kategori = kategori.id_kategori')
      ->join('supplier', 'pembelian.id_supplier = supplier.id_supplier')
      ->get($this->detail)
      ->result_array();

    return $data;
  }

  public function getInvoice()
  {
    $q = $this->db->query("SELECT MAX(RIGHT(no_invoice ,6)) AS id_max FROM pembelian");
    $id = "";
    if ($q->num_rows() > 0) {
      foreach ($q->result() as $k) {
        $tmp = ((int)$k->id_max) + 1;
        $id = sprintf("%06s", $tmp);
      }
    } else {
      $id = "000001";
    }
    return "PMB" . $id;
  }

  public function add()
  {
    $insertId = null;

    $post = $this->input->post();

    $this->id_supplier = $post['supplier'];
    $this->no_invoice = $post['no_invoice'];
    $this->tgl_pembelian = date('Y-m-d');
    $this->total_pembelian = $post['total_pembelian'];

    if ($this->db->insert($this->table, $this)) {
      $insertId = $this->db->insert_id();

      foreach ($post['jenis'] as $key => $jenis) {

        $chk = $this->JenisModel->getById($jenis);

        $id_jenis = '';
        if (count($chk) > 0) {
          $id_jenis = $jenis;
        } else {
          $id_jenis = $this->JenisModel->add($jenis);
        }

        $array = array(
          'id_jenis' => $id_jenis,
          'imei' => $post['imei'][$key],
          'id_kategori' => $post['kategori'][$key],
          'id_supplier' => $post['supplier'],
          'modal' => $post['modal'][$key],
          'harga_jual' => $post['harga_jual'][$key],
          'status_barang' => 1,
          'status_jual' => 0,
        );

        $this->db->insert('barang', $array);
        $insertBarangId = $this->db->insert_id();

        $arrayDetail = array(
          'id_pembelian' => $insertId,
          'id_barang' => $insertBarangId,
        );

        $this->db->insert($this->detail, $arrayDetail);
      }
    }

    return $insertId;
  }

  public function getLaporan($mulai = null, $akhir = null, $kategori = null)
  {
    $this->db->select('pembelian.*, nama_supplier, nama_jenis, modal');

    $this->db
      ->join($this->table, 'detail_pembelian.id_pembelian = pembelian.id_pembelian')
      ->join('barang', 'detail_pembelian.id_barang = barang.id_barang')
      ->join('jenis', 'barang.id_jenis = jenis.id_jenis')
      ->join('kategori', 'barang.id_kategori = kategori.id_kategori')
      ->join('supplier', 'pembelian.id_supplier = supplier.id_supplier');

    if ($mulai) {
      $this->db->where('tgl_pembelian >=', $mulai);
    }

    if ($akhir) {
      $this->db->where('tgl_pembelian <=', $akhir);
    }

    if ($kategori) {
      $this->db->where('barang.id_kategori', $kategori);
    }

    return $this->db->get($this->detail)->result_array();
  }
}
