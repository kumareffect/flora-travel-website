<?php 
error_reporting(E_ALL & ~E_NOTICE & ~E_WARNING);
include("../include/path.php"); 
include(ROOT_PATH . "/../app/controllers/users.php");


guestsOnly();
?>

<html lang="zxx" dir="ltr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login Page</title>
    <link rel="shortcut icon" href="../image/logo.png" type="image/png">
    <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:400,800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/main.css" />
    <link rel="stylesheet" href="../css/style.css" />
    <link rel="stylesheet" href="../css/log_reg.css" />
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <script src="../js/uikit.js"></script>
    <style>
        .logo-container {
    text-align: center;
}

        a { color: #3f3c56; text-decoration: none; } 
        a:focus, a:hover { color: #2887ff; }

        .role-selection { text-align: center; padding: 50px; animation: fadeIn 1.5s ease-in-out; }
        .role-selection h2 { font-size: 2rem; margin-bottom: 20px; animation: fadeInDown 1.5s ease-in-out; }
        .role-selection button { padding: 10px 20px; margin: 10px; cursor: pointer; background-color: #fff; }
        .role-selection button:hover { background-color: #2887ff; color: #fff; }
    </style>
</head>

<body>

<?php include(ROOT_PATH . "/../app/includes/header.php"); ?>

<div class="auth-content">
    <!-- Role Selection Form -->
    <form action="login.php" method="post">
    <div class="logo-container">
    <img src="../assets/logo.png" alt="Floria Logo" width="100px" height="50px">
</div>

<div>
        <h1 class="form-title">Welcome to Floria Travel</h1>
        </div>

        <div class="role-selection">
            <h2>Select your role</h2>
            <button type="submit" name="role" value="admin">Admin</button>
            <button type="submit" name="role" value="existing">Existing User</button>
            <button type="submit" name="role" value="new">New User</button>
        </div>
    </form>

    <?php
    if (isset($_POST['role'])) {
        $role = $_POST['role'];

        if ($role == 'new') {
          
            header('Location: ../register/index.php');
            exit();
        } elseif ($role == 'existing' || $role == 'admin') {
         
            header('Location: index.php');
            exit();
        }
    }
    ?>


</div>

<?php include(ROOT_PATH . "/../app/includes/footer.php"); ?>

</body>

</html>

