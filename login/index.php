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
    <title>Welcome to my website</title>
    <link rel="shortcut icon" href="../image/logo.png" type="image/png" href="https://placehold.co/20x20">
    <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:400,800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/main.css" />
    <link rel="stylesheet" href="../css/style.css" />
    <link rel="stylesheet" href="../css/log_reg.css" />
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Candal|Lora" rel="stylesheet">

    <script src="../js/uikit.js"></script>
    <style>
        a {color: #3f3c56; text-decoration: none;}
        a:focus, a:hover {color: #2887ff;}
    </style>
</head>

<body>

<?php include(ROOT_PATH . "/../app/includes/header.php"); ?>
<?php $refurl = isset($_POST['refurl']) ? base64_decode($_POST['refurl']) : ''; ?>

<div class="auth-content">

    <form action="" method="post">
        <h2 class="form-title">Login</h2>

        <?php include(ROOT_PATH . "/../app/helpers/formErrors.php"); ?>

        <div>
            <input type="hidden" name="refurl" value="<?php echo base64_encode($_SERVER['HTTP_REFERER']); ?>" />
            <label>Username</label>
            <input type="text" name="username" value="<?php echo $username; ?>" class="text-input">
        </div>
        <div>
            <label>Password</label>
            <input type="password" name="password" value="<?php echo $password; ?>" class="text-input">
        </div>
        <div>
            <button type="submit" name="login-btn" class="btn btn-big">Login</button>
        </div>
    </form>

    <p style="float:right;">Or 
    <a href="../register" style="text-decoration:underline;">Get Registered</a>
    </p>
</div>

<?php include(ROOT_PATH . "/../app/includes/footer.php"); ?>
</body>

</html>
