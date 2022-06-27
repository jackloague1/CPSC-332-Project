<?php

if (isset($_POST["submit"])) {

    $ssn = $_POST['cwid'];

    require_once 'connect.php';
    require_once 'functions.php';

    if(emptyProfessorLogin($ssn) != false) {
        header("location: student-login.php?error=emptyInput");
        exit();
    }

    loginProfessor($conn, $ssn);
}
else {
    header("location: student-login.php");
    exit();
}
?>