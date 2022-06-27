<?php
    include_once 'header.php';
?>

<!DOCTYPE html>
<html lang="en">

<h1>Professor Sign in</h2>

<h2>View Class Meetings</h2>
    <form action="professor-login-connect.php" method="POST">
        <input type="text" name="ssn" placeholder="SSN">
        <input type="submit" name="submit">
    </form>

    <?php
        if(isset($_GET["error"])) {
            if ($_GET["error"] == "emptyInput") {
                echo "No input";
            }
            else if ($_GET["error"] == "invalidLogin") {
                echo "Invalid SSN. Please try again";
            }
        }
    ?>
</html>