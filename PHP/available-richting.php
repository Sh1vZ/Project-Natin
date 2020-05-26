<?php
include "dbConn.php";

if (!empty($_POST["richting"])) {
    $a          = $_POST["richting"];
    $query      = "SELECT * FROM richting WHERE ID ='" . $_POST["richting"] . "'";
    $result     = mysqli_query($conn, $query);
    $user_count = mysqli_num_rows($result);
    if ($user_count > 0) {
    } else {
        echo "<span class='status-not-available'> :Richting <span class='text-success'>$a</span> Succesvol ingevoerd.";
        $qry = mysqli_query($conn, "INSERT INTO richting (Richting) VALUES('$a')");
        echo "<script>document.getElementById('richting').value='' </script>";
        echo "<datalist id='richting1'>";
        $sql    = "SELECT * FROM richting";
        $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<option value='" . $row['ID'] . " " . "($row[Richting])'>" . $row['Richting'] . "</option>";
        }
        echo "</datalist>";
    }
}
