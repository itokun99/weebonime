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
    $anime_id = $this->get('anime_id');

    if($anime_id === null) {
      $animes = $this->AnimesModel->getAnimes();
    } else {
      $animes = $this->AnimesModel->getAnimes($anime_id);
    }
    // var_dump($animes);
    if($animes) {
      $this->response([
        "status" => true,
        "pesan" => "Data sukses",
        "data" => $animes,
      ], REST_Controller::HTTP_OK);
    } else {
      $this->response([
        "status" => false,
        "pesan" => "Tidak ada di Database",
      ], REST_Controller::HTTP_NOT_FOUND);
    }
  }

  public function index_delete(){
    $anime_id = $this->delete('anime_id');
    if($anime_id === null){
      $this->response([
        "status" => false,
        "pesan" => "Harus ada 1 ID",
      ], REST_Controller::HTTP_BAD_REQUEST);
    } else {
      if( $this->AnimesModel->deleteAnimes($anime_id) > 0 ) {
        $this->response([
          "status" => true,
          "anime_id" => $anime_id,
          "pesan" => "Data anime dengan berhasil di hapus",
        ], REST_Controller::HTTP_OK);
      } else {
        // anime_id not found
        $this->response([
          "status" => false,
          "pesan" => "ID dari Anime tidak ditemukan",
        ], REST_Controller::HTTP_BAD_REQUEST);
      }
    }
  }
  public function index_post(){
    $anime_title = $this->post("anime_title");
    $anime_mal_id = $this->post("anime_mal_id");

    $anime_data = [
      "anime_mal_id" => $this->post("anime_mal_id"),
      "anime_title" => $this->post("anime_title"),
      "anime_poster" => $this->post("anime_poster"),
      "anime_alternative" => $this->post("anime_alternative"),
      "anime_type" => $this->post("anime_type"),
      "anime_status" => $this->post("anime_status"),
      "anime_score" => $this->post("anime_score"),
      "anime_studios" => $this->post("anime_studios"),
      "anime_duration" => $this->post("anime_duration"),
      "anime_episode" => $this->post("anime_episode"),
      "anime_genre" => $this->post("anime_genre"),
      "anime_release" => $this->post("anime_release"),
      "anime_trailer" => $this->post("anime_trailer"),
      "anime_sinopsis" => $this->post("anime_sinopsis"),
    ];

    $cekExist = $this->AnimesModel->checkAnimeMalId($anime_mal_id);
    if($cekExist == 1){
        $message = 'Anime '. $anime_title. ' sudah ada';
        $this->response([
            'status' => false,
            'pesan' => $message ,
        ], REST_Controller::HTTP_BAD_REQUEST);
    } else {
      $insertAnime = $this->AnimesModel->addAnimes($anime_data);
      if($insertAnime > 0) {
        $this->response([
          "status" => true,
          "pesan" => "Data anime telah berhasil ditambahkan",
          "anime_title" => $anime_title,
        ], REST_Controller::HTTP_CREATED);
      } else {
        $this->response([
          "status" => false,
          "pesan" => "Gagal menambahkan data",
        ], REST_Controller::HTTP_BAD_REQUEST);
      }
    }
  }

  public function index_put(){
    $anime_id = $this->put("anime_id");
    $anime_data = [
      "anime_mal_id" => $this->put("anime_mal_id"),
      "anime_title" => $this->put("anime_title"),
      "anime_poster" => $this->put("anime_poster"),
      "anime_alternative" => $this->put("anime_alternative"),
      "anime_type" => $this->put("anime_type"),
      "anime_status" => $this->put("anime_status"),
      "anime_score" => $this->put("anime_score"),
      "anime_studios" => $this->put("anime_studios"),
      "anime_duration" => $this->put("anime_duration"),
      "anime_episode" => $this->put("anime_episode"),
      "anime_genre" => $this->put("anime_genre"),
      "anime_release" => $this->put("anime_release"),
      "anime_trailer" => $this->put("anime_trailer"),
      "anime_sinopsis" => $this->put("anime_sinopsis"),
    ];

    if($this->AnimesModel->updateAnimes($anime_data, $anime_id) > 0) {
      $this->response([
        "status" => true,
        "pesan" => "Data anime telah berhasil diedit",
      ], REST_Controller::HTTP_OK);
    } else {
      $this->response([
        "status" => false,
        "pesan" => "Gagal mengedit data",
      ], REST_Controller::HTTP_BAD_REQUEST);
    }

  }

  public function APL_get(){
    $mal_id = $this->get('anime_mal_id');
    
    if($mal_id === NULL){
      $this->response([
        "status" => false,
        "pesan" => "Membutuhkan 1 MAL ID",
      ], REST_Controller::HTTP_BAD_REQUEST);
    } else {
      $get_apl = $this->AnimesModel->getAPL($mal_id);
    }

    if($get_apl){
      $this->response([
        "status" => true,
        "pesan" => "Data APL berhasil",
        "data" => $get_apl,
      ], REST_Controller::HTTP_OK);
    } else {
      $this->response([
        "status" => false,
        "pesan" => "Data Tidak ditemukan atau belum ditambahkan",
      ], REST_Controller::HTTP_NOT_FOUND);
    }
  }

  public function APL_post(){
    $mal_id = $this->post('anime_mal_id');
    $apl_data = $this->post('apl_data');
    
    $checkMAL = $this->AnimesModel->checkAnimeMalId($mal_id);

    if($checkMAL == 1){
      $test =  count($apl_data['apl_title']);
      $countErr = 0;
      for($i = 0; $i < count($apl_data['apl_title']); $i++){
        $apl = [
          'anime_mal_id' => $mal_id,
          'anime_play_title' => $apl_data['apl_title'][$i],
          'anime_play_link' => $apl_data['apl_link'][$i]
        ];
        $insertAPL = $this->AnimesModel->addAPL($apl);
        if($insertAPL <= 0){
          $countErr++;
        }
      }
      if($countErr == 0) {
        $this->response([
          "status" => true,
          "pesan" => "Semua Playlist berhasil ditambahkan",
        ], REST_Controller::HTTP_CREATED);
      } else {
        $this->response([
          "status" => false,
          "pesan" => "Gagal menambahkan Anime Play List",
        ], REST_Controller::HTTP_BAD_REQUEST);
      }
    } else {
      $this->response([
        "status" => false,
        "pesan" => "Playlist tidak bisa ditambahkan karena Anime tidak ada"
      ], REST_Controller::HTTP_NOT_FOUND);
    }
  }

  public function APL_put(){
    $play_id = $this->put('play_id');
    $mal_id = $this->put('anime_mal_id');
    $anime_id = $this->put('anime_id');
    $apl_data = $this->put('apl_data');
    
    for($i = 0; $i < count($apl_data->apl_title); $i++){
      $apl = [
        'anime_mal_id' => $mal_id,
        'anime_play_title' => $apl_data->apl_title[$i],
        'anime_play_link' => $apl_data->apl_link[$i]
      ];

      $insertAPL = $this->AnimesModel->editAPL($apl);
      if($insertAPL > 0) {
        $this->response([
          "status" => true,
          "pesan" => "Data anime telah berhasil ditambahkan",
        ], REST_Controller::HTTP_CREATED);
      } else {
        $this->response([
          "status" => false,
          "pesan" => "Gagal menambahkan data",
        ], REST_Controller::HTTP_BAD_REQUEST);
      }
    }
  }
}