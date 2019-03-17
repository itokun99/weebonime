<?php 

class AnimesModel extends CI_Model {

  public function getAnimes($anime_id = NULL){
    // $table = $this->db->get('animes');
    if($anime_id === NULL){
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
  public function checkAnimeMalId($anime_mal_id){
    return $this->db->get_where('animes',['anime_mal_id' => $anime_mal_id])->num_rows();
  }
  public function checkAvailableAnimeOnPlayList($anime_mal_id){
    $apl = $this->db->get_where('anime_playlist',['anime_mal_id' => $anime_mal_id])->num_rows();
  }
  public function getAPL($anime_mal_id){
      $this->db->order_by("published", "DESC");
      $apl = $this->db->get_where('anime_playlist', ['anime_mal_id' => $anime_mal_id])->result_array();
      return $apl;
  }
  public function addAPL($apl) {
    $this->db->insert("anime_playlist", $apl);
    return $this->db->affected_rows();
  }
  public function editAPL($play_id,$apl){
    $this->db->update("anime_playlist", $apl, ['play_id' => $play_id] );
    return $this->db->affected_rows();
  }
  public function deleteAPL($play_id){
    $this->db->delete("anime_playlist", ["play_id" => $play_id]);
    return $this->db->affected_rows();
  }
}