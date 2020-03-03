<?php
/*
 * @author - Peter Togara
 */
class Pages extends Controller{
    
    public function __construct() {
        //echo 'Pages loaded'    
  
   }

   public function index(){
       
    $this->view('pages/index', 
    $data = [
           'title' =>  'Share Posts',
           'description' => 'Welcome to the ancient of days. So happy to be here now.... Xoxoxoxoxo'
           ]);

   }

    public  function about(){

        $this->view('pages/index', 
        $data = [
        'title'=>'About Us',
        'description' => 'Welcome to the ancient of days. So happy to be here now.... Hoorrrayyyyyyyyyyyy'
        ]);
    }

    public  function register(){

        $this->view('users/register', 
        $data = [
        'title'=>'Register',
        'description' => 'Register User'
        ]);
    }
    public  function welcome(){

        $this->view('pages/index', $data = ['title'=>'Welcome Takudzwa']);
    }
}
