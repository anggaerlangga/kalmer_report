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

                <h1 class="h3 mb-2 text-gray-800">Detail Cashflow</h1>

                <?php if ($this->session->flashdata('success')): ?>
                    <div class="alert alert-success" role="alert">
                        <?php echo $this->session->flashdata('success'); ?>
                    </div>
				<?php endif; ?>

                <!-- DataTales Example -->
                <div class="card shadow mb-4">
                    <div class="card-header">
                        <a href="<?php echo site_url('admin/cashflow') ?>"><i class="fa fa-arrow-circle-left"></i>Back</a>
                    </div>
                    <div class="card-body">
                        <form action="" method="post" enctype="multipart/form-data" > 
                            <div class="container">
                                <div class="row">
                                    <div class="col-sm">
                                        <div class="form-group">
                                            <label for="no_proyek">No Proyek</label>
                                            <input class="form-control <?php echo form_error('no_proyek') ? 'is-invalid':'' ?>"
                                                type="text" name="no_proyek" value="<?php echo $master_proyek->no_proyek ?>" readonly />
                                            <div class="invalid-feedback">
                                                <?php echo form_error('no_proyek') ?>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm">
                                        <div class="form-group">
                                            <label for="nama_proyek">Nama Proyek</label>
                                            <input class="form-control <?php echo form_error('nama_proyek') ? 'is-invalid':'' ?>"
                                                type="text" name="nama_proyek" value="<?php echo $master_proyek->nama_proyek ?>" readonly />
                                            <div class="invalid-feedback">
                                                <?php echo form_error('nama_proyek') ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm">                           
                                        <div class="form-group">
                                            <label for="lokasi_proyek">Lokasi Proyek</label>
                                            <input class="form-control <?php echo form_error('lokasi_proyek') ? 'is-invalid':'' ?>"
                                                type="text" name="lokasi_proyek" value="<?php echo $master_proyek->lokasi_proyek ?>" readonly />
                                            <div class="invalid-feedback">
                                                <?php echo form_error('lokasi_proyek') ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm">                           
                                        <div class="form-group">
                                            <label for="pelaksana_proyek">Pelaksana Proyek</label>
                                            <input class="form-control <?php echo form_error('pelaksana_proyek') ? 'is-invalid':'' ?>"
                                                type="text" name="pelaksana_proyek" value="<?php echo $master_proyek->pelaksana ?>" readonly />
                                            <div class="invalid-feedback">
                                                <?php echo form_error('pelaksana_proyek') ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm">                           
                                        <div class="form-group">
                                            <label for="total_pemasukan">Total Pemasukan</label>
                                            <?php   
                                                $total = 0;
                                                $no = 1;
                                                foreach($laporan_pemasukan as $rows){ 
                                                $nominal[] = $rows->nominal; $total = array_sum($nominal);
                                            ?>
                                            <?php } ?>
                                            <input class="form-control <?php echo form_error('total_pemasukan') ? 'is-invalid':'' ?>"
                                                type="text" name="total_pemasukan" value="<?php echo number_format($total) ?>" readonly />
                                            <div class="invalid-feedback">
                                                <?php echo form_error('pelaksana_proyek') ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm">                           
                                        <div class="form-group">
                                            <label for="total_pengeluaran">Total Pengeluaran Pembelian Material</label>
                                            <?php   
                                                $total_pbm = 0;
                                                $no = 1;
                                                foreach($laporan_pengeluaran_pbm as $rows){ 
                                                $nominal_pbm[] = $rows->nominal; $total_pbm = array_sum($nominal_pbm);
                                            ?>
                                            <?php } ?>
                                            <input class="form-control <?php echo form_error('total_pengeluaran') ? 'is-invalid':'' ?>"
                                                type="text" name="total_pengeluaran" value="<?php echo number_format($total_pbm) ?>" readonly />
                                            <div class="invalid-feedback">
                                                <?php echo form_error('pelaksana_proyek') ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm">                           
                                        <div class="form-group">
                                            <label for="total_pengeluaran">Total Pengeluaran Jasa</label>
                                            <?php   
                                                $total_pbj = 0;
                                                $no = 1;
                                                foreach($laporan_pengeluaran_pbj as $rows){ 
                                                $nominal_pbj[] = $rows->nominal; $total_pbj = array_sum($nominal_pbj);
                                            ?>
                                            <?php } ?>
                                            <input class="form-control <?php echo form_error('total_pengeluaran') ? 'is-invalid':'' ?>"
                                                type="text" name="total_pengeluaran" value="<?php echo number_format($total_pbj) ?>" readonly />
                                            <div class="invalid-feedback">
                                                <?php echo form_error('pelaksana_proyek') ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm">                           
                                        <div class="form-group">
                                            <label for="total_pekerjaan">Total Pengeluaran Diluar Pelaksana</label>
                                            <?php   
                                                $total = 0;
                                                $no = 1;
                                                foreach($laporan_pengeluaran_pbjm as $rows){ 
                                                $nominal_pbjm[] = $rows->nominal; $total = array_sum($nominal_pbjm);
                                            ?>
                                            <?php } ?>
                                            <input class="form-control <?php echo form_error('total_pengeluaran') ? 'is-invalid':'' ?>"
                                                type="text" name="total_pengeluaran" value="<?php echo number_format($total) ?>" readonly />
                                            <div class="invalid-feedback">
                                                <?php echo form_error('pelaksana_proyek') ?>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                            </div>
                
                        </form>
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

    <!-- Custom scripts for all pages-->
    <script src="<?php echo base_url('js/sb-admin-2.min.js') ?>"></script>

</body>

</html>