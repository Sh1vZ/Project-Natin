<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>AFAA | Materialen en Diensten </title>

  <!-- Custom fonts for this template-->
  <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link
    href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
    rel="stylesheet">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/css/bootstrap-select.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" />
  <!-- Custom styles for this template-->

  <link href="../css/sb-admin-2.min.css" rel="stylesheet">
  <link rel="stylesheet" href="../css/dashboard.css">
  <link rel="stylesheet" href="../vendor/bootstrap-select.css">
  <link rel="stylesheet" href="../vendor/dropdown/fstdropdown.css">
  <script src="../vendor/dropdown/fstdropdown.js"></script>

</head>
<?php
include "dbConn.php";
session_start();
?>

<body id="page-top">
  <!-- Page Wrapper -->
  <div id="wrapper">
    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar"
      style="width: 0rem !important">
      <!-- Sidebar - Brand -->

      </li>

      <div id="addBtn" class="wrapper1">
        <button onclick="goBack()" class="circle button">
          <i class="fas fa-chevron-left icon2"></i>
        </button>
      </div>
      <script>
        function goBack() {
          window.location = 'view-projecten.php?id=<?php $id=$_GET["id"]; echo"$id";?>';
        }
      </script>




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
                <span class="mr-2 d-none d-lg-inline text-gray-600 small"> <?=$_SESSION['name']?> </span>
                <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="#">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Profile
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
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
           include "dbConn.php";
           $idt=$_GET["idt"];
       
          $sql = "SELECT * FROM taak where ID=$idt";
          $result = mysqli_query($conn, $sql);
           while ($row = mysqli_fetch_assoc($result)) {
           $status=$row['Status'];   
         } if ($_SESSION['role'] == 'Administratie' or $_SESSION['role'] == 'Beheerder'){
         if($status=="Niet Compleet"){
           echo"<h1 class='h3 mb-4 text-gray-800'>Registreer Materialen / Diensten</h1>";
           echo"  <div id='addBtn' class='wrapper'>
           <button class='circle button' id='modalActivate' type='button' data-toggle='modal'
             data-target='#exampleModalPreview'>
             <img id='addSign'
               src='https://ssl.gstatic.com/bt/C3341AA7A1A076756462EE2E5CD71C11/2x/btw_ic_speeddial_white_24dp_2x.png'
               />
           </button>
         </div>";
         echo" <div id='addBtn' class='wrapper2'>
         <button class='circle button' id='modalActivate' type='button' data-toggle='modal'
           data-target='#finishModal'>
           <!-- <img id='addSign'
             src='https://ssl.gstatic.com/bt/C3341AA7A1A076756462EE2E5CD71C11/2x/btw_ic_speeddial_white_24dp_2x.png'
             /> -->
         </button>
       </div>";
         } else{
           echo " <div class='d-sm-flex align-items-center justify-content-between mb-4'>
           <h1 class='h3  text-gray-800'>Registreer Materialen / Diensten</h1>
           <a href='#' class='d-none d-sm-inline-block btn btn-md btn-success shadow-sm'><i class='fas fa-download fa-md text-white-50'></i> Compleet</a>
         </div>";
         }}

?>
        </div>

        <!-- FINISH-->
        <div class="modal fade" id="finishModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
          aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Taak registreren als Compleet?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span>
                </button>
              </div>
              <div class="modal-body">Select "Submit" below if you are ready to Mark as complete.</div>
              <form action="" method="POST">
              <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <button type="submit" name="submit-finish" class="btn btn-primary">Submit</button>
             </form>
              </div>
            </div>
          </div>
        </div>


        <!-- Logout Modal-->
        <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
          aria-hidden="true">
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
                <a class="btn btn-primary" href="logout.php">Logout</a>
              </div>
            </div>
          </div>
        </div>
         <!--- invoer bedrag modal --->
        <div class="modal fade top" id="BedragModal" tabindex="-1" role="dialog" 
          aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span>
                </button>
              </div>
              <div class="modal-body">
             <form action="" method="POST" style="width:; margin:0 auto">
                      <div class="row">
                        <div class="col-md-12">
                          <div class="form-group">
                          <label for="pwd">Bedrag:</label>
                            <input type="number" class="form-control" id="bedrag" name="bedrag"
                              placeholder="">
                              </form>
                         

                          <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" name="submitBedrag" class="btn btn-primary" chk=<?php $idt ?>>Submit</button>
                   
                  </div>
                </div>
            </div>
          </div>
              </div>
            </div>
          </div>
    </div>
       

