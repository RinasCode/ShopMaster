<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Kategori extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    if ($this->AuthModel->isNotLogin()) redirect(base_url('login'));
    if ($this->AuthModel->isManager()) redirect(base_url('dashboard'));
  }

  public function index()
  {
    $data['kategori'] = $this->KategoriModel->getAll();
    $this->load->view('pages/kategori/index', $data);
  }

  public function tambah()
  {
    $this->load->view('pages/kategori/tambah');
  }

  public function add()
  {
    if ($this->KategoriModel->add()) {
      $this->session->set_flashdata('success', 'Berhasil Menambah Data');
    } else {
      $this->session->set_flashdata('error', 'Gagal Menambah Data');
    }
    redirect('kategori');
  }

  public function edit($id = null)
  {
    $data['data'] = $this->KategoriModel->getById($id);
    $this->load->view('pages/kategori/edit', $data);
  }

  public function update()
  {
    if ($this->KategoriModel->update()) {
      $this->session->set_flashdata('success', 'Berhasil Mengubah Data');
    } else {
      $this->session->set_flashdata('error', 'Gagal Mengubah Data');
    }
    redirect('kategori');
  }

  public function delete($id = null)
  {
    if ($this->KategoriModel->delete($id)) {
      $this->session->set_flashdata('success', 'Berhasil Menghapus Data');
    } else {
      $this->session->set_flashdata('error', 'Gagal Menghapus Data');
    }
    redirect('kategori');
  }
}
