<?php

include("../../include/path.php");
include(ROOT_PATH . "/../app/controllers/users.php");


if (!isset($_SESSION['admin']) || !$_SESSION['admin']) {
    header('location: ' . BASE_URL . '/login/index.php');
    exit();
}

if (isset($_POST['submit-email'])) {
    $email = $_POST['email'];


    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {

        $_SESSION['message'] = "Email '{$email}' has been successfully recorded.";
        $_SESSION['type'] = 'success';
    } else {
        $_SESSION['message'] = "Invalid email format. Please try again.";
        $_SESSION['type'] = 'error';
    }
}
?>

<html lang="zxx" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>User Page - Admin Only</title>
    <link rel="stylesheet" href="../css/main.css" />
    <link rel="stylesheet" href="../css/style.css" />
    <link rel="stylesheet" href="../assets/css/style.css">
</head>

<body>

<?php include(ROOT_PATH . "/../app/includes/header.php"); ?>

<div class="auth-content">
    <h2>Admin User Email Input</h2>

  
    <?php include(ROOT_PATH . "/../app/helpers/formErrors.php"); ?>

    <form action="" method="post">
        <div>
            <label for="email">Enter Admin Email:</label>
            <input type="text" name="email" id="email" required class="text-input" placeholder="example@example.com">
        </div>
        <div>
            <button type="submit" name="submit-email" class="btn btn-big">Submit</button>
        </div>
    </form>
</div>

<?php include(ROOT_PATH . "/../app/includes/footer.php"); ?>
</body>

</html>
