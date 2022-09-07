<?php

session_start();
include('config.php');



if(isset($_POST['submit'])){

   $email = $_POST['email'];
   $pass = $_POST['password'];

      $select =$con->prepare( " SELECT * FROM user_form WHERE email = '$email' && password = '$pass' ");
   $select->execute();

   if($select->rowCount() > 0){
      $row = $select->fetch(PDO::FETCH_ASSOC);
      if($row['user_type'] == 'admin'){

         $_SESSION['admin_name'] = $row['name'];
         header('location:admin_page.php');

      }elseif($row['user_type'] == 'user'){

         $_SESSION['user_name'] = $row['name'];
         header('location:user_page.php');

      }

   }else{
      echo "le mot de passe ou email incorrecte";
   }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>login form</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   
<div class="form-container">

   <form action="" method="post">
      <h3>login now</h3>
      <input type="email" name="email" required placeholder="enter your email">
      <input type="password" name="password" required placeholder="enter your password">
      <input type="submit" name="submit" value="login now" class="form-btn">
      <p>T'as pas un compte mon pote? <a href="register_form.php">Cree un now</a></p>
   </form>
   <div class="rond_one">

   </div>
   <div class="rond_two">

   </div>

</div>

</body>
</html>