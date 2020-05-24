<?php
include "dbConn.php";

if (isset($_POST["submit"])) {
    $usernaam  = $_POST["user-usernaam"];
    $rollen    = $_POST["user-rollen"];
    $telnummer = $_POST["user-telnummer"];
    $email     = $_POST["user-email"];
    $password  = $_POST["user-password"];

    if (empty($usernaam) || empty($rollen) || empty($telnummer) || empty($email) || empty($password)) {
        header("Location:../Gebruikers.php?error=emptyfields");
        exit();
    } else {
        $sql  = "INSERT INTO user (Usernaam,Rollen,Telnummer,Email,Password) VALUES(?,?,?,?,?)";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location:../Gebruikers.php?error=sqlerror");
            exit();
        } else {
            mysqli_stmt_bind_param($stmt, "ssssi", $usernaam, $rollen, $telnummer, $email, $password);
            mysqli_stmt_execute($stmt);
            header("Location:../Gebruikers.php?signup=success");
            exit();
        }

        mysqli_stmt_close($stmt);
        mysqli_close($conn);
    }
}
