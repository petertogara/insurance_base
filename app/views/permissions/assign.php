<?php require APPROOT . '/views/inc/header.php'; ?>
  <div class="row mb-3">
    <div class="col-md-6">
    <?php flash('role_success');?>
      <h5>Assign Permissions</h5>
    </div>
    <div class="col-md-6">
      <a href="<?php echo URLROOT; ?>/roles/add" class="btn btn-primary pull-right">
        <i class="fa fa-pencil"></i> Add Role
      </a>
    </div>
  </div>
  <?php foreach($data['assignpermissions'] as $perm) : ?>
    
      <div class="bg-light p-2 mb-3">
      <input name="checkbox[]" type="checkbox" id="checkbox[]" value="<?php echo $perm->permission_id; ?>"> <?php echo $perm->permission_id; ?>  <?php echo $perm->permission_description;  ?> 
       
      </div>

  <?php endforeach; ?>
<?php require APPROOT . '/views/inc/footer.php'; ?>