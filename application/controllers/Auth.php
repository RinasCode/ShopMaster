<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
  }

  public function login()
  {
    if (!($this->AuthModel->isNotLogin())) redirect('dashboard');
    if ($this->input->post()) {
      if ($this->AuthModel->login()) {
        $this->session->set_flashdata('success', 'Berhasil Login');
        redirect(base_url('dashboard'));
      } else {
        $this->session->set_flashdata('error', 'Username dan Password Tidak Cocok.');
      }
    }

    $this->load->view('pages/login');
  }

  public function logout()
  {
    $this->session->sess_destroy();
    redirect(base_url('login'));
  }
}
