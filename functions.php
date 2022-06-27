<?php

function emptyProfessorSignup($ssn) {
    $result;
    if (empty($ssn)) {
        $result = true;
    }
    else {
        $result = false;
    }

    return $result;
}

function invalidSsn($ssn) {
    $result;
    if (!preg_match("/^[0-9]*$/", $ssn)) {
        $result = true;
    }
    else {
        $result = false;
    }
    
    return $result;
}

function ssnExists($conn, $ssn) {
    $sql = "SELECT * FROM professors WHERE ssn = ?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: professor-signup.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "s", $ssn);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($resultData)) {
        return $row;
    }
    else {
        $result = false;
        return $result;
    }

    mysqli_stmt_close($stmt);
}

function insertProfessor($conn, $ssn) {
    $sql = "INSERT INTO professors (ssn) VALUES ($ssn);";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: professor-signup.php?error=stmtfailed");
        exit();
    }
   mysqli_stmt_bind_param($stmt, "s", $ssn);
   mysqli_stmt_execute($stmt);
   mysqli_stmt_close($stmt);
   header("location: professor-signup.php?error=none");
   exit();
}

function emptyProfessorLogin($ssn) {
    $result;
    if (empty($ssn)) {
        $result = true;
    }
    else {
        $result = false;
    }

    return $result;
}

function loginProfessor($conn, $ssn) {
    $ssnExists = ssnExists($conn, $ssn);

    if ($ssnExists == false) {
        header("location: professor-login.php?error=invalidLogin");
        exit();
    }
    
    session_start();
    $_SESSION["ssn"] = $ssnExists["ssn"];
    header("location: professor-class-meetings.php");
    exit();
}

function cwidExists($conn, $cwid) {
    $sql = "SELECT * FROM students WHERE cwid = ?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: index.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "s", $cwid);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($resultData)) {
        return $row;
    }
    else {
        $result = false;
        return $result;
    }

    mysqli_stmt_close($stmt);
}

function loginStudent($conn, $cwid) {
    $cwidExists = cwidExists($conn, $snn);

    if ($cwidExists == false) {
        header("location: student-login.php?error=invalidLogin");
        exit();   
    }

    session_start();
    $_SESSION["cwid"] = $cwidExists["cwid"];
    header("location: index.php");
    exit();
}