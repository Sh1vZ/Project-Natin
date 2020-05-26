<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Natin-AFA | Dashboard</title>

    <!-- Custom fonts for this template-->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/css/bootstrap-select.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.css">
    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./css/dashboard.css">
    <link rel="stylesheet" href="./vendor/dropdown/fstdropdown.css">
    <script src="./vendor/dropdown/fstdropdown.js"></script>

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
                <div class="sidebar-brand-text mx-3"> AFA </div>
            </a>
            <!-- Divider -->
            <hr class="sidebar-divider my-0">
            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
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
                <li class="nav-item">
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
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"> <?= $_SESSION['name']; ?>
                                </span>
                                <i class="fas fa-user-circle fa-3x fa-sm fa-fw mr-2 text-gray-400"></i>
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">

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
                    <h1 class="h3 mb-4 text-gray-800">Dashboard</h1>
                </div>


                <!-- Logout Modal-->
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
                                <a class="btn btn-success" href="./PHP/logout.php">Uitloggen</a>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="container-fluid">
                    <!-- Content Row -->
                    <div class="row">
                        <!-- Earnings (Monthly) Card Example -->
                        <?php
                        $stmt = "SELECT COUNT(ID) as aantal from project";
                        $res  = mysqli_query($conn, $stmt);
                        if (mysqli_num_rows($res) > 0) {
                            while ($row = mysqli_fetch_assoc($res)) {
                                $aant = $row['aantal'];
                            }
                        }

                        $stmt2 = "SELECT COUNT(ID) as aantal from taak";
                        $res   = mysqli_query($conn, $stmt2);
                        if (mysqli_num_rows($res) > 0) {
                            while ($row = mysqli_fetch_assoc($res)) {
                                $aantt = $row['aantal'];
                            }
                        }

                        $stmt3 = "SELECT COUNT(ID) as aantal from personen";
                        $res   = mysqli_query($conn, $stmt3);
                        if (mysqli_num_rows($res) > 0) {
                            while ($row = mysqli_fetch_assoc($res)) {
                                $aantp = $row['aantal'];
                            }
                        }

                        ?>

                        <div class="col-xl-4 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Projecten </div>
                                            <div class="h2 mb-0 font-weight-bold dashboardText"><?php echo $aant; ?>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i id="dashboardIcon" class="fas fa-calendar-alt fa-3x text-primary"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="col-xl-4 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                Personen</div>
                                            <div class="h2 mb-0 font-weight-bold dashboardText"><?php echo $aantp; ?>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i id="dashboardIcon" class="fas fa-users fa-3x text-success"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="col-xl-4 col-md-6 mb-4">
                            <div class="card border-left-info shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                                Taken</div>
                                            <div class="h2 mb-0 font-weight-bold dashboardText"><?php echo $aantt; ?>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i id="dashboardIcon" class="fas fa-clipboard-list fa-3x text-info"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>




                    </div>

                    <!-- Content Row -->
                    <div class="row">

                        <!-- Area Chart -->
                        <div class="col-xl-12">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <button id='tableButton' class="m-0 font-weight-bold text-secondary" onclick="showGraph()">Taken per Richting</button>
                                </div>
                                <!-- Card Body -->
                                <div id='card-dash' class="card-body">

                                    <canvas id="graphCanvas" style="display: block; width: 1680px; height: 280px;"></canvas>

                                </div>
                            </div>
                        </div>




                        <?php

                        if ($_SESSION['role'] == 'Financieel' or $_SESSION['role'] == 'Beheerder') { ?>


                            <div class="col-xl-12">
                                <div class="card shadow mb-4">
                                    <!-- Card Header - Dropdown -->
                                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                        <button id='tableButton' class="m-0 font-weight-bold text-secondary" onclick="showGraph2()">Bestedingen per maand</button>
                                    </div>
                                    <!-- Card Body -->
                                    <div id='card-dash' class="card-body">
                                        <div class="chart-area">


                                            <canvas id="graphCanvas2" style="display: block; width: 1680px; height: 280px;"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </div>

                    <!-- Area Chart -->
                    <div class="full-width ">
                        <div class="card shadow mb-4">
                            <!-- Card Header - Dropdown -->
                            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                <button id='tableButton' class="m-0 font-weight-bold text-secondary" onclick="showGraph3()">Bestedingen per jaar</button>
                            </div>
                            <!-- Card Body -->
                            <div id='card-Pjaar' class="card-body">
                                <div class="chart-area">
                                    <canvas id="graphCanvas3" style="display: block; width: 1037px; height: 320px;"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        <?php } ?>



        <!-- Content Row -->
        </div>

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

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/js/bootstrap-select.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>



    <script>
        $(document).ready(function() {
            showGraph();
        });


        function showGraph() {
            {
                $.post("./PHP/overview.php",
                    function(data) {
                        // console.log(data);
                        var name = [];
                        var marks = [];

                        for (var i in data) {
                            name.push(data[i].Richting);
                            marks.push(data[i].aantal);
                        }

                        var chartdata = {
                            labels: name,
                            datasets: [{
                                label: 'Aantal Taken',
                                backgroundColor: ' #28a745',
                                borderColor: '#218838',
                                hoverBackgroundColor: '#218838',
                                hoverBorderColor: '#666666',
                                data: marks
                            }]
                        };

                        var graphTarget = $("#graphCanvas");

                        var barGraph = new Chart(graphTarget, {
                            type: 'bar',
                            data: chartdata,
                            animation: {
                                animateScale: true
                            }
                        });
                    });
            }
        }
    </script>

    <script>
        $(document).ready(function() {
            showGraph2();
        });


        function showGraph2() {
            {
                $.post("./PHP/overview2.php",
                    function(data) {
                        // console.log(data);
                        var marks = [];
                        var datum = [];

                        for (var i in data) {
                            marks.push(data[i].bedrag);
                            datum.push(data[i].eind);
                        }

                        var chartdata = {
                            labels: datum,
                            datasets: [{
                                label: 'Bestedingen',
                                backgroundColor: ' #218838',
                                borderColor: '#28a745',
                                hoverBackgroundColor: '#28a745',
                                hoverBorderColor: '#666666',
                                data: marks
                            }]
                        };

                        var graphTarget = $("#graphCanvas2");

                        var barGraph = new Chart(graphTarget, {
                            type: 'line',
                            data: chartdata,
                            animation: {
                                animateScale: true
                            }
                        });
                    });
            }
        }
    </script>


    <script>
        $(document).ready(function() {
            showGraph3();
        });


        function showGraph3() {
            {
                $.post("./PHP/overview3.php",
                    function(data) {
                        // console.log(data);
                        var marks = [];
                        var datum = [];

                        for (var i in data) {
                            marks.push(data[i].bedrag);
                            datum.push(data[i].eind);
                        }

                        var chartdata = {
                            labels: datum,
                            datasets: [{
                                label: 'Bestedingen',
                                backgroundColor: ' #218838',
                                borderColor: '#28a745',
                                hoverBackgroundColor: '#28a745',
                                hoverBorderColor: '#666666',
                                data: marks
                            }]
                        };

                        var graphTarget = $("#graphCanvas3");

                        var barGraph = new Chart(graphTarget, {
                            type: 'bar',
                            data: chartdata,
                            animation: {
                                animateScale: true
                            }
                        });
                    });
            }
        }
    </script>


</body>

</html>