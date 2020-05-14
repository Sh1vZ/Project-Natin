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
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
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
          <i class="fas fa-tasks"></i>
          <span>Dashboard</span></a>
      </li>
      <hr class="sidebar-divider my-0">
      <li class="nav-item active">
        <a class="nav-link" href="../administratie.php">
          <i class="fas fa-tasks"></i>
          <span>Registreer Projecten</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../administratie-personen.php">
          <i class="fas fa-user-friends"></i>
          <span>Registreer Personen</span></a>
      </li>
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
          <!-- Topbar Search -->
          <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
            <div class="input-group">
              <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
              <div class="input-group-append">
                <button class="btn btn-primary" type="button">
                  <i class="fas fa-search fa-sm"></i>
                </button>
              </div>
            </div>
          </form>
          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">
            <!-- Nav Item - Search Dropdown (Visible Only XS) -->
            <li class="nav-item dropdown no-arrow d-sm-none">
              <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-search fa-fw"></i>
              </a>
              <!-- Dropdown - Messages -->
              <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                <form class="form-inline mr-auto w-100 navbar-search">
                  <div class="input-group">
                    <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
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
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= $_SESSION['name'] ?></span>
                <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="#">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Profiel
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
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
          $id = $_GET["id"];
          $sql = "SELECT * FROM project WHERE ID=$id";
          $res = mysqli_query($conn, $sql);
          if (mysqli_num_rows($res) > 0) {
            while ($row = mysqli_fetch_assoc($res)) {
              $naam = $row['Naam'];
              $omschr = $row["Omschrijving"];
              $begind = $row["BeginDatum"];
              $eindd = $row["EindDatum"];
              $status = $row["Status"];
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
              echo "<p class='card-text'>  $omschr</p>";
              echo "  <table>
 <tr>
 <td>Begin Datum: </td>
     <td>$begind</td>
 </tr>
 <tr>
 <td>Eind Datum: </td>
    <td>$eindd</td>
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

          if ($_SESSION['role'] == 'Administratie') {
          ?>
            <button class="circle" id="modalActivate" type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModalPreview">
              <img id="addSign" src="https://ssl.gstatic.com/bt/C3341AA7A1A076756462EE2E5CD71C11/2x/btw_ic_speeddial_white_24dp_2x.png" alt="" />
            </button>
          <?php
          }
          ?>
        </div>

        <!-- Modal -->
        <div class="modal fade top" id="exampleModalPreview" tabindex="-1" role="dialog" aria-labelledby="exampleModalPreviewLabel" aria-hidden="true">
          <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalPreviewLabel">Registreer Project</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">

                <form action="" id="submit" name="form" method="POST" style="width:60vw; margin:0 auto">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label for="pwd">Taak Naam:</label>
                        <input type="text" id="naam" class="form-control" name="taak-naam" placeholder="" required>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="pwd">Begin Datum:</label>
                        <input type="date" id="bdatum" class="form-control" name="datum-begin" placeholder="Begin Datum" required>
                      </div>
                    </div>
                    <div class="col-md-6 mb-2">
                      <div class="form-group">
                        <label for="pwd">Eind Datum:</label>
                        <input type="date" id="edatum" class="form-control" name="datum-eind" placeholder="Begin Datum" required>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label for="pwd">Richting:</label>
                        <select class="form-control fstdropdown-select" id="richting" name="richting">
                          <option value="" disabled selected>Select your option</option>
                          <?php
                          $sql = "SELECT * FROM richting where Richting != 'Other'";
                          $result = mysqli_query($conn, $sql);
                          while ($row = mysqli_fetch_assoc($result)) {
                            echo "<option value='" . $row['ID'] . "'>" . $row['Richting'] . "</option>";
                          }
                          ?>
                        </select>
                        <script>
                          $('.select2').select2();
                        </script>
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
                        <textarea class="form-control" id="omschrijving" name="omschrijving" placeholder="Voer in..." rows="3"></textarea>
                      </div>
                    </div>
                  </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" onclick="submitForm()" name="submit1" class="btn btn-primary">Submit</button>
                </form>
              </div>
            </div>
          </div>
        </div>
        <!-- Modal -->


        <!-- CARDS -->
        <div class='container-fluid cont'>
          <div class='card-body'>
            <div class='row' id="data">
              <?php
              $id = $_GET["id"];
              $sql = "SELECT * FROM taak WHERE ProjectID=$id";
              $res = mysqli_query($conn, $sql);
              if (mysqli_num_rows($res) > 0) {
                while ($row = mysqli_fetch_assoc($res)) {
                  $naam = $row["Naam"];
                  $omschrijving = $row["Omschrijving"];
                  $begind = $row["BeginDatum"];
                  $eindd = $row["EindDatum"];
                  $status = $row["Status"];
                  $idt = $row["ID"];
                  $kosten = $row["GeschatteKosten"];
                  $Wkosten = $row["WerkelijkeKosten"];


                  $sql1 = "SELECT taak.ID , COUNT(bestedingen.TaakID) as aant
FROM bestedingen
left join taak on  bestedingen.TaakID = taak.ID
 WHERE TaakID =$idt";
                  $res1 = mysqli_query($conn, $sql1);
                  $row1 = mysqli_fetch_assoc($res1);
                  $aant = $row1["aant"];

                  echo "  
<div class='col-md-6'>
<div class='card1 green'>
    <div class='additional'>
      <div class='user-card'>";
                  // if($status=="Niet Compleet"){
                  echo "<a class='link' href='registratie-bestedingen.php?id=$id&idt=$idt'><button class='icon'><i class='fas fa-edit'></i></button></a>";
                  // }else{

                  echo "
      <i class='fas fa-info-circle icon1'></i>
      </div>
      <div class='more-info'>
        <h1>$naam</h1>
        <div class='morefo'>
        <table>
        <tr>
        <td>Begin Datum: </td>
            <td> $begind</td>
        </tr>
        <tr>
        <td>Eind Datum: </td>
           <td> $eindd</td>
        </tr>
        <tr>
        <td>Aantal Bestedingen: </td>
           <td> $aant</td>
        </tr>  
        <tr>
        <td>GeschatteKosten: </td>
           <td> SRD $kosten</td>
        </tr> ";

                  if ($_SESSION['role'] == 'Financieel') {
                    echo " <tr>
                      <td>Werkelijke kosten: </td>
                         <td> $Wkosten</td>
                      </tr> ";
                  }
                  echo "
        <tr>
        <td>Status: </td>
           <td> $status</td>
        </tr>  
    </table>
        </div>
      </div>
    </div>
    <div class='general'>
      <h1>$naam</h1>
      <p class'txt'> $omschrijving </p>
      <span class='more'>Hover voor meer info</span>
    </div>
  </div>
</div>
";
                }
              }

              ?>
            </div>
          </div>
        </div>
        <!-- <script>
function submitForm() {
  // $('form[name="form"]').submit();
  // $('input[type="text"], textarea').val('');
  document.submit.reset();
  
}
 </script> -->
      </div>
      <?php
      if (isset($_POST["submit1"])) {
        $taaknaam = $_POST["taak-naam"];
        $begind = $_POST["datum-begin"];
        $eindd = $_POST["datum-eind"];
        $omschrijving = $_POST["omschrijving"];
        $richt = $_POST["richting"];
        $kosten = $_POST["geschatte-kosten"];
        // $leider=$_POST["taak-leider"];
        $id = $_GET["id"];

        if (empty($taaknaam) || empty($begind) || empty($eindd) || empty($omschrijving)) {
          header("Location:./view-projecten.php?error=emptyfields");
          exit();
        } else {
          $sql  = "INSERT INTO taak (ProjectID,RichtingID,Naam,Omschrijving,BeginDatum,EindDatum,GeschatteKosten) VALUES(?,?,?,?,?,?,?)";
          $sql1 = mysqli_query($conn, "SELECT * FROM richting WHERE (Richting)='Other'");
          $row = mysqli_fetch_assoc($sql1);
          $idr = $row['ID'];
          $stmt = mysqli_stmt_init($conn);
          if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location:./view-projecten.php?error=sqlerror");
            exit();
          } else {
            if (empty($richt)) {
              mysqli_stmt_bind_param($stmt, "iissssi", $id, $idr, $taaknaam, $omschrijving, $begind, $eindd, $kosten);
              mysqli_stmt_execute($stmt);
              echo "<script> window.location = 'view-projecten.php?id=$id'</script>";
            } else {
              mysqli_stmt_bind_param($stmt, "iissssi", $id, $richt, $taaknaam, $omschrijving, $begind, $eindd, $kosten);
              mysqli_stmt_execute($stmt);
              echo "<script> window.location = 'view-projecten.php?id=$id'</script>";
            }
          }
          mysqli_stmt_close($stmt);
        }
      }
      ?>

      <!-- <script>
        jQuery( document ).ready(function() {
            jQuery('#submit').submit(function(e){
                e.preventDefault();
                jQuery.ajax({
                    url: e.currentTarget.action,
                    data:{
                        naam: jQuery('#naam').val(),
                        bdatum: jQuery('#bdatum').val(),
                        edatum: jQuery('#edatum').val(),
                        richting: jQuery('#richting').val(),
                        kosten: jQuery('#kosten').val(),
                        omschrijving: jQuery('#omschrijving').val(),
                    }
                }).done(function(data){
                    jQuery('#data').append(data);
                    // document.getElementById("$submit").reset(); 
                    // document.location.reload();
                });
            });
        });
    </script> -->
    </div>
    <!-- /.container-fluid -->
  </div>
  <!-- End of Main Content -->
  <!-- Footer -->
  <footer class="sticky-footer bg-gradient-primary">
    <div class="container my-auto">
      <div class="copyright text-center my-auto">
        <span>Copyright &copy; 2019</span>
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
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="./logout.php">Uitloggen</a>
        </div>
      </div>
    </div>
  </div>
  <!-- Bootstrap core JavaScript-->
  <script src="../vendor/jquery/jquery.min.js"></script>
  <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- Custom scripts for all pages-->
  <script src="../js/sb-admin-2.min.js"></script>
</body>

</html>