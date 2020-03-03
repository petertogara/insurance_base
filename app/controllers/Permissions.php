<?php
/*
*@author Peter Togara <petertogara@gmail.com> 
*/
class Permissions extends Controller{ 

        public function __construct(){
          if(!isLoggedIn()){
            redirect('users/login');
          }
    
          $this->permissionModel = $this->model('Permission');
         // $this->userModel = $this->model('User');
        }

        public function index(){
            // Get posts
            $permissions = $this->permissionModel->getPermissions();
      
            $data = [
              'permissions' => $permissions
            ];
      
            $this->view('permissions/index', $data);
          }
          public function assign(){
            // Get posts
            $assignpermissions = $this->permissionModel->getPermissions();
      
            $data = [
              'assignpermissions' => $assignpermissions
            ];
      
            $this->view('permissions/assign', $data);
          }
      
          public function add(){
              
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
              // Sanitize POST array
              $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
      
              $data = [
                'permission_description' => trim($_POST['permission_description']),
                'permission_description_err' => ''
              ];
      
              // Validate data
              if(empty($data['permission_description'])){
                $data['permission_description_err'] = 'Please enter permission name';
              }
             
      
              // Make sure no errors
          
                if(empty($data['permission_description_err'])){
                // Validated
                if($this->permissionModel->addPermission($data)){
                  flash('permission_success', 'You have added permission successfully');
                  redirect('permissions');
                } else {
                  die('Something went wrong');
                }
              } else {
                // Load view with errors
                $this->view('permissions/add', $data);
              }
      
            } else {
              $data = [
                'permission_description' => ''
              ];
        
              $this->view('permissions/add', $data);
            }
          }
       
          /*
          public function edit($id){
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
              // Sanitize POST array
              $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
      
              $data = [
                'id' => $id,
                'title' => trim($_POST['title']),
                'body' => trim($_POST['body']),
                'user_id' => $_SESSION['user_id'],
                'title_err' => '',
                'body_err' => ''
              ];
      
              // Validate data
              if(empty($data['title'])){
                $data['title_err'] = 'Please enter title';
              }
              if(empty($data['body'])){
                $data['body_err'] = 'Please enter body text';
              }
      
              // Make sure no errors
              if(empty($data['title_err']) && empty($data['body_err'])){
                // Validated
                if($this->postModel->updatePost($data)){
                  flash('post_message', 'Post Updated');
                  redirect('posts');
                } else {
                  die('Something went wrong');
                }
              } else {
                // Load view with errors
                $this->view('posts/edit', $data);
              }
      
            } else {
              // Get existing post from model
              $post = $this->postModel->getPostById($id);
      
              // Check for owner
              if($post->user_id != $_SESSION['user_id']){
                redirect('posts');
              }
      
              $data = [
                'id' => $id,
                'title' => $post->title,
                'body' => $post->body
              ];
        
              $this->view('posts/edit', $data);
            }
          }
      
          public function show($id){
            $post = $this->permissionModel->getPermissionById($id);
            $user = $this->userModel->getUserById($post->user_id);
      
            $data = [
              'post' => $post,
              'user' => $user
            ];
      
            $this->view('posts/show', $data);
          }

          public function delete($id){
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
              // Get existing post from model
              $post = $this->postModel->getPostById($id);
              
              // Check for owner
              if($post->user_id != $_SESSION['user_id']){
                redirect('posts');
              }
      
              if($this->postModel->deletePost($id)){
                flash('post_message', 'Post Removed');
                redirect('posts');
              } else {
                die('Something went wrong');
              }
            } else {
              redirect('posts');
            }*/
          //}
        }