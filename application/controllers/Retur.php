<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Retur extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    if ($this->AuthModel->isNotLogin()) redirect(base_url('login'));
    if ($this->AuthModel->isManager()) redirect(base_url('dashboard'));
  }

  public function index()
  {
    $data['retur'] = $this->ReturModel->getAll();
    $this->load->view('pages/retur/index', $data);
  }

  public function tambah()
  {
    $data['no_retur'] = $this->ReturModel->getNoRetur();
    $data['barang'] = $this->BarangModel->getAllUnavailable();
    $this->load->view('pages/retur/tambah', $data);
  }

  public function add()
  {
    if ($this->ReturModel->add()) {
      $this->session->set_flashdata('success', 'Berhasil Menambah Retur');
    } else {
      $this->session->set_flashdata('error', 'Gagal Menambah Retur');
    }
    redirect('retur');
  }
}
