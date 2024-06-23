<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav mt-3">
                <a class="nav-link" href="home.php">
                    <div
                        class="sb-nav-link-icon <?php echo strpos($_SERVER['REQUEST_URI'], 'home') ? 'text-primary' : ''; ?>">
                        <i class="fa-solid fa-database"></i>
                    </div>
                    Data Barang
                </a>
                <a class="nav-link" href="plotting_jadwal.php">
                    <div
                        class="sb-nav-link-icon <?php echo strpos($_SERVER['REQUEST_URI'], 'plotting_jadwal') ? 'text-primary' : ''; ?>">
                        <i class="fa-solid fa-calendar-days"></i>
                    </div>
                    
                </a>
                

                <div class="nav-item">
                    <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse"
                        href="staff/cetak_aktualisasi_kalibrasi.php">
                        <div class="sb-nav-link-icon">
                            <i class="fa-solid fa-print"></i>
                        </div>
                        <span>Cetak Rekap Data</span>
                        <i class="fa fa-chevron-down" style="margin-left: auto;"></i>
                    </a>
                    <ul id="components-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
                        <li>
                            <a href="cetak_plotting_jadwal.php" class="nav-link">
                                Data Planboard Kalibrasi
                            </a>
                        </li>
                        
                    </ul>
                </div>


                <a class="nav-link mt-4" href="../logout.php">
                    <div class="sb-nav-link-icon"><i class="fa-solid fa-arrow-right-from-bracket"></i></div>
                    Log Out
                </a>
            </div>
        </div>
        <div class="sb-sidenav-footer">
            <div class="small">Anda login sebagai :</div>
            <?php echo $_SESSION['email']; ?>
        </div>
    </nav>
</div>