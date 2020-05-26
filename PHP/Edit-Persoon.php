<?php
include "dbConn.php";
if (isset($_POST['Delete-Persoon'])) {
   $id =  $_POST['id'];
   $sql = "DELETE FROM personen WHERE ID=$id";
   mysqli_query($conn, $sql);
   echo 1;
   exit;
}
echo 0;
exit;
