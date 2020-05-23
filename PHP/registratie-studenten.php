<?php
include "dbConn.php";

if (isset($_POST["submit"])) {
    $vnaam       = $_POST["vnaam"];
    $anaam       = $_POST["anaam"];
    $organisatie = $_POST["organisatie"];
    $richting    = $_POST["richting"];
    $functie     = $_POST["functie"];
    $telnumm     = $_POST["telnumm"];

    if (empty($vnaam) || empty($anaam) || empty($functie) || empty($telnumm)) {
        header("Location:../administratie.php?error=emptyfields");
        exit();
    } else {
        $sql  = "INSERT INTO personen (Achternaam,Voornaam,OrganisatieID,RichtingID,Functie,Telnummer) VALUES(?,?,?,?,?,?)";
        $sql1 = mysqli_query($conn, "SELECT * FROM organisatie WHERE (Naam)='Natin' OR (Naam) ='NATIN'");
        $row  = mysqli_fetch_assoc($sql1);
        $id   = $row['ID'];
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location:../administratie.php?error=sqlerror");
            exit();
        } else {
            mysqli_stmt_bind_param($stmt, "ssiiss", $anaam, $vnaam, $id, $richting, $functie, $telnumm);
            mysqli_stmt_execute($stmt);
            header("Location:../administratie-personen.php?signup=success");
            exit();
        }

        mysqli_stmt_close($stmt);
        mysqli_close($conn);
    }
}

if (isset($_POST["submit-org"])) {
    $vnaam       = $_POST["vnaam"];
    $anaam       = $_POST["anaam"];
    $organisatie = $_POST["organisatie"];
    $richting    = $_POST["richting"];
    $functie     = $_POST["functie"];
    $telnumm     = $_POST["telnumm"];

    if (empty($vnaam) || empty($anaam) || empty($functie) || empty($telnumm)) {
        header("Location:../administratie.php?error=emptyfields");
        exit();
    } else {
        $sql  = "INSERT INTO personen (Achternaam,Voornaam,OrganisatieID,Functie,Telnummer) VALUES(?,?,?,?,?)";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location:../administratie.php?error=sqlerror");
            exit();
        } else {
            mysqli_stmt_bind_param($stmt, "ssiss", $anaam, $vnaam, $organisatie, $functie, $telnumm);
            mysqli_stmt_execute($stmt);
            header("Location:../administratie-personen.php?signup=success");
            exit();
        }

        mysqli_stmt_close($stmt);
        mysqli_close($conn);
    }
}

if (isset($_POST["edit-org"])) {
    $vnaam       = $_POST["vnaam"];
    $anaam       = $_POST["anaam"];
    $organisatie = $_POST["organisatie"];
    $richting    = $_POST["richting"];
    $functie     = $_POST["functie"];
    $telnumm     = $_POST["telnumm"];
    $id          = $_POST["oid"];

    if (empty($vnaam) || empty($anaam) || empty($functie) || empty($telnumm)) {
        header("Location:../administratie.php?error=emptyfields");
        exit();
    } else {
        $sql  = "UPDATE personen SET Achternaam=?,Voornaam=?,OrganisatieID=?,Functie=?,Telnummer=? WHERE ID=?";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location:../administratie.php?error=sqlerror");
            exit();
        } else {
            mysqli_stmt_bind_param($stmt, "ssissi", $anaam, $vnaam, $organisatie, $functie, $telnumm, $id);
            mysqli_stmt_execute($stmt);
            header("Location:../administratie-personen.php?edit=success");
            exit();
        }

        mysqli_stmt_close($stmt);
        mysqli_close($conn);
    }
}

if (isset($_POST["edit-stud"])) {
    $vnaam       = $_POST["vnaam"];
    $anaam       = $_POST["anaam"];
    $organisatie = $_POST["organisatie"];
    $richting    = $_POST["richting"];
    $functie     = $_POST["functie"];
    $telnumm     = $_POST["telnumm"];
    $sid         = $_POST["sid"];

    if (empty($vnaam) || empty($anaam) || empty($functie) || empty($telnumm)) {
        header("Location:../administratie.php?error=emptyfields");
        exit();
    } else {
        $sql  = "UPDATE personen SET Achternaam=?,Voornaam=?,OrganisatieID=?,RichtingID=?,Functie=?,Telnummer=? WHERE ID=?";
        $sql1 = mysqli_query($conn, "SELECT * FROM organisatie WHERE (Naam)='Natin' OR (Naam) ='NATIN'");
        $row  = mysqli_fetch_assoc($sql1);
        $id   = $row['ID'];
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location:../administratie.php?error=sqlerror");
            exit();
        } else {
            mysqli_stmt_bind_param($stmt, "ssiissi", $anaam, $vnaam, $id, $richting, $functie, $telnumm, $sid);
            mysqli_stmt_execute($stmt);
            header("Location:../administratie-personen.php?signup=success");
            exit();
        }

        mysqli_stmt_close($stmt);
        mysqli_close($conn);
    }
}