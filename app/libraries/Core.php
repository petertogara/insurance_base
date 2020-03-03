<?php 

/*
 * @author - Peter Togara
* App core class
*creates URL & Loads core controller
*URL Format - /controller/method/params
*/

class Core{
    protected $currentController = 'Pages';
    protected $currentMethod    = 'index';
    protected $params  = [];
    
    public function __construct() {
        //print_r($this->getUrl());
        $url  = $this->getUrl();
        
        //Look in controllers for first value to be loaded
        
        if (file_exists('../app/controllers/'. ucwords($url[0]). '.php')) {
            $this->currentController  = ucwords($url[0]);
            unset($url[0]);
        }
        
        //require the controller 
        
        require_once'../app/controllers/'. $this->currentController. '.php';
        
        //instantiate the controller class
        $this->currentController  =  new $this->currentController;

        //check second part of the url
        if(isset($url[1])){
         //check if the method $url[1] exists now within the controller
          if(method_exists($this->currentController, $url[1]))
           {
               $this->currentMethod = $url[1];
               unset($url[1]); 
           }
        }

        //get Params $url[2]
       // if(isset($url[2]))
       // {
        $this->params = $url ? array_values($url) : [];
        //call a Callback function of array of params
         call_user_func_array([$this->currentController, $this->currentMethod], $this->params);
        // unset($url[2]);
       // }
    
    }
    
    public function getUrl() {
        if (isset($_GET['url'])){
            $url  = rtrim($_GET['url'], '/');
            $url  = filter_var($url, FILTER_SANITIZE_URL);
            $url  = explode('/', $url);
            return $url;
        }
    }
    
}