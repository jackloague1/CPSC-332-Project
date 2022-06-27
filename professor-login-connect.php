<?php

if (isset($_POST["submit"])) {

    $ssn = $_POST['ssn'];

    require_once 'connect.php';
    require_once 'functions.php';

    if(emptyProfessorLogin($ssn) != false) {
        header("location: professor-login.php?error=emptyInput");
        exit();
    }

    loginProfessor($conn, $ssn);
}
else {
    header("location: professor-login.php");
    exit();
}
?>