<?php
error_reporting(E_ALL & ~E_NOTICE & ~E_WARNING);
include("../include/path.php");


$posts = array();
$postsTitle = 'Recent Posts';



?>

<html lang="zxx" dir="ltr">

<head>
    <meta charset="utf-8">
<meta name="theme-color" content="#2887ff" />
    <meta name="description" content="This is Blog section where I write articles about latest and trending with Informative Information & i also explain my tutorial videos here in this Blog Section."/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=0" />
    <meta property="og:url"                content="../blog/" />
    <meta property="og:type"               content="Website" />
    <meta property="og:title"              content="Floria -Blog" />
    <meta property="og:description"        content="My Blog"/>

    <meta property="og:image"   itemprop="image"   content="../assets/images/1624805665_html_basic.jpg" />
    <meta itemprop="image" content="../assets/images/1624805665_html_basic.jpg">

	<link rel="icon" type="title/png" href="../image/floria.png">

    <link rel="shortcut icon" href="../image/floria.png" type="image/png" href="https://placehold.co/20x20" >
    <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:400,800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/main.css" />
    <link rel="stylesheet" href="../css/style.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
          integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <script src="https://cdn.ckeditor.com/ckeditor5/12.3.0/classic/ckeditor.js"></script>
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Candal|Lora" rel="stylesheet">
    <title>Floria - Blog</title>
    <script src="../js/uikit.js"></script>
    <style>
        a{color:#3f3c56;text-decoration:none}a:focus,a:hover{color:#2887ff;}
    </style>
    
    <div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v11.0&appId=1208939132888508&autoLogAppEvents=1" nonce="zZtwQJk8"></script>

<link
      href="https://cdn.jsdelivr.net/npm/remixicon@4.3.0/fonts/remixicon.css"
      rel="stylesheet"
    />
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"
    />
    <link rel="stylesheet" href="../css/index_styles.css" />
    <style>
        #header {
            position: relative;
            height: 100px;
            z-index: 8;
        }
        li {
            font-size: 14px;
        }
    </style>
</head>

<body>
<?php include(ROOT_PATH . "/../app/includes/otherHeader.php"); ?>
<?php include(ROOT_PATH . "/../app/includes/messages.php"); ?>

<div class="page-wrapper">

    <!-- Post Slider -->
    <div class="post-slider">
        <h1 class="slider-title">Trending Posts</h1>
        <i class="fas fa-chevron-left prev"></i>
        <i class="fas fa-chevron-right next"></i>

        <div class="post-wrapper">

            <?php foreach ($posts as $post): ?>
                <div class="post">
                    <img src="<?php echo BASE_URL . '/assets/images/' . $post['image']; ?>" alt="" class="slider-image">
                    <div class="post-info">
                        <h4><a href="single.php?id=<?php echo $post['id']; ?>"><?php echo $post['title']; ?></a></h4>
                        <i class="far fa-user"> <?php echo $post['username']; ?></i>
                        &nbsp;
                        <i class="far fa-calendar"> <?php echo date('F j, Y', strtotime($post['created_at'])); ?></i>
                    </div>
                </div>
            <?php endforeach; ?>


        </div>

    </div>
    <!-- // Post Slider -->

    <!-- Content -->
    <class="content clearfix">

        <!-- Main Content -->
        <div class="main-content">
            <h1 class="recent-post-title"><?php echo $postsTitle ?></h1>

            <?php foreach ($posts as $post): ?>
                <div class="post clearfix">
                    <img src="<?php echo BASE_URL . '/assets/images/' . $post['image']; ?>" alt="" class="post-image">
                    <div class="post-preview">
                        <h2><a href="single.php?id=<?php echo $post['id']; ?>"><?php echo $post['title']; ?></a></h2>
                        <i class="far fa-user"> <?php echo $post['username']; ?></i>
                        &nbsp;
                        <i class="far fa-calendar"> <?php echo date('F j, Y', strtotime($post['created_at'])); ?></i>
                        <p class="preview-text">
                            <?php echo html_entity_decode(substr($post['body'], 0, 120) . '...'); ?>
                        </p>
                        <a style="position: relative; margin-top: -5px; float: right;" href="single.php?id=<?php echo $post['id']; ?>" class="btn read-more">Read More</a>
                    </div>
                </div>
            <?php endforeach; ?>



        </div>
        <!-- // Main Content -->

        <class="sidebar">

            <div class="section search">
                <h2 class="section-title">Search</h2>
                <form action="index.php" method="post">
                    <input type="text" name="search-term" class="text-input" placeholder="Search...">
                </form>
            </div>


            
        

    
    <!-- // Content -->

</div>
<!-- // Page Wrapper -->




<!-- JQuery -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Slick Carousel -->
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>

<!-- Custom Script -->
<script src="../assets/js/scripts.js"></script>


<?php include(ROOT_PATH . "/../app/includes/indexFooter.php"); ?>
<script src="../js/index-main.js"></script>
</body>

</html>