<?php
$pageTitle = "Products Edit";
include 'Views/header.php';

?>

<div>
<form action='update' method='post'>
  </br>
  <input type='hidden' name='id' value='<?= $editItems['id']?>'/>
  <select name='categories'>
  <?php
  foreach($categories as $cat){
   echo '<option value=' . $cat['id'] . '>' . $cat['categoryname'] . '</option>';
  }
  
  //var_dump($item);
  ?>  
  </select>
  </br>
  <?php echo isset($errors['categoriesEror']) ? $errors['categoriesEror'] : '' ;?>
  </br>
  <input type='text' name='name' placeholder='product name' value='<?php echo isset($editItems['name']) ? $editItems['name'] : '';  ?>'/>
  </br>
  <?php echo isset($errors['nameEror']) ? $errors['nameEror'] : '' ;?>
  </br>
  <input type='text' name='price' placeholder='product price' value='<?php echo isset($editItems['price']) ? $editItems['price'] : '';  ?>'/>
  </br>
  <?php echo isset($errors['priceEror']) ? $errors['priceEror'] : '' ;?>
  </br>
  <textarea name="description" placeholder='product description' cols="30" rows="10"><?php echo isset($editItems['description']) ? $editItems['description'] : '';  ?></textarea>
  </br>
  <?php echo isset($errors['descriptionEror']) ? $errors['descriptionEror'] : '' ;?>
  </br>
  <input type='text' name='quantity' placeholder='product quantity' value='<?php echo isset($editItems['quantity']) ? $editItems['quantity'] : '';  ?>'/>
  </br>
  <?php echo isset($errors['quantityEror']) ? $errors['quantityEror'] : '' ;?>
  </br>
  </br>
  <button type='submit'>Update</button>
</form>  

</div>

<?php include 'Views/footer.php'?>