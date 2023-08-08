<?php

defined('BASEPATH') or exit('No direct script access allowed');

class LaporanPembelian extends CI_Controller
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

      $data['mulai'] = $post['mulai'];
      $data['akhir'] = $post['akhir'];
      $data['detail'] = $this->PembelianModel->getDetail();

      if (isset($post['kategori'])) {
        $data['items'] = $this->PembelianModel->getLaporan($post['mulai'], $post['akhir'], $post['kategori']);
        $data['kategori'] = $this->KategoriModel->getById($post['kategori']);
      } else {
        $data['items'] = $this->PembelianModel->getLaporan($post['mulai'], $post['akhir']);
      }

      $this->load->view('pages/pembelian/laporan', $data);
    } else {
      $data['kategori'] = $this->KategoriModel->getAll();

      $this->load->view('pages/pembelian/filter', $data);
    }
  }

  public function print()
  {
    $post = $this->input->post();

    $data['mulai'] = $post['mulai'];
    $data['akhir'] = $post['akhir'];

    if (isset($post['kategori'])) {
      $data['items'] = $this->PembelianModel->getLaporan($post['mulai'], $post['akhir'], $post['kategori']);
      $data['kategori'] = $this->KategoriModel->getById($post['kategori']);
    } else {
      $data['items'] = $this->PembelianModel->getLaporan($post['mulai'], $post['akhir']);
    }

    $this->load->view('pages/pembelian/print', $data);
  }
}
