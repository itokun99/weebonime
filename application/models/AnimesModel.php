<?php 

class AnimesModel extends CI_Model {

  public function getAnimes(){
    // $table = $this->db->get('animes');
    return $this->db->get('animes')->result_array();
  }
}