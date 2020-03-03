<?php require APPROOT . '/views/inc/header.php'; ?>
  <div class="row mb-3">
    <div class="col-md-6">
    <?php flash('role_success');?>
      <h5>Roles</h5>
    </div>
    <div class="col-md-6">
      <a href="<?php echo URLROOT; ?>/roles/add" class="btn btn-primary pull-right">
        <i class="fa fa-pencil"></i> Add Role
      </a>
    </div>
  </div>
  <?php foreach($data['roles'] as $role) : ?>
    
      <div class="bg-light p-2 mb-3">
        <?php echo $role->role_id; ?>  <?php echo $role->role_description;  ?>   <a href="<?php echo URLROOT; ?>/roles/edit/<?php echo $role->role_id; ?>">Edit</a> | <a href="<?php echo URLROOT; ?>/roles/delete/<?php echo $role->role_id; ?>">Delete </a>
       
      </div>

  <?php endforeach; ?>
<?php require APPROOT . '/views/inc/footer.php'; ?>
