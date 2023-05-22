<?php
class Verify extends Controller{
    private $register;
    public function verify()
    {   $error=array();
         $this->register=$this->model('RegisterModel');
        if(isset($_POST['submitverify']))
        {   $otp=$_SESSION['OTP'];
            $emailotp=$_SESSION['email'];
            $newpassword=$_POST['newpassword'];
            $newcpassword=$_POST['newcpassword'];
            $OPTnew=$_POST['OTP'];
            if($newcpassword!=$newpassword)
            {
                $error [] = "mật khẩu không trùng";
            }   
            else{
       
            if($otp==$OPTnew)
            {
                $this->register->Updatepassword($newpassword,$emailotp);
                header('location:'.URL.'/User/login');
            }
            else{
                $error [] = "mã otp không trùng";
            }}
        }
        $this->view('User/Verify',['error'=>$error]);
    }
}

?>