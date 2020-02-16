<?php
include "dbConn.php";

if (isset($_POST["submit1"])) {
 $taaknaam=$_POST["taak-naam"];
 $begind=$_POST["datum-begin"];
 $eindd=$_POST["datum-eind"];
 $omschrijving=$_POST["omschrijving"];
//  $rid=1;
//  $leider=$_POST["taak-leider"];
//  $id=$_GET["id"];

 if (empty($taaknaam) || empty($begind)|| empty($eindd)|| empty($omschrijving)) {
     header("Location:../administratie.php?error=emptyfields");
     exit();
 } else {
     $sql  = "INSERT INTO taak (ProjectID,Naam,Omschrijving,RichtingID,BeginDatum,EindDatum) VALUES(?,?,?,?,?)";
     $stmt = mysqli_stmt_init($conn);
     if (!mysqli_stmt_prepare($stmt, $sql)) {
        
     } else {
         mysqli_stmt_bind_param($stmt, "ississ",$taaknaam, $omschrijving, $begind,$eindd);
         mysqli_stmt_execute($stmt); 
         header("Location:./view-projecten.php?id=1");
         exit();
     }
     
     mysqli_stmt_close($stmt);
     mysqli_close($conn);
 }
}

?>
