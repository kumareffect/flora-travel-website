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
    $resume = time() . "_" . basename($_FILES['resume']['name']);
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
            echo "<script>alert('Application submitted successfully!'); window.location.href='';</script>";
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
    body {
    font-family: 'Segoe UI', sans-serif;
}

.container {
    max-width: 700px;
    margin: 40px auto;
    background: #ffffff;
    padding: 30px;
    position: relative;
    z-index: -1;
    border-radius: 12px;
    box-shadow: 0 15px 40px rgba(0,0,0,0.2);
    transition: all 0.4s ease;
}

h1 {
    text-align: center;
    margin-bottom: 20px;
    color: #2a5298;
}

h2 {
    margin-top: 20px;
    color: #444;
    border-left: 4px solid #2a5298;
    padding-left: 10px;
}

label {
    font-weight: 600;
    margin-top: 10px;
}

input, textarea, select {
    width: 100%;
    padding: 10px;
    border-radius: 6px;
    border: 1px solid #ccc;
    margin-top: 5px;
    transition: 0.3s;
}

input:focus, textarea:focus, select:focus {
    border-color: #2a5298;
    outline: none;
    box-shadow: 0 0 5px rgba(42,82,152,0.3);
}

textarea {
    resize: none;
}

button {
    width: 100%;
    background: linear-gradient(135deg, #27ae60, #2ecc71);
    color: white;
    padding: 12px;
    border: none;
    border-radius: 8px;
    margin-top: 20px;
    font-size: 16px;
    cursor: pointer;
    transition: 0.3s;
}

button:hover {
    transform: scale(1.03);
    box-shadow: 0 5px 15px rgba(0,0,0,0.2);
}

/* animation */
.container {
    opacity: 0;
    transform: translateY(30px);
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
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="../assets/js/scripts.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/40.0.0/classic/ckeditor.js"></script>
    <script src="https://unpkg.com/scrollreveal"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

</body>
</html>


