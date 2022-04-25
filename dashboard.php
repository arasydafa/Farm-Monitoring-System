<?php

session_start();

include 'connection.php';

?>

<div class="row">
    <!-- Sales Card -->
    <div class="col-xxl-4 col-md-6">
        <div class="card info-card revenue-card">

            <div class="card-body">
                <h5 class="card-title">Kelembapan Udara</h5>
                <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                        <i class="bi bi-wind"></i>
                    </div>
                    <div class="ps-3" id="kelembaban">
                        <h6>
                            <?php

                            $kelembaban = mysqli_query($connect, "SELECT temp_humd FROM tbl_temp ORDER BY temp_id DESC LIMIT 1");
                            $data = mysqli_fetch_array($kelembaban);
                            echo $data['temp_humd'];
                            echo '<span>%</span>';

                            ?>
                        </h6>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- End Sales Card -->

    <!-- Revenue Card -->
    <div class="col-xxl-4 col-md-6">
        <div class="card info-card sales-card">

            <div class="card-body">
                <h5 class="card-title">Suhu</h5>

                <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                        <i class="bi bi-thermometer-half"></i>
                    </div>
                    <div class="ps-3" id="suhu">
                        <h6>
                            <?php

                            $suhu = mysqli_query($connect, "SELECT temp_value FROM tbl_temp ORDER BY temp_id DESC LIMIT 1");
                            $data = mysqli_fetch_array($suhu);
                            echo $data['temp_value'];
                            echo '<span>°C</span>';

                            ?>
                        </h6>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- End Revenue Card -->

    <!-- Customers Card -->
    <div class="col-xxl-4 col-md-6">

        <div class="card info-card customers-card">

            <div class="card-body">
                <h5 class="card-title">Kadar Amonia</span>
                </h5>

                <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                        <i class="bi bi-cloudy"></i>
                    </div>
                    <div class="ps-3" id="amonia">
                        <h6>
                            <?php

                            $amonia = mysqli_query($connect, "SELECT temp_amonia FROM tbl_temp ORDER BY temp_id DESC LIMIT 1");
                            $data = mysqli_fetch_array($amonia);
                            echo $data['temp_amonia'];
                            echo "<span> ppm</span>";

                            ?>
                        </h6>
                    </div>
                </div>

            </div>
        </div>

    </div>
    <!-- End Customers Card -->
</div>