<!--- kwitantie vraag modal
        <div class="modal fade top" id="vraagModal" tabindex="-1" role="dialog" 
          aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
              
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span>
                </button>
              </div>
              <div class="modal-body">
              <a class="btn btn-secondary"  href="registratie-Wkosten.php">Wel kwitantie</a>
                <a class="btn btn-primary" id='modalActivate' type='button' data-toggle='modal'
             data-target='#BedragModal' data-dismiss="modal">Geen kwitantie</a>
              </div>
            </div>
          </div>
        </div>
--->
       


        <!-- Modal -->
        <div class="modal fade top" id="exampleModalPreview" tabindex="-1" role="dialog"
          aria-labelledby="exampleModalPreviewLabel" aria-hidden="true">
          <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalPreviewLabel">Registreer </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <ul class="nav nav-tabs" id="tabContent">
                <li class="active"><a class="active" href="#details" data-toggle="tab">Registreer Diensten </a></li>
                <li><a href="#access-security" data-toggle="tab">Registreer Materialen</a></li>
              </ul>

              <div class="tab-content">
                <div class="tab-pane active " id="details">
                  <div class="modal-body">
                    <form action="" method="POST" style="width:; margin:0 auto">
                      <div class="row">
                        <div class="col-md-12">
                          <div class="form-group">
                            <label for="pwd">Diensten:</label>
                            <select class="selectpicker form-control" data-live-search="true" title="Kies uit diensten"
                              name="diensten">
                              <?php
                             $sql = "SELECT * FROM personen";
                             $result = mysqli_query($conn, $sql);
                              while ($row = mysqli_fetch_assoc($result)) {
                              echo "<option value='".$row['ID'] ."'>" . $row['Voornaam']." ". $row['Achternaam']."</option>";   
                            }
                     ?>
                            </select>
                            <script>
                              $(document).ready(function () {
                                $('.selectpicker').selectpicker();
                              })
                            </script>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-12">
                          <div class="form-group">
                            <label for="pwd">Facatuur:</label>
                            <select name="factuur" class="form-control" id="">
                              <option value="Verekenbaar">Verekenbaar</option>
                              <option value="Niet Verekenbaar">Niet Verekenbaar</option>
                            </select>
                          </div>
                        </div>

                      </div>

                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                    </form>
                  </div>
                </div>
                <!-- ORGANISATIE -->
                <div class="tab-pane fade" id="access-security">
                  <div class="modal-body">
                    <form action="" method="POST" style="width:; margin:0 auto">

                      <div class="row">
                        <div class="col-md-12">
                          <label for="pwd">Facatuur:</label>
                          <select name="factuur" class="form-control" id="">
                            <option value="Verekenbaar">Verekenbaar</option>
                            <option value="Niet Verekenbaar">Niet Verekenbaar</option>
                          </select>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-12 mb-2">
                          <div class="form-group">
                            <label for="pwd">Materialen:</label>
                            <textarea class="form-control" name="materialen" placeholder="Voer in..." rows="3"
                              required></textarea>
                          </div>
                        </div>
                      </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" name="submit-materialen" class="btn btn-primary">Submit</button>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        

        <!-- Modal -->



        <?php




if (isset($_POST["submit"])) {
  $diensten=$_POST["diensten"];
  $fac=$_POST["factuur"];
  $id=$_GET["id"];
  $idt=$_GET["idt"];
  $idt=$_GET["idt"];

  if (empty($diensten) || empty($fac)) {
      header("Location:registratie-bestedingen.php?error=emptyfields");
      exit();
  } else {
      $sql  = "INSERT INTO bestedingen (TaakID,DienstenID,Factuurtype) VALUES(?,?,?)";
      $stmt = mysqli_stmt_init($conn);
      if (!mysqli_stmt_prepare($stmt, $sql)) {
          header("Location:registratie-bestedingen.php?error=sqlerror");
          exit();
      } else {
          mysqli_stmt_bind_param($stmt, "iis", $idt, $diensten, $fac);
          mysqli_stmt_execute($stmt);
          echo"<script> window.location = 'registratie-bestedingen.php?id=$id&idt=$idt'</script>";
      }
      
      mysqli_stmt_close($stmt);
      
  }
  
}


