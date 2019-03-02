<?php 
use Restserver\Libraries\REST_Controller;
defined('BASEPATH') OR exit('No direct script access allowed');

// This can be removed if you use __autoload() in config.php OR use Modular Extensions
/** @noinspection PhpIncludeInspection */
//To Solve File REST_Controller not found
require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

class Animes extends REST_Controller {

  //load model disini
  function __construct(){
    parent::__construct();
    $this->load->model('AnimesModel');
  }

  // buat fungsi api controller disini nanti tinggal copas aja
  public function index_get(){
    $animes = $this->AnimesModel->getAnimes();
    // var_dump($animes);
    if($animes) {
      $this->response([
        "status" => true,
        "message" => "Data sukses",
        "data" => $animes,
      ], REST_Controller::HTTP_OK);
    }
  }

}