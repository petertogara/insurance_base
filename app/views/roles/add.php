<?php require APPROOT . '/views/inc/header.php'; ?>
  <a href="<?php echo URLROOT; ?>/roles" class="btn btn-light"><i class="fa fa-backward"></i> Back</a>
  <div class="card card-body bg-light mt-5">
 
    <h2>Add Role</h2>
    <p>Create a role with this form</p>
    <form action="<?php echo URLROOT; ?>/roles/add" method="post">
      <div class="form-group">
        <label for="role_name">Role Name: <sup>*</sup></label>
        <input type="text" name="role_name" class="form-control form-control-lg <?php echo (!empty($data['role_name_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['role_name']; ?>">
        <span class="invalid-feedback"><?php echo $data['role_name_err']; ?></span>
      </div>
      <div class="form-group">
        <label for="role_description">Role Description: <sup>*</sup></label>
        <input type="text" name="role_description" class="form-control form-control-lg <?php echo (!empty($data['role_description_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['role_description']; ?>">
        <span class="invalid-feedback"><?php echo $data['role_description_err']; ?></span>
      </div>
      <input type="submit" class="btn btn-success" value="Submit">
    </form>
  </div>
<?php require APPROOT . '/views/inc/footer.php'; ?>