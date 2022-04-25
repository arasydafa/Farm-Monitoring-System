<?php

session_start();

include 'connection.php';

?>

<div class="card recent-sales">

    <div class="card-body">
        <h5 class="card-title">Recent Sensor Data <span>| Today</span></h5>

        <table class="table table-borderless datatable">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Kelembaban</th>
                    <th scope="col">Suhu</th>
                    <th scope="col">Kadar Amonia</th>
                    <th scope="col">Waktu</th>
                </tr>
            </thead>
            <tbody>
                <?php

                $no = 1;
                $data = mysqli_query($connect, "SELECT * from tbl_temp ORDER BY temp_id");
                while ($d = mysqli_fetch_array($data)) {
                ?>
                    <tr>
                        <td class="fw-bold">
                            <?php echo $no++; ?>
                        </td>
                        <td>
                            <?php echo $d['temp_humd']; ?>
                        </td>
                        <td>
                            <?php echo $d['temp_value']; ?>
                        </td>
                        <td>
                            <?php echo $d['temp_amonia']; ?>
                        </td>
                        <td>
                            <?php echo $d['temp_time']; ?>
                        </td>
                    </tr>
                <?php

                }

                ?>
            </tbody>
        </table>

    </div>

</div>