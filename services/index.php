<?php
error_reporting(E_ALL & ~E_NOTICE & ~E_WARNING);
include("../include/path.php");
include(ROOT_PATH . "/../app/controllers/topics.php");
?>
<!DOCTYPE html>
<html lang="zxx" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta name="theme-color" content="#2887ff" />
    <meta name="description" content="Floria Travel." />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=0" />
    <meta property="og:url" content="../services/" />
    <meta property="og:type" content="Website" />
    <meta property="og:title" content="Services" />
    <meta property="og:description" content="The Menu I provide" />
    <meta property="og:image" itemprop="image" content="../image/3.jpg" />
    <meta itemprop="image" content="../image/3.jpg">

    <link rel="icon" type="title/png" href="../image/floria.png">
    <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:400,800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/main.css" />
    <link rel="stylesheet" href="../css/style.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.3.0/fonts/remixicon.css" rel="stylesheet" />
       <link rel="stylesheet" href="../css/index_styles.css" />

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <title>Welcome to my website</title>

    <script src="../js/uikit.js"></script>
    <style>
        .section-title .title-tag {
            color: #2887ff;
            font-size: 16px;
            text-transform: uppercase;
            font-weight: 700;
            padding-bottom: 5px;
            z-index: 1;
            text-align: center;
            padding-top: 30px;
            position: relative;
            letter-spacing: 2px;
        }

        a {
            color: #3f3c56;
            text-decoration: none;
        }

        a:focus,
        a:hover {
            color: #2887ff;
        }

        /* Dish Container Styling */
        .dishes-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            margin: 20px 0;
        }

        /* Dish Card Styling */
        .dish-card {
            margin: 10px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 10px;
            width: 250px; /* Fixed width for consistent size */
            text-align: center;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); 
            opacity: 0; 
            transform: translateY(20px);
            animation: fadeIn 0.5s forwards; 
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .dish-card:hover {
            transform: scale(1.05);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2); 
        }

        @keyframes fadeIn {
            to {
                opacity: 1; 
                transform: translateY(0); 
            }
        }

        .dish-card img {
            width: 100%;
            height: 150px; 
            object-fit: cover; 
            border-radius: 10px;
        }

    </style>
</head>

<body>
    <?php include(ROOT_PATH . "/../app/includes/otherHeader.php"); ?>

    <div style="margin-top: 40px; text-align: center;" class="section-title text-center mb-30">
        <h2 class="title">What We Have as Menu!</h2>
        <p>All food is on us! Choose your healthy meal on the day of your trip!</p>
    </div>

    <h1 style="text-align: center;">Veg Dishes</h1>
    <div class="dishes-container">
        <div class="dish-card">
            <img src="../assets/paneer sandwich.jpg" alt="Paneer" />
            <p><strong>Paneer Sandwich:</strong> Delicious and Healthy</p>
        </div>

        <div style="margin: 150px 0;">
            <strong style="font-size: 25px;">OR</strong>
        </div>

        <div class="dish-card">
            <img src="../assets/pulao.jpg" alt="Pulao" />
            <p><strong>Pulao:</strong> With dry grapes and cashew nuts - Delicious and Healthy</p>
        </div>

        <div class="dish-card">
            <img src="../assets/milkshake.jpg" alt="Milkshake" />
            <p><strong>Drink:</strong> Refreshing!</p>
        </div>
    </div>

    <h1 style="text-align: center;">Non-Veg Dishes</h1>
    <div class="dishes-container">
        <div class="dish-card">
            <img src="../assets/Chicken.png" alt="Grilled Chicken" />
            <p><strong>Grilled Chicken:</strong> Served with salad and bread/rice</p>
        </div>

        <div style="margin: 150px 0;">
            <strong style="font-size: 25px;">OR</strong>
        </div>

        <div class="dish-card">
            <img src="../assets/fish.jpg" alt="Fish" />
            <p><strong>Grilled Fish:</strong> Served with salad and bread/rice</p>
        </div>
        
        <div class="dish-card">
            <img src="../assets/milkshake.jpg" alt="Milkshake"/>
            <p><strong>Drink:</strong> Refreshing!</p>
        </div>
    </div>

    <?php include(ROOT_PATH . "/../app/includes/indexFooter.php"); ?>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="../assets/js/scripts.js"></script>
</body>

</html>
