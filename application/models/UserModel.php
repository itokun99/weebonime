<?php 
class UserModel extends CI_Model {

  public function getUser($user_id = null){
    if($user_id === null){
      return $this->db->get('user')->result_array();
    } else {
      return $this->db->get_where('user', ["user_id" => $user_id])->result_array();
    }
  }

  public function deleteUser($user_id){
    $this->db->delete("user", ["user_id" => $user_id]);
    return $this->db->affected_rows();
  }

  public function addUser($user_data){
    $this->db->insert('user', $user_data);
    return $this->db->affected_rows();
  }

  public function updateUser($user_id, $user_data){
    $this->db->update("user", $user_data, ["user_id" => $user_id]);
    return $this->db->affected_rows();
  }
  public function checkUserAvailable($email){
    return $this->db->get_where('user',['email' => $email ])->num_rows();
  }
}