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

                <h1 class="h3 mb-2 text-gray-800">Edit Laporan Pemasukan</h1>

                <?php if ($this->session->flashdata('success')): ?>
                    <div class="alert alert-success" role="alert">
                        <?php echo $this->session->flashdata('success'); ?>
                    </div>
				<?php endif; ?>

                <!-- DataTales Example -->
                <div class="card shadow mb-4">
                    <div class="card-header">
                        <a href="<?php echo site_url('admin/laporan_pemasukan') ?>"><i class="fa fa-arrow-circle-left"></i>Back</a>
                    </div>
                    <div class="card-body">
                        <form action="" method="post" enctype="multipart/form-data" > 
                            <input type="hidden" name="id_pemasukan" id="id_pemasukan" value="<?php echo $laporan_pemasukan->id_pemasukan ?>" />
                            <div class="container">
                                <div class="row">
                                    <div class="col-sm">
                                        <div class="form-group">
                                            <label for="no_proyek">No Proyek</label>
                                            <input class="form-control <?php echo form_error('no_proyek') ? 'is-invalid':'' ?>"
                                                type="text" name="no_proyek" id="no_proyek" value="<?php echo $laporan_pemasukan->no_proyek ?>" />
                                            <div class="invalid-feedback">
                                                <?php echo form_error('no_proyek') ?>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm">
                                        <div class="form-group">
                                            <label for="nama_proyek">Nama Proyek</label>
                                            <input class="form-control <?php echo form_error('nama_proyek') ? 'is-invalid':'' ?>"
                                                type="text" name="nama_proyek" id="nama_proyek" value="<?php echo $laporan_pemasukan->nama_proyek ?>" />
                                            <div class="invalid-feedback">
                                                <?php echo form_error('nama_proyek') ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm">
                                        <div class="form-group">
                                            <label for="tanggal_pemasukan">Tanggal Pemasukan</label>
                                            <input class="form-control <?php echo form_error('tanggal_pemasukan') ? 'is-invalid':'' ?>"
                                                type="date" name="tanggal_pemasukan" id="tanggal_pemasukan" value="<?php echo $laporan_pemasukan->tanggal_pemasukan ?>" />
                                            <div class="invalid-feedback">
                                                <?php echo form_error('tanggal_pemasukan') ?>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm">
                                        <div class="form-group">
                                            <label for="jenis_pemasukan">Jenis Pemasukan</label>
                                            <select class="form-control" name="jenis_pemasukan" id="jenis_pemasukan">
                                                <option value="<?php echo $laporan_pemasukan->jenis_pemasukan ?>"><?php echo $laporan_pemasukan->jenis_pemasukan ?></option>
                                                <option value="DP">DP</option>
                                                <option value="termin1">Termin 1</option>
                                                <option value="termin2">Termin 2</option>
                                                <option value="termin3">Termin 3</option>
                                                <option value="termin4">Termin 4</option>
                                                <option value="termin5">Termin 5</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm">
                                        <div class="form-group">
                                            <label for="deskripsi">Deskripsi</label>
                                            <input class="form-control <?php echo form_error('deskripsi') ? 'is-invalid':'' ?>"
                                                type="text" name="deskripsi" id="deskripsi" value="<?php echo $laporan_pemasukan->deskripsi ?>" />
                                            <div class="invalid-feedback">
                                                <?php echo form_error('deskripsi') ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="akun">Akun</label>
                                            <select class="form-control" name="akun" id="akun">
                                                <option value="<?php echo $laporan_pemasukan->akun ?>"><?php echo $laporan_pemasukan->akun ?></option>
                                                <?php foreach($coa as $row):?>
                                                    <option value="<?php echo $row->akun;?>"><?php echo $row->akun;?></option>
                                                <?php endforeach;?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="nama_akun">Nama Akun</label>
                                            <input class="form-control <?php echo form_error('nama_akun') ? 'is-invalid':'' ?>"
                                                type="text" name="nama_akun" id="nama_akun" value="<?php echo $laporan_pemasukan->nama_akun ?>" />
                                            <div class="invalid-feedback">
                                                <?php echo form_error('nama_akun') ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="no_transaksi">No Transaksi</label>
                                            <input class="form-control <?php echo form_error('no_transaksi') ? 'is-invalid':'' ?>"
                                                type="text" name="no_transaksi" id="no_transaksi" value="<?php echo $laporan_pemasukan->no_transaksi ?>" readonly />
                                            <div class="invalid-feedback">
                                                <?php echo form_error('no_transaksi') ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <!-- <div class="col-sm">
                                        <div class="form-group">
                                            <label for="nominal">Nominal</label>
                                            <input class="form-control <?php echo form_error('nominal') ? 'is-invalid':'' ?>"
                                                type="text" name="nominal" id="nominal" value="<?php echo $laporan_pemasukan->nominal ?>" />
                                            <div class="invalid-feedback">
                                                <?php echo form_error('nominal') ?>
                                            </div>
                                        </div>
                                    </div>  -->
                                   <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="debit">Debit</label>
                                            <input class="form-control <?php echo form_error('debit') ? 'is-invalid':'' ?>"
                                                type="text" name="debit" id="debit" value="<?php echo $laporan_pemasukan->debit ?>" />
                                            <div class="invalid-feedback">
                                                <?php echo form_error('debit') ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="kredit">Kredit</label>
                                            <input class="form-control <?php echo form_error('kredit') ? 'is-invalid':'' ?>"
                                                type="text" name="kredit" id="kredit" value="<?php echo $laporan_pemasukan->kredit ?>" />
                                            <div class="invalid-feedback">
                                                <?php echo form_error('kredit') ?>
                                            </div>
                                        </div>
                                    </div>
                                
                                </div>
                                
                                <!-- <input type="hidden" name="no_transaksi" id="no_transaksi" value="<?php echo $laporan_pemasukan->no_transaksi ?>" /> -->
                                <input type="hidden" name="nominal" id="nominal" value="<?php echo $laporan_pemasukan->debit ?>">
                                <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                                <input class="btn btn-success" type="submit" name="btn" id="btn_update" value="Save" />
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

    <script>
        $(document).ready(function(){
            $('#no_proyek').change(function(){ 
                var no_proyek=$(this).val();
                $.ajax({
                    url : "<?php echo site_url('admin/laporan_pemasukan/getByNoPro');?>",
                    method : "POST",
                    data : {no_proyek: no_proyek},
                    async : true,
                    dataType : 'json',
                    success: function(data){
                        
                        var nama_proyek = '';
                        var i;
                        for(i=0; i<data.length; i++){
                            nama_proyek += data[i].nama_proyek;
                        }
                        $('#nama_proyek').val(nama_proyek);

                    }
                });
                return false;
            });

            $('#akun').change(function(){ 
                var akun=$(this).val();
                $.ajax({
                    url : "<?php echo site_url('admin/laporan_pengeluaran/getByAkun');?>",
                    method : "POST",
                    data : {akun: akun},
                    async : true,
                    dataType : 'json',
                    success: function(data){
                            
                        var nama_akun = '';
                        var i;
                        for(i=0; i<data.length; i++){
                            nama_akun += data[i].nama_akun;
                        }
                        $('#nama_akun').val(nama_akun);

                    }
                });
                return false;
            });

            $('#btn_update').on('click',function(){
                var id_pemasukan = $('#id_pemasukan').val();
                var no_proyek = $('#no_proyek').val();
                var nama_proyek = $('#nama_proyek').val();
                var tanggal_pemasukan = $('#tanggal_pemasukan').val();
                var jenis_pemasukan = $('#jenis_pemasukan').val();
                var deskripsi = $('#deskripsi').val();
                var nominal = $('#debit').val();
                var total = $('#total').val();
                var akun = $('#akun').val();
                var nama_akun = $('#nama_akun').val();
                var debit = $('#debit').val();
                var kredit = $('#kredit').val();
                var no_transaksi = $('#no_transaksi').val();
                $.ajax({
                    type : "POST",
                    url  : "<?php echo site_url('admin/laporan_pemasukan/update_pemasukan')?>",
                    dataType : "JSON",
                    data : {id_pemasukan:id_pemasukan, no_proyek:no_proyek, nama_proyek:nama_proyek, tanggal_pemasukan:tanggal_pemasukan, jenis_pemasukan:jenis_pemasukan,
                    deskripsi:deskripsi, nominal:nominal, total:total, akun:akun, nama_akun:nama_akun, debit:debit, kredit:kredit, no_transaksi:no_transaksi},
                    success: function(data){
                        update_jurnal();
                    }
                });
                return false;
            });

            function update_jurnal()
            {
                var no_transaksi = $('#no_transaksi').val();
                var tanggal = $('#tanggal_pemasukan').val();
                var akun = $('#akun').val();
                var nama_akun = $('#nama_akun').val();
                var debit = $('#debit').val();
                var kredit = $('#kredit').val();
                var no_transaksi = $('#no_transaksi').val();
                    $.ajax({
                    type : "POST",
                    url  : "<?php echo site_url('admin/jurnal_umum/update_jurnal')?>",
                    dataType : "JSON",
                    data : {no_transaksi:no_transaksi, tanggal:tanggal, akun:akun, nama_akun:nama_akun, debit:debit, kredit:kredit/*, no_transaksi:no_transaksi*/},
                    success: function(data){
                    alert("Penambahan data berhasil");
                        $("form").trigger("reset");
                    }
                })
            }

        });

    </script>

</body>

</html>