if (isset($_POST["submit-materialen"])) {
  $mat=$_POST["materialen"];
  $fac=$_POST["factuur"];
  $id=$_GET["id"];
  $idt=$_GET["idt"];


  if (empty($mat) || empty($fac)) {
      header("Location:registratie-bestedingen.php?error=emptyfields");
      exit();
  } else {
      $sql  = "INSERT INTO bestedingen (TaakID,Materialen,Factuurtype) VALUES(?,?,?)";
      $stmt = mysqli_stmt_init($conn);
      if (!mysqli_stmt_prepare($stmt, $sql)) {
          header("Location:registratie-bestedingen.php?error=sqlerror");
          exit();
      } else {
          mysqli_stmt_bind_param($stmt, "iss", $idt, $mat, $fac);
          mysqli_stmt_execute($stmt);
          echo"<script> window.location = 'registratie-bestedingen.php?id=$id&idt=$idt'</script>";
      }
      
      mysqli_stmt_close($stmt);
      
  }
}


if (isset($_POST["submit-finish"])) {
  
$sql="UPDATE taak SET `Status`='Compleet' WHERE ID=$idt";
$result = mysqli_query($conn, $sql);
if($result){
  echo"<script> window.location = 'registratie-bestedingen.php?id=$id&idt=$idt'</script>";
}

}


?>


        <div class="container-fluid">
          <div class="row">
            <div class="col-md-6">
              <div class='card shadow mb-4'>
                <div class="card-body">
                  <h1 class="h4 mb-2 text-gray-800 center">Diensten</h1>
                  <div class='table-responsive-xl'>
                    <table class='table data1 table-hover'>
                      <thead>
                        <tr>
                        <?php if($_SESSION['role'] == 'Financieel' or $_SESSION['role'] == 'Beheerder') { echo"<th scope='col'>Edit</th>";}
                                                                    else{ echo" ";}?>
                          <th scope='col'>#</th>
                          <th scope='col'>Diensten</th>
                          <th scope='col'>Organisatie</th>
                          <th scope='col'>Facatuurtype</th>
                          <?php
                          if($_SESSION['role'] == 'Financieel' or $_SESSION['role'] == 'Beheerder') { echo"<th scope='col'>Bedrag</th>";}else{ echo" ";}
                         ?> 

                          <!-- <th scope='col'>Actions</th> -->
                        </tr>
                      </thead>

                      <?php

                      
                                   
$stmt="SELECT taak.Naam, bestedingen.Materialen,bestedingen.Bedrag, bestedingen.bID, bestedingen.DienstenID, personen.Achternaam, personen.Voornaam, organisatie.Naam , bestedingen.Factuurtype
from bestedingen 
left join taak on bestedingen.TaakID = taak.ID
left join personen on bestedingen.DienstenID = personen.ID
left join organisatie on personen.OrganisatieID = organisatie.ID
where TaakID=$idt AND  DienstenID IS NOT NULL";
$res=mysqli_query($conn, $stmt);

