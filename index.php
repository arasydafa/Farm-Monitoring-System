<?php

include 'connection.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>FARIOTS Sensor Data</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="assets/css/style.css" rel="stylesheet">

</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="header fixed-top d-flex align-items-center">

        <div class="d-flex align-items-center justify-content-between">
            <a href="index.php" class="logo d-flex align-items-center">
                <span class="d-none d-lg-block">FARIOTS Sensor Data</span>
            </a>
            <i class="bi bi-list toggle-sidebar-btn"></i>
        </div>
        <!-- End Logo -->

        <div class="search-bar">
            <form class="search-form d-flex align-items-center" method="POST" action="#">
                <input type="text" name="query" placeholder="Search" title="Enter search keyword">
                <button type="submit" title="Search"><i class="bi bi-search"></i></button>
            </form>
        </div>
        <!-- End Search Bar -->

        <nav class="header-nav ms-auto">
            <ul class="d-flex align-items-center">

                <li class="nav-item d-block d-lg-none">
                    <a class="nav-link nav-icon search-bar-toggle " href="#">
                        <i class="bi bi-search"></i>
                    </a>
                </li>
                <!-- End Search Icon-->

            </ul>
        </nav>
        <!-- End Icons Navigation -->

    </header>
    <!-- End Header -->

    <!-- ======= Sidebar ======= -->
    <aside id="sidebar" class="sidebar">

        <ul class="sidebar-nav" id="sidebar-nav">

            <li class="nav-item">
                <a class="nav-link " href="index.php">
                    <i class="bi bi-grid"></i>
                    <span>Dashboard</span>

                </a>
            </li>
            <!-- End Dashboard Nav -->

        </ul>

    </aside>
    <!-- End Sidebar-->

    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Dashboard</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
            </nav>
        </div>
        <!-- End Page Title -->

        <section class="section dashboard" id="dashboard">
            <div class="row">

                <!-- Left side columns -->
                <div class="col-lg-12">
                    <div class="row">

                        <section id="data-sensor">
                            
                        </section>

                        <!-- Reports -->
                        <div class="col-12" id="graph">
                            <div class="card">

                                <div class="card-body">
                                    <h5 class="card-title">Reports (Suhu - Kelembaban - Kadar Amonia)<span>/Today</span></h5>

                                    <!-- Line Chart -->
                                    <div id="reportsChart">

                                    </div>
    
                                    <script>
                                        var config = {
                                            series: [{
                                                name: 'Kelembaban',
                                                data: [
                                                    <?php
                                                    $kelembaban = mysqli_query($connect, "SELECT temp_humd FROM tbl_temp ORDER BY temp_id");
                                                    foreach ($kelembaban as $data) {
                                                        echo $data['temp_humd'];
                                                        echo ",";
                                                    }
                                                    ?>
                                                ],
                                            }, {
                                                name: 'Suhu',
                                                data: [
                                                    <?php
                                                    $suhu = mysqli_query($connect, "SELECT temp_value FROM tbl_temp ORDER BY temp_id");
                                                    foreach ($suhu as $data) {
                                                        echo $data['temp_value'];
                                                        echo ",";
                                                    }
                                                    ?>
                                                ]
                                            }, {
                                                name: 'Kadar Amonia',
                                                data: [
                                                    <?php
                                                    $amonia = mysqli_query($connect, "SELECT temp_amonia FROM tbl_temp ORDER BY temp_id");
                                                    foreach ($amonia as $data) {
                                                        echo $data['temp_amonia'];
                                                        echo ",";
                                                    }
                                                    ?>
                                                ]
                                            }],
                                            chart: {
                                                height: 350,
                                                type: 'area',
                                                toolbar: {
                                                    show: true
                                                },
                                            },
                                            markers: {
                                                size: 4
                                            },
                                            colors: ['#4154f1', '#2eca6a', '#ff771d'],
                                            fill: {
                                                type: "gradient",
                                                gradient: {
                                                    shadeIntensity: 1,
                                                    opacityFrom: 0.3,
                                                    opacityTo: 0.4,
                                                    stops: [0, 90, 100]
                                                }
                                            },
                                            dataLabels: {
                                                enabled: true
                                            },
                                            stroke: {
                                                curve: 'smooth',
                                                width: 2
                                            },
                                            xaxis: {
                                                type: 'datetime',
                                                categories: [
                                                    <?php
                                                    $waktu = mysqli_query($connect, "SELECT temp_time FROM tbl_temp ORDER BY temp_time");
                                                    foreach ($waktu as $data) {
                                                        echo "'";
                                                        echo date("Y-m-d\TH:i:s.000\Z", strtotime($data['temp_time']));
                                                        echo "'";
                                                        echo ",";
                                                    }
                                                    ?>
                                                ]
                                            },
                                            animations: {
                                                enabled: true,
                                                easing: 'linear',
                                                dynamicAnimation: {
                                                    speed: 1000
                                                }
                                            },
                                            tooltip: {
                                                x: {
                                                    format: 'dd/MM/yy HH:mm'
                                                },
                                            }
                                        }
                                        document.addEventListener("DOMContentLoaded", () => {
                                            var chart = new ApexCharts(document.querySelector("#reportsChart"), config);
                                            chart.render();
                                        });
                                    </script>
                                    <!-- End Line Chart -->
                                </div>

                            </div>
                        </div>

                        <!-- End Reports -->

                        <!-- Recent Sales -->
                        <div class="col-12" id="tabel">
                            
                        </div>
                        <!-- End Recent Sales -->

                    </div>
                </div>
                <!-- End Left side columns -->

            </div>
        </section>

    </main>
    <!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer id="footer" class="footer">
        <div class="copyright">
            &copy; Copyright <strong><span>Tim Politeknik Elektronika Negeri Surabaya</span></strong>. All Rights Reserved
        </div>
    </footer>
    <!-- End Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center">
        <i class="bi bi-arrow-up-short"></i>
    </a>

    <!-- Vendor JS Files -->
    <script src="assets/vendor/jquery/jquery-3.6.0.min.js"></script>
    <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>

    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>
    <!-- <script type="text/javascript" src="fungsi.js"></script> -->

    <script>
        $(document).ready(function() {
            loadTabel();
            loadDashboard();
        });

        function loadTabel() {
            $("#tabel").load("table.php");
            setTimeout(loadTabel, 100);
        }

        function loadDashboard() {
            $("#data-sensor").load("dashboard.php");
            setTimeout(loadDashboard, 100);
        }
    </script>

</body>

</html>