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
  
      
                 
            
           
            <!-- Modal -->
            <div class="modal-header" id="exampleModalPreview" tabindex="-1" role="dialog"
              aria-labelledby="exampleModalPreviewLabel" aria-hidden="true">
              <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalPreviewLabel">Registreer Bedrag</h5>
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
                    <button type="submit" name="close" class="btn btn-secondary" >Close</button>
                    <button type="submit"  name="submit1" class="btn btn-primary">Submit</button>
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
            
          
          </div>
          <?php
               if (isset($_POST['submit1'])) {
                 
                $taaknaam= mysqli_real_escape_string($conn,$_POST['bedrag']);
                $InlDatum = mysqli_real_escape_string($conn,$_POST['Idatum']);
                $foto = mysqli_real_escape_string($conn,$_POST['image']);
                $idb=$_GET["idb"];
                   

            
                       $sql = "INSERT INTO kwitantie (BestedingenID, WerkelijkeBedrag,IngeleverdDatum,Foto) VALUES ('$idb','$taaknaam', '$InlDatum','$foto')";
                       if (!mysqli_query($conn,$sql)) { die('Error: ' . mysqli_error($conn)); }
              } 
              
              if (isset($_POST['close'])) {
               
                $id=$_GET["id"];
                $idt=$_GET["idt"];
                header("Location:registratie-bestedingen.php?id=$id&idt=$idt");}
?>
          
      
        
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