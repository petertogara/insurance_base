<?php
/*
*@author Peter Togara <petertogara@gmail.com>
*Permissions Management
*/
class Permission{
    private $db;

    public function __construct(){
      $this->db = new Database;
    }

    public function getPermissions(){
        $this->db->query('SELECT * FROM permission');
        $results = $this->db->resultSet();
  
        return $results;
      }
  
      public function addPermission($data){
        $this->db->query('INSERT INTO permission (permission_description) VALUES(:permission_description)');
        // Bind values
        $this->db->bind(':permission_description', $data['permission_description']);
  
        // Execute
        if($this->db->execute()){
          return true;
        } else {
          return false;
        }
      }
  
      public function updatePermission($data){
        $this->db->query('UPDATE permission SET permission_description = :permission_description WHERE permission_id = :permission_id');
        // Bind values
        $this->db->bind(':permission_id', $data['permission_id']);
        $this->db->bind(':permission_description', $data['permission_description']);
  
        // Execute
        if($this->db->execute()){
          return true;
        } else {
          return false;
        }
      }
  
      public function getPermissionById($id){
        $this->db->query('SELECT * FROM permission WHERE permission_id = :permission_id');
        $this->db->bind(':permission_id', $id);
  
        $row = $this->db->single();
  
        return $row;
      }

      public function deletePermission($id){
        $this->db->query('DELETE FROM permission WHERE permission_id = :permission_id');
        // Bind values
        $this->db->bind(':permission_id', $id);
  
        // Execute
        if($this->db->execute()){
          return true;
        } else {
          return false;
        }
      }
    }