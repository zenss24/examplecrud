<?php

session_start();

if (!isset($_SESSION['login'])) {
    header('Location: login.php');
    exit;
}

require 'get/get_plotting_jadwal.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link href="../css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
</head>

<body class="sb-nav-fixed">
    <main>
        <div class="container-fluid px-sm-4">

            <img src="../images/metaform.png" alt="Metaform" class="logo-image" width="250">
            <h1 src="../images/metaform.png" class="my-4">Laboratorium Maintenance Tools</h1>

            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-sm-center flex-column flex-sm-row">
                    <div class="py-2">
                        <i class="fas fa-table me-1"></i>
                        Planboard Jadwal Kalibrasi Laboratorium
                    </div>
                </div>
                <div class="card-body">
                    <table id="datatablesSimple" class="table table-striped">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>ID Jadwal</th>
                                <th>Nama Alat</th>
                                <th>Tanggal Expired</th>
                                <th>Jadwal Baru</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            <?php foreach ($data_plotting_jadwal as $item): ?>
                                <tr>
                                    <td>
                                        <?php echo $i; ?>
                                    </td>
                                    <td>
                                        <?php echo $item['id_jadwal']; ?>
                                    </td>
                                    <td>
                                        <?php echo $item['nama_alat']; ?>
                                    </td>
                                    <td>
                                        <?php echo $item['expired_kalibrasi']; ?>
                                    </td>
                                    <td>
                                        <?php echo $item['jadwal_baru']; ?>
                                    </td>
                                    <td>

                                </tr>

                                <script>
                                    window.print();
                                </script>

                                <?php $i++; ?>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </main>
    <!-- Tempat untuk tanda tangan -->
    <div class="signature-area mt-4" style="text-align: right;">
        <p>Purwakarta, ______________20___</p>
        <canvas id="signatureCanvas" width="100" height="100"
            style="border: 0px solid #000; display: inline-block;"></canvas>
        <p>(________________________________)</p>
    </div>

    <script>
        // Fungsi untuk membersihkan tanda tangan
        function clearSignature() {
            var canvas = document.getElementById("signatureCanvas");
            var context = canvas.getContext("2d");
            context.clearRect(0, 0, canvas.width, canvas.height);
        }
    </script>

    </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        crossorigin="anonymous"></script>
    <script src="../js/scripts.js"></script>
    <!-- <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script> -->
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" type="text/css">
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" type="text/javascript"></script>
    <script src="../js/datatables-simple-demo.js"></script>
</body>


</html>