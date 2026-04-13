<?php

include(ROOT_PATH . "/app/database/db.php");
include(ROOT_PATH . "/app/helpers/middleware.php");
include(ROOT_PATH . "/app/helpers/validateUser.php");

$table = 'users';
$admin_users = selectAll($table);

$errors = array();
$id = '';
$username = '';
$admin = '';
$email = '';
$password = '';
$passwordConf = '';


function loginUser($user)
{
    $_SESSION['id'] = $user['id'];
    $_SESSION['username'] = $user['username'];
    $_SESSION['admin'] = $user['admin'];
    $_SESSION['message'] = 'You are now logged in';
    $_SESSION['type'] = 'success';
    
    $redirectUrl = $_SESSION['admin'] ? BASE_URL . '/../admin/dashboard.php' : BASE_URL . '/../index.php';
    header('location: ' . $redirectUrl);
    exit();
}

if (isset($_POST['register-btn']) || isset($_POST['create-admin'])) {
    $errors = validateUser($_POST);

    if (count($errors) === 0) {
        unset($_POST['register-btn'], $_POST['passwordConf'], $_POST['create-admin']);
        $_POST['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);
        
        
        $_POST['admin'] = isset($_POST['admin']) ? 1 : 0;
        $user_id = create($table, $_POST);

        if ($_POST['admin'] === 1) {
            $_SESSION['message'] = 'Admin user created';
            $_SESSION['type'] = 'success';
            header('location: ' . BASE_URL . '/admin/users/index.php');
        } else {
            $user = selectOne($table, ['id' => $user_id]);
            loginUser($user);
        }
        exit();
    } else {
        // Retain input values if there are errors
        $username = $_POST['username'];
        $admin = isset($_POST['admin']) ? 1 : 0;
        $email = $_POST['email'];
        $password = $_POST['password'];
        $passwordConf = $_POST['passwordConf'];
    }
}

// Update user information
if (isset($_POST['update-user'])) {
    adminOnly();
    $errors = validateUser($_POST);

    if (count($errors) === 0) {
        $id = $_POST['id'];
        unset($_POST['passwordConf'], $_POST['update-user'], $_POST['id']);
        $_POST['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $_POST['admin'] = isset($_POST['admin']) ? 1 : 0;

        update($table, $id, $_POST);
        $_SESSION['message'] = 'Admin user updated';
        $_SESSION['type'] = 'success';
        header('location: ' . BASE_URL . '/admin/users/index.php');
        exit();
    } else {
        // Retain input values if there are errors
        $username = $_POST['username'];
        $admin = isset($_POST['admin']) ? 1 : 0;
        $email = $_POST['email'];
        $password = $_POST['password'];
        $passwordConf = $_POST['passwordConf'];
    }
}

// Fetch user details for editing
if (isset($_GET['id'])) {
    $user = selectOne($table, ['id' => $_GET['id']]);
    
    $id = $user['id'];
    $username = $user['username'];
    $admin = $user['admin'];
    $email = $user['email'];
}

// Login process
if (isset($_POST['login-btn'])) {
    $errors = validateLogin($_POST);

    if (count($errors) === 0) {
        $user = selectOne($table, ['username' => $_POST['username']]);

        if ($user && password_verify($_POST['password'], $user['password'])) {
            loginUser($user);
        } else {
            array_push($errors, 'Wrong credentials');
        }
    }

    
    $username = $_POST['username'];
    $password = $_POST['password'];
}

if (isset($_GET['delete_id']) && is_numeric($_GET['delete_id'])) {
    adminOnly();
    $delete_id = intval($_GET['delete_id']);
    $result = deletePost($table, $delete_id); 

    if ($result) {
        $_SESSION['message'] = "Post deleted successfully";
        $_SESSION['type'] = "success";
    } else {
        $_SESSION['message'] = "Failed to delete post. Please try again.";
        $_SESSION['type'] = "error";
    }

}