<?php
include "dbConn.php";
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
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar"
      style="width: 0rem !important">
      <!-- Sidebar - Brand -->

      </li>

      <div id="addBtn" class="wrapper1">
        <button onclick="goBack()" class="circle button">
          <i id="addSign" class="fas fa-chevron-left fa-lg"></i>
        </button>
      </div>
      <script>
        function goBack() {
          window.location = 'registratie-bestedingen.php?id=<?php $id=$_GET["id"]; echo"$id";?>&idt=<?php $idt=$_GET["idt"]; echo"$idt";?>';
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
                <i class="fas fa-user-circle fa-3x fa-sm fa-fw mr-2 text-gray-400"></i>
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="#">
                  <i class="fas fa-user-circle fa-1x fa-sm fa-fw mr-2 text-gray-400"></i>
                  Profile
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-1x fa-sm fa-fw mr-2 text-gray-400"></i>
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
$idb=$_GET["idb"];
$sql="SELECT * FROM Bestedingen WHERE bID=$idb";
$res=mysqli_query($conn, $sql);
if (mysqli_num_rows($res)>0) {
    while ($row=mysqli_fetch_assoc($res)) {
        $Mat=$row['Materialen'];
        
        // echo "<h3 class='card-title center'>$naam</h5>";
      
       
    }
}
?>


          <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h3 class="m-0 font-weight-bold text-gray-900 center"><?php echo $Mat ?></h6>
                </div>
               
              </div>

              <div class='table-responsive-xl'>
                <table id="" class='table table-hover data1'>
                  <thead>
                    <tr>
                      <th>Bedrag</th>
                      <th>Inleverdatum</th>
                      <th>Foto</th>
                    </tr>
                  </thead>
                  <tbody>     


<?php
$idb=$_GET["idb"];
$sql="SELECT * FROM kwitantie WHERE BestedingenID=$idb";
$res=mysqli_query($conn,$sql);
if (mysqli_num_rows($res)>0) {
    while ($row = mysqli_fetch_assoc($res)) {

      $taaknaam=$row["WerkelijkeBedrag"];
      $InlDatum =$row["IngeleverdDatum"];
      $foto = $row["Foto"];
    
     
        echo " $taaknaam                  
        ";
        echo "  $InlDatum";
        echo '<img id="screen" src="data:image/jpg;base64,".base64_encode($foto)/>';
    }
        
                     
       
    }
?>
</tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
        </table>
          
                
                 
            
            <div id="addBtn" class="wrapper">
              <button class="circle" id="modalActivate" type="button" class="btn btn-danger" data-toggle="modal"
                data-target="#exampleModalPreview">
                <i id="addSign" class="fas fa-plus fa-lg"></i>
              </button>
            </div>
            <!-- Modal -->
            <div class="modal fade top" id="exampleModalPreview" tabindex="-1" role="dialog"
              aria-labelledby="exampleModalPreviewLabel" aria-hidden="true">
              <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalPreviewLabel">Registreer Kwitantie</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">

                   
                  <form action="" id="submit" name="form" method="POST" style="width:60vw; margin:0 auto">
                      <div class="row">
                        <div class="col-md-12">
                          <div class="form-group">
                            <label for="pwd">Werkelijk bedrag:</label>
                            <input type="number" id="bedrag" class="form-control" name="bedrag" placeholder="">
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="pwd">Inleverdatum:</label>
                            <input type="date" id="Idatum" class="form-control" name="Idatum"
                              placeholder="Begin Datum">
                          </div>
                        </div>
                    
                      <div class="row">
                        <div class="col-md-12">
                          <div class="form-group">
                            <label for="pwd">Foto:</label>
                            <input type="file" id="image" class="form-control" name="image"
                              placeholder="">
                          </div>
                        </div>
                      </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" onclick="submitForm()" name="submit1" class="btn btn-success">Submit</button>
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
                   
                $bedrag= mysqli_real_escape_string($conn,$_POST['bedrag']);
                $InlDatum = mysqli_real_escape_string($conn,$_POST['Idatum']);
                $foto = mysqli_real_escape_string($conn,$_POST['image']);
                $idb=$_GET["idb"];
                   

            
                       $sql = "INSERT INTO kwitantie (BestedingenID, WerkelijkeBedrag,IngeleverdDatum,Foto) VALUES ('$idb','$bedrag', '$InlDatum','$foto')";
                       $result = mysqli_query($conn, $sql);
                       if($result){
                         echo"<script> window.location ='view-kwitantie.php?idb=$idb'</script>";}
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
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-success" href="./logout.php">Logout</a>
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