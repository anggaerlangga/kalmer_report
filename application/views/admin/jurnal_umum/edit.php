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

                <h1 class="h3 mb-2 text-gray-800">Edit Jurnal Umum</h1>

                <?php if ($this->session->flashdata('success')): ?>
                    <div class="alert alert-success" role="alert">
                        <?php echo $this->session->flashdata('success'); ?>
                    </div>
				<?php endif; ?>

                <!-- DataTales Example -->
                <div class="card shadow mb-4">
                    <div class="card-header">
                        <a href="<?php echo site_url('admin/jurnal_umum') ?>"><i class="fa fa-arrow-circle-left"></i>Back</a>
                    </div>
                    <div class="card-body">
                        <form action="" method="post" enctype="multipart/form-data" > 
                            <input type="hidden" name="no_akun" value="<?php echo $jurnal_umum->no_akun ?>" />
                            <div class="container">
                                <div class="row">
                                    <div class="col-sm">
                                        <div class="form-group">
                                            <label for="no_akun">No Akun</label>
                                            <input class="form-control <?php echo form_error('no_proyek') ? 'is-invalid':'' ?>"
                                                type="text" name="no_akun" id="no_akun" value="<?php echo $jurnal_umum->no_akun ?>" />
                                            <div class="invalid-feedback">
                                                <?php echo form_error('no_akun') ?>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm">
                                        <div class="form-group">
                                            <label for="tanggal">Tanggal</label>
                                            <input class="form-control <?php echo form_error('tanggal') ? 'is-invalid':'' ?>"
                                                type="text" name="tanggal" id="tanggal" value="<?php echo $jurnal_umum->tanggal ?>" />
                                            <div class="invalid-feedback">
                                                <?php echo form_error('tanggal') ?>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm">
                                        <div class="form-group">
                                            <label for="akun">Akun</label>
                                            <input class="form-control <?php echo form_error('akun') ? 'is-invalid':'' ?>"
                                                type="text" name="akun" id="akun" value="<?php echo $jurnal_umum->akun ?>" />
                                            <div class="invalid-feedback">
                                                <?php echo form_error('akun') ?>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm">
                                        <div class="form-group">
                                            <label for="debit">Debit</label>
                                            <input class="form-control <?php echo form_error('debit') ? 'is-invalid':'' ?>"
                                                type="text" name="debit" id="debit" value="<?php echo $jurnal_umum->debit ?>" />
                                            <div class="invalid-feedback">
                                                <?php echo form_error('debit') ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm">
                                        <div class="form-group">
                                            <label for="kredit">Kredit</label>
                                            <input class="form-control <?php echo form_error('kredit') ? 'is-invalid':'' ?>"
                                                type="text" name="kredit" id="kredit" value="<?php echo $jurnal_umum->kredit ?>" />
                                            <div class="invalid-feedback">
                                                <?php echo form_error('kredit') ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                                <input class="btn btn-success" type="submit" name="btn" id="btn_update" value="Save" />
                            </div>

                        </form>
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