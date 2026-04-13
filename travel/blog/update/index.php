<?php
error_reporting(E_ALL & ~E_NOTICE & ~E_WARNING);
include("../../include/path.php");
include(ROOT_PATH . "/../app/controllers/topics.php");
adminOnly();
?>
<?php
$servername='localhost';
$username='root';
$password='';
$dbname = "travel";
$conn=mysqli_connect($servername,$username,$password,"$dbname");
if(!$conn){
    die('Could not Connect My Sql:' .mysqli_error());
}
?>

<?php
if(isset($_POST['save'])) {
    $image = $_POST['image'];
    $file_upload = $_POST['image'];
    $file_name1 = $_FILES["file_upload"]["name"];
    $filename2 = $_FILES["file_upload"]["tmp_name"];
    $target_path1 = "../../image/" . $file_name1;
    if (move_uploaded_file($filename2, $target_path1))

        echo '<script>alert("../image/'.$file_name1.'")</script>';
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Welcome to my website</title>
    <link rel="shortcut icon" href="../../image/logo.png" type="image/png" href="https://placehold.co/20x20" >
    <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:400,800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../../css/main.css" />
    <link rel="stylesheet" href="../../css/style.css" />
    <link rel="stylesheet" href="../../assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">


    <script src="../../js/uikit.js"></script>
</head>
<body>
<?php include(ROOT_PATH . "/../app/includes/header.php"); ?>
<style>
    input {
        width: 80%;
        height: 40px;
        margin-top: 10px;
    }
    input[type=file] {
        width: 80%;
        border: 2px solid #2887ff;
        cursor: pointer;
    }
    a{color:#3f3c56;text-decoration:none}a:focus,a:hover{color:#2887ff;
</style><br/>
<form style="text-align: center;" method="post" enctype="multipart/form-data" action="">
    <input  type="file" id="docupload" name="file_upload" required><br/><br/>
    <input style="font-weight: bold; cursor: pointer; margin-bottom: 50px;" type="submit" name="save" value="SUBMIT">
</form>
<?php include(ROOT_PATH . "/../app/includes/footer.php"); ?>
</body>
</html>
