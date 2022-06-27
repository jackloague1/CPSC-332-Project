<?php
    include_once 'header.php';
?>

<!DOCTYPE html>
<html lang="en">

<h2>Professor Sign Up</h2>
    <form action="professor-signup-connect.php" method="POST">
        <input type="text" name="ssn" placeholder="SSN">
        <input type="submit" name="submit"></button>
    </form>

    <?php
        if(isset($_GET["error"])) {
            if ($_GET["error"] == "emptyInput") {
                echo "No input";
            }
            else if ($_GET["error"] == "invalidSsn") {
                echo "Please only provide an integer input";
            }
            else if ($_GET["error"] == "ssnExists") {
                echo "This SSN already exists. Please enter another SSN";
            }
            else if ($_GET["error"] == "none") {
                echo "Professor signed up";
            }
        }
    ?>
</html>