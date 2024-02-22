<?php
$pageTitle = "Registration";
include 'Views/header.php';
?>


    <body>
        <div class='container'>
        <form action="/registrationSubmit" method="post">
            <h1>Registration</h1>
            <input type="text" name="name" id="name" placeholder="name" value='<?= isset($_POST['name']) ? $_POST['name'] :'' ?>'>
             <?php echo isset($errors['nameEror']) ? $errors['nameEror'] : '' ;?>
            </br>
            <input type="text" name="lastname" id="lastname" placeholder="lastname" value='<?= isset($_POST['lastname']) ? $_POST['lastname'] :'' ?>'>
             <?php echo isset($errors['lastnameEror']) ? $errors['lastnameEror'] : '' ;?>
        </br>
            <input type="text" name="username" id="username" placeholder="username" value='<?= isset($_POST['username']) ? $_POST['username'] :'' ?>'>
             <?php echo isset($errors['usernameEror']) ? $errors['usernameEror'] : '' ;?>
        </br>
            <input type="email" name="email" id="email" placeholder="email" value='<?= isset($_POST['email']) ? $_POST['email'] :'' ?>'>
             <?php echo isset($errors['emailEror']) ? $errors['emailEror'] : '' ;?>
        </br>
            <input type="password" name="password" id="password" placeholder="password">
             <?php echo isset($errors['passwordEror']) ? $errors['passwordEror'] : '' ;?>
        </br>
            <input type="password" name="passwordComfirm" id="passwordComfirm" placeholder="password repeat">
             <?php echo isset($errors['passwordComfirmEror']) ? $errors['passwordComfirmEror'] : '' ;?>
        </br>
            <button type="submit" value="submit" id="submit">Submit</button>
            <a href="/login">already have account? Sign In</a>
        </form></div>
    </body>
</html>