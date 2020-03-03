<?php require APPROOT . '/views/inc/header.php'; ?>
  <div class="row mb-3">
    <div class="col-md-6">
    <?php flash('permission_success');?>
      <h5>Permissions</h5>
    </div>
    <div class="col-md-6">
      <a href="<?php echo URLROOT; ?>/permissions/add" class="btn btn-primary pull-right">
        <i class="fa fa-pencil"></i> Add Permission
      </a>
    </div>
  </div>
  
<table width="400" border="0" cellspacing="1" cellpadding="0">
<tr>
<td><form name="form1" method="post" action="">
<table width="400" border="0" cellpadding="3" cellspacing="1" bgcolor="#CCCCCC">
<tr>
<td bgcolor="#FFFFFF">&nbsp;</td>
<td colspan="4" bgcolor="#FFFFFF" align="left"><strong>Delete multiple rows in mysql</strong> </td>
</tr>
<tr>
<td align="center" bgcolor="#FFFFFF">#</td>
<td align="center" bgcolor="#FFFFFF"><strong>Id</strong></td>
<td align="center" bgcolor="#FFFFFF"><strong>Name</strong></td>
<td align="center" bgcolor="#FFFFFF"><strong>Lastname</strong></td>
<td align="center" bgcolor="#FFFFFF"><strong>Email</strong></td>
</tr>
 
<tr>
<td align="center" bgcolor="#FFFFFF"><input name="checkbox[]" type="checkbox" id="checkbox[]" value=""></td>
<td bgcolor="#FFFFFF"> Test</td>
<td bgcolor="#FFFFFF">Test</td>
<td bgcolor="#FFFFFF">Test </td>
<td bgcolor="#FFFFFF"> Test</td>
</tr>
<tr>
<td align="center" bgcolor="#FFFFFF"><input name="checkbox[]" type="checkbox" id="checkbox[]" value=""></td>
<td bgcolor="#FFFFFF"> Test</td>
<td bgcolor="#FFFFFF">Test</td>
<td bgcolor="#FFFFFF">Test </td>
<td bgcolor="#FFFFFF"> Test</td>
</tr>
<tr>
<td colspan="5" align="center" bgcolor="#FFFFFF"><input name="delete" type="submit" id="delete" value="Delete"></td>
</tr>

</table>
</form>
</td>
</tr>
</table>

<?php require APPROOT . '/views/inc/footer.php'; ?>
