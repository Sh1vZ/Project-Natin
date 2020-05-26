<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Natin-AFA | Personen</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" />

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./css/dashboard.css">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
</head>
<?php
include "./PHP/dbConn.php";
session_start();

?>

<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">
        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
                <div class="sidebar-brand-icon ">
                    <img src="./img/natin.png" alt="" style="width:60px;">
                </div>
                <div class="sidebar-brand-text mx-3">AFA</div>
            </a>
            <!-- Divider -->
            <hr class="sidebar-divider my-0">
            <!-- Nav Item - Dashboard -->
            <li class="nav-item ">
                <a class="nav-link" href="home.php">
                    <i class="fas fa-tachometer-alt"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <!-- Divider -->
            <hr class="sidebar-divider my-0">
            <!--Nav Item - Projecten-->
            <li class="nav-item">
                <a class="nav-link" href="administratie.php">
                    <i class="fas fa-file-medical"></i>
                    <?php
                    if ($_SESSION['role'] == 'Administratie' or $_SESSION['role'] == 'Beheerder') {
                    ?>
                        <span>Registreer Projecten</span></a>
            <?php
                    } else {
            ?>
                <span>Overzicht Projecten</span></a>
            <?php
                    }
            ?>
            </li>
            <!--Nav Item - Personen-->
            <?php
            if ($_SESSION['role'] == 'Administratie' or $_SESSION['role'] == 'Beheerder') {
            ?>
                <li class="nav-item active">
                    <a class="nav-link" href="administratie-personen.php">
                        <i class="fas fa-user-plus"></i>
                        <span>Registreer Personen</span>
                    </a>
                </li>
            <?php
            }
            ?>
            <!--Nav Item - Gebruikers-->
            <?php
            if ($_SESSION['role'] == 'Beheerder') {
            ?>
                <li class="nav-item">
                    <a class="nav-link" href="Gebruikers.php">
                        <i class="fas fa-user-edit"></i>
                        <span>Registreer Gebruikers</span>
                    </a>
                </li>
            <?php
            }
            ?>
            <!--Nav Items - END-->
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
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-success" type="button">
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
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"> <?= $_SESSION['name']; ?>
                                </span>
                                <i class="fas fa-user-circle fa-3x fa-sm fa-fw mr-2 text-gray-400"></i>
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
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
                </div>

                <div id="addBtn" class="wrapper">
                    <button class="circle button" id="modalActivate" type="button" data-toggle="modal" onclick=foo() data-target="#exampleModalPreview">
                        <img id="addSign" src="https://ssl.gstatic.com/bt/C3341AA7A1A076756462EE2E5CD71C11/2x/btw_ic_speeddial_white_24dp_2x.png" alt="" />
                    </button>
                </div>

                <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                <a class="btn btn-primary" href="./PHP/logout.php">Uitloggen</a>
                            </div>
                        </div>
                    </div>
                </div>


                <!-- Modal -->
                <div class="modal fade top" id="exampleModalPreview" tabindex="-1" role="dialog" aria-labelledby="exampleModalPreviewLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalPreviewLabel">Registreer Organisaties / Natin
                                </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <ul class="nav nav-tabs" id="tabContent">
                                <li class="active"><a class="active" id='an' href="#details" data-toggle="tab">Registreer Natin </a></li>
                                <li><a href="#access-security" id='ag' data-toggle="tab">Registreer Organisaties</a>
                                </li>
                            </ul>

                            <div class="tab-content">
                                <div class="tab-pane active " id="details">
                                    <div class="modal-body">
                                        <form action="./PHP/registratie-studenten.php" id='stud' method="POST" style="width:60vw; margin:0 auto">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="pwd">Voornaam</label>
                                                        <input type="text" id='vnaam' class="form-control" name="vnaam" placeholder="" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 mb-2">
                                                    <div class="form-group">
                                                        <label for="pwd">Achternaam</label>
                                                        <input type="text" id='anaam' class="form-control" name="anaam" placeholder="" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="pwd">Organisatie</label>
                                                        <input type="text" id='org' class="form-control" name="organisatie" placeholder="Natin" readonly>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12 mb-2">
                                                    <div class="form-group">
                                                        <label for="pwd">Richting <span id="user-availability-status"></span> </label>
                                                        <div id="richting2" style="color:red;"></div>
                                                        <input type="text" id='richting' list="richting1" onBlur="checkAvailability()" class="form-control" id="richting" name="richting" required>
                                                        <datalist id="richting1" style="width: 100px;" required>
                                                            <?php
                                                            $sql    = "SELECT * FROM richting where Richting != 'Other'";
                                                            $result = mysqli_query($conn, $sql);
                                                            while ($row = mysqli_fetch_assoc($result)) {
                                                                echo "<option value='" . $row['ID'] . " " . "($row[Richting])'>" . $row['Richting'] . "</option>";
                                                            }
                                                            ?>
                                                        </datalist>
                                                    </div>
                                                </div>
                                            </div>
                                            <script>
                                                function checkAvailability() {
                                                    jQuery.ajax({
                                                        url: "./PHP/available-richting.php",
                                                        data: 'richting=' + $("#richting").val(),
                                                        type: "POST",
                                                        success: function(data) {
                                                            $("#user-availability-status").html(data);

                                                        },
                                                        error: function() {}
                                                    });
                                                }
                                            </script>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="pwd">Functie</label>
                                                        <input type="text" id='func' class="form-control" name="functie" placeholder="" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="pwd">Telefoon Nummer</label>
                                                        <input type="text" id='telnumm' class="form-control" name="telnumm" placeholder="" required>
                                                        <input type="hidden" name="sid" id="sid">
                                                    </div>
                                                </div>
                                            </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="submit" id="edit-stud" name="submit" class="btn btn-success">Submit</button>
                                        </form>
                                    </div>
                                </div>
                                <!-- ORGANISATIE -->
                                <div class="tab-pane fade" id="access-security">
                                    <div class="modal-body">
                                        <form action="./PHP/registratie-studenten.php" id='stud1' method="POST" style="width:60vw; margin:0 auto">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="pwd">Voornaam</label>
                                                        <input type="text" id='vnaamo' class="form-control" name="vnaam" placeholder="" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 mb-2">
                                                    <div class="form-group">
                                                        <label for="pwd">Achternaam</label>
                                                        <input type="text" id='anaamo' class="form-control" name="anaam" placeholder="" required>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="pwd">Organisatie: <span id="user-availability-status-orga"></span></label>
                                                        <div id="organisatie2" style="color:red;"></div>
                                                        <input type="text" id='organisatie' list="organisatie1" onBlur="checkAvailabilityorga()" class="form-control" name="organisatie" required>
                                                        <datalist id="organisatie1" style="width: 100px;" required>
                                                            <?php
                                                            $sql    = "SELECT * FROM organisatie";
                                                            $result = mysqli_query($conn, $sql);
                                                            while ($row = mysqli_fetch_assoc($result)) {
                                                                echo "<option value='" . $row['ID'] . " " . "($row[Naam])'>" . $row['Naam'] . "</option>";
                                                            }
                                                            ?>
                                                        </datalist>
                                                    </div>
                                                </div>
                                            </div>
                                            <script>
                                                function checkAvailabilityorga() {
                                                    jQuery.ajax({
                                                        url: "./PHP/available-organisatie.php",
                                                        data: 'organisatie=' + $("#organisatie").val(),
                                                        type: "POST",
                                                        success: function(data) {
                                                            $("#user-availability-status-orga").html(data);

                                                        },
                                                        error: function() {}
                                                    });
                                                }
                                            </script>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="pwd">Functie</label>
                                                        <input type="text" id='funco' class="form-control" name="functie" placeholder="" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="pwd">Telefoon Nummer</label>
                                                        <input type="text" class="form-control" name="telnumm" placeholder="" id='telnummo' required>
                                                        <input type="hidden" name="oid" id="oid">
                                                    </div>
                                                </div>
                                            </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="submit" id='edit-org' name="submit-org" class="btn btn-success">Submit</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Modal -->





                <div class='container-fluid'>
                    <div class='card shadow mb-4'>

                        <div class='card-body'>
                            <h1 class="h3 mb-4 text-gray-800 center">Registreer Personen</h1>
                            <div class='table-responsive-xl'>
                                <table class='table table-striped table-hover data1'>
                                    <thead>
                                        <tr id="firstrow">
                                            <th scope='col'>#</th>
                                            <th scope='col'>Achternaam</th>
                                            <th scope='col'>Voornaam</th>
                                            <th scope='col'>Organisatie</th>
                                            <th scope='col'>Richting</th>
                                            <th scope='col'>Functie</th>
                                            <th scope='col'>Telefoon Nummer</th>
                                            <th scope='col'>Meer opties</th>
                                            <!-- <th scope='col'>Actions</th> -->
                                        </tr>
                                    </thead>

                                    <?php
                                    $stmt = "SELECT personen.ID, personen.Achternaam, personen.Voornaam, organisatie.Naam, richting.richting, personen.Functie, personen.Telnummer
