<?php
require_once "dbConn.php";
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Natin-AFA | Project Taken </title>
  <!-- Custom fonts for this template-->
  <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link
    href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
    rel="stylesheet">
  <!-- Custom styles for this template-->
  <link href="../css/sb-admin-2.min.css" rel="stylesheet">
  <link rel="stylesheet" href="../css/dashboard.css">
  <link rel="stylesheet" href="../vendor/dropdown/fstdropdown.css">
  <script src="../vendor/dropdown/fstdropdown.js"></script>
</head>

<body id="page-top">
  <!-- Page Wrapper -->
  <div id="wrapper">
    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
        <div class="sidebar-brand-icon ">
          <img src="../img/natin.png" alt="" style="width:60px;">
        </div>
        <div class="sidebar-brand-text mx-3">AFA</div>
      </a>
      <!-- Divider -->
      <hr class="sidebar-divider my-0">
      <!-- Nav Item - Dashboard -->
      <li class="nav-item ">
        <a class="nav-link" href="../home.php">
          <i class="fas fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>
      <hr class="sidebar-divider my-0">
      <li class="nav-item active">
        <a class="nav-link" href="../administratie.php">
          <i class="fas fa-file-medical"></i>
          <?php
      
        if ($_SESSION['role'] == 'Administratie'or $_SESSION['role'] == 'Beheerder'){
           ?>

          <span>Registreer Projecten</span></a>

        <?php
        }else{
        ?>
        <span>Projecten</span></a>
        <?php } ?>
      </li>
      <?php
      
        if ($_SESSION['role'] == 'Administratie'or $_SESSION['role'] == 'Beheerder'){ ?>
      <li class="nav-item">
        <a class="nav-link" href="../administratie-personen.php">
          <i class="fas fa-user-plus"></i>
          <span>Registreer Personen</span></a>
      </li>
      <?php
    }
    ?>
     <?php
        if ( $_SESSION['role'] == 'Beheerder'){
           ?>

            <li class="nav-item ">
                <a class="nav-link" href="../Beheerder_Users.php">
                    <i class="fas fa-tasks"></i>
                    <span>Users</span></a>
            </li>
            <?php
        }
        ?>
      </li>
      

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>
    </ul>
    <!-- End of Sidebar -->
    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">
      <!-- Main Content -->
      <div id="content">
        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">
            <!-- Nav Item - Search Dropdown (Visible Only XS) -->
            <li class="nav-item dropdown no-arrow d-sm-none">
              <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-search fa-fw"></i>
              </a>
              <!-- Dropdown - Messages -->
              <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                aria-labelledby="searchDropdown">
                <form class="form-inline mr-auto w-100 navbar-search">
                  <div class="input-group">
                    <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
                      aria-label="Search" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                      <button class="btn btn-primary" type="button">
                        <i class="fas fa-search fa-sm"></i>
                      </button>
                    </div>
                  </div>
                </form>
              </div>
            </li>
            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?=$_SESSION['name']?></span>
                <i class="fas fa-user-circle fa-3x fa-sm fa-fw mr-2 text-gray-400"></i>
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="#">
                  <i class="fas fa-user-circle fa-1x fa-sm fa-fw mr-2 text-gray-400"></i>
                  Profiel
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-1x fa-sm fa-fw mr-2 text-gray-400"></i>
                  Uitloggen
                </a>
              </div>
            </li>
          </ul>
        </nav>
        <!-- End of Topbar -->
        <!-- Begin Page Content -->
        <div class="container-fluid">
          <!-- Page Heading -->
          <?php
