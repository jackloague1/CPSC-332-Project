<?php
    include_once 'header.php';
?>

<!DOCTYPE html>
<html lang="en">

<h1>Student Sign in </h2>

<h2>View All Courses and Grades</h2>
    <form action="student-login-connect.php" method="POST">
        <input type="text" name="cwid" placeholder="CWID">
        <input type="submit" name="submit">
    </form>

    <?php
        if(isset($_GET["error"])) {
            if ($_GET["error"] == "emptyInput") {
                echo "No input";
            }
            else if ($_GET["error"] == "invalidLogin") {
                echo "Invalid CWID. Please try again";
            }
        }
    ?>
</html>