FROM personen
left JOIN organisatie ON personen.OrganisatieID = organisatie.ID
left JOIN richting ON personen.RichtingID = richting.ID ORDER BY personen.ID  DESC";
                                    $res = mysqli_query($conn, $stmt);

                                    if (mysqli_num_rows($res) > 0) {
                                        $i = 1;
                                        while ($row = mysqli_fetch_assoc($res)) {
                                            $anaam    = $row['Achternaam'];
                                            $vnaam    = $row['Voornaam'];
                                            $org      = $row['Naam'];
                                            $richting = $row['richting'];
                                            $fucntie  = $row["Functie"];
                                            $telnum   = $row["Telnummer"];
                                            // $leider=$row[""];
                                            // $taak=$row[""];
                                            if (empty($richting)) {
                                                $richting = '-';
                                            }
                                            $id = $row["ID"];
                                            $a  = $i++;

                                            echo "
                <tr id=$id>
                    <td>$a</td>
                    <td data-target='naam'>$anaam</td>
                    <td data-target='vnaam'>$vnaam</td>
                    <td data-target='org'>$org</td>
                    <td data-target='richting'>$richting</td>
                    <td data-target='functie'>$fucntie</td>
                    <td data-target='telnum'>$telnum</td>
                    <td>
                        <a class='link' id='dropdownMenuButton' data-toggle='dropdown' href=''><i class='fas fa-ellipsis-h sa1 ' ></i></a>
                        <div class=' a dropdown-menu' aria-labelledby='dropdownMenuButton'>
                            <a class='dropdown-item' onclick=EditRow($id) href='#' data-role='update' >Bewerken<i class='fas fa-edit sa'></i></a>
            ";
                                            if ($_SESSION['role'] == 'Beheerder') {
                                                echo "
                                        <a class='dropdown-item' href='#' onclick=DeletePersoon($id) >Verwijderen<i class='fas fa-trash-alt sa'></i></a>
                                    ";
                                            } else {
                                            }
                                            echo "   
                        </div>   
                    </td>
                </tr>
             ";
                                        }
                                    } else {
                                    }


                                    ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                </table>

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

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>
    <script src="./js/functions.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
    <script src="./vendor/bootbox.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
</body>

</html>