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

                <h1 class="h3 mb-2 text-gray-800">Add inventory</h1>

                <?php if ($this->session->flashdata('success')): ?>
                    <div class="alert alert-success" role="alert">
                        <?php echo $this->session->flashdata('success'); ?>
                    </div>
				<?php endif; ?>

                <!-- DataTales Example -->
                <div class="card shadow mb-4">
                    <div class="card-header">
                        <a href="<?php echo site_url('admin/laporan_inventory') ?>"><i class="fa fa-arrow-circle-left"></i>Back</a>
                    </div>
                    <div class="card-body">
                        <form action="<?php echo site_url('admin/laporan_inventory/add') ?>" method="post" enctype="multipart/form-data" >    
                            <div class="container">
                                <div class="row">
                                    <div class="col-sm">
                                        <div class="form-group">
                                            <label for="no_proyek">No Proyek</label>
                                            <select class="form-control" name="no_proyek" id="no_proyek">
                                                <option value="">No Selected</option>
                                                <option value="OPS">OPS</option>
                                                <?php foreach($master_proyek as $row):?>
                                                    <option value="<?php echo $row->no_proyek;?>"><?php echo $row->no_proyek;?></option>
                                                <?php endforeach;?>
                                            </select>
                                            <div class="invalid-feedback">
                                                <?php echo form_error('no_proyek') ?>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm">
                                        <div class="form-group">
                                            <label for="nama_proyek">Nama Proyek</label>
                                            <input class="form-control <?php echo form_error('nama_proyek') ? 'is-invalid':'' ?>"
                                                type="text" name="nama_proyek" id="nama_proyek" placeholder="Nama Proyek" />
                                            <div class="invalid-feedback">
                                                <?php echo form_error('nama_proyek') ?>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm" id="kode_barang">
                                        <div class="form-group">
                                            <label for="id_barang">Kode Barang</label>
                                            <select class="form-control" name="id_barang" id="id_barang">
                                                <option value="">No Selected</option>
                                                <?php foreach($master_barang as $row):?>
                                                    <option value="<?php echo $row->id_barang;?>"><?php echo $row->id_barang;?></option>
                                                <?php endforeach;?>
                                            </select>
                                            <div class="invalid-feedback">
                                                <?php echo form_error('id_barang') ?>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm" id="nama_barang">
                                        <div class="form-group">
                                            <label for="nama_barang">Nama Barang</label>
                                            <input class="form-control <?php echo form_error('nama_barang') ? 'is-invalid':'' ?>"
                                                type="text" name="nama_barang" id="name_barang" placeholder="" />
                                            <div class="invalid-feedback">
                                                <?php echo form_error('nama_barang') ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm" id="qty">
                                        <div class="form-group">
                                            <label for="kuantitas">Kuantitas</label>
                                            <input class="form-control <?php echo form_error('kuantitas') ? 'is-invalid':'' ?>"
                                                type="text" name="kuantitas" id="kuantitas" placeholder="" />
                                            <div class="invalid-feedback">
                                                <?php echo form_error('kuantitas') ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm" id="harga_satuan">
                                        <div class="form-group">
                                            <label for="harga_satuan">Harga Satuan</label>
                                            <input class="form-control <?php echo form_error('harga_satuan') ? 'is-invalid':'' ?>"
                                                type="text" name="harga_satuan" id="harga_satuan" placeholder="" />
                                            <div class="invalid-feedback">
                                                <?php echo form_error('kuantitas') ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm">
                                        <div class="form-group">
                                            <label for="nama_suplier">Nama Suplier</label>
                                            <input class="form-control <?php echo form_error('nama_suplier') ? 'is-invalid':'' ?>"
                                                type="text" name="nama_suplier" id="nama_suplier" placeholder="" />
                                            <div class="invalid-feedback">
                                                <?php echo form_error('nama_suplier') ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm">
                                        <div class="form-group">
                                            <label for="total_belanja">Total Belanja</label>
                                            <input class="form-control <?php echo form_error('total_belanja') ? 'is-invalid':'' ?>"
                                                type="text" name="total_belanja" id="total_belanja" placeholder="" />
                                            <div class="invalid-feedback">
                                                <?php echo form_error('total_belanja') ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm">
                                        <div class="form-group">
                                            <label for="keterangan">Keterangan</label>
                                            <textarea class="form-control" rows="4" cols="50" <?php echo form_error('keterangan') ? 'is-invalid':'' ?>
                                                name="keterangan" id="keterangan">
                                                </textarea>
                                            <div class="invalid-feedback">
                                                <?php echo form_error('keterangan') ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm">
                                        <div class="form-group">
                                            <label for="Foto">Foto</label>
                                            <input class="form-control" type="file" name="photo" id="photo">
                                        </div>
                                    </div>
                                </div>
                                
                                <input type="hidden" name="nominal" id="nominal" />                                                
                                <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                                <input class="btn btn-success" type="submit" name="btn" id="btn_save" value="Save" />
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
            // var kode_transaksi = '';
            $('#belanja').hide();
            // $('#nama_barang').hide();
            // $('#qty').hide();
            $('#no_proyek').change(function(){ 
                var no_proyek=$(this).val();
                $.ajax({
                    url : "<?php echo site_url('admin/laporan_inventory/getByNoPro');?>",
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

            $('#id_barang').change(function(){ 
                var id_barang=$(this).val();
                $.ajax({
                    url : "<?php echo site_url('admin/laporan_inventory/getByKodeBarang');?>",
                    method : "POST",
                    data : {id_barang: id_barang},
                    async : true,
                    dataType : 'json',
                    success: function(data){
                        
                        var name_barang = '';
                        var harga_satuan = '';
                        var qty = '';   
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

            // $('#kuantitas').change(function(){
            //     $('#nominal').val("");
            //     var kuantitas = $('#kuantitas').val();
            //     var harga_satuan = $('#harga_satuan').val();
            //     var nominal = kuantitas * harga_satuan;
            //     $('#nominal').val(nominal);
            //     $('#debit').val(nominal);
            //     $('#kredit').val(nominal);
            // });

            //Save product
            $('#btn_save').on('click',function(){
                var no_proyek = $('#no_proyek').val();
                var nama_proyek = $('#nama_proyek').val();
                var id_barang = $('#id_barang').val();
                var nama_barang = $('#name_barang').val();
                var harga_satuan = $('#harga_satuan').val();
                var kuantitas = $('#kuantitas').val();
                var nama_suplier = $('#nama_suplier').val();
                var keterangan = $('#keterangan').val();
                var total_belanja = $('#total_belanja').val();
                let currentDate = new Date();
                let time = currentDate.getFullYear() + currentDate.getMonth() + currentDate.getHours() + currentDate.getMinutes() + currentDate.getSeconds();
                //let no_transaksi = "CR"+time; 
                // kode_transaksi = "CR"+time;
                $.ajax({
                    type : "POST",
                    url  : "<?php echo site_url('admin/laporan_inventory/save_inventory')?>",
                    dataType : "JSON",
                    data : {no_proyek:no_proyek , nama_proyek:nama_proyek, id_barang:id_barang, nama_barang:nama_barang, harga_satuan:harga_satuan, kuantitas:kuantitas,
                    nama_suplier:nama_suplier, keterangan:keterangan, total_belanja:total_belanja, tanggal_input:time},
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
                        // add_jurnal();
                        alert("Penambahan data berhasil");
                        //$("form").trigger("reset");
                    }
                })
            }
        }); 
    </script>   

</body>

</html>