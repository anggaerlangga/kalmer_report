<?php $this->load->view("admin/_partials/head.php") ?>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Side Bar -->
        <?php $this->load->view("admin/_partials/sidebar.php") ?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?php $this->load->view("admin/_partials/navbar.php") ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                <h1 class="h3 mb-2 text-gray-800">Daftar Pemasukan</h1>

                <!-- DataTales Example -->
                <div class="card shadow mb-4">
                    <div class="card-header">
                        <a href="<?php echo site_url('admin/laporan_pemasukan/add') ?>"><i class="fas fa-plus"></i> Add New</a>
                        <a href="<?php echo site_url('admin/laporan_pemasukan/excel') ?>"
                                                class="btn btn-small"><i class="fa fa-download"></i> Download to Excel</a>
                    </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No Proyek</th>
                                            <th>Nama Proyek</th>
                                            <th>Tanggal Pemasukan</th>
                                            <th>Jenis Pemasukan</th>
                                            <th>Deskripsi</th>
                                            <th>Akun</th>
                                            <th>Nama Akun</th>
                                            <th>Debit</th>
                                            <th>Kredit</th>
                                            <!-- <th>Total</th> -->
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($laporan_pemasukan as $laporan_pemasukan): ?>
                                        <tr>
                                            <td><?php echo $laporan_pemasukan->no_proyek ?></td>
                                            <td><?php echo $laporan_pemasukan->nama_proyek ?></td>
                                            <td><?php echo $laporan_pemasukan->tanggal_pemasukan ?></td>
                                            <td><?php echo $laporan_pemasukan->jenis_pemasukan ?></td>
                                            <td><?php echo $laporan_pemasukan->deskripsi ?></td>
                                            <td><?php echo $laporan_pemasukan->akun ?></td>
                                            <td><?php echo $laporan_pemasukan->nama_akun ?></td>
                                            <td><?php echo number_format($laporan_pemasukan->debit) ?></td>
                                            <td><?php echo number_format($laporan_pemasukan->kredit) ?></td>
                                            <!-- <td><?php echo $laporan_pemasukan->total ?></td> -->
                                            <td>
                                                <a href="<?php echo site_url('admin/laporan_pemasukan/edit/'.$laporan_pemasukan->id_pemasukan) ?>"
                                                class="btn btn-small"><i class="fas fa-edit"></i> Edit</a>
                                                <a onclick="deleteConfirm('<?php echo site_url('admin/laporan_pemasukan/delete/'.$laporan_pemasukan->id_pemasukan) ?>')"
                                                href="#!" class="btn btn-small text-danger"><i class="fas fa-trash"></i> Hapus</a>
										    </td>
                                        </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2020</span>
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
    <script src="<?php echo base_url('vendor/jquery/jquery.min.js') ?>"></script>
    <script src="<?php echo base_url('vendor/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?php echo base_url('vendor/jquery-easing/jquery.easing.min.js') ?>"></script>

    <script src="<?php echo base_url('assets/datatables/jquery.dataTables.js') ?>"></script>
    <script src="<?php echo base_url('assets/datatables/dataTables.bootstrap4.js') ?>"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?php echo base_url('js/sb-admin-2.min.js') ?>"></script>
    <script src="<?php echo base_url('js/demo/datatables-demo.js') ?>"></script>

    <?php $this->load->view("admin/_partials/modal.php") ?>

    <script>
        function deleteConfirm(url){
            $('#btn-delete').attr('href', url);
            $('#deleteModal').modal();
        }
    </script>
    
</body>

</html>