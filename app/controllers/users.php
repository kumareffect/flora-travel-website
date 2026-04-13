<?php

include(ROOT_PATH . "/../app/database/db.php");
include(ROOT_PATH . "/../app/helpers/middleware.php");
include(ROOT_PATH . "/../app/helpers/validateUser.php");

$table = 'users';

$admin_users = selectAll($table);

$errors = array();
$id = '';
$username = '';
$admin = '';
$email = '';
$password = '';
$passwordConf = '';

// Predefined admin credentials
$admin_email = 'FloriaAdmin@gmail.com'; 
$admin_password = 'Tridutt@2021'; 

function loginUser($user)
{
    $_SESSION['id'] = $user['id'];
    $_SESSION['username'] = $user['username'];
    $_SESSION['admin'] = $user['admin']; 
    $_SESSION['message'] = 'You are now logged in';
    $_SESSION['type'] = 'success';

    if ($_SESSION['admin']) {
        header('location: ' . BASE_URL . '/../travel/admin/dashboard.php'); 
    } else {
        header('location: ' . BASE_URL . '/../travel/index.php'); 
    }
    exit();
}

if (isset($_POST['register-btn']) || isset($_POST['create-admin'])) {
    $errors = validateUser($_POST);

    if (count($errors) === 0) {
        unset($_POST['register-btn'], $_POST['passwordConf'], $_POST['create-admin']);
        $_POST['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);

        if (isset($_POST['admin'])) {
            $_POST['admin'] = 1; 
            $user_id = create($table, $_POST);
            $_SESSION['message'] = 'Admin user created';
            $_SESSION['type'] = 'success';
            header('location: ' . BASE_URL . '/admin/users/index.php');
            exit();
        } else { 
            $_POST['admin'] = 0; 
            $user_id = create($table, $_POST);
            $user = selectOne($table, ['id' => $user_id]);
            loginUser($user);
        }
    } else {
        $username = $_POST['username'];
        $admin = isset($_POST['admin']) ? 1 : 0;
        $email = $_POST['email'];
        $password = $_POST['password'];
        $passwordConf = $_POST['passwordConf'];
    }
}

if (isset($_POST['update-user'])) {
    adminOnly(); 
    $errors = validateUser($_POST);

    if (count($errors) === 0) {
        $id = $_POST['id'];
        unset($_POST['passwordConf'], $_POST['update-user'], $_POST['id']);
        $_POST['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $_POST['admin'] = isset($_POST['admin']) ? 1 : 0; 

        $count = update($table, $id, $_POST);
        $_SESSION['message'] = 'User updated successfully';
        $_SESSION['type'] = 'success';
        header('location: ' . BASE_URL . '/admin/users/index.php');
        exit();
    } else {
        $username = $_POST['username'];
        $admin = isset($_POST['admin']) ? 1 : 0;
        $email = $_POST['email'];
        $password = $_POST['password'];
        $passwordConf = $_POST['passwordConf'];
    }
}

if (isset($_GET['id'])) {
    $user = selectOne($table, ['id' => $_GET['id']]);
    $id = $user['id'];
    $username = $user['username'];
    $admin = $user['admin'];
    $email = $user['email'];
}

if (isset($_POST['login-btn'])) {
    $errors = validateLogin($_POST);

    if (count($errors) === 0) {
        
        $inputUsername = trim($_POST['username']);
        $inputPassword = trim($_POST['password']);
        
     
        var_dump($inputUsername, $inputPassword, $admin_email, $admin_password); 
        if (strtolower($inputUsername) === strtolower($admin_email) && $inputPassword === $admin_password) {
            
            $adminUser = [
                'id' => 1, 
                'username' => 'Admin', 
                'admin' => 1
            ];
            loginUser($adminUser); 
        } else {
            
            $user = selectOne($table, ['username' => $inputUsername]);
            var_dump($user); 

            if ($user && password_verify($inputPassword, $user['password'])) {
                loginUser($user);
            } else {
                array_push($errors, 'Wrong credentials'); 
            }
        }
    }
    
    $username = $_POST['username'];
    $password = $_POST['password'];
}
