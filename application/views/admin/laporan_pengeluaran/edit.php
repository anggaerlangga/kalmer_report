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

                <h1 class="h3 mb-2 text-gray-800">Edit Laporan Pengeluaran</h1>

                <?php if ($this->session->flashdata('success')): ?>
                    <div class="alert alert-success" role="alert">
                        <?php echo $this->session->flashdata('success'); ?>
                    </div>
				<?php endif; ?>

                <!-- DataTales Example -->
                <div class="card shadow mb-4">
                    <div class="card-header">
                        <a href="<?php echo site_url('admin/laporan_pengeluaran') ?>"><i class="fa fa-arrow-circle-left"></i>Back</a>
                    </div>
                    <div class="card-body">
                        <form action="" method="post" enctype="multipart/form-data" > 
                            <input type="hidden" name="id_pengeluaran" id="id_pengeluaran" value="<?php echo $laporan_pengeluaran->id_pengeluaran ?>" />
                            <div class="container">
                                <div class="row">
                                    <div class="col-sm">
                                        <div class="form-group">
                                            <label for="no_proyek">No Proyek</label>
                                            <input class="form-control <?php echo form_error('no_proyek') ? 'is-invalid':'' ?>"
                                                type="text" name="no_proyek" id="no_proyek" value="<?php echo $laporan_pengeluaran->no_proyek ?>" />
                                            <div class="invalid-feedback">
                                                <?php echo form_error('no_proyek') ?>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm">
                                        <div class="form-group">
                                            <label for="nama_proyek">Nama Proyek</label>
                                            <input class="form-control <?php echo form_error('nama_proyek') ? 'is-invalid':'' ?>"
                                                type="text" name="nama_proyek" id="nama_proyek" value="<?php echo $laporan_pengeluaran->nama_proyek ?>" />
                                            <div class="invalid-feedback">
                                                <?php echo form_error('nama_proyek') ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm">
                                        <div class="form-group">
                                            <label for="tanggal_pengeluaran">Tanggal pengeluaran</label>
                                            <input class="form-control <?php echo form_error('tanggal_pengeluaran') ? 'is-invalid':'' ?>"
                                                type="date" name="tanggal_pengeluaran" id="tanggal_pengeluaran" value="<?php echo $laporan_pengeluaran->tanggal_pengeluaran ?>" />
                                            <div class="invalid-feedback">
                                                <?php echo form_error('tanggal_pengeluaran') ?>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm">
                                        <div class="form-group">
                                            <label for="jenis_pengeluaran">Jenis pengeluaran</label>
                                            <select class="form-control" name="jenis_pengeluaran" id="jenis_pengeluaran">
                                                <option value="<?php echo $laporan_pengeluaran->jenis_pengeluaran ?>"><?php echo $laporan_pengeluaran->jenis_pengeluaran ?></option>
                                                <option value="OPS">Operasional</option>
                                                <option value="PBM">PBM</option>
                                                <option value="PBJ">PBJ</option>
                                                <option value="PBJM">PBJM</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-sm" id="pelaksana">
                                        <div class="form-group">
                                            <label for="pelaksana">Pelaksana</label>
                                            <input class="form-control <?php echo form_error('pelaksana') ? 'is-invalid':'' ?>"
                                                type="text" name="pelaksana" id="pelaksana" value="<?php echo $laporan_pengeluaran->pelaksana ?>" />
                                            <div class="invalid-feedback">
                                                <?php echo form_error('pelaksana') ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <!-- <div class="col-sm-4" id="stok"> -->
                                        <div class="col-sm-4" id="kode_barang">
                                            <div class="form-group">
                                                <label for="id_barang">Kode Barang</label>
                                                <select class="form-control" name="id_barang" id="id_barang">
                                                    <option value="<?php echo $laporan_pengeluaran->id_barang ?>"><?php echo $laporan_pengeluaran->id_barang ?></option>
                                                    <?php foreach($master_barang as $row):?>
                                                        <option value="<?php echo $row->id_barang;?>"><?php echo $row->id_barang;?></option>
                                                    <?php endforeach;?>
                                                </select>
                                                <div class="invalid-feedback">
                                                    <?php echo form_error('id_barang') ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-4" id="nama_barang">
                                            <div class="form-group">
                                                <label for="nama_barang">Nama Barang</label>
                                                <input class="form-control <?php echo form_error('nama_barang') ? 'is-invalid':'' ?>"
                                                    type="text" name="nama_barang" id="name_barang" value="<?php echo $laporan_pengeluaran->nama_barang ?>" />
                                                <div class="invalid-feedback">
                                                    <?php echo form_error('nama_barang') ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-4" id="qty">
                                            <div class="form-group">
                                                <label for="kuantitas">Qty</label>
                                                <input class="form-control <?php echo form_error('kuantitas') ? 'is-invalid':'' ?>"
                                                    type="text" name="kuantitas" id="kuantitas" value="<?php echo $laporan_pengeluaran->kuantitas ?>" />
                                                <div class="invalid-feedback">
                                                    <?php echo form_error('kuantitas') ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-4" id="harga_satuan">
                                            <div class="form-group">
                                                <!-- <label for="harga_satuan">Qty</label> -->
                                                <input class="form-control <?php echo form_error('harga_satuan') ? 'is-invalid':'' ?>"
                                                    type="hidden" name="harga_satuan" id="harga_satuan" placeholder="" />
                                                <div class="invalid-feedback">
                                                    <?php echo form_error('harga_satuan') ?>
                                                </div>
                                            </div>
                                        </div>
                                    <!-- </div> -->

                                </div>

                                <div class="row">
                                    <div class="col-sm" id="belanja">
                                        <div class="form-group">
                                            <label for="belanja">Belanja Material</label>
                                            <input class="form-control <?php echo form_error('belanja') ? 'is-invalid':'' ?>"
                                                type="text" name="belanja" id="belanja" value="<?php echo $laporan_pengeluaran->belanja ?>" />
                                            <div class="invalid-feedback">
                                                <?php echo form_error('belanja') ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="col-sm">
                                        <div class="form-group">
                                            <label for="deskripsi">Deskripsi</label>
                                            <input class="form-control <?php echo form_error('deskripsi') ? 'is-invalid':'' ?>"
                                                type="text" name="deskripsi" id="deskripsi" value="<?php echo $laporan_pengeluaran->deskripsi ?>" />
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
                                                <option value="<?php echo $laporan_pengeluaran->akun ?>"><?php echo $laporan_pengeluaran->akun ?></option>
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
                                                type="text" name="nama_akun" id="nama_akun" value="<?php echo $laporan_pengeluaran->nama_akun ?>" />
                                            <div class="invalid-feedback">
                                                <?php echo form_error('nama_akun') ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="no_transaksi">No Transaksi</label>
                                            <input class="form-control <?php echo form_error('no_transaksi') ? 'is-invalid':'' ?>"
                                                type="text" name="no_transaksi" id="no_transaksi" value="<?php echo $laporan_pengeluaran->no_transaksi ?>" readonly />
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
                                                type="text" name="nominal" id="nominal" value="<?php echo $laporan_pengeluaran->nominal ?>" />
                                            <div class="invalid-feedback">
                                                <?php echo form_error('nominal') ?>
                                            </div>
                                        </div>
                                    </div>   -->
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="debit">Debit</label>
                                            <input class="form-control <?php echo form_error('debit') ? 'is-invalid':'' ?>"
                                                type="text" name="debit" id="debit" value="<?php echo $laporan_pengeluaran->debit ?>" readonly />
                                            <div class="invalid-feedback">
                                                <?php echo form_error('debit') ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="kredit">Kredit</label>
                                            <input class="form-control <?php echo form_error('kredit') ? 'is-invalid':'' ?>"
                                                type="text" name="kredit" id="kredit" value="<?php echo $laporan_pengeluaran->kredit ?>" readonly />
                                            <div class="invalid-feedback">
                                                <?php echo form_error('kredit') ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>  
                                
                                <input type="hidden" name="nominal" id="nominal" value="<?php echo $laporan_pengeluaran->nominal ?>" />
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

    <script>
        $(document).ready(function(){
            var qty = $('#qty').val();
            $('#jenis_pengeluaran').val();
            $('#pelaksana').hide();
            $('#belanja').hide();
            $('#kode_barang').hide();
            $('#nama_barang').hide();
            $('#qty').hide();

            $('#no_proyek').change(function(){ 
                var no_proyek=$(this).val();
                $.ajax({
                    url : "<?php echo site_url('admin/laporan_pengeluaran/getByNoPro');?>",
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

            $('#id_barang').change(function(){ 
                var id_barang=$(this).val();
                $.ajax({
                    url : "<?php echo site_url('admin/laporan_pengeluaran/getByKodeBarang');?>",
                    method : "POST",
                    data : {id_barang: id_barang},
                    async : true,
                    dataType : 'json',
                    success: function(data){
                        
                        var name_barang = '';
                        var harga_satuan = '';
                        // var qty = '';   
                        var i;
                        for(i=0; i<data.length; i++){
                            name_barang += data[i].nama_barang;
                            qty += data[i].kuantitas;
                            harga_satuan += data[i].harga_satuan;
                        }
                        var nominal = harga_satuan * qty;
                        $('#name_barang').val(name_barang);
                        $('#kuantitas').val(qty);
                        $('#harga_satuan').val(harga_satuan);
                        $('#nominal').val(nominal);

                    }
                });
                return false;
            });

            $('#kuantitas').change(function(){
                //$('#nominal').val("");
                var kuantitas = $('#kuantitas').val();
                var harga_satuan = $('#harga_satuan').val();
                var nominal = kuantitas * harga_satuan;
                $('#nominal').val(nominal);
                $('#debit').val(nominal);
                $('#kredit').val(nominal);
            });

            $('#jenis_pengeluaran').change(function(){
                if($('#jenis_pengeluaran').val() == 'PBJ') {
                    $('#pelaksana').fadeIn();
                } else if($('#jenis_pengeluaran').val() == 'PBJM') {
                    $('#pelaksana').fadeIn();
                    $('#belanja').fadeIn();
                } else if ($('#jenis_pengeluaran').val() == 'PBM') {
                    $('#kode_barang').fadeIn();
                    $('#nama_barang').fadeIn();
                    $('#qty').fadeIn();
                } else {
                    $('#pelaksana').hide();
                    $('#belanja').hide();
                    $('#kode_barang').hide();
                    $('#nama_barang').hide();
                    $('#qty').hide();
                }
            });

            $('#btn_update').on('click',function(){
                var id_pengeluaran = $('#id_pengeluaran').val();
                var no_proyek = $('#no_proyek').val();
                var nama_proyek = $('#nama_proyek').val();
                var tanggal_pengeluaran = $('#tanggal_pengeluaran').val();
                var jenis_pengeluaran = $('#jenis_pengeluaran').val();
                var pelaksana = $('#pelaksana').val();
                var belanja = $('#belanja_material').val();
                var id_barang = $('#id_barang').val();
                var nama_barang = $('#nama_barang').val();
                var kuantitas = $('#kuantitas').val();
                var deskripsi = $('#deskripsi').val();
                var akun = $('#akun').val();
                var nama_akun = $('#nama_akun').val();
                var nominal = $('#nominal').val();
                var debit = $('#debit').val();
                var kredit = $('#kredit').val();
                var no_transaksi = $('#no_transaksi').val();
                $.ajax({
                    type : "POST",
                    url  : "<?php echo site_url('admin/laporan_pengeluaran/update_pengeluaran')?>",
                    dataType : "JSON",
                    data : {id_pengeluaran:id_pengeluaran, no_proyek:no_proyek , nama_proyek:nama_proyek, tanggal_pengeluaran:tanggal_pengeluaran, jenis_pengeluaran:jenis_pengeluaran,
                    pelaksana:pelaksana, belanja:belanja, id_barang:id_barang, nama_barang:nama_barang, kuantitas:kuantitas, deskripsi:deskripsi, akun:akun, nama_akun:nama_akun, nominal:nominal, debit:debit, kredit:kredit, no_transaksi:no_transaksi},
                    success: function(data){
                        update_barang();
                    }
                });
                return false;
            });

            function update_barang()
            {
                var id_barang = $('#id_barang').val();
                var kuantitas1 = $('#kuantitas').val();
                var kuantitas2 = qty - kuantitas1;
                    $.ajax({
                    type : "POST",
                    url  : "<?php echo site_url('admin/barang/update_qty')?>",
                    dataType : "JSON",
                    data : {id_barang:id_barang, kuantitas:kuantitas2},
                    success: function(data){
                        update_jurnal();
                    }
                })
            }

            function update_jurnal()
            {
                var no_transaksi = $('#no_transaksi').val();
                var tanggal = $('#tanggal_pengeluaran').val();
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