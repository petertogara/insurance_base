<?php
/*
 * @author - Peter Togara
 * BASE CONTROLLER
 * LOADS VIEWS AND MODELS
 */

class Controller{

    //LOAD THE MODEL 

    public function model($model){
   //REQUIRE THE MODEL FILE

   require_once'../app/models/'.$model. '.php';

   return new $model();

    }
    
    //LOADING THE VIEW

    public function view($view, $data=[]){

        //CHECK IF VIEW FILE EXISTS

        if(file_exists('../app/views/' .$view. '.php')){

            //REQUIRE THE VIEW FILE

            require_once'../app/views/' .$view. '.php';
        }
        else{
            
            die('View does not exist');
        }
    }

    //INITIALIZES AUTHORIZATIONS/ROLE/PERMISSION

    public function authorize($perm_id){
        $role_perms = $this->roleModel->getRolePermissions($_SESSION['user_id']) ;
        foreach($role_perms as $permission) :
         if(!$this->roleModel->getPermissionById($permission->role_id, $perm_id)){
           flash('unauthorized', 'You are not authorized to view this section','alert alert-danger');
           redirect('posts/index');
         }
        endforeach; 
      } 
       
} 