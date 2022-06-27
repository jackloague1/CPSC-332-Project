<?php

if (isset($_POST["submit"])) {

    $ssn = $_POST['ssn'];

    require_once 'connect.php';
    require_once 'functions.php';

    if (emptyProfessorSignup($ssn) != false) {
        header("location: professor-signup.php?error=emptyInput");
        exit();
    }
    if (invalidSsn($ssn) != false) {
        header("location: professor-signup.php?error=invalidSsn");
        exit();
    }
    if (ssnExists($conn, $ssn) != false) {
        header("location: professor-signup.php?error=ssnExists");
        exit();
    }

    insertProfessor($conn, $ssn);
}
else {
    header("location: profesor-signup.php");
    exit();
}