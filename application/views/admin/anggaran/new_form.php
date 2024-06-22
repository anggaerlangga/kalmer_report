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

                <h1 class="h3 mb-2 text-gray-800">Add Anggaran</h1>

                <?php if ($this->session->flashdata('success')): ?>
                    <div class="alert alert-success" role="alert">
                        <?php echo $this->session->flashdata('success'); ?>
                    </div>
				<?php endif; ?>

                <!-- DataTales Example -->
                <div class="card shadow mb-4">
                    <div class="card-header">
                        <a href="<?php echo site_url('admin/anggaran') ?>"><i class="fa fa-arrow-circle-left"></i>Back</a>
                    </div>
                    <div class="card-body">
                        <form action="<?php echo site_url('admin/anggaran/proses') ?>" method="post" enctype="multipart/form-data" >     
                        <div class="container">
                            <div class="row">
                                <div class="col-sm">
                                    <div class="form-group">
                                        <label for="kode_rab">Kode Transaksi</label>
                                        <input class="form-control <?php echo form_error('kode_rab') ? 'is-invalid':'' ?>"
                                            type="text" name="kode_rab" />
                                        <div class="invalid-feedback">
                                            <?php echo form_error('kode_rab') ?>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm">
                                    <div class="form-group">
                                        <label for="no_proyek">No Proyek</label>
								        <select class="form-control" name="no_proyek" id="no_proyek">
									        <option value="">No Selected</option>
									        <?php foreach($master_proyek as $row):?>
									            <option value="<?php echo $row->no_proyek;?>"><?php echo $row->no_proyek;?></option>
                       				        <?php endforeach;?>
								        </select>
                                        <div class="invalid-feedback">
                                            <?php echo form_error('no_proyek') ?>
                                        </div>
							        </div>
                                </div> 
                            </div>

                            <div class="row"> 
                                <div class="col-sm">
                                    <div class="form-group">
                                        <label for="lokasi_proyek">Lokasi Proyek</label>
                                        <input class="form-control <?php echo form_error('lokasi_proyek') ? 'is-invalid':'' ?>"
                                            type="text" name="lokasi_proyek" id="lokasi_proyek" />
                                        <div class="invalid-feedback">
                                            <?php echo form_error('lokasi_proyek') ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm">
                                    <div class="form-group">
                                        <label for="nama_proyek">Nama Proyek</label>
                                        <input class="form-control <?php echo form_error('nama_proyek') ? 'is-invalid':'' ?>"
                                            type="text" name="nama_proyek" id="nama_proyek" />
                                        <div class="invalid-feedback">
                                            <?php echo form_error('nama_proyek') ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                        
                        <h4>Uraian Pekerjaan</h4> 
                        <div class="row">
                            <div class="col-sm">
                                <div class="form-group">
                                    <input class="form-control <?php echo form_error('uraian_pekerjaan') ? 'is-invalid':'' ?>"
                                        type="text" name="uraian_pekerjaan[]" placeholder="Pekerjaan" />
                                    <div class="invalid-feedback">
                                        <?php echo form_error('uraian_pekerjaan') ?>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm">
                                <div class="form-group">
                                    <input class="form-control <?php echo form_error('volume') ? 'is-invalid':'' ?>"
                                        type="text" name="volume[]" placeholder="Volume" />
                                    <div class="invalid-feedback">
                                        <?php echo form_error('volume') ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm">
                                <div class="form-group">
                                    <input class="form-control <?php echo form_error('satuan') ? 'is-invalid':'' ?>"
                                        type="text" name="satuan[]" placeholder="Satuan" />
                                    <div class="invalid-feedback">
                                        <?php echo form_error('satuan') ?>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm">
                                <div class="form-group">
                                    <input class="form-control <?php echo form_error('harga_satuan') ? 'is-invalid':'' ?>"
                                        type="text" name="harga_satuan[]" placeholder="Harga Satuan" />
                                    <div class="invalid-feedback">
                                        <?php echo form_error('harga_satuan') ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm">
                                <div class="form-group">
                                    <input class="form-control <?php echo form_error('material_spec') ? 'is-invalid':'' ?>"
                                        type="text" name="material_spec[]" placeholder="Material" />
                                    <div class="invalid-feedback">
                                        <?php echo form_error('material') ?>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm">
                                <div class="form-group">
                                    <input class="form-control <?php echo form_error('jumlah_harga') ? 'is-invalid':'' ?>"
                                        type="text" name="jumlah_harga[]" placeholder="Jumlah Harga" />
                                    <div class="invalid-feedback">
                                        <?php echo form_error('jumlah_harga') ?>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="uraian_pekerjaan_append">
                        </div>
    
                        <input type="button" value="Add a field" class="add" id="add" />

                        <br>
                        <br>
                        <div class="row">
                            <div class="col-sm">
                                <div class="form-group"> 
                                    <!-- <label for="subtotal">Subtotal</label> -->
                                    <input class="form-control <?php echo form_error('subtotal') ? 'is-invalid':'' ?>"
                                        type="text" name="subtotal" placeholder="Subtotal" />
                                    <div class="invalid-feedback">
                                        <?php echo form_error('subtotal') ?>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm">
                                <div class="form-group">
                                    <!-- <label for="total">Total</label> -->
                                    <input class="form-control <?php echo form_error('total') ? 'is-invalid':'' ?>"
                                        type="text" name="total" placeholder="Total" />
                                    <div class="invalid-feedback">
                                        <?php echo form_error('total') ?>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm">
                                <div class="form-group">
                                    <!-- <label for="diskon">Diskon</label> -->
                                    <input class="form-control <?php echo form_error('diskon') ? 'is-invalid':'' ?>"
                                        type="text" name="diskon" placeholder="Diskon" />
                                    <div class="invalid-feedback">
                                        <?php echo form_error('diskon') ?>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm">
                                <div class="form-group">
                                    <!-- <label for="diskon">Diskon</label> -->
                                    <input class="form-control <?php echo form_error('grand_total') ? 'is-invalid':'' ?>"
                                        type="text" name="grand_total" placeholder="Grand Total" />
                                    <div class="invalid-feedback">
                                        <?php echo form_error('grand_total') ?>
                                    </div>
                                </div>
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

    <script>

     $(document).ready(function(){
        $('#no_proyek').change(function(){ 
            var no_proyek=$(this).val();
            $.ajax({
                url : "<?php echo site_url('admin/anggaran/getByNoPro');?>",
                method : "POST",
                data : {no_proyek: no_proyek},
                async : true,
                dataType : 'json',
                success: function(data){
                    
                    var nama_proyek = '';
                    var lokasi_proyek = '';
                    var i;
                    for(i=0; i<data.length; i++){
                        nama_proyek += data[i].nama_proyek;
                        lokasi_proyek += data[i].lokasi_proyek;
                    }
                    $('#nama_proyek').val(nama_proyek);
                    $('#lokasi_proyek').val(lokasi_proyek);

                }
            });
            return false;
        }); 

        var max_fields_limit = 10;
        var x = 1;
        $('#add').click(function(e) {
            e.preventDefault();
            if(x < max_fields_limit) {
                x++;
                $('.uraian_pekerjaan_append').append('<div class="row"><div class="col-sm"><input type="text" class="form-control" name="uraian_pekerjaan[]" placeholder="Pekerjaan" /></div><div class="col-sm"><input type="text" class="form-control" name="volume[]" placeholder="Volume" /></div></div><br><div class="row"><div class="col-sm"><input type="text" class="form-control" name="satuan[]" placeholder="Satuan" /></div><div class="col-sm"><input type="text" class="form-control" name="harga_satuan[]" placeholder="Harga Satuan" /></div></div><br><div class="row"><div class="col-sm"><input type="text" class="form-control" name="material_spec[]" placeholder="Material" /></div><div class="col-sm"><input type="text" class="form-control" name="jumlah_harga[]" placeholder="Jumlah Harga" /></div></div><br>');
            }
        })
        
    });

    </script>

</body>

</html>