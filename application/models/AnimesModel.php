<?php 

class AnimesModel extends CI_Model {

  public function getAnimes($anime_id = null){
    // $table = $this->db->get('animes');
    if($anime_id === null){
      return $this->db->get('animes')->result_array();
    } else {
      return $this->db->get_where('animes', ["anime_id" => $anime_id])->result_array();
    }
  }

  public function deleteAnimes($anime_id){
    $this->db->delete("animes", ["anime_id" => $anime_id]);
    return $this->db->affected_rows();
  }

  public function addAnimes($anime_data){
    $this->db->insert('animes', $anime_data);
    return $this->db->affected_rows();
  }

  public function updateAnimes($anime_data, $anime_id){
    $this->db->update("animes", $anime_data, ["anime_id" => $anime_id]);
    return $this->db->affected_rows();
  }
}