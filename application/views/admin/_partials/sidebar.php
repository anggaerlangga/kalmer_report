<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

<!-- Sidebar - Brand -->
<a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
    <div class="sidebar-brand-icon rotate-n-15">
        <i class="fas fa-laugh-wink"></i>
    </div>
    <div class="sidebar-brand-text mx-3">Kalmer<sup>2</sup></div>
</a>

<!-- Divider -->
<hr class="sidebar-divider my-0">

<!-- Nav Item - Dashboard -->
<li class="nav-item active">
    <a class="nav-link" href="<?php echo site_url('admin/overview') ?>">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Dashboard</span></a>
</li>

<!-- Divider -->
<hr class="sidebar-divider">

<!-- Heading -->
<div class="sidebar-heading">
    Management Data
</div>

<!-- Nav Item - Pages Collapse Menu -->
<li class="nav-item">
    <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapseTwo"
        aria-expanded="true" aria-controls="collapseTwo">
        <i class="fas fa-fw fa-folder"></i>
        <span>Master Data</span>
    </a>
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Custom Master Data:</h6>
            <a class="collapse-item" href="<?php echo site_url('admin/supplier') ?>">Master Suplier</a>
            <a class="collapse-item" href="<?php echo site_url('admin/barang') ?>">Master Inventory</a>
            <!-- <a class="collapse-item" href="<?php echo site_url('admin/pekerjaan') ?>">Master Pekerjaan</a> -->
            <a class="collapse-item" href="<?php echo site_url('admin/proyek') ?>">Master Proyek</a>
            <a class="collapse-item" href="<?php echo site_url('admin/barang/cekharga') ?>">Validasi Harga</a>
            <!-- <a class="collapse-item" href="<?php echo site_url('admin/coa') ?>">Master COA</a> -->
        </div>
    </div>
</li>

<!-- Divider -->
<hr class="sidebar-divider">

<!-- Heading -->
<!-- <div class="sidebar-heading">
    Management Transaksi
</div> -->

<!-- Nav Item - Pages Collapse Menu -->
<!-- <li class="nav-item">
    <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapseThree"
        aria-expanded="true" aria-controls="collapseThree">
        <i class="fas fa-fw fa-folder"></i>
        <span>Transaksi</span>
    </a>
    <div id="collapseThree" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Custom Transaksi Data:</h6>
            <a class="collapse-item" href="<?php echo site_url('admin/anggaran') ?>">RAB</a>
        </div>
    </div>
</li> -->

<!-- Heading -->
<div class="sidebar-heading">
    Management Report
</div>

<!-- Nav Item - Pages Collapse Menu -->
<li class="nav-item">
    <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapseFour"
        aria-expanded="true" aria-controls="collapseFour">
        <i class="fas fa-fw fa-folder"></i>
        <span>Laporan</span>
    </a>
    <div id="collapseFour" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Laporan Inventory:</h6>
            <a class="collapse-item" href="<?php echo site_url('admin/laporan_inventory') ?>">Penggunaan Inventory</a>
            <!-- <a class="collapse-item" href="<?php echo site_url('admin/laporan_pemasukan') ?>">Pemasukan</a> -->
            <!-- <a class="collapse-item" href="<?php echo site_url('admin/laporan_pengeluaran') ?>">Pengeluaran</a> -->
            <!-- <a class="collapse-item" href="<?php echo site_url('admin/laporan_inventory') ?>">Inventory</a> -->
            <!-- <a class="collapse-item" href="<?php echo site_url('admin/cashflow') ?>">Cashflow</a> -->
        </div>
    </div>
</li>

<!-- Divider -->
<hr class="sidebar-divider">

<!-- Heading -->
<!-- <div class="sidebar-heading">
    Management Jurnal
</div> -->

<!-- Nav Item - Pages Collapse Menu -->
<!-- <li class="nav-item">
    <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapseFive"
        aria-expanded="true" aria-controls="collapseFive">
        <i class="fas fa-fw fa-folder"></i>
        <span>Jurnal</span>
    </a>
    <div id="collapseFive" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Jurnal:</h6>
            <a class="collapse-item" href="<?php echo site_url('admin/jurnal_umum') ?>">Jurnal Umum</a>
            <a class="collapse-item" href="<?php echo site_url('admin/jurnal_penyesuaian') ?>">Jurnal Penyesuaian</a>
            <a class="collapse-item" href="<?php echo site_url('admin/buku_besar') ?>">Buku Besar</a>
        </div>
    </div>
</li> -->

<!-- Divider -->
<!-- <hr class="sidebar-divider"> -->

<!-- Heading -->
<!-- <div class="sidebar-heading">
    Setting
</div> -->

<!-- Nav Item - Utilities Collapse Menu -->
<!-- <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
        aria-expanded="true" aria-controls="collapseUtilities">
        <i class="fas fa-fw fa-wrench"></i>
        <span>Management Akun</span>
    </a>
    <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
        data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Custom Akun:</h6>
            <a class="collapse-item" href="account.php">Account</a>>
        </div>
    </div>
</li> -->

</ul>