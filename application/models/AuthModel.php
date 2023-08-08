<?php

defined('BASEPATH') or exit('No direct script access allowed');

class AuthModel extends CI_Model
{

  private $table = "users";

  public function login()
  {
    $post = $this->input->post();

    $user = $this->db
      ->where('username', $post["username"])
      ->where('password', md5($post["password"]))
      ->get($this->table)
      ->row();

    if ($user) {
      $data = array(
        'user' => $user,
      );

      $this->session->set_userdata($data);
      return true;
    }

    return false;
  }

  public function isNotLogin()
  {
    return $this->session->userdata('user') == null;
  }

  public function isAdmin()
  {
    return $this->session->userdata('user')->role == "admin";
  }

  public function isManager()
  {
    return $this->session->userdata('user')->role == "manager";
  }
}
