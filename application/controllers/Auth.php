<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('M_auth');
  }

  public function login()
  {
    $this->load->view('auth/login');
  }

  public function doLogin()
  {
    $userData = $this->M_auth->read_condition(['username' => $this->input->post('username')])->row();

    if ($userData) {
      if (password_verify($this->input->post('password'), $userData->password)) {
        $sessionData = [
          'username' => $userData->username,
          'email' => $userData->email,
          'level' => $userData->level,
          'logged_in' => TRUE
        ];
        $this->session->set_userdata($sessionData);

        if ($this->session->userdata('level') == 'admin') {
          redirect('Admin/dashboard');
        } else if ($this->session->userdata('level') == 'guest') {
          redirect('Guest/dashboard');
        }
      } else {
        // wrong password
        $this->session->set_flashdata('msg', 'Username atau password salah!');
        redirect('Auth/login');
      }
    } else {
      // username not found
      $this->session->set_flashdata('msg', 'Username atau password salah!');
      redirect('Auth/login');
    }
  }

  public function register()
  {
    $this->load->view('auth/register');
  }

  public function forgotPassword()
  {
    $this->load->view('auth/forgotPassword');
  }
}
