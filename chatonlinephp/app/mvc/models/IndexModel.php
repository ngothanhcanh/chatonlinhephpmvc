<?php 
class IndexModel extends Database
{
  public function select_user_login($login_id)
  {   
     $sql="SELECT * FROM users WHERE id='$login_id'";
     $resuil=$this->execute($sql);
     if(mysqli_num_rows($resuil)>0)
     {
          $data =$resuil->fetch_all(MYSQLI_ASSOC);
          return $data;
     }else {
      return null;
    }

  }
  public function select_all_user($login_id)
  {
    $sql="SELECT *  FROM users WHERE id <> '$login_id'";
    $resuil= $this->execute($sql);
if(mysqli_num_rows($resuil)>0)
{
  $user_all=mysqli_fetch_all($resuil,MYSQLI_ASSOC);
  return $user_all;

}else{
  return null;
}
  }
  public function select_status_user($id)
  {
     $sql= "SELECT * FROM users WHERE id='$id' ";
    return $this->execute($sql);
     
  }
 
}
