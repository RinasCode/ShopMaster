<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Pembelian extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    if ($this->AuthModel->isNotLogin()) redirect(base_url('login'));
    if ($this->AuthModel->isManager()) redirect(base_url('dashboard'));
  }

  public function index()
  {
    $data['params'] = $this->input->get();
    $data['jenis'] = $this->JenisModel->getAll();
    $data['kategori'] = $this->KategoriModel->getAll();
    $data['supplier'] = $this->SupplierModel->getAll();
    $data['invoice'] = $this->PembelianModel->getInvoice();

    $this->load->view('pages/pembelian/index', $data);
  }

  public function add()
  {
    $id = $this->PembelianModel->add();
    if ($id) {
      $this->session->set_flashdata('success', 'Berhasil Membuat Pembelian');
      redirect('pembelian/invoice/' . $id);
    } else {
      $this->session->set_flashdata('error', 'Gagal Membuat Pembelian');
      redirect('pembelian');
    }
  }

  public function invoice($id = null)
  {
    $data['data'] = $this->PembelianModel->getById($id);
    $this->load->view('pages/pembelian/invoice', $data);
  }

  public function laporan()
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
    $data['detail'] = $this->PembelianModel->getDetail();

    if (isset($post['kategori'])) {
      $data['items'] = $this->PembelianModel->getLaporan($post['mulai'], $post['akhir'], $post['kategori']);
      $data['kategori'] = $this->KategoriModel->getById($post['kategori']);
    } else {
      $data['items'] = $this->PembelianModel->getLaporan($post['mulai'], $post['akhir']);
    }

    $this->load->view('pages/pembelian/print', $data);
  }
}
