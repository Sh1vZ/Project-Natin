<?php
header('Content-Type: application/json');

require_once 'dbConn.php';

$sqlQuery = " SELECT richting.Richting , count(taak.RichtingID) as aantal
from taak
left join richting on taak.RichtingID = richting.ID
group by taak.RichtingID ";

$result = mysqli_query($conn, $sqlQuery);

$data = array();
foreach ($result as $row) {
    $data[] = $row;
}

echo json_encode($data);
