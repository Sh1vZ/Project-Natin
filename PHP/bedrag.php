</html>
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
</body>
<div class=modal-header id="BedragModal" tabindex="-1" role="dialog" 
          aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span>
                </button>
              </div>
              <div class="modal-body">
             <form action="" method="POST" style="margin:0 auto">
                      <div class="row">
                        <div class="col-md-12">
                          <div class="form-group">
                          <label for="pwd">Bedrag:</label>
                            <input type="number" class="form-control" id="bedrag" name="bedrag"
                              placeholder="">
                              </form>
                         

                          <div class="modal-footer">
                    <button type="submit" name="Close" class="btn btn-secondary" >Close</button>
                    <button type="submit" name="submitBedrag" class="btn btn-primary">Submit</button>
                   
                  </div>
                </div>
            </div>
          </div>
              </div>
            </div>
          </div>
    </div>

<?php
 include "dbConn.php";

if (isset($_POST['submitBedrag'])) {
    $idd=$_GET["idd"];
    $idb=$_GET["idb"];
    $id=$_GET["id"];
    $idt=$_GET["idt"];
    $bedrag= mysqli_real_escape_string($conn,$_POST['bedrag']);
   
           $sql = "UPDATE bestedingen SET `Bedrag`=$bedrag where bID=$idb";
           $result = mysqli_query($conn, $sql);
           if($result){
            echo"<script> window.location ='registratie-bestedingen.php?id=$id&idt=$idt'</script>";
          }    
   } 

   if (isset($_POST['Close'])) {
    $idd=$_GET["idd"];
    $idb=$_GET["idb"];
    $id=$_GET["id"];
    $idt=$_GET["idt"];
    header("Location:registratie-bestedingen.php?id=$id&idt=$idt");}
   ?>



    </body>
       </html>