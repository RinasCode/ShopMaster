<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
  }

  public function index()
  {
    if ($this->AuthModel->isNotLogin()) {
      redirect('login');
    } else {
      redirect('dashboard');
    }
  }
}
