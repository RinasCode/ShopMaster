<?php

defined('BASEPATH') or exit('No direct script access allowed');

class LaporanBarang extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    if ($this->AuthModel->isNotLogin()) redirect(base_url('login'));
  }

  public function index()
  {
    if ($this->input->post()) {
      $post = $this->input->post();

      $data['items'] = $this->BarangModel->getLaporan($post['kategori']);
      $data['kategori'] = $this->KategoriModel->getById($post['kategori']);

      $this->load->view('pages/barang/laporan', $data);
    } else {
      $data['kategori'] = $this->KategoriModel->getAll();

      $this->load->view('pages/barang/filter', $data);
    }
  }

  public function print()
  {
    $post = $this->input->post();

    $data['items'] = $this->BarangModel->getLaporan($post['kategori']);
    $data['kategori'] = $this->KategoriModel->getById($post['kategori']);

    $this->load->view('pages/barang/print', $data);
  }
}