$id=$_GET["id"];
$sql="SELECT project.Naam, project.Omschrijving, project.BeginDatum, project.EindDatum, personen.Achternaam, personen.Voornaam,project.Status
from project 
left join personen on project.ProjectleiderID = personen.ID where project.ID=$id";
$res=mysqli_query($conn, $sql);
if (mysqli_num_rows($res)>0) {
    while ($row=mysqli_fetch_assoc($res)) {
        $naam=$row['Naam'];
        $omschr=$row["Omschrijving"];
        $begind=$row["BeginDatum"];
        $eindd=$row["EindDatum"];
        $status=$row["Status"];
        $anaam=$row["Achternaam"];
        $vnaam=$row["Voornaam"];
        // echo "<h3 class='card-title center'>$naam</h5>";
      
       
    }
}
?>
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h3 class="m-0 font-weight-bold text-gray-900 center"><?php echo $naam ?></h6>
            </div>
            <div class="card-body">
              <?php
                echo"<p class='card-text'> $omschr</p>";
 echo"  <table>
 <tr>
 <td>Begin Datum: </td>
     <td>$begind</td>
 </tr>
 <tr>
 <td>Eind Datum: </td>
    <td>$eindd</td>
 </tr>
 <tr>
 <td>Project Leider: </td>
    <td> $vnaam $anaam </td>
 </tr>
 <tr>
 <td>Status: </td>
    <td>$status</td>
 </tr>
</table>";


?>
            </div>
          </div>

        </div>



        <div id="addBtn" class="wrapper">
          <?php
                      include "dbConn.php";

                     if($_SESSION['role'] == 'Administratie'or $_SESSION['role'] == 'Beheerder' ) {
                      ?>
          <button class="circle" id="modalActivate" type="button" onclick=ResetForm()  class="btn btn-danger" data-toggle="modal"
            data-target="#exampleModalPreview">
            <i id="addSign" class="fas fa-plus fa-lg"></i>
          </button>
          <?php
                       }
                       ?>
        </div>

       


        <!-- CARDS -->
        <div class='container-fluid cont'>
          <div class='card-body'>
          
            <div class='row' id="data">
              <?php
$id=$_GET["id"];
$sql="SELECT taak.Naam , taak.Omschrijving, taak.BeginDatum, taak.EindDatum, richting.Richting, taak.Status,taak.ID,taak.GeschatteKosten
from taak
left join richting on taak.RichtingID = richting.ID where taak.ProjectID=$id";
$res=mysqli_query($conn,$sql);
if (mysqli_num_rows($res)>0) {
    while ($row = mysqli_fetch_assoc($res)) {
        $naam=$row["Naam"];
        $omschrijving=$row["Omschrijving"];
        $begind=$row["BeginDatum"];
        $eindd=$row["EindDatum"];
        $status=$row["Status"];
        $idt=$row["ID"];
        $kosten=$row["GeschatteKosten"];
        $richt=$row["Richting"];
        $som= "SELECT SUM(bedrag)as Som From bestedingen WHERE taakID = $idt";
        $res2=mysqli_query($conn,$som);
        $row2 = mysqli_fetch_assoc($res2);
        $Wbedrag=$row2["Som"];
  
                     
        $sql1="SELECT taak.ID , COUNT(bestedingen.TaakID) as aant
FROM bestedingen
left join taak on  bestedingen.TaakID = taak.ID
 WHERE TaakID =$idt";
 $res1=mysqli_query($conn,$sql1);
 $row1 = mysqli_fetch_assoc($res1);
 $aant=$row1["aant"];

 if (  $_SESSION['role'] == 'Administratie'or $_SESSION['role'] == 'Beheerder' or $_SESSION['role'] == 'Financieel' and $status=='Compleet'){
 
        echo"  
<div class='col-md-6'>
<div class='card1 green'>
    <div class='additional'>
      <div class='user-card'>";
      // if($status=="Niet Compleet"){
        echo "<a class='link' href='registratie-bestedingen.php?id=$id&idt=$idt'><button class='icon5'  data-role='update' data-id='$idt'><i class='fas fa-eye' data-toggle='tooltip' data-placement='top' title='View'></i></button></a>
              <a class='link' href='#'><button class='icon' onclick=EditTaak($idt)><i class='fas fa-edit' data-toggle='tooltip' data-placement='top' title='Edit'></i></button></a>
              <a class='link' href='#'><button class='icon6' onclick=EditTaak($idt)><i class='fas fa-trash-alt' data-toggle='tooltip' data-placement='top' title='Delete'></i></button></a>
               
        ";

      // }else{

      echo"
      <i class='fas fa-file-signature icon1'></i>
      </div>
      <div class='more-info'>
        <h1>$naam</h1>
        <div class='morefo'>
        <table>
        <tr>
        <th id=''>Begin Datum: </th>
            <td data-target='begind'>$begind</td>
        </tr>
        <tr >
        <th id='$idt'>Eind Datum: </th>
           <td id='naam'> $eindd</td>
        </tr>
        <tr >
        <th>Richting: </th>
           <td> $richt</td>
        </tr>  
        <tr>
        <th>Aantal Bestedingen: </th>
           <td> $aant</td>
        </tr>  
        <tr >
        <th>GeschatteKosten: </th>
           <td> SRD $kosten</td>
        </tr> ";
      
                     if($_SESSION['role'] == 'Financieel'or $_SESSION['role'] == 'Beheerder') {
                     echo" <tr>
                      <td>Werkelijke kosten: </td>
                         <td>SRD $Wbedrag</td>
                      </tr> ";
                     }
  echo"
        <tr>
        <th>Status: </th>
           <td> $status</td>
        </tr>  
    </table>
        </div>
      </div>
    </div>
    <div class='general'>
      <h1>$naam</h1>
      <p class= 'txt'> $omschrijving </p>
      <span class='more'>Hover voor meer info</span>
    </div>
  </div>
</div> 
";
    }}

?>
              <?php }?> </div>
          </div>
        </div>

      </div>

  <!-- Modal -->
