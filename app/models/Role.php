<?php
/*
*@author Peter Togara <petertogara@gmail.com>
*Roles Management
*/
class Role{
    private $db;

    public function __construct(){
      $this->db = new Database;
    }

    public function getRoles(){
        $this->db->query('SELECT * FROM role');
        $results = $this->db->resultSet();
  
        return $results;
      }

    public function getRolePermissions($id){
    $this->db->query('
    
                      SELECT 
                      users.id , users.name , role.role_id , role.role_name , role_permission.permission_id, permission.permission_description 
                      FROM users 
                      INNER JOIN user_role ON users.id = user_role.user_id 
                      INNER JOIN role ON user_role.role_id = role.role_id 
                      INNER JOIN role_permission ON role.role_id = role_permission.role_id 
                      INNER JOIN permission ON role_permission.permission_id = permission.permission_id 
                      WHERE users.id = :id
                   ');
     $this->db->bind(':id', $id);
     $rows = $this->db->resultSet();
     return $rows;
                   
    }
    public function getPermissionById($role , $permission){
      $this->db->query('SELECT * FROM role_permission WHERE  role_id = :role_id and permission_id = :permission_id');
      $this->db->bind(':role_id', $role);
      $this->db->bind(':permission_id', $permission);
      $this->db->single();
      if($this->db->rowCount() > 0){
          return true;
      } else{
          return false;
      }
    }
      public function addRole($data){
        $this->db->query('INSERT INTO role (role_name, role_description) VALUES(:role_name, :role_description)');
        // Bind values
        $this->db->bind(':role_name', $data['role_name']);
        $this->db->bind(':role_description', $data['role_description']);
  
        // Execute
        if($this->db->execute()){
          return true;
        } else {
          return false;
        }
      }
  
      public function updateRole($data){
        $this->db->query('UPDATE role SET role_name = :role_name, role_description = :role_description WHERE role_id = :role_id');
        // Bind values
        $this->db->bind(':role_id', $data['role_id']);
        $this->db->bind(':role_name', $data['role_name']);
        $this->db->bind(':role_description', $data['role_description']);
  
        // Execute
        if($this->db->execute()){
          return true;
        } else {
          return false;
        }
      }
  
      public function getRoleById($id){
        $this->db->query('SELECT * FROM role WHERE role_id = :role_id');
        $this->db->bind(':role_id', $id);
  
        $row = $this->db->single();
  
        return $row;
      }

      public function deleteRole($id){
        $this->db->query('DELETE FROM role WHERE role_id = :role_id');
        // Bind values
        $this->db->bind(':role_id', $id);
  
        // Execute
        if($this->db->execute()){
          return true;
        } else {
          return false;
        }
      }
    }