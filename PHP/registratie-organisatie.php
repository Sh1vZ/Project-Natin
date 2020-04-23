
<?php
include "dbConn.php";


if (isset($_POST["submit"])) {
    $vnaam=$_POST["vnaam"];
    $anaam=$_POST["anaam"];
    $organisatie=$_POST["organisatie"];
    $richting=$_POST["richting"];
    $functie=$_POST["functie"];
    $telnumm=$_POST["telnumm"];


    if (empty($vnaam) || empty($anaam)||  empty($functie) || empty($telnumm)) {
        header("Location:../administratie.php?error=emptyfields");
        exit();
    } else {
        $sql  = "INSERT INTO personen (Achternaam,Voornaam,OrganisatieID,Functie,Telnummer) VALUES(?,?,?,?,?)";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location:../administratie.php?error=sqlerror");
            exit();
        } else {
            mysqli_stmt_bind_param($stmt, "ssiss", $anaam, $vnaam, $organisatie ,$functie,$telnumm);
            mysqli_stmt_execute($stmt);
            header("Location:../administratie-personen.php?signup=success");
            exit();
        }
        
        mysqli_stmt_close($stmt);
        mysqli_close($conn);
    }
}
