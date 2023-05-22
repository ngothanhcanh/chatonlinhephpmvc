<?php
class LoginModel extends Database
{   
    public function checklogin($email,$password)
    {
       $sql="SELECT * FROM users WHERE email = '$email' AND password = '$password'";
       return  $this->execute($sql);
    }
    public function sesionid($email,$password){
       $resuilt= $this->checklogin($email,$password);
       if(mysqli_num_rows($resuilt)>0)
       {
         $row= mysqli_fetch_assoc($resuilt);
         return $row;
       }else
       {
        return 0;
       }
    }
    public function checkstatus($id,$status)
    {
      $sql="UPDATE `users` SET `status`='$status' WHERE id=$id ";
      return $this->execute($sql);
    }
 
}

?>