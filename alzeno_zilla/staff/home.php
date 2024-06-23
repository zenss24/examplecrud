<?php

session_start();

if (!isset($_SESSION['login'])) {
    header('Location: login.php');
    exit;
}

require 'get/get_data_alat.php';

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
    <title>PT.JASA MANDIRI TECHGRAHA</title>
    <link href="../css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
</head>

<body class="sb-nav-fixed">

    <?php require '../templates/topnavigation.php'; ?>

    <div id="layoutSidenav">

        <?php require '../templates/sidenavigation.php'; ?>

        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-sm-4">
                    <h1 src="../images/metaform.png" class="my-4">Inventori</h1>

                    <div class="card mb-4">
                        <div class="card-header d-flex justify-content-between align-items-sm-center flex-column flex-sm-row">
                            <div class="py-2">
                                <i class="fa fa-database" aria-hidden="true"></i>
                                Data Barang 
                            </div>

                            <button type="button" class="btn btn-primary mr-auto" data-bs-toggle="modal" data-bs-target="#tambah">
                                Tambah Barang Baru
                            </button>
                        </div>
                        <div class="card-body">
                            <table id="datatablesSimple" class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>ID Alat</th>
                                        <th>Nama Alat</th>
                                        <th>Jumlah</th>
                                        <th>Deskripsi</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    <?php foreach ($data_stok_alat as $item) : ?>
                                        <tr>
                                            <td>
                                                <?php echo $i; ?>
                                            </td>
                                            <td>
                                                <?php echo $item['id_alat']; ?>
                                            </td>
                                            <td>
                                                <?php echo $item['nama_alat']; ?>
                                            </td>
                                            <td>
                                                <?php echo $item['jumlah']; ?>
                                            </td>
                                            <td>
                                                <?php echo $item['deskripsi']; ?>
                                            </td>
                                            <td>
                                                <div style="display: flex; gap: 10px; align-items: center; justify-content: center;">
                                                    <button type="button" class="btn btn-warning mb-1" data-bs-toggle="modal" data-bs-target="#edit<?php echo $item['id_alat']; ?>">
                                                        Edit
                                                    </button>
                                                    <button type="button" class="btn btn-danger mb-1" data-bs-toggle="modal" data-bs-target="#hapus<?php echo $item['id_alat']; ?>">
                                                        Hapus
                                                    </button>
                                                </div>

                                        </tr>

                                        <?php $i++; ?>

                                        <div class="modal fade" id="edit<?php echo $item['id_alat']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Edit 
                                                        Barang</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <form method="POST" action="edit/edit_data_alat.php">
                                                        <div class="modal-body">
                                                            <label class="small mb-1" for="id_alat">ID Barang</label>
                                                            <input type="text" name="id_alat" readonly value="<?php echo $item['id_alat']; ?>" class="form-control mb-3" required />
                                                            <label class="small mb-1" for="nama_alat">Edit Nama Barang</label>
                                                            <input type="text" name="nama_alat" value="<?php echo $item['nama_alat']; ?>" class="form-control mb-3" required />
                                                            <label class="small mb-1" for="jumlah">Edit Jumlah
                                                                Quantity</label>
                                                            <input type="number" name="jumlah" value="<?php echo $item['jumlah']; ?>" class="form-control mb-3" required />
                                                            <label class="small mb-1" for="deskripsi">Edit Deskripsi</label>
                                                            <input type="text" name="deskripsi" value="<?php echo $item['deskripsi']; ?>" class="form-control mb-3" required />
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="submit" class="btn btn-primary">Save</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="modal fade" id="hapus<?php echo $item['id_alat']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Hapus List Barang 
                                                            </h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <form method="POST" action="delete/hapus_data_alat.php">
                                                        <div class="modal-body">
                                                            <p>Apakah anda yakin ingin menghapus
                                                                <?php echo $item['nama_alat']; ?> ?
                                                            </p>
                                                            <input type="hidden" name="id_alat" value="<?php echo $item['id_alat']; ?>">
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="submit" class="btn btn-primary">Hapus</button>

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
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Barang</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="POST" action="add/tambah_data_alat.php">
                    <div class="modal-body">
                        <label class="small mb-1" for="id_alat">ID Barang</label>
                        <input type="text" name="id_alat" placeholder="Masukkan ID Alat" class="form-control mb-3" required />
                        <label class="small mb-1" for="nama_alat">Nama Barang</label>
                        <input type="text" name="nama_alat" placeholder="Masukkan Nama Alat" class="form-control mb-3" required />
                        <label class="small mb-1" for="jumlah">Jumlah</label>
                        <input type="number" name="jumlah" placeholder="Masukkan Jumlah Stok Alat" min="1" class="form-control mb-3" required />
                        <label class="small mb-1" for="deskripsi">Deskripsi</label>
                        <input type="text" name="deskripsi" placeholder="Masukkan Deskripsi " class="form-control mb-3" required />
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Tambah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="../js/scripts.js"></script>
    <!-- <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script> -->
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" type="text/css">
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" type="text/javascript"></script>
    <script src="../js/datatables-simple-demo.js"></script>
</body>


</html>