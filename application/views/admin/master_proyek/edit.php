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

                <h1 class="h3 mb-2 text-gray-800">Edit Master Proyek</h1>

                <?php if ($this->session->flashdata('success')): ?>
                    <div class="alert alert-success" role="alert">
                        <?php echo $this->session->flashdata('success'); ?>
                    </div>
				<?php endif; ?>

                <!-- DataTales Example -->
                <div class="card shadow mb-4">
                    <div class="card-header">
                        <a href="<?php echo site_url('admin/proyek') ?>"><i class="fa fa-arrow-circle-left"></i>Back</a>
                    </div>
                    <div class="card-body">
                        <form action="" method="post" enctype="multipart/form-data" > 

                        <input type="hidden" name="id_proyek" value="<?php echo $proyek->id_proyek ?>" />

                            <div class="container">
                                <div class="row">
                                    <div class="col-sm">
                                        <div class="form-group">
                                            <label for="no_proyek">No Proyek</label>
                                            <input class="form-control <?php echo form_error('no_proyek') ? 'is-invalid':'' ?>"
                                                type="text" name="no_proyek" value="<?php echo $proyek->no_proyek ?>" />
                                            <div class="invalid-feedback">
                                                <?php echo form_error('no_proyek') ?>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm">
                                        <div class="form-group">
                                            <label for="nama_proyek">Nama Proyek</label>
                                            <input class="form-control <?php echo form_error('nama_proyek') ? 'is-invalid':'' ?>"
                                                type="text" name="nama_proyek" value="<?php echo $proyek->nama_proyek ?>" />
                                            <div class="invalid-feedback">
                                                <?php echo form_error('nama_proyek') ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm">                           
                                        <div class="form-group">
                                            <label for="pelaksana">Pelaksana Proyek</label>
                                            <input class="form-control <?php echo form_error('pelaksana') ? 'is-invalid':'' ?>"
                                                type="text" name="pelaksana" value="<?php echo $proyek->pelaksana ?>" />
                                            <div class="invalid-feedback">
                                                <?php echo form_error('pelaksana') ?>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm">                           
                                        <div class="form-group">
                                            <label for="lokasi_proyek">Lokasi Proyek</label>
                                            <input class="form-control <?php echo form_error('lokasi_proyek') ? 'is-invalid':'' ?>"
                                                type="text" name="lokasi_proyek" value="<?php echo $proyek->lokasi_proyek ?>" />
                                            <div class="invalid-feedback">
                                                <?php echo form_error('lokasi_proyek') ?>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm">
                                        <div class="form-group">
                                            <label for="status_proyek">Status Proyek</label>
                                            <select class="form-control" name="status_proyek">
                                                <option value="<?php echo $proyek->status_proyek ?>"><?php echo $proyek->status_proyek ?></option>
                                                <option value="O">Outstanding</option>
                                                <option value="P">On Progress</option>
                                                <option value="F">Finished</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm">
                                        <div class="form-group">
                                            <label for="tgl_mulai">Tanggal Mulai</label>
                                            <input class="form-control <?php echo form_error('status_proyek') ? 'is-invalid':'' ?>"
                                                type="date" name="tgl_mulai" value="<?php echo $proyek->no_proyek ?>" />
                                            <div class="invalid-feedback">
                                                <?php echo form_error('tgl_mulai') ?>
                                            </div>
                                        </div>
                                    </div>
            
                                    <div class="col-sm">
                                        <div class="form-group">
                                            <label for="tgl_selesai">Tanggal Selesai</label>
                                            <input class="form-control <?php echo form_error('tgl_selesai') ? 'is-invalid':'' ?>"
                                                type="date" name="tgl_selesai" value="<?php echo $proyek->no_proyek ?>" />
                                            <div class="invalid-feedback">
                                                <?php echo form_error('tgl_selesai') ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                                <input class="btn btn-success" type="submit" name="btn" value="Save" />
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