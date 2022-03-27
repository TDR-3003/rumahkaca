<?php include 'header.php'; ?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    </div>

    <!-- Content Row -->
    <div class="row">
<?php 
$plants = ("SELECT * FROM plants");
$sql = mysqli_query($conn,$plants);
$sum_plants = mysqli_num_rows($sql);

$sen_tnh = ("SELECT * FROM sensors WHERE type = 'tanah' ");
$sen_tnhs = mysqli_query($conn,$sen_tnh);
$sum_tnh = mysqli_num_rows($sen_tnhs);

$sen_lux = ("SELECT * FROM sensors WHERE type = 'cahaya' ");
$sen_luxs = mysqli_query($conn,$sen_lux);
$sum_lux = mysqli_num_rows($sen_luxs);

$sen_temp = ("SELECT * FROM sensors WHERE type = 'suhu' ");
$sen_temps = mysqli_query($conn,$sen_temp);
$sum_temp = mysqli_num_rows($sen_temps);

$sen_hum = ("SELECT * FROM sensors WHERE type = 'lembab' ");
$sen_hums = mysqli_query($conn,$sen_hum);
$sum_hum = mysqli_num_rows($sen_hums);

$tnhs = query("SELECT AVG(value) FROM sensors WHERE type = 'tanah' ");
foreach ($tnhs as $tnh) {
}

$luxs = query("SELECT AVG(value) FROM sensors WHERE type = 'cahaya' ");
foreach ($luxs as $lux) {
}

$temps = query("SELECT AVG(value) FROM sensors WHERE type = 'suhu' ");
foreach ($temps as $temp) {
}

$hums = query("SELECT AVG(value) FROM sensors WHERE type = 'lembab' ");
foreach ($hums as $hum) {
}
?>
        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-s font-weight-bold text-primary text-uppercase mb-1">
                                Total Tanaman</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $sum_plants; ?></div>
                        </div>
                        <div class="col-auto">
                            <!-- <i class="fas fa-calendar fa-2x text-gray-300"></i> -->
                            <i class="fas fa-leaf fa-3x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-s font-weight-bold text-success text-uppercase mb-1">
                                Lembab Tanah (<?= $sum_tnh; ?>)</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= round($tnh["AVG(value)"],2); ?> %</div>
                        </div>
                        <div class="col-auto">
                            <!-- <i class="fas fa-dollar-sign fa-2x text-gray-300"></i> -->
                            <i class="fas fa-tint fa-3x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-s font-weight-bold text-info text-uppercase mb-1">Cahaya (<?= $sum_lux;?>)
                            </div>
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?= round($lux["AVG(value)"],2); ?> lux</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <!-- <i class="fas fa-clipboard-list fa-2x text-gray-300"></i> -->
                            <i class="far fa-sun fa-3x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pending Requests Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-s font-weight-bold text-warning text-uppercase mb-1">
                                Suhu (<?= $sum_temp;?>) &nbsp;Lembab (<?= $sum_temp;?>)</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= round($temp["AVG(value)"],2); ?> &deg;C &nbsp; <?= round($hum["AVG(value)"],2); ?> %</div>
                        </div>
                        <div class="col-auto">
                            <!-- <i class="fas fa-comments fa-2x text-gray-300"></i> -->
                            <i class="fas fa-temperature-high fa-3x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Content Row -->

    <div class="row">

        <!-- Area Chart -->
        <div class="col-xl-12 col-lg-7">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div
                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Monitoring Lingkungan Rumah Kaca</h6>
                    <div class="dropdown no-arrow">
                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                            aria-labelledby="dropdownMenuLink">
                            <div class="dropdown-header">Dropdown Header:</div>
                            <a class="dropdown-item" href="#">Action</a>
                            <a class="dropdown-item" href="#">Another action</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Something else here</a>
                        </div>
                    </div>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="chart-area">
                        <canvas id="myAreaChart"></canvas>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Content Kontrol --> 
    <div class="row">

        <div class="col-lg-8 mb-4">
            <div class="card">
                <div class="card-body">
                    <div class="row align-items-center">
                    <?php
                    $relays = query("SELECT * FROM sensors WHERE type = 'relay' ");
                    foreach($relays as $relay):
                        if($relay['value'] == 1) {$status_lampu = "ON";}
                        if($relay['value'] == 0) {$status_lampu = "OFF";}
                    ?>
                    <!-- Earnings (Monthly) Card Example -->
                    <div class="col-xl-3 col-md-6 mb-2">
                        <div id="card" class="card card-info m-0 border-primary" style="border: 1px solid;border-radius: 3px;">
                            <div class="card-header" style="background-color:#d9edf7;#bce8f1;color:#31708f; border:-1px!important; ">
                                <div class="row">
                                    <div class="col-12 text-right">
                                            <span style="font-size:14px;font-weight:400">Lamp Status (<?= $status_lampu; ?>)</span>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body text-center">
                                <img src="img/<?= $status_lampu; ?>.png" alt="center" alt="" width="80" height="120"> 
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div> 
                    <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>

        <!-- Informasi Status Pintu -->
        <div class="col-xl-4 col-md-8">
            <div class="card">
                <div class="card-body">
                    <div class="row align-items-center">
                        <!-- Informasi Status Pintu -->
                        <div class="col-xl-12 col-md-8">
                            <div id="card" class="card card-info m-0 border-primary" style="border: 1px solid;border-radius: 3px;">
                                <div class="card-header" style="background-color:#d9edf7;#bce8f1;color:#31708f; border:-1px!important; ">
                                    <div class="row">
                                        <div class="col-12 text-right">
                                                <span style="font-size:15px;font-weight:400">Status Pintu (Terbuka)</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body text-center">
                                    <img src="img/bdoor_open.gif" alt="center" alt="" width="80" height="125"> 
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div> 
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Content -->

    <!-- Content Row -->
    <div class="row">

        <!-- Content Column -->
        <div class="col-lg-12 mb-4">

            <!-- Project Card Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Aktivitas Harian</h6>
                </div>
                <div class="card-body">
                    <h4 class="small font-weight-bold">Penyiraman <span
                            class="float-right">20%</span></h4>
                    <div class="progress mb-4">
                        <div class="progress-bar bg-danger" role="progressbar" style="width: 20%"
                            aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <h4 class="small font-weight-bold">Pemberian Pupuk <span
                            class="float-right">40%</span></h4>
                    <div class="progress mb-4">
                        <div class="progress-bar bg-warning" role="progressbar" style="width: 40%"
                            aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

<?php include 'footer.php'; ?>