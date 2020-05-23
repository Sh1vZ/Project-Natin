<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Natin-AFA</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/css/bootstrap-select.min.css">
    <link rel="stylesheet" type="text/css"
        href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" />
    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./css/dashboard.css">
    <link rel="stylesheet" href="./vendor/dropdown/fstdropdown.css">
    <script src="./vendor/dropdown/fstdropdown.js"></script>
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
                    <span>Dashboard</span></a>
            </li>
            <hr class="sidebar-divider my-0">
            <li class="nav-item active">
                <a class="nav-link" href="">
                    <i class="fas fa-file-medical"></i>
                    <?php
if ($_SESSION['role'] == 'Administratie' or $_SESSION['role'] == 'Beheerder') {
    ?>

                    <span>Registreer Projecten</span></a>

                <?php
} else {
    ?>
                <span>Projecten</span></a>
                <?php }?>
            </li>
            <?php
if ($_SESSION['role'] == 'Administratie' or $_SESSION['role'] == 'Beheerder') {
    ?>
            <li class="nav-item">
                <a class="nav-link" href="administratie-personen.php">
                    <i class="fas fa-user-edit"></i>
                    <span>Registreer Personen</span></a>
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
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2">
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
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"> <?=$_SESSION['name'];?>
                                </span>
                                <i class="fas fa-user-circle fa-3x fa-sm fa-fw mr-2 text-gray-400"></i>
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
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
                </div>
                <?php
if ($_SESSION['role'] == 'Administratie' or $_SESSION['role'] == 'Beheerder') {
    ?>
                <div id="addBtn" class="wrapper">
                    <button class="circle button" id="modalActivate" type="button" onclick=foo() data-toggle="modal"
                        data-target="#exampleModalPreview">
                        <i id="addSign" class="fas fa-plus fa-lg"></i>

                    </button>
                </div>
                <?php
}
?>
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
                            <div class="modal-body">Select "Logout" below if you are ready to end your current session.
                            </div>
                            <div class="modal-footer">
                                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                <a class="btn btn-success" href="./PHP/logout.php">Logout</a>
                            </div>
                        </div>
                    </div>
                </div>

                

                <!-- Modal -->
                <div class="modal fade top" id="exampleModalPreview" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalPreviewLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalPreviewLabel">Registreer Project</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="./PHP/registratie-projecten.php" method="POST" id="form-admin"
                                    style="width:60vw; margin:0 auto">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="pwd">Project Naam:</label>
                                                <input type="text" id='naam' class="form-control" name="project-naam"
                                                    placeholder="" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="pwd">Begin Datum:</label>
                                                <input type="date" id='datum-begin' class="form-control"
                                                    name="datum-begin" placeholder="Begin Datum" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-2">
                                            <div class="form-group">
                                                <label for="pwd">Eind Datum:</label>
                                                <input type="date" id='datum-eind' class="form-control"
                                                    name="datum-eind" placeholder="Begin Datum" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="pwd">Project Leider:</label> <span style="color:red;"
                                                    id=ac></span>
                                                <select class="selectpicker form-control" title="Kies Leider"
                                                    data-live-search="true" name="project-leider">
                                                    <?php
$sql    = "SELECT * FROM personen";
$result = mysqli_query($conn, $sql);
while ($row = mysqli_fetch_assoc($result)) {
    echo "<option value='" . $row['ID'] . "'>" . $row['Voornaam'] . " " . $row['Achternaam'] . "</option>";
}
?>
                                                </select>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 mb-2">
                                            <div class="form-group">
                                                <label for="pwd">Project Omschrijving:</label>
                                                <textarea class="form-control" id="omschr" name="omschrijving"
                                                    placeholder="Voer in..." rows="3" required></textarea>
                                                <input type="hidden" name="pid" id="pid">
                                            </div>
                                        </div>
                                    </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" id="edite"  name="submit"
                                    class="btn btn-success">Submit</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Modal -->


                <!-- Modal -->
                <div class="modal fade top" id="exampleModalPreview1" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalPreviewLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalPreviewLabel">Edit </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body" id="detail">


                            </div>
                        </div>
                    </div>
                </div>

                <!-- Modal -->


                <div class='container-fluid'>

                    <div class='card shadow mb-4'>
                        <div class='card-body'>
                            <h1 class=" m-0 h3 mb-4 text-gray-800 center"><?php

if ($_SESSION['role'] == 'Administratie' or $_SESSION['role'] == 'Beheerder') {
    ?>Registreer projecten</h1> <?php } else {
    ?>
                            Projecten</h5></a>
                            <?php }?>
                            <div class='table-responsive-xl'>
                                <table id="tab" class='table table-hover table-striped data1'>
                                    <thead>
                                        <tr id="firstrow" class='tableRows'>
                                            <th>#</th>
                                            <th>Projectnaam</th>
                                            <th style="width:30%">Project Omschrijving</th>
                                            <th>Begin Datum</th>
                                            <th>Eind Datum</th>
                                            <th>Project Leider</th>
                                            <th>Project Status</th>
                                            <th>Acties</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
$stmt = "SELECT project.Naam,project.ID, project.Omschrijving, project.BeginDatum, project.EindDatum, personen.Achternaam, personen.Voornaam, project.Status
FROM project
left JOIN personen
ON project.ProjectleiderID = personen.ID ORDER BY project.ID DESC ";
$res = mysqli_query($conn, $stmt);

if (mysqli_num_rows($res) > 0) {
    $i = 1;
    while ($row = mysqli_fetch_assoc($res)) {
        $naam   = $row['Naam'];
        $omschr = $row["Omschrijving"];
        $begind = $row["BeginDatum"];
        $eindd  = $row["EindDatum"];
        $vnaam  = $row["Voornaam"];
        $anaam  = $row["Achternaam"];
        $status = $row["Status"];
        $id     = $row["ID"];
        $a      = $i++;

        echo "

                <tr id=$id>
                <td>$a</td>
                <td >$naam</td>
                <td>$omschr</td>
                <td>$begind</td>
                <td>$eindd</td>
                <td>$anaam $vnaam</td>
                <td class='" . (($status == "OPEN") ? "text-success" : "text-danger") . " font-weight-bold'>$status</td>
                <td>
                <a class='link' id='dropdownMenuButton' data-toggle='dropdown' href=''><i class='fas fa-ellipsis-h sa1 ' ></i></a>
                <div class=' a dropdown-menu  ' aria-labelledby='dropdownMenuButton'>
    <a class='dropdown-item' href='./PHP/view-projecten.php?id=$id'>View <i class='fas fa-eye sa'></i> </a>
    <a class='dropdown-item' onclick=EditRowProjecten($id) href='#'>Edit<i class='fas fa-edit sa'></i></a>
    <a class='dropdown-item delete' href='#'  data-id='$id' >Delete<i class='fas fa-trash-alt sa'></i></a>
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
    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>
    <script src="./js/functions.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/js/bootstrap-select.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
    <script src="vendor/bootbox.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <?php

if (isset($_GET['msg'])) {
    if ("success" == $_GET['msg']) {
        echo '<script> toastr.success("Succesvol Ingevoerd", "Bericht")
        </script>';
    }
    if ("update" == $_GET['msg']) {
        echo "<script> toastr.success('Succesvol Bijgewerkt', 'Bericht')
        </script>";
    }
}
?>
</body>

</html>