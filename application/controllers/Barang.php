<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Barang extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    if ($this->AuthModel->isNotLogin()) redirect(base_url('login'));
    if ($this->AuthModel->isManager()) redirect(base_url('dashboard'));
  }

  public function index()
  {
    $data['barang'] = $this->BarangModel->getAllAvailable();
    $this->load->view('pages/barang/index', $data);
  }

  public function tambah()
  {
    $data['jenis'] = $this->JenisModel->getAll();
    $data['kategori'] = $this->KategoriModel->getAll();
    $data['supplier'] = $this->SupplierModel->getAll();
    $this->load->view('pages/barang/tambah', $data);
  }

  public function add()
  {
    if ($this->BarangModel->add()) {
      $this->session->set_flashdata('success', 'Berhasil Menambah Data');
    } else {
      $this->session->set_flashdata('error', 'Gagal Menambah Data');
    }
    redirect('barang');
  }

  public function edit($id = null)
  {
    $data['data'] = $this->BarangModel->getById($id);
    $data['jenis'] = $this->JenisModel->getAll();
    $data['kategori'] = $this->KategoriModel->getAll();
    $data['supplier'] = $this->SupplierModel->getAll();
    $this->load->view('pages/barang/edit', $data);
  }

  public function update()
  {
    if ($this->BarangModel->update()) {
      $this->session->set_flashdata('success', 'Berhasil Mengubah Data');
    } else {
      $this->session->set_flashdata('error', 'Gagal Mengubah Data');
    }
    redirect('barang');
  }

  public function delete($id = null)
  {
    if ($this->BarangModel->delete($id)) {
      $this->session->set_flashdata('success', 'Berhasil Menghapus Data');
    } else {
      $this->session->set_flashdata('error', 'Gagal Menghapus Data');
    }
    redirect('barang');
  }

  public function laporan()
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
