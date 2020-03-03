<?php require APPROOT . '/views/inc/header.php'; ?>
  <a href="<?php echo URLROOT; ?>/permissions" class="btn btn-light"><i class="fa fa-backward"></i> Back</a>
  <div class="card card-body bg-light mt-5">
 
    <h2>Add Permission</h2>
    <form action="<?php echo URLROOT; ?>/permissions/add" method="post">
      <div class="form-group">
        <label for="title">Permission: <sup>*</sup></label>
        <input type="text" name="permission_description" class="form-control form-control-lg <?php echo (!empty($data['permission_description_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['permission_description']; ?>">
        <span class="invalid-feedback"><?php echo $data['permission_description_err']; ?></span>
      </div>
      <input type="submit" class="btn btn-success" value="Submit">
    </form>
  </div>
<?php require APPROOT . '/views/inc/footer.php'; ?>