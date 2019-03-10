<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LoginController extends CI_Controller {
  public function login(){
    $this->load->view('login');
  }
  public function register(){
    $this->load->view('register');
  }
}