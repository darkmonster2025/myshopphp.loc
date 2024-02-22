<?php

namespace MyShop\Controllers;

use MyShop\Controller;
use MyShop\Models\Product;


  

class ProductController extends Controller {
    private $products;

    public function list() {
        $products = new Product();
        $productsList = $products->ProductList(); 
        $this->render('product/list', ['products' => $productsList]);
    }

    public function add() {
        $products = new Product();
        $categories = $products->getCategories();
        $this->render('product/add', ['categories' => $categories]);
    }

    public function edit($params) {
        extract($params);
        $products = new Product();
        $categories = $products->getCategories();
        $product = $products->getProduct($id);
        $this->render('product/edit', ['categories' => $categories, 'editItems' => $product]);
    }

      public function update() {
        $id = $_POST['id'];
        $name = $_POST['name'];
        $price = $_POST['price'];
        $categories = $_POST['categories'];
        $description = $_POST['description'];
        $quantity = $_POST['quantity'];
        $errorMessages = [];
        if(!isset($_POST['categories'])){
         $errorMessages['categoriesEror'] = 'categories must be chosen!';
        }
        if(!isset($_POST['name']) || strlen($_POST['name']) < 3){
         $errorMessages['nameEror'] = 'name must be more then 3 leters!';
        }
        if(!isset($_POST['price']) || strlen($_POST['price']) < 1){
         $errorMessages['priceEror'] = 'price must be more then 1 leter!';
        }
        if(!isset($_POST['description']) || strlen($_POST['description']) < 20){
         $errorMessages['descriptionEror'] = 'description must be more then 20 leters!';
        }
        if(!isset($_POST['quantity'])){
         $errorMessages['quantityEror'] = 'quantity cannot be empty leter!';
        }

        if(empty($errorMessages)){
            $products = new Product();
            $updateProduct = $products->updateItem(['categories'=>$categories,'name'=>$name,'price'=>$price,'description'=>$description,
            'quantity'=>$quantity,'id'=>$id]);
            if($updateProduct){
               header("Location: http://myshop.loc/product/list");
               exit;
            }
            $errorMessages['general'] = 'something went wrong!';
        }
    }
     
    public function delete($params) {
        extract($params);
        $products = new Product();
        $products->deleteItem($id);
        header('Location: http://myshop.loc/product/list');
        exit;
    }

    public function createProduct(){
        $categories= $_POST['categories'];
        $name= $_POST['name'];
        $price= $_POST['price'];
        $description= $_POST['description'];
        $quantity= $_POST['quantity'];
        // $fileUpload= $_POST['fileUpload'];
        $errorMessages = [];
        if(!isset($_POST['categories'])){
         $errorMessages['categoriesEror'] = 'categories must be chosen!';
        }
        if(!isset($_POST['name']) || strlen($_POST['name']) < 3){
         $errorMessages['nameEror'] = 'name must be more then 3 leters!';
        }
        if(!isset($_POST['price'])){
         $errorMessages['priceEror'] = 'price must be more then 1 leter!';
        }
        if(!isset($_POST['description']) || strlen($_POST['description']) < 20){
         $errorMessages['descriptionEror'] = 'description must be more then 20 leters!';
        }
        if(!isset($_POST['quantity'])){
         $errorMessages['quantityEror'] = 'quantity cannot be empty leter!';
        }

        if(empty($errorMessages)){
            $product = new Product();
            $createProduct = $product->ProductAdd(['categories'=>$categories,'name'=>$name,'price'=>$price,'description'=>$description,
            'quantity'=>$quantity,'userid'=>$_SESSION['userid']]);
            if($createProduct){
               header("Location: http://myshop.loc/product/list");
               exit;
            }
            $errorMessages['general'] = 'something went wrong!';
        }
          

        $this->render('product/add', ['errors' => $errorMessages]);
    }


}