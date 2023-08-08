<?php

defined('BASEPATH') or exit('No direct script access allowed');

class LaporanPenjualan extends CI_Controller
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

      $data['detail'] = $this->PenjualanModel->getDetail();
      $data['mulai'] = $post['mulai'];
      $data['akhir'] = $post['akhir'];

      if (isset($post['kategori'])) {
        $data['items'] = $this->PenjualanModel->getLaporan($post['mulai'], $post['akhir'], $post['kategori']);
        $data['kategori'] = $this->KategoriModel->getById($post['kategori']);
      } else {
        $data['items'] = $this->PenjualanModel->getLaporan($post['mulai'], $post['akhir']);
      }

      $this->load->view('pages/penjualan/laporan', $data);
    } else {
      $data['kategori'] = $this->KategoriModel->getAll();

      $this->load->view('pages/penjualan/filter', $data);
    }
  }

  public function print()
  {
    $post = $this->input->post();

    $data['mulai'] = $post['mulai'];
    $data['akhir'] = $post['akhir'];
    $data['detail'] = $this->PenjualanModel->getDetail();

    if (isset($post['kategori'])) {
      $data['items'] = $this->PenjualanModel->getLaporan($post['mulai'], $post['akhir'], $post['kategori']);
      $data['kategori'] = $this->KategoriModel->getById($post['kategori']);
    } else {
      $data['items'] = $this->PenjualanModel->getLaporan($post['mulai'], $post['akhir']);
    }

    $this->load->view('pages/penjualan/print', $data);
  }
}
