<?php

namespace MyShop\Models;

use MyShop\Models\BaseModel;
use PDO;


class Product extends BaseModel {

    public function __construct() {
    }

    public function ProductAdd($data){
       $database = $this->dbh();
       $db= $database->prepare("INSERT INTO products (userid,categoryid,name,price,description,quantity) 
       VALUES (:userid,:categoryid,:name,:price,:description,:quantity)");
       $db->bindParam(":userid",$data['userid']); 
       $db->bindParam(":categoryid",$data['categories']); 
       $db->bindParam(":name",$data['name']); 
       $db->bindParam(":price",$data['price']); 
       $db->bindParam(":description",$data['description']); 
       $db->bindParam(":quantity",$data['quantity']); 
       $result = $db->execute();

       return $result;
    } 

    public function ProductList(){
       $database = $this->dbh();
       $db= $database->query("SELECT products.id,products.name,products.price,products.description,products.quantity,categories.categoryname FROM products JOIN categories ON products.categoryid=categories.id");
       $result = $db->fetchAll(PDO::FETCH_ASSOC);

       return $result;
    }

    public function getCategories(){
       $database = $this->dbh();
       $db= $database->query("SELECT * FROM categories");
       $result = $db->fetchAll(PDO::FETCH_ASSOC);

       return $result;
    }

     public function updateItem($data){
      $database = $this->dbh();
      $db = $database->prepare("UPDATE products SET name=:name, categoryid=:categoryid, price=:price, description=:description, quantity=:quantity WHERE id = :id");
      $db->bindParam(":id",$data['id']); 
      $db->bindParam(":name",$data['name']); 
      $db->bindParam(":categoryid",$data['categories']); 
      $db->bindParam(":price",$data['price']); 
      $db->bindParam(":description",$data['description']); 
      $db->bindParam(":quantity",$data['quantity']); 
      $result = $db->execute();

      return $result;
    }

   public function getProduct($id){
       $database = $this->dbh();
       $db = $database->query("SELECT * FROM products WHERE id = $id");
       $result = $db->fetch(PDO::FETCH_ASSOC);
      
      return $result;
    }

     public function deleteItem($id){
       $database = $this->dbh();
       $db= $database->prepare("DELETE FROM products WHERE id = $id");
       $result = $db->execute();

       return $result;
    }

}

