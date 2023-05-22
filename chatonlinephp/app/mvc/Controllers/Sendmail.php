<?php 
class Sendmail extends Controller
{       private $register;
       public function sendmail(){
        $this->register=$this->model('RegisterModel');
        include './app/libraries/PHPMailer/index.php';
        $mail = new Mailer(); 
        $error = array();    
       if(isset($_POST['submitforgot']))
       {
        $email = $_POST['email'];
        $code = substr(rand(0,9999999),0,6);
        $title= "Quên mật khẩu";
        $content = "Mã xác nhận của bạn là: <span style='color:green'>".$code."</span>";
        if(!empty($email))
        {
            if(mysqli_num_rows($this->register->CheckEmailExit($email))>0)
            {
                $mail->sendMail($title,$content,$email);
                $_SESSION['email']=$email;
                $_SESSION['OTP']=$code;
                $this->register->Updatepassword($code,$email);
                header('location:'.URL.'/Verify/verify');
            }
            else{
                $error [] = "email không tồn tại";
            }
        }else
        {
            $error [] = "không để trống email";
        }
       }
        
        $this->view('User/Forgotpassword',
            ['error'=>$error]);
    }
}
?>
