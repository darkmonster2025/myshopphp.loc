<?php
$pageTitle = "Profile";
include 'Views/header.php';
?>
<div>
<form action='/updateSubmit' method='post'>
  <input type='text' name='name' id='name' value='<?=  isset($user['name']) ? $user['name'] : '';?>' />
  </br>
  <?php echo isset($errors['nameEror']) ? $errors['nameEror'] : '';?>
  </br>
  <input type='text' name='lastname' id='lastname' value='<?=  isset($user['lastname']) ? $user['lastname'] : '';?>'/>
  </br>
  <?php echo isset($errors['lastnameEror']) ? $errors['lastnameEror'] : '' ;?>
  </br>
  <input type='password' name='password' id='password'/>
  </br>
  <?php echo isset($errors['passwordEror']) ? $errors['passwordEror'] : '' ;?>
  </br>
  <button type='submit'>Update</button>
</form>  

</div>

<?php include 'Views/footer.php'?>