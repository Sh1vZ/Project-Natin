
<?php
header('Content-Type: application/json');
require_once('dbConn.php');

$sqlQuery = " SELECT taak.RichtingID, date_format(taak.EindDatum,'%Y') as eind, Sum(bestedingen.Bedrag) as bedrag
from taak 
left join bestedingen on bestedingen.TaakID = taak.ID
left join richting on taak.RichtingID = richting.ID
group by eind";

$result = mysqli_query($conn, $sqlQuery);

$data = array();
foreach ($result as $row) {
	$data[] = $row;
}


echo json_encode($data);

?>