<div class="modal fade top" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Taak</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action=""  name="form" method="POST" style="width:60vw; margin:0 auto">
      <div class="modal-body" id="form-container">
       
      </div>
     
    
    </div>
    
  </div>
  
</div>

       <!-- Modal -->
       <div class="modal fade top" id="exampleModalPreview" tabindex="-1" role="dialog"
          aria-labelledby="exampleModalPreviewLabel" aria-hidden="true">
          <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content" > <?php
     
        if ($_SESSION['role'] == 'Administratie'or $_SESSION['role'] == 'Beheerder'){
           ?>


              <?php
        }else{
        ?>
              <span>Projecten</span></a>
              <?php } ?>
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalPreviewLabel">Registreer Taken</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">

                <form action="" id="" name="form" method="POST" style="width:60vw; margin:0 auto">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                      <input type="hidden" name="hid" id="hid">
                        <label for="pwd">Taak Naam:</label>
                        <input type="text" id="naam" class="form-control" name="taak-naam" placeholder="" value='' required>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="pwd">Begin Datum:</label>
                        <input type="date" id="bdatum" class="form-control" name="datum-begin" placeholder="Begin Datum"
                          required>
                      </div>
                    </div>
                    <div class="col-md-6 mb-2">
                      <div class="form-group">
                        <label for="pwd">Eind Datum:</label>
                        <input type="date" id="edatum" class="form-control" name="datum-eind" placeholder="Begin Datum"
                          required>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label for="pwd">Richting:</label>
                        <select class="form-control fstdropdown-select" id="richting" name="richting">
                          <option value="" disabled selected>Kies richting</option>
                          <?php
                             $sql = "SELECT * FROM richting where Richting != 'Other'";
                             $result = mysqli_query($conn, $sql);
                              while ($row = mysqli_fetch_assoc($result)) {
                              echo "<option value='".$row['ID'] ."'>" . $row['Richting']."</option>";   
                            }
                     ?>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label for="pwd">Geschatte Kosten:</label>
                        <input type="number" class="form-control" id="kosten" name="geschatte-kosten" placeholder="">
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-12 mb-2">
                      <div class="form-group">
                        <label for="pwd">Taak Omschrijving:</label>
                        <textarea class="form-control" id="omschrijving" name="omschrijving" placeholder="Voer in..."
                          rows="3"></textarea>
                      </div>
                    </div>
                  </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Sluiten</button>
                <button type="submit" name="submit1" class="btn btn-primary">Opslaan</button>
                </form>
              </div>
            </div>
          </div>
        </div>
        <!-- Modal -->
      <?php
               if (isset($_POST["submit1"])) {
                   $taaknaam=$_POST["taak-naam"];
                   $begind=$_POST["datum-begin"];
                   $eindd=$_POST["datum-eind"];
                   $omschrijving=$_POST["omschrijving"];
                   $richt=$_POST["richting"];
                   $kosten=$_POST["geschatte-kosten"];
                   // $leider=$_POST["taak-leider"];
                   $id=$_GET["id"];
            
                   if (empty($taaknaam) || empty($begind)|| empty($eindd)|| empty($omschrijving)) {
                       header("Location:./view-projecten.php?error=emptyfields");
                       exit();
                   } else {
                       $sql  = "INSERT INTO taak (ProjectID,RichtingID,Naam,Omschrijving,BeginDatum,EindDatum,GeschatteKosten) VALUES(?,?,?,?,?,?,?)";
                          $sql1=mysqli_query($conn,"SELECT * FROM richting WHERE (Richting)='Other'");
                          $row = mysqli_fetch_assoc($sql1);
                          $idr=$row['ID'];
                        $stmt = mysqli_stmt_init($conn);
                       if (!mysqli_stmt_prepare($stmt, $sql)) {
                        header("Location:./view-projecten.php?error=sqlerror");
                        exit();
                       } else {
                         if(empty($richt)){
                          mysqli_stmt_bind_param($stmt, "iissssi", $id, $idr,$taaknaam, $omschrijving, $begind, $eindd,$kosten);
                          mysqli_stmt_execute($stmt);
                          echo"<script> window.location = 'view-projecten.php?id=$id'</script>";
                         }
                         else{
                             mysqli_stmt_bind_param($stmt, "iissssi", $id, $richt, $taaknaam, $omschrijving, $begind, $eindd, $kosten);
                             mysqli_stmt_execute($stmt);
                             echo"<script> window.location = 'view-projecten.php?id=$id'</script>";
                         }
                       }
                       mysqli_stmt_close($stmt);
                   }
                 
               }
                     
