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
       
        .form-container {
            background-color: #fff;
            border-radius: 15px;
            padding: 40px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            margin-top: 30px;
            margin-bottom: 30px;
            max-width: 700px;
            margin-left: auto;
            margin-right: auto;
        }

        .form-container h3 {
            font-size: 24px;
            font-weight: 700;
            margin-bottom: 20px;
            text-align: center;
            color: #333;
        }

        .uk-input, .uk-textarea {
            font-size: 18px;
            padding: 14px 20px;
            border-radius: 8px;
            border: 1px solid #ccc;
            width: 100%;
        }

        .uk-input:focus, .uk-textarea:focus {
            border-color: #007bff;
            box-shadow: 0 0 5px rgba(0, 123, 255, 0.3);
        }

        .uk-button-primary {
            background-color: #007bff;
            border-color: #007bff;
            color: #fff;
            padding: 16px 32px;
            font-size: 18px;
            border-radius: 8px;
            width: 100%;
            transition: background-color 0.3s, transform 0.3s;
        }

        .uk-button-primary:hover {
            background-color: #0056b3;
            transform: translateY(-3px);
        }

        .form-container form {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        .contact-details {
            flex: 1;
            padding-right: 30px;
        }

        #contacts {
            padding: 50px 20px;
            background-color: #fff;
        }

        @media (max-width: 768px) {
            .form-container {
                padding: 30px;
            }

            .contact-details {
                padding-right: 0;
            }

            .form-container h3 {
                font-size: 22px;
            }
        }
    </style>
</head>

<body>
    <?php include(ROOT_PATH . "/../app/includes/otherHeader.php"); ?>


<div id="contacts" class="uk-section uk-section-large">
    <div class="uk-container">
        <div class="uk-child-width-1-2@s uk-grid-match" data-uk-grid>
            <div class="contact-details">
                <h3 class="uk-text-uppercase uk-h5 uk-letter-spacing-small">Let's talk</h3>
                <h2 class="uk-heading-small uk-margin-medium-top">Contact</h2>
                <p class="uk-width-4-5@l">You can call or email us at the details below.</p>
                <div class="uk-margin-medium-top uk-h4 uk-letter-spacing-small">
                    <div>Phone: <a class="uk-link-border uk-link-border-bold" href="tel:+230 59046783">+230-58863443</a></div>
                    <div class="uk-margin-top">Email: <a class="uk-link-border uk-link-border-bold" href="mailto:floriaeffect@gmail.com">floriaeffect@gmail.com</a></div>
                </div>
            </div>

            <div id="main-bar" class="form-container">
                <h3>Send us a message</h3>
                <form action="" method="post">
                    <input name="name" required class="uk-input uk-form-large" type="text" placeholder="Full Name">
                    <input name="email" required class="uk-input uk-form-large" type="email" placeholder="Email Address">
                    <textarea name="message" required class="uk-textarea uk-form-large" rows="5" placeholder="Message"></textarea>
                    <button name="submit" class="uk-button uk-button-primary">Send Message</button>
                </form>
            </div>
        </div>
    </div>
</div>

<iframe id="map" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d199850.95534163553!2d57.22429435533848!3d-20.32676048548117!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x217c423e443dd695%3A0xc1e6bfb2e928844!2sRivi%C3%A8re%20Noire%2C%20Mauritius!5e0!3m2!1sen!2sfr!4v1694282719824!5m2!1sen!2sfr" style="border:0; width:100%; height:400px;" allowfullscreen="" loading="lazy"></iframe>

<?php include(ROOT_PATH . "/../app/includes/otherFooter.php"); ?>

      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="../assets/js/scripts.js"></script>

</body>
</html>
