<?php
error_reporting(E_ALL & ~E_NOTICE & ~E_WARNING);
include("../include/path.php"); ?>
<?php include(ROOT_PATH . "/../app/controllers/posts.php");
adminOnly();
?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">

        
        <link rel="stylesheet"
            href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
            integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr"
            crossorigin="anonymous">


        
        <link rel="stylesheet" href="../assets/css/style.css">

        
        <link rel="stylesheet" href="../assets/css/admin.css">
        <link rel="shortcut icon" href="../image/logo.png" type="image/png" href="https://placehold.co/20x20" >
        <title>Admin Section - Dashboard</title>
        <style>
            a{color:#3f3c56;text-decoration:none}a:focus,a:hover{color:#2887ff;}
        </style>
    </head>

    <body>
        
    <?php include(ROOT_PATH . "/../app/includes/adminHeader.php"); ?>

        
        <div class="admin-wrapper">

        <?php include(ROOT_PATH . "/../app/includes/adminSidebar.php"); ?>


            
            <div class="admin-content">

                <div class="content">

                    <h2 class="page-title">Dashboard</h2>

                    <?php include(ROOT_PATH . '/../app/includes/messages.php'); ?>

                    

                </div>

            </div>
            <!-- // Admin Content -->

        </div>
        <!-- // Page Wrapper -->




        <script
            src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script
            src="https://cdn.ckeditor.com/ckeditor5/12.2.0/classic/ckeditor.js"></script>
        
        <script src="../assets/js/scripts.js"></script>

    </body>

</html>