?>

     
    </div>
    <!-- /.container-fluid -->
  </div>
  <!-- End of Main Content -->
  <!-- Footer -->
  <footer class="sticky-footer bg-gradient-primary">
    <div class="container my-auto">
      <div class="copyright text-center my-auto">
        <span>Copyright &copy; 2019-2020 Natin-AFA. Designed & Developed with ❤</span>
      </div>
    </div>
  </footer>
  <!-- End of Footer -->
  </div>
  <!-- End of Content Wrapper -->
  </div>
  <!-- End of Page Wrapper -->
  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>
  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Klaar om uit te loggen?</h5>
                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                            <div class="modal-body">Klik op "Uitloggen" als u gereed bent.
                            </div>
                            <div class="modal-footer">
                                <button class="btn btn-secondary" type="button" data-dismiss="modal">Annuleren</button>
                                <a class="btn btn-primary" href="logout.php">Uitloggen</a>
                            </div>
                        </div>
                    </div>
                </div>
                
  <!-- Bootstrap core JavaScript-->
  <script src="../vendor/jquery/jquery.min.js"></script>
  <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- Custom scripts for all pages-->
  <script src="../js/sb-admin-2.min.js"></script>
  <script src="../js/tooltip.js"></script>
<script>

function EditTaak(e){
// alert(e);
var id=e;
// alert(e);

$.ajax({
type:'post',
url:'Edit-Taak.php',
data:{
  "x":1,
  "id":id,
},
dataType:"text",
success:function(response){
  $('#form-container').html(response);
  $('#exampleModal').modal('toggle');
}
});

// $('#exampleModalPreview').modal('toggle');
}

function edit(e){

  var name = $('#naam1').val();
  var bdatum = $('#bdatum1').val();
  var edatum = $('#edatum1').val();
  var kosten = $('#kosten1').val();
  var omschrijving = $('#omschrijving1').val();
  var richting = $('#richting1').val();

  $.ajax({
      url: 'Edit-Taak.php',
      type: 'POST',
      data: {
      	'update': 1,
      	'id': e,
      	'name': name,
      	'bdatum': bdatum,
      	'edatum': edatum,
      	'kosten': kosten,
      	'omschrijving': omschrijving,
      	'richting': richting,
      
      },
      success: function(response){
      	location.reload();
      }
  	});		
}
</script>
</body>
</html>