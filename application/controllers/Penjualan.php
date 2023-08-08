<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Penjualan extends CI_Controller
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
    $data['barang'] = $this->BarangModel->getAllForSale();
    $data['member'] = $this->MemberModel->getAll();
    $data['invoice'] = $this->PenjualanModel->getInvoice();

    $this->load->view('pages/penjualan/index', $data);
  }

  public function add()
  {
    $id = $this->PenjualanModel->add();
    if ($id) {
      $this->session->set_flashdata('success', 'Berhasil Membuat Penjualan');
      redirect('penjualan/invoice/' . $id);
    } else {
      $this->session->set_flashdata('error', 'Gagal Membuat Penjualan');
      redirect('penjualan');
    }
  }

  public function invoice($id = null)
  {
    $data['data'] = $this->PenjualanModel->getById($id);
    $this->load->view('pages/penjualan/invoice', $data);
  }

  public function laporan()
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
