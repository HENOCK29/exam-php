<?php

include('config.php');
if(isset($_POST['submit'])){

   $name = $_POST['name'];
   $email =$_POST['email'];
   $pass = $_POST['password'];
   $cpass = $_POST['cpassword'];
   $user_type = $_POST['user_type'];

   $select =$con->prepare( " SELECT * FROM user_form WHERE email = '$email' && password = '$pass' ");
   $select->execute();
   if($select->rowCount() == 0){
      if ($pass != $cpass) {
         echo "mot de passe doivent etre identique";
      }else{
          $req =$con->prepare("INSERT INTO user_form(name, email, password, user_type) VALUES('$name','$email','$pass','$user_type')");
         $req->execute();
      }
      header('login_form.php'); 
     
   }else{
      echo "ce compte existe dejà";
   }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>register form</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   
<div class="form-container">

   <form action="" method="post">
      <h3>register now</h3>
      <input type="text" name="name" required placeholder="enter your name">
      <input type="email" name="email" required placeholder="enter your email">
      <input type="password" name="password" required placeholder="enter your password">
      <input type="password" name="cpassword" required placeholder="confirm your password">
      <select name="user_type">
         <option value="user">user</option>
         <option value="admin">admin</option>
      </select>
      <input type="submit" name="submit" value="register now" class="form-btn">
      <p>T'as deja un compte Mr qui pese? <a href="login_form.php">Connexion</a></p>
   </form>

</div>

</body>
</html>