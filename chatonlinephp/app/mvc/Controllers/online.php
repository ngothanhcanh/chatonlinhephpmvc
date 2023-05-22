<?php
class online extends Controller
{  private $indexmodel;
  private $formmodel;
  private $loginmodel;
  public function __construct()
  {
    $this->loginmodel=$this->model('LoginModel'); 
    $this->indexmodel=$this->model('IndexModel');
    $this->formmodel=$this->model('Form');
    
  }
  public function index(){
    $user=$_SESSION['user_id'];
    if(!isset($user))
    {
      $status="off";
      $this->loginmodel->checkstatus($user,$status);
      header("location:".URL."/User/login");
    }
    if(isset($_POST['logout']))
    {  
      $status="off";
      $this->loginmodel->checkstatus($user,$status);
      session_destroy();
      header("location:".URL."/User/login");
    }
    $data=$this->indexmodel->select_user_login($user);
    $user_all=$this->indexmodel->select_all_user($user);
    $this->view('index',[
      'data'=>$data,
      'user_all'=>$user_all,
      'user'=>$user
  
    ]);
    
  } 
  public function message() {
    if (!isset($_SESSION['user_id'])) {
      header("location:" . URL . "/User/login");
      return;
    }
    if (isset($_GET['idurl'])) {
      $_SESSION['id_send'] = $_GET['idurl'];
  
    }
    $id = $_SESSION['id_send'];
    $resuil=$this->formmodel->select_name($id);
    $row=mysqli_fetch_assoc($resuil);
    $name=$row['name'];
    $this->view('online/form',[
      'id'=>$id,
      'name'=>$name
    ]) ;
  }
  
  }
  ?>