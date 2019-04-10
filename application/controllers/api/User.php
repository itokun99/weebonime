<?php 
use Restserver\Libraries\REST_Controller;
defined('BASEPATH') OR exit('No direct script access allowed');

// This can be removed if you use __autoload() in config.php OR use Modular Extensions
/** @noinspection PhpIncludeInspection */
//To Solve File REST_Controller not found
require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

class User extends REST_Controller {

  function __construct(){
    parent::__construct();
    $this->load->model('UserModel');
  }

  public function index_get(){
    $user_id = $this->get('user_id');

    if($user_id === NULL){
      $user = $this->UserModel->getUser();
    } else {
      $user = $this->UserModel->getUser($user_id);
    }

    if($user){
      $this->response([
        "status" => true,
        "pesan" => "Data Berhasil di dapatkan",
        "data" => $user
      ], REST_Controller::HTTP_OK);
    } else {
      $this->response([
        "status" => false,
        "pesan" => "Data Gagal di dapatkan"
      ], REST_Controller::HTTP_NOT_FOUND);
    }
  }

  public function index_post(){

    $username = stripslashes($this->post("username"));
    $password = $this->post("password");
    $email = $this->post('email');

    $password = password_hash($password, PASSWORD_DEFAULT);

    $user_data = [
      "username" => trim($username),
      "email" => trim($email),
      "password" => $password,
    ];
    $user_check = $this->UserModel->checkUserAvailable($email);
    
    if($user_check == 1){
      $pesan = "User dengan email " . $email . " sudah ada";
      $this->response([
        "status" => false,
        "pesan" => $pesan,
      ], REST_Controller::HTTP_BAD_REQUEST);
    } else {
      $user = $this->UserModel->addUser($user_data);

      if($user > 0) {
        $pesan = "User dengan email " . $email . " berhasil didaftarkan";
        $this->response([
          "status" => true,
          "pesan" => $pesan,
        ], REST_Controller::HTTP_CREATED);
      } else {
        $this->response([
          "status" => false,
          "pesan" => "Gagal mendaftarkan user"
        ], REST_Controller::HTTP_BAD_REQUEST);
      }
    }
  }

  public function index_put(){

    $user_id = $this->put('user_id');
    $username = $this->put('username');
    $email = $this->put('email');
    $password = $this->put('password');

    $user_data = [
      "username" => $username,
      "email" => $email,
      "password" => $password
    ];

    $user_check = $this->UserModel->checkUserAvailable($email);
    if($user_check == 1){
      $pesan = "User dengan email " . $email . " sudah ada";
      $this->response([
        "status" => false,
        "pesan" => $pesan
      ], REST_Controller::HTTP_BAD_REQUEST);
    } else {
      $user = $this->UserModel->updateUser($user_id, $user_data);
      if($user > 0){
        $this->response([
          "status" => true,
          "pesan" => "Data user berhasil diubah",
        ], REST_Controller::HTTP_OK);
      } else {
        $this->response([
          "status" => false,
          "pesan" => "Data gagal diubah"
        ], REST_Controller::HTTP_BAD_REQUEST);
      }
    }
  }

  public function index_delete(){
    $user_id = $this->delete('user_id');
    if($user_id === null){
      $this->response([
        "status" => false,
        "pesan" => "Harus ada 1 ID",
      ], REST_Controller::HTTP_BAD_REQUEST);
    } else {
      if( $this->UserModel->deleteUser($user_id) > 0 ) {
        $this->response([
          "status" => true,
          "user_id" => $user_id,
          "pesan" => "User berhasil dihapus",
        ], REST_Controller::HTTP_OK);
      } else {
        $this->response([
          "status" => false,
          "pesan" => "user tidak ditemukan",
        ], REST_Controller::HTTP_NOT_FOUND);
      }
    }
  }

}