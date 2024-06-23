<?php

session_start();

if (!isset($_SESSION['login'])) {
    header('Location: login.php');
    exit;
}

require 'get/get_aktualisasi_kalibrasi.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Aplikasi Penjadwalan Kalibrasi dan Preventive Maintenance Tools" />
    <meta name="keywords" content="Penjadwalan Laboratorium Maintenance Tools" />
    <meta name="author" content="Final Project" />
    <link rel="shortcut icon" href="../images/icon.png" type="image/x-icon" />
    <title>INVENTORI PT.JASA MANDIRI TECHGRAHA</title>
    <link href="../css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
</head>

<body class="sb-nav-fixed">

    <?php require '../templates/topnavigation_karyawan.php'; ?>

    <div id="layoutSidenav">

        <?php require '../templates/sidenavigation_karyawan.php'; ?>

        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-sm-4">
                    <h1 src="../images/metaform.png" class="my-4">Laboratorium Maintenance Tools</h1>

                    <div class="card mb-4">
                        <div
                            class="card-header d-flex justify-content-between align-items-sm-center flex-column flex-sm-row">
                            <div class="py-2">
                                <i class="fa fa-flask" aria-hidden="true"></i>
                                Aktualisasi Jadwal Kalibrasi Laboratorium
                            </div>

                            <button type="button" class="btn btn-primary mr-auto" data-bs-toggle="modal"
                                data-bs-target="#tambah">
                                Input Aktualisasi
                            </button>
                        </div>
                        <div class="card-body">
                            <table id="datatablesSimple" class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>ID Kalibrasi</th>
                                        <th>Nama Alat</th>
                                        <th>Realisasi Pelaksanaan</th>
                                        <th>Tanggal Berlaku</th>
                                        <th>Status Kalibrasi</th>
                                        <th>Pemeriksa</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    <?php foreach ($data_aktualisasi_kalibrasi as $item): ?>
                                        <tr>
                                            <td>
                                                <?php echo $i; ?>
                                            </td>
                                            <td>
                                                <?php print_r($item['id_kalibrasi']); ?>
                                            </td>
                                            <td>
                                                <?php print_r($item['nama_alat']); ?>
                                            </td>
                                            <td>
                                                <?php print_r($item['realisasi']); ?>
                                            </td>
                                            <td>
                                                <?php print_r($item['tgl_berlaku']); ?>
                                            </td>
                                            <td>
                                                <?php print_r($item['status_alat']); ?>
                                            </td>
                                            <td>
                                                <?php print_r($item['checker']); ?>
                                            </td>
                                            <td>
                                                <div
                                                    style="display: flex; gap: 10px; align-items: center; justify-content: center;">
                                                    <button type="button" class="btn btn-warning mb-1"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#edit<?php echo $item['id_kalibrasi']; ?>">
                                                        Edit
                                                    </button>
                                                </div>

                                        </tr>

                                        <?php $i++; ?>

                                        <div class="modal fade" id="edit<?php echo $item['id_kalibrasi']; ?>" tabindex="-1"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Edit Aktualisasi
                                                            Kalibrasi Alat
                                                        </h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <form method="POST" action="edit/edit_aktualisasi_kalibrasi.php">
                                                        <div class="modal-body">

                                                            <label class="small mb-1" for="id_kalibrasi">ID
                                                                Kalibrasi</label>
                                                            <input type="text" name="id_kalibrasi" readonly
                                                                value="<?php echo $item['id_kalibrasi']; ?>"
                                                                class="form-control mb-3" required />
                                                            <label class="small mb-1" for="id_alat">ID
                                                                Alat</label>
                                                            <input type="text" name="id_alat" readonly
                                                                value="<?php echo $item['id_alat']; ?>"
                                                                class="form-control mb-3" required />
                                                            <label class="small mb-1" for="nama_alat">Edit Nama Alat</label>
                                                            <input type="text" name="nama_alat" readonly
                                                                value="<?php echo $item['nama_alat']; ?>"
                                                                class="form-control mb-3" required />
                                                            <label class="small mb-1" for="realisasi">Edit Tanggal
                                                                Pelaksanaan
                                                                Kalibrasi</label>
                                                            <input type="date" name="realisasi"
                                                                value="<?php echo $item['realisasi']; ?>"
                                                                class="form-control mb-3" required />
                                                            <label class="small mb-1" for="tgl_berlaku">Kalibrasi Berlaku
                                                                Sampai
                                                                Dengan Tanggal :</label>
                                                            <input type="date" name="tgl_berlaku"
                                                                value="<?php echo $item['tgl_berlaku']; ?>"
                                                                class="form-control mb-3" required />
                                                            <label class="small mb-1" for="status_alat">Status Kalibrasi
                                                                Alat</label>
                                                            <input type="text" name="status_alat"
                                                                value="<?php echo $item['status_alat']; ?>"
                                                                class="form-control mb-3" required />
                                                            <label class="small mb-1" for="checker">Pemeriksa</label>
                                                            <input type="text" name="checker"
                                                                value="<?php echo $item['checker']; ?>"
                                                                class="form-control mb-3" required />
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="submit" class="btn btn-primary">Save</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </main>


            <?php require '../templates/footer.php'; ?>

        </div>
    </div>

    <div class="modal fade" id="tambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Input Aktualisasi Kalibrasi</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="POST" action="add/tambah_aktualisasi_kalibrasi.php">
                    <div class="modal-body">
                        <label class="small mb-1" for="id_kalibrasi">ID Kalibrasi</label>
                        <input type="text" name="id_kalibrasi" readonly placeholder="ID Kalibrasi"
                            class="form-control mb-3" required />
                        <div class="form-group">
                            <label class="small mb-1" for="nama_alat">Nama Alat</label>
                            <select name="id_alat" class="form-control mb-3">
                                <option selected>--Pilih nama alat di bawah ini--</option>
                                <?php foreach ($data_kalibrasi as $item): ?>
                                    <option value="<?php echo $item['id_alat']; ?>">
                                        <?php echo $item['nama_alat']; ?>
                                    </option>
                                <?php endforeach ?>
                            </select>
                        </div>
                        <label class="small mb-1" for="realisasi">Tanggal Realisasi Kalibrasi Tool</label>
                        <input type="date" name="realisasi" placeholder="Masukkan Realisasi" min="1"
                            class="form-control mb-3" required />
                        <label class="small mb-1" for="tgl_berlaku">Kalibrasi Aktif dan Berlaku Sampai Dengan :</label>
                        <input type="date" name="tgl_berlaku" placeholder="Masukkan Kalibrasi Aktif"
                            class="form-control mb-3" required />
                        <label class="small mb-1" for="status_alat">Status Kalibrasi</label>
                        <input type="text" name="status_alat" placeholder="Masukkan Status Kalibrasi"
                            class="form-control mb-3" required />
                        <label class="small mb-1" for="checker">Pemeriksa</label>
                        <input type="text" name="checker" placeholder="Masukkan Pemeriksa" class="form-control mb-3"
                            required />
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Input</button>
                    </div>
                </form>
            </div>
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