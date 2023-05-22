<?php
class Form extends Database {
   public function InsertMessage($id,$id_user,$message)
   {
    $sql="INSERT INTO message(id_send,id_user,message) VALUES ('$id','$id_user','$message') ";
    $this->execute($sql);
   }
   public function Get($id,$id_user)
   {
    $sql="SELECT * FROM message WHERE (id_user = '$id_user' AND id_send = '$id') OR (id_user = '$id' AND id_send = '$id_user') ORDER BY id ASC";
    return $this->execute($sql);
    
   }
   public function select_name($user_id)
   {
      $sql= "SELECT * FROM users WHERE id='$user_id'";
      return $this->execute($sql);
   }
}
?>