<?php
$pageTitle = "Login";
include 'Views/header.php';
?>


    <body>
        <div class='container'>
        <form action="/loginSubmit" method="post">
            <h1>Login</h1>
            <input type="text" name="usernameORemail" id="usernameORemail" placeholder="username or email" value='<?= isset($_POST['usernameORemail']) ? $_POST['usernameORemail'] :'' ?>'>
             <?php echo isset($errors['usernameORemailEror']) ? $errors['usernameORemailEror'] : '' ;?>
            </br>
            <input type="password" name="password" id="password" placeholder="password" >
             <?php echo isset($errors['passwordEror']) ? $errors['passwordEror'] : '' ;?>
             <?php echo isset($errors['general']) ? $errors['general'] : '' ;?>
            </br>
    
            <button type="submit" value="submit" id="submit">Submit</button>
            <a href="/registration">create a account? Sign Up</a>
        </form></div>
    </body>
</html>