<?php
 include "dbConn.php";

     $id=$_GET["id"];
     $stmt= "DELETE FROM project WHERE ID=$id";
     $query=mysqli_query($conn, $stmt);
     header("Location:../administratie.php?msg=deleted");
     exit();
 