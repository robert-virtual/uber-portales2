<?php
   class ayuda extends Controller{
    public function __construct() {
        parent::__construct();
      

    }
        public function index(){
            $ayuda = $this->model->getAll();
            $this->view->ayuda = $ayuda;  
            $this->view->render("ayuda/index");
            
        }


        function send_mail(){
            if(isset($_POST['send'])){
                $to_email= $_POST['to'];
                $subject=$_POST['subject'];
                $message=$_POST['message'];
                    
                $to = $to_email;
                $subject = $subject;
                $txt = $message;
                $headers = "From: admin@gmail.com" . "\r\n" .
                "CC: anymail@example.com";
                mail($to,$subject,$txt,$headers);
                }
                $this->view->render('hello/send_mail');
            }
        }
            
        
    
?>