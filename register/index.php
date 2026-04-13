<?php 
error_reporting(E_ALL & ~E_NOTICE & ~E_WARNING);
include("path.php"); ?>
<?php include(ROOT_PATH . "/app/controllers/users.php");

?>
<!DOCTYPE html>
<html lang="zxx" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Welcome to my website</title>
    <link rel="shortcut icon" href="../image/logo.png" type="image/png" href="https://placehold.co/20x20" >
    <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:400,800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/main.css" />
    <link rel="stylesheet" href="../css/style.css" />
    <link rel="stylesheet" href="../css/log_reg.css" />
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Candal|Lora" rel="stylesheet">


    
    <style>
        a{color:#3f3c56;text-decoration:none}a:focus,a:hover{color:#2887ff;}
    </style>
</head>

<body>
  
  
<?php include(ROOT_PATH . "/../app/includes/header.php"); ?>

  <div class="auth-content">

    <form action="" method="post">
      <h2 class="form-title">Register</h2>

      <?php include(ROOT_PATH . "/app/helpers/formErrors.php"); ?>

      <div>
      <label>Username</label>
            <input type="text" name="username" value="<?php echo $username; ?>" class="text-input" >
        </div>
        <div>
            <label>Email</label>
            <input type="email" name="email"  value="<?php echo $email; ?>" class="text-input">
        </div>
        <div>
            <label>Password</label>
            <input type="password" name="password"  value="<?php echo $password; ?>" class="text-input">
        </div>
        <div>
            <label>Password Confirmation</label>
            <input type="password" name="passwordConf"  value="<?php echo $passwordConf; ?>" class="text-input">
        </div>
        <div>
            <button type="submit" name="register-btn" class="btn btn-big">Register</button>
        </div>
      <p>Or <a href="<?php echo BASE_URL . '/../login' ?>">Sign In</a></p>
    </form>

  </div>
<?php include(ROOT_PATH . "/../app/includes/footer.php"); ?>

  <!-- JQuery -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>


</body>

</html>