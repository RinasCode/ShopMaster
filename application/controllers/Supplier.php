<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Supplier extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    if ($this->AuthModel->isNotLogin()) redirect(base_url('login'));
    if ($this->AuthModel->isManager()) redirect(base_url('dashboard'));
  }

  public function index()
  {
    $data['supplier'] = $this->SupplierModel->getAll();
    $this->load->view('pages/supplier/index', $data);
  }

  public function tambah()
  {
    $data['params'] = $this->input->get();
    $this->load->view('pages/supplier/tambah', $data);
  }

  public function add()
  {
    if ($this->SupplierModel->add()) {
      $this->session->set_flashdata('success', 'Berhasil Menambah Data');
    } else {
      $this->session->set_flashdata('error', 'Gagal Menambah Data');
    }


    $from = $this->input->get('from');
    if ($from) {
      $insertId = $this->db->insert_id();
      redirect($from . '?id=' . $insertId);
    }

    redirect('supplier');
  }

  public function edit($id = null)
  {
    $data['data'] = $this->SupplierModel->getById($id);
    $this->load->view('pages/supplier/edit', $data);
  }

  public function update()
  {
    if ($this->SupplierModel->update()) {
      $this->session->set_flashdata('success', 'Berhasil Mengubah Data');
    } else {
      $this->session->set_flashdata('error', 'Gagal Mengubah Data');
    }
    redirect('supplier');
  }

  public function delete($id = null)
  {
    if ($this->SupplierModel->delete($id)) {
      $this->session->set_flashdata('success', 'Berhasil Menghapus Data');
    } else {
      $this->session->set_flashdata('error', 'Gagal Menghapus Data');
    }
    redirect('supplier');
  }
}
