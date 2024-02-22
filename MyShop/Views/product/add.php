<?php
$pageTitle = "Products Add";
include 'Views/header.php';
?>

<div>
  
<form action='/createProduct' method='post'>

  <a href="/product/list">Products list</a>
  </br>
  <select name='categories'>
  <?php 
  foreach($categories as $item){
   echo '<option value=' . $item['id'] . '>' . $item['categoryname'] . '</option>';
  }
  ?>  
  </select>
  </br>
  <?php echo isset($errors['categoriesEror']) ? $errors['categoriesEror'] : '' ;?>
  </br>
  <input type='text' name='name' placeholder='product name'/>
  </br>
  <?php echo isset($errors['nameEror']) ? $errors['nameEror'] : '' ;?>
  </br>
  <input type='text' name='price' placeholder='product price'/>
  </br>
  <?php echo isset($errors['priceEror']) ? $errors['priceEror'] : '' ;?>
  </br>
  <textarea name='description' placeholder='product description' cols="30" rows="10"></textarea>
  </br>
  <?php echo isset($errors['descriptionEror']) ? $errors['descriptionEror'] : '' ;?>
  </br>
  <input type='text' name='quantity' placeholder='product quantity'/>
  </br>
  <?php echo isset($errors['quantityEror']) ? $errors['quantityEror'] : '' ;?>
  </br>
  </br>
  <button type='submit'>Create</button>
</form>  

</div>

<?php include 'Views/footer.php'?>