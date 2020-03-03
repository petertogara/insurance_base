<?php
/*
*@author Peter Togara <petertogara@gmail.com> 
*/
class Roles extends Controller{ 
  private $perm_id;

        public function __construct(){
          if(!isLoggedIn()){
            redirect('users/login');
          }
    
          $this->roleModel = $this->model('Role');

        }



        public function index(){
          $perm_id = 4;//Delete Post
           $this->authorize($perm_id);
            $roles = $this->roleModel->getRoles();
      
            $data = [
              'roles' => $roles
            ];
      
            $this->view('roles/index', $data);
          }
      
          public function add(){
            $this->authorize(1);
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
              // Sanitize POST array
              $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
      
              $data = [
                'role_name' => trim($_POST['role_name']),
                'role_description' => trim($_POST['role_description']),
                'role_name_err' => '',
                'role_description_err' => ''
              ];
      
              // Validate data
              if(empty($data['role_name'])){
                $data['role_name_err'] = 'Please enter role name';
              }
              if(empty($data['role_description'])){
                $data['role_description_err'] = 'Please enter role description';
              }
      
              // Make sure no errors
          
                if(empty($data['role_name_err']) && empty($data['role_description_err'])){
                // Validated
                if($this->roleModel->addRole($data)){
                  flash('role_success', 'You have added role successfully');
                  redirect('roles');
                } else {
                  die('Something went wrong');
                }
              } else {
                // Load view with errors
                $this->view('roles/add', $data);
              }
      
            } else {
              $data = [
                'role_name' => '',
                'role_description' => ''
              ];
        
              $this->view('roles/add', $data);
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
            $post = $this->postModel->getPostById($id);
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