if (mysqli_num_rows($res)>0) {
    $i = 1;
    while ($row=mysqli_fetch_assoc($res)) {
      $anaam=$row["Achternaam"];
      $vnaam=$row["Voornaam"];
      $org=$row["Naam"];
      $facu=$row["Factuurtype"];
      $bedragr=$row["Bedrag"];
      $idb=$row["bID"];
      $idd=$row["DienstenID"];
      $id=$_GET["id"];
      $idt=$_GET["idt"];
     
     
        // $leider=$row[""];
        // $taak=$row[""];
        
        $a=$i++;
     
        echo "
        <tr>";
        if($_SESSION['role'] == 'Financieel' and $facu == 'Verekenbaar'or $_SESSION['role'] == 'Beheerder' and $facu == 'Verekenbaar'){
          echo" <td> <a href='bedrag.php?idd=$idd&idb=$idb&id=$id&idt=$idt'>Zet bedrag</a></td>";}
          else{ echo"<td></td>  ";}
               echo "<td>$a</td>          
                <td>$anaam $vnaam </td>
                <td>$org</td>
                <td>$facu</td>";
                if($_SESSION['role'] == 'Financieel' or $_SESSION['role'] == 'Beheerder'){
                  echo"<td>$bedragr</td>"; } 
                echo" </tr>"; 
                   
      
                  }

              
    
} else {
   
}

?>
                    </table>
                  </div>
                </div>
              </div>
            </div>
            
            <div class="col-md-6">
              <div class='card shadow mb-4'>
                <div class='card-body'>
                  <h1 class="h4 mb-2 text-gray-800 center">Materialen</h1>
                  <div class='table-responsive-xl'>
                    <table class='table data1 table-hover'>
                      <thead>
                        <tr>
                        <?php if($_SESSION['role'] == 'Financieel' or $_SESSION['role'] == 'Beheerder') { echo"<th scope='col'>Edit</th>";}
                                                                    else{ echo" ";}?>
                          <th scope='col'>#</th>
                          <th scope='col'>Materialen</th>
                          <th scope='col'>Facatuurtype</th>
                     <?php if($_SESSION['role'] == 'Financieel' or $_SESSION['role'] == 'Beheerder'){
                           echo"<th scope='col'>Bedrag</th>";}else{ echo" ";}
                           if($_SESSION['role'] == 'Financieel' or $_SESSION['role'] == 'Beheerder'){
                           echo" <th scope='col'>Kwitantie</th>"; } else{ echo"";}?>
                           

                          <!-- <th scope='col'>Actions</th> -->
                        </tr>
                      </thead>

                      <?php
                      $idt=$_GET["idt"];
                      $bedragr=$row["Bedrag"];
      
     
                                   
$stmt="SELECT Materialen,Factuurtype, bID, Bedrag from bestedingen where TaakID =$idt and Materialen IS NOT NULL";
$res=mysqli_query($conn, $stmt);

if (mysqli_num_rows($res)>0) {
    $i = 1;
    while ($row=mysqli_fetch_assoc($res)) {
      $mat=$row["Materialen"];
      $facu=$row["Factuurtype"];
      $bedragr=$row["Bedrag"];
      $idb=$row["bID"];
      $idb=$row["bID"];
      $id=$_GET["id"];
      $idt=$_GET["idt"];
     
        // $leider=$row[""];
        // $taak=$row[""];
        
        $a=$i++;
     
        echo "
        <tr>";
        if($_SESSION['role'] == 'Financieel' and $facu == 'Verekenbaar'or $_SESSION['role'] == 'Beheerder' and $facu == 'Verekenbaar') {
          echo" <td> <a href='bedrag.php?idb=$idb&id=$id&idt=$idt'>Zet bedrag</a></td>";}
          else{ echo"<td></td> ";}
               echo "<td>$a</td>          
                <td>$mat</td>
                <td>$facu</td>
                "; if($_SESSION['role'] == 'Financieel' and $facu == 'Verekenbaar'or $_SESSION['role'] == 'Beheerder' and $facu == 'Verekenbaar') {
                  echo"<td>$bedragr</td>";
                  echo" <td> <a href='view-kwitantie.php?idb=$idb&id=$id&idt=$idt'>kwitantie</a></td>";
                   } else{ echo" ";}
               
               
                echo" </tr>"; 
    
} } 



?>
                    </table>
                  </div>
                </div>
              </div>
            </div>        
          </div>
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

  <!-- Bootstrap core JavaScript-->

  <!-- Custom scripts for all pages-->
  <script src="../vendor/jquery/jquery.min.js"></script>
  <script src="../js/sb-admin-2.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/js/bootstrap-select.min.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
  <script>
    $(document).ready(function () {
      $('.data1').DataTable({

      });
    });
  </script>
</body>

</html>