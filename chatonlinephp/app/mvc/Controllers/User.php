<?php 
class User extends Controller
{   private $loginmodel;
    private $registermodel;
    public function __construct()
    {
        $this->loginmodel=$this->model('LoginModel');
        $this->registermodel=$this->model('RegisterModel');
    }
    public function login(){
        $errorslogin = array();
       if(isset($_POST['submitlogin']))
       {
        $name=$_POST['name'];
        $password = $_POST['password'];
       $resuil= $this->loginmodel->sesionid($name,$password);
        if($resuil!=0)
        {                 
           $_SESSION['user_id'] = $resuil['id'];
           $user= $_SESSION['user_id'];
           $status="online";
           $this->loginmodel->checkstatus($user,$status);
            header("location:".URL."/online/index");
        }
        else
        {
            $errorslogin[]="sai tai khoan hoac mat khau";
        } 
       }
       $this->view('User/Login',[
        'errorslogin'=>$errorslogin
       ]);
    }
    public function register(){
         $errors= array();    
        if(isset($_POST['submit-register']))
        {  print_r($_POST);
            $name=$_POST['username'];
            $email=$_POST['email'];
            $password=$_POST['password'];
            $cpassword=$_POST['cpassword'];
            $image=$_FILES['image']['name'];
            $image_size=$_FILES['image']['size'];
            $image_tmp=$_FILES['image']['tmp_name'];
           // $file_ext=strtolower(end(explode('.',$_FILES['image']['name'])));
            if($password!=$cpassword)
            {
                 $errors []="password phải khác nhau";
            }else{
            if(mysqli_num_rows($this->registermodel->CheckEmailExit($email))>0)
            {
                 $errors []="email đã tồn tại";
            }else
            {
                if($image_size<2000000)
            {  
                $newimage=uniqid().$image;               
                move_uploaded_file($image_tmp,"./public/images/".$newimage);          
                $this->registermodel->InsertUser($name,$email,$password,$newimage);
                header('location:'.URL.'/User/login');
                
               
            }else{
                 $errors []="file lớn hơn 2 MB";
            }
           
            }
            }
        }
        else{
            print_r($_POST);
        }
        $this->view('User/Register',[
            'errors'=> $errors
        ]);  
    }
}
