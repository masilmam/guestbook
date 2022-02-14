<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
  public function login()
  {
    // $this->load->view('auth/login');
    $this->load->view('templates/sidebar');
    $this->load->view('templates/topbar');
    $this->load->view('templates/content');
    $this->load->view('templates/footer');

    $this->load->view('templates/sidebar');
  }
}
