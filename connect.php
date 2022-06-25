<?php

$conn = mysqli_connect('localhost', 'root', '', 'university');

if(!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
$ssn = $_POST['name'];

$sql = "INSERT INTO professors (ssn) VALUES ('$ssn');";

mysqli_query($conn, $sql);

if(isset($_POST["submit"])) {
    echo "Submit button works";
}
else {
    echo "Error occured";
}
    