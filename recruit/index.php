<?php
error_reporting(E_ALL & ~E_NOTICE & ~E_WARNING);
include("../include/path.php");
include(ROOT_PATH . "/../app/controllers/topics.php");

// Initialize the session
session_start();

// Check if the user is already logged in, if yes then redirect to the member page
if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
    header("location: member");
    exit;
}

// Database connection parameters
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "travel";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $position = $_POST['position'];
    $fullName = $_POST['fullName'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $education = $_POST['education'];
    $certifications = $_POST['certifications'];
    $experience = $_POST['experience'];
    $languages = $_POST['languages'];
    $skills = $_POST['skills'];

    // Debugging: Check if the data is received
    // echo "<pre>"; print_r($_POST); echo "</pre>";

    // Handling file uploads
    if ($_FILES['resume']['error'] !== UPLOAD_ERR_OK) {
        die("Resume upload failed with error code " . $_FILES['resume']['error']);
    }

    // Store uploaded resume in "uploads" directory
    $resume = basename($_FILES['resume']['name']);
    $targetFilePath = "uploads/" . $resume;

    // Check if the uploads directory exists, create if not
    if (!is_dir('uploads')) {
        mkdir('uploads', 0755, true); // Create directory if it doesn't exist
    }

    // Move uploaded file to target directory
    if (move_uploaded_file($_FILES['resume']['tmp_name'], $targetFilePath)) {
        // Prepare and bind SQL statement
        $stmt = $conn->prepare("INSERT INTO applications (position, fullName, email, phone, address, education, certifications, experience, languages, skills, resume) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        if (!$stmt) {
            die("Prepare failed: " . $conn->error);
        }

        $stmt->bind_param("sssssssssss", $position, $fullName, $email, $phone, $address, $education, $certifications, $experience, $languages, $skills, $resume);

        // Execute the statement
        if ($stmt->execute()) {
            echo "<p>New record created successfully</p>";
        } else {
            echo "<p>Error: " . $stmt->error . "</p>";
        }

        // Close the statement
        $stmt->close();
    } else {
        echo "<p>Failed to move the uploaded file. Target: $targetFilePath</p>";
    }
}

// Close the database connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recruitment</title>

    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.3.0/fonts/remixicon.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link rel="stylesheet" href="../css/index_styles.css" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

    <style>
        /* Your custom styles */
        #header {
            z-index: 999;
        }
        .dropdown-menu {
            display: none;
            position: fixed;
            background-color: white;
            box-shadow: 0px 8px 16px rgba(0,0,0,0.2);
            list-style: none;
            padding: 10px;
            z-index: 9999!important;
        }
        .dropdown:hover .dropdown-menu {
            display: block;
        }
        .container {
            max-width: 600px;
            margin: auto;
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        label, input, textarea, select, button {
            display: block;
            width: 100%;
            margin: 10px 0;
        }
        button {
            background-color: #27ae60;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        button:hover {
            background-color: #219653;
        }
        .container {
            opacity: 0;
            transform: translateY(20px);
            transition: opacity 0.5s ease, transform 0.5s ease;
        }
        .container.visible {
            opacity: 1;
            transform: translateY(0);
        }
    </style>
</head>
<body>
    <?php include(ROOT_PATH . "/../app/includes/otherHeader.php"); ?>

    <div class="container">
        <h1>Floria Travel Recruitment Form</h1>
        <form action="" method="post" enctype="multipart/form-data">
            <label for="position">Position Applying For:</label>
            <select id="position" name="position" required>
                <option value="Yoga Instructor">Yoga Instructor</option>
                <option value="Tour Guide">Tour Guide</option>
                <option value="Tour Guide">Cook</option>
                <option value="Tour Guide">Helpers</option>
                <option value="Tour Guide">Safety officers</option>
            </select>

            <h2>Personal Information</h2>
            <label for="fullName">Full Name:</label>
            <input type="text" id="fullName" name="fullName" required>

            <label for="email">Email Address:</label>
            <input type="email" id="email" name="email" required>

            <label for="phone">Phone Number:</label>
            <input type="tel" id="phone" name="phone" required>

            <label for="address">Address:</label>
            <textarea id="address" name="address" required></textarea>

            <h2>Qualifications and Experience</h2>
            <label for="education">Highest Level of Education:</label>
            <input type="text" id="education" name="education">

            <label for="certifications">Relevant Certifications:</label>
            <textarea id="certifications" name="certifications"></textarea>

            <label for="experience">Years of Experience:</label>
            <input type="number" id="experience" name="experience" min="0">

            <h2>Skills</h2>
            <label for="languages">Languages Spoken:</label>
            <textarea id="languages" name="languages"></textarea>

            <label for="skills">Special Skills or Areas of Expertise:</label>
            <textarea id="skills" name="skills"></textarea>

            <h2>File Uploads</h2>
            <label for="resume">Upload Resume:</label>
            <input type="file" id="resume" name="resume" accept=".pdf,.doc,.docx" required>

            <button type="submit">Submit Application</button>
        </form>
    </div>
    <div>
        <?php include(ROOT_PATH . "/../app/includes/otherFooter.php"); ?>
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                const container = document.querySelector('.container');
                setTimeout(() => {
                    container.classList.add('visible');
                }, 100);
            });
        </script>
    </div>
</body>
</html>


