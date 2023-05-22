<?php
class xuly extends Controller {
    private $formmodel;
    private $indexmodel;
    public function __construct()
  { 
    $this->formmodel=$this->model('Form');
    $this->indexmodel=$this->model('IndexModel');
    
  }
  public function xuly(){
    $output = "";
    $data = null;
    $user = $_SESSION['user_id'];
    if (isset($_POST['id']) && isset($_POST['message'])) {
        $id1 = $_POST['id'];
        $message = $_POST['message'];
        if (!empty($message)) {
            $this->formmodel->InsertMessage($id1, $user, $message);
        }
    }
    $data = $this->formmodel->Get($_SESSION['id_send'], $user);
    if (mysqli_num_rows($data) > 0) {
        while ($row = mysqli_fetch_assoc($data)) {
            if ($row['id_user'] === $user) {
                $output .= '<div class="chat-message left"><div class="message-text"><p>' . $row['message'] . '</p></div></div>';
            } else {
                $output .= '<div class="chat-message right"><div class="message-text"><p>' . $row['message'] . '</p></div></div>';
            }
        }
    }
    echo $output;
}
  public function checkstatus()
  {
   $id=$_POST['user_id'];
  $result= $this->indexmodel->select_status_user($id);
  $response = array();
if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $response['status'] = $row['status'];
   } 
     echo json_encode($response);
    // trả về đối tượng JSON
    
   
  }
}
?>