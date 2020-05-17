<?php
include "dbConn.php";

if(!empty($_POST["organisatie"])) {
    $a=$_POST["organisatie"];
  $query = "SELECT * FROM organisatie WHERE ID ='$a'";
  $result = mysqli_query($conn, $query);
  $user_count = mysqli_num_rows($result);
  if($user_count>0) {
      
  }else{
    echo "<span class='status-not-available'> : Organisatie <span class='text-success'>$a</span> Succesvol ingevoerd.";
    $qry=mysqli_query($conn,"INSERT INTO organisatie (Naam) VALUES('$a')");
    echo "<script>document.getElementById('organisatie').value='' </script>";
    echo "<datalist id='organisatie1'>";
 $sql = "SELECT * FROM organisatie";
 $result = mysqli_query($conn, $sql);
 while ($row = mysqli_fetch_assoc($result)) {
    echo "<option value='".$row['ID'] ." " . "($row[Naam])'>" . $row['Naam'] . "</option>";   
}
echo "</datalist>";

  }
  
}



