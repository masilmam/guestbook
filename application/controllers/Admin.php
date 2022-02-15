<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
  public function dashboard()
  {
    $this->load->view('templates/sidebar');
    $this->load->view('templates/topbar');
    $this->load->view('admin/dashboard');
    $this->load->view('templates/footer');
  }
}
