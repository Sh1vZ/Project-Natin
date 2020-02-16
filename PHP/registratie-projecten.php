<?php
include "dbConn.php";


if (isset($_POST["submit"])) {
    $projectnaam=$_POST["project-naam"];
    $begind=$_POST["datum-begin"];
    $eindd=$_POST["datum-eind"];
    $omschrijving=$_POST["omschrijving"];
    $leider=$_POST["project-leider"];


    if (empty($projectnaam) || empty($begind)|| empty($eindd)|| empty($omschrijving)) {
        header("Location:../administratie.php?error=emptyfields");
        exit();
    } else {
        $sql  = "INSERT INTO project (Naam,Omschrijving,BeginDatum,EindDatum,ProjectleiderID) VALUES(?,?,?,?,?)";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location:../administratie.php?error=sqlerror");
            exit();
        } else {
            mysqli_stmt_bind_param($stmt, "ssssi", $projectnaam, $omschrijving, $begind, $eindd,$leider);
            mysqli_stmt_execute($stmt);
            header("Location:../administratie.php?signup=success");
            exit();
        }
        
        mysqli_stmt_close($stmt);
        mysqli_close($conn);
    }
}
