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

                <h1 class="h3 mb-2 text-gray-800">Add Master Barang</h1>

                <?php if ($this->session->flashdata('success')): ?>
                    <div class="alert alert-success" role="alert">
                        <?php echo $this->session->flashdata('success'); ?>
                    </div>
				<?php endif; ?>

                <!-- DataTales Example -->
                <div class="card shadow mb-4">
                    <div class="card-header">
                        <a href="<?php echo site_url('admin/barang') ?>"><i class="fa fa-arrow-circle-left"></i>Back</a>
                    </div>
                    <div class="card-body">
                        <form action="<?php echo site_url('admin/barang/add') ?>" method="post" enctype="multipart/form-data" >
                            
                            <div class="form-group">
                                <label for="tipe_barang">Tipe Barang</label>
                                <input class="form-control <?php echo form_error('tipe_barang') ? 'is-invalid':'' ?>"
                                    type="text" name="tipe_barang" placeholder="Tipe Barang" />
                                <div class="invalid-feedback">
                                    <?php echo form_error('tipe_barang') ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="merk_barang">Merk Barang</label>
                                <input class="form-control <?php echo form_error('merk_barang') ? 'is-invalid':'' ?>"
                                    type="text" name="merk_barang" placeholder="Merk Barang" />
                                <div class="invalid-feedback">
                                    <?php echo form_error('merk_barang') ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="id_barang">Kode Barang</label>
                                <input class="form-control <?php echo form_error('id_barang') ? 'is-invalid':'' ?>"
                                    type="text" name="id_barang" placeholder="Kode Barang" />
                                <div class="invalid-feedback">
                                    <?php echo form_error('id_barang') ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="nama_barang">Nama Barang</label>
                                <input class="form-control <?php echo form_error('nama_barang') ? 'is-invalid':'' ?>"
                                    type="text" name="nama_barang" placeholder="Nama Barang" />
                                <div class="invalid-feedback">
                                    <?php echo form_error('nama_barang') ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="satuan">Satuan</label>
                                <input class="form-control <?php echo form_error('satuan') ? 'is-invalid':'' ?>"
                                    type="text" name="satuan" placeholder="Satuan" />
                                <div class="invalid-feedback">
                                    <?php echo form_error('satuan') ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="kuantitas">Quantity</label>
                                <input class="form-control <?php echo form_error('kuantitas') ? 'is-invalid':'' ?>"
                                    type="text" name="kuantitas" placeholder="Quantity" />
                                <div class="invalid-feedback">
                                    <?php echo form_error('kuantitas') ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="nama_suplier">Nama Suplier</label>
                                <input class="form-control <?php echo form_error('nama_suplier') ? 'is-invalid':'' ?>"
                                    type="text" name="nama_suplier" placeholder="Nama Suplier" />
                                <div class="invalid-feedback">
                                    <?php echo form_error('nama_suplier') ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="harga_satuan">Harga Satuan</label>
                                <input class="form-control <?php echo form_error('harga_satuan') ? 'is-invalid':'' ?>"
                                    type="text" name="harga_satuan" placeholder="Harga Satuan" />
                                <div class="invalid-feedback">
                                    <?php echo form_error('harga_satuan') ?>
                                </div>
                            </div>

                            <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                            <input class="btn btn-success" type="submit" name="btn" value="Save" />
                
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