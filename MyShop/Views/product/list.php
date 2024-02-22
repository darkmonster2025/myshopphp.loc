<?php
$pageTitle = "Products List";
include 'Views/header.php';
?>


<div>
   <a href="/product/add">Products add</a>
     <table id="customers">
  <tr>
    <th>Id</th>
    <th>CategoryName</th>
    <th>Name</th>
    <th>Price</th>
    <th>Description</th>
    <th>Quantity</th>
    <th>Edit</th>
    <th>Delete</th>
  </tr>
<?php 
foreach($products as $list){
  $product_id = $list['id'];
    echo '
    <tr>
    <td>'. $list['id'] .'</td>
    <td>'. $list['categoryname'] .'</td>
    <td>'. $list['name'] .'</td>
    <td>'. $list['price'] .'</td>
    <td>'. $list['description'] .'</td>
    <td>'. $list['quantity'] .'</td>
    <td><a href="/product/edit?id='.$product_id.'">Edit</a></td>
    <td><a href="/product/delete?id='.$product_id.'">Delete</a></td>
  </tr>';
}
   ?>
</table>
</div>

<?php include 'Views/footer.php'?>