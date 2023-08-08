<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Member extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    if ($this->AuthModel->isNotLogin()) redirect(base_url('login'));
    if ($this->AuthModel->isManager()) redirect(base_url('dashboard'));
  }

  public function index()
  {
    $data['member'] = $this->MemberModel->getAll();
    $this->load->view('pages/member/index', $data);
  }

  public function tambah()
  {
    $data['params'] = $this->input->get();

    $this->load->view('pages/member/tambah', $data);
  }

  public function add()
  {
    if ($this->MemberModel->add()) {
      $this->session->set_flashdata('success', 'Berhasil Menambah Data');
    } else {
      $this->session->set_flashdata('error', 'Gagal Menambah Data');
    }

    $from = $this->input->get('from');
    if ($from) {
      $insertId = $this->db->insert_id();
      redirect($from . '?id=' . $insertId);
    }
    redirect('member');
  }

  public function edit($id = null)
  {
    $data['data'] = $this->MemberModel->getById($id);
    $this->load->view('pages/member/edit', $data);
  }

  public function update()
  {
    if ($this->MemberModel->update()) {
      $this->session->set_flashdata('success', 'Berhasil Mengubah Data');
    } else {
      $this->session->set_flashdata('error', 'Gagal Mengubah Data');
    }
    redirect('member');
  }

  public function delete($id = null)
  {
    if ($this->MemberModel->delete($id)) {
      $this->session->set_flashdata('success', 'Berhasil Menghapus Data');
    } else {
      $this->session->set_flashdata('error', 'Gagal Menghapus Data');
    }
    redirect('member');
  }
}
