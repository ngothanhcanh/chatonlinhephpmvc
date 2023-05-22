<?php
class RegisterModel extends Database
{
    public function InsertUser($name,$email,$password,$image)
    {
       $sql="INSERT INTO users(name,email,password,image) VALUES ('$name','$email','$password','$image')";
       $this->execute($sql);
    }
    public function CheckEmailExit($email)
    {
        $sql="SELECT * FROM users WHERE email='$email'";
        return  $this->execute($sql);
    }
    public function Updatepassword($password,$email)
    {
        $sql = "UPDATE users SET password='$password' WHERE email='$email'";
        $this->execute($sql);
    }
}

?>