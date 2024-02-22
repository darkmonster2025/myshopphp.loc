<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?= $pageTitle ?></title>
    <style>
        *{
            margin:0;
            padding:0;
        }
        header{ 
            width:100%;
            height:40px;
            background:#5d7897;
        }
        header  ul{
            width:100%;
            height:100%;
            display:flex;
            list-style: none;
            flex-direction:row;
            align-items:center;
            justify-content:space-around;  
        }

        header ul li a{
            text-decoration:none;
            color:#fff;
                }

        header ul li a:hover{
            color:#000;
        }

#customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #04AA6D;
  color: white;
}

    </style>
</head>
<body>
        <header>
            <ul>
                
               <?php 
              if(isset($_SESSION['userid'])){
                echo '<li><a href="/home">Home</a></li>';
                echo '<li><a href="/logout">Logout</a></li>';
                echo '<li><a href="/profile">Profile</a></li>'; 
                echo '<li><a href="/product/list">Products</a></li>'; 
              }else {
                echo '<li><a href="/login">Login</a></li>';
                echo '<li><a href="/registration">Registration</a></li>';
              }
              if(isset($_SESSION['userid'])){
                echo $_SESSION['userid'];
              }else{
                echo '';
              }
                ?>
                
                
            </ul>
        </header>
   