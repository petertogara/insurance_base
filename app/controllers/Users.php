<?php
/*
*@author Peter Togara <petertogara@gmail.com>
*/
class Users extends Controller{

    public function __construct(){
     $this->userModel  = $this->model('User');
    }

    public function index(){
       
        $this->view('users/register', $data);
    
       }

     public function register(){
         //CHECK POST
         if($_SERVER['REQUEST_METHOD']=='POST'){
             //INIT DATA
             //SANITIZE POST DATA
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = 
            [
                'name' => trim($_POST['name']),
                'email' => trim($_POST['email']),
                'password' => trim($_POST['password']),
                'confirm_password' => trim($_POST['confirm_password']),
                'name_err' => '',
                'email_err' => '',
                'password_err' => '',
                'confirm_password_err' => ''
            ];
            //VALIDATION

            if(empty($data['email'])){
                $data['email_err'] = 'Please enter email address';
            }else{
                if($this->userModel->findUserByEmail($data['email'])){
                    $data['email_err'] = 'Email already registered';
                }
            }

            if(empty($data['name'])){
                $data['name_err'] = 'Please enter name';
            }

            if(empty($data['password'])){
                $data['password_err'] = 'Please enter password';
            }elseif(strlen($data['password'])< 6){
                $data['password_err'] = 'Password must be at least 6 characters';
            }

            if(empty($data['confirm_password'])){
                $data['confirm_password_err'] = 'Please confirm password';
            }else{
                if($data['password'] != $data['confirm_password']){
                    $data['confirm_password_err'] = 'Passwords do not match';
            }
        }
        //MAKE SURE ERRORS ARE EMPTY
         if(empty($data['email_err']) && empty($data['name_err']) && empty($data['confirm_password_err'])  && empty($data['password_err']))
         {
             //VALIDATED
             //HARSH PASSWORD

             $data['password'] = password_hash($data['password'], PASSWORD_BCRYPT);
             if($this->userModel->register($data)){
                flash('register_success', 'You have registered successfully');
                redirect('users/login');
             } else{
                 die('Registration failed, retry');
             }
             


         }else{
             //LOAD VIEW
             $this->view('users/register', $data);
         }
        
         }else{
         //INIT DATA
         $data = 
         [
            'name' => '',
            'email' => '',
            'password' => '',
            'confirm_password' => '',
            'name_err' => '',
            'email_err' => '',
            'password_err' => '',
            'confirm_password_err' => ''
         ];
               
        $this->view('users/register', $data);
         }
     
    
       }

       public function login(){
        //CHECK POST
        if($_SERVER['REQUEST_METHOD']=='POST'){
          //INIT DATA
             //SANITIZE POST DATA
             $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

             $data = 
             [
                 'email' => trim($_POST['email']),
                 'password' => trim($_POST['password']),
                 'email_err' => '',
                 'password_err' => ''
             ];
             //VALIDATION
 
             if(empty($data['email'])){
                 $data['email_err'] = 'Please enter email address';
             }
             if(empty($data['password'])){
                $data['password_err'] = 'Please enter password';
            }
              //CHECK IF USER EXISTS
            if($this->userModel->findUserByEmail($data['email'])){
                //USER EXISTS

            } else {
                //USER DOES NOT EXIST
                $data['email_err'] = 'Sorry, user does not exist';
            }
            
            if(empty($data['email_err'])  && empty($data['password_err']))
         {
             $loggedInUser  = $this->userModel->login($data['email'], $data['password']);
             if($loggedInUser){
                 //CREATE SESSION
                 //die('SUCCESS');
                 $this->createUserSession($loggedInUser);

             } else {
                 $data['password_err'] = 'Password incorrect';
                 $this->view('users/login', $data);
             }
         }else{
             //LOAD VIEW
             $this->view('users/login', $data);
         }
        }else{
        //INIT DATA
        $data = 
        [
           'email' => '',
           'password' => '',
           'email_err' => '',
           'password_err' => ''
           
        ];
              
       $this->view('users/login', $data);
        }
    
   
      }

      public function createUserSession($user){
          $_SESSION['user_id'] = $user->id;
          $_SESSION['user_email'] = $user->email;
          $_SESSION['user_name'] = $user->name;
          redirect('posts');


      }
    public function logout(){
        unset($_SESSION['user_id']);
        unset($_SESSION['user_email']);
        unset($_SESSION['user_name']);
        session_destroy();
        redirect('users/login');
    }


}