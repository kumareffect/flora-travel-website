<?php

$conn = mysqli_connect("localhost","root","","travel");

if(isset($_POST['submit'])){
$select = mysqli_query($conn, "SELECT * FROM quiz WHERE id='1' && userans = '".$_POST['userans']."'");
if(mysqli_num_rows($select)) {
    echo 'This username already exists';
}
else {
    echo 'something is wrong';
}
}
?>
        <form action="" method="post">
        <input type="hidden" name="userans" id="">
        <button class="startBtn" type="submit" name="submit">Start</button>
        </form>