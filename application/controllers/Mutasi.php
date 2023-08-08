<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Mutasi extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    if ($this->AuthModel->isNotLogin()) redirect(base_url('login'));
    if ($this->AuthModel->isManager()) redirect(base_url('dashboard'));
  }

  public function index()
  {
    $data['mutasi'] = $this->MutasiModel->getAll();
    $this->load->view('pages/mutasi/index', $data);
  }

  public function tambah()
  {
    $data['barang'] = $this->BarangModel->getAllAvailable();
    $this->load->view('pages/mutasi/tambah', $data);
  }

  public function add()
  {
    if ($this->MutasiModel->add()) {
      $this->session->set_flashdata('success', 'Berhasil Menambah Mutasi');
    } else {
      $this->session->set_flashdata('error', 'Gagal Menambah Mutasi');
    }
    redirect('mutasi');
  }
}
