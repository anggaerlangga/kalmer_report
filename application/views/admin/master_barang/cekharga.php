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

                <h1 class="h3 mb-2 text-gray-800">Cek Harga Barang</h1>

                <!-- DataTales Example -->
                <div class="card shadow mb-4">
                    <div class="card-header">
                        <a href="<?php echo site_url('admin/barang') ?>"><i class="fa fa-arrow-circle-left"></i>Back</a>
                    </div>
                    <div class="card-body">
                        <form action="#" method="post" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-sm-8" id="nama_barang">
                                    <div class="form-group">
                                        <label for="nama_barang">Nama Barang :</label>
                                        <input class="form-control" type="text" name="nama_barang" id="s_nama" /> 
                                        <div class="invalid-feedback">
                                            <?php echo form_error('nama_barang') ?>
                                        </div>
                                        <label>Barang yang ditemukan :</label>
                                        <div id="list"></div>
                                    </div>            
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <input class="form-control <?php echo form_error('harga_satuan') ? 'is-invalid':'' ?>"
                                            type="text" name="harga_satuan" id="harga_satuan" placeholder = "Harga Barang ..." />
                                        <div class="invalid-feedback">
                                            <?php echo form_error('harga_satuan') ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <button class="btn btn-primary" id="cek" role="button">Validasi</button>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-8">
                                    <div class="yellow" id="yellow" style="height:80px; background:#f1c40f; display:none;"></div>
                                    <div class="red" id="red" style="height:80px; background:#c0392b; display:none;"></div>
                                    <div class="green" id="green" style="height:80px; background:#2ecc71; display:none;"></div>
                                </div>
                            </div>

                            <input type="hidden" name="id_barang" id="id_barang">
                            <input type="hidden" name="harga_barang" id="harga_barang">

                        </form>
                    </div>
                </div>
            </div> 
        </div>
    </div>
</body>

    <!-- Bootstrap core JavaScript-->
    <script src="<?php echo base_url('vendor/jquery/jquery.min.js') ?>"></script>
    <script src="<?php echo base_url('vendor/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?php echo base_url('vendor/jquery-easing/jquery.easing.min.js') ?>"></script>

    <script type="text/javascript">
        $(document).ready(function(){

            $('#yellow').hide();
            $('#red').hide();

            function load_data(nama_barang)
                {
                    $.ajax({
                        method:"POST",
                        url:"<?php echo site_url('admin/barang/getNamaBarang');?>",
                        data: {nama_barang: nama_barang},
                        async : true,
                        dataType : 'json',
                        success:function(data)
                        {  
                            var i;
                            console.log(data);
                            var output = "<ul>";
                            for (var i=0; i < data.length; i++) {
                                output += "<li>" + data[i].nama_barang + "</li>";
                            }
                            output += "</ul>";
                            $('#list').html(output);                     
                        }
                    });
                }

            $('#s_nama').keyup(function(){
                var nama_barang = $('#s_nama').val();
                if(nama_barang != '')
                    {
                        load_data(nama_barang);
                    } else {
                        return null;
                    }
                if(nama_barang.length > 3) {
                    $.ajax({
                        url : "<?php echo site_url('admin/barang/getNamaBarang');?>",
                        method : "POST",
                        data : {nama_barang: nama_barang},
                        async : true,
                        dataType : 'json',
                        success: function(data){
                            var harga_barang = '';
                            var i;
                            for (var i in data) {
                                harga_barang = data[i].harga_satuan;
                                console.log(harga_barang);
                                $('#harga_barang').val(harga_barang);
                            }
                           // var id_barang = '';
                           // var i;
                            // var output = "<select class='form-control'>";
                           // for (var i in data) {
                           //     output += data[i].merk_barang;
                           // }
                            // output += "<option value=" + "OTH" + ">" + "Lain-lain" + "</option>";
                            // output += "</select>";
                            // $('#merk_barang').html(output);
                            // $('#merk_barang').val(output);
                        }
                    });
                        return false;
                }
            });

            // $('#harga_satuan').keyup(function(){
            //     var harga_satuan = $('#harga_satuan').val();
            //     var harga_barang = $('#harga_barang').val();
            //     if(harga_satuan > harga_barang) {
            //         output = "Harga lebih mahal dari rate!."
            //         $('#red').fadeIn();
            //         $('#red').html(output);
            //     }
            //     else if (harga_satuan < harga_barang) {
            //         output = "Harga lebih murah dari rate!."
            //         $('#yellow').fadeIn();
            //         $('#yellow').html(output);
            //     }
                
            //     else if (harga_satuan == harga_barang) {
            //         output = "Harga sama dengan rate!."
            //         $('#green').fadeIn();
            //         $('#green').html(output);
            //     } else {
            //         output = "Silahkan cek inputan harga."
            //     }
            //     return false;
            // });

            $('#cek').on('click',function(){
                let harga_satuan = $('#harga_satuan').val();
                let harga_barang = $('#harga_barang').val();
                $('#yellow').hide();
                $('#red').hide();
                $('#green').hide();

                if(parseInt(harga_satuan) > parseInt(harga_barang)) {
                    output = "<p style='color:#ffff; padding:15px; font-style:bold;'>Harga lebih mahal dari rate!.</p>";
                    console.log("harga_satuan"+harga_satuan);
                    console.log("harga_barang"+harga_barang);
                    $('#red').fadeIn();
                    $('#red').html(output);
                }
                else if (parseInt(harga_satuan) < parseInt(harga_barang)) {
                    output = "<p style='color:#ffff; padding:15px; font-style:bold;'>Harga lebih murah dari rate!.</p>";
                    console.log("harga_satuan"+harga_satuan);
                    console.log("harga_barang"+harga_barang);
                    $('#yellow').fadeIn();
                    $('#yellow').html(output);
                }
                
                else if (parseInt(harga_satuan) == parseInt(harga_barang)) {
                    output = "<p style='color:#ffff; padding:15px; font-style:bold;'>Harga sama dengan rate!.</p>";
                    console.log("harga_satuan"+harga_satuan);
                    console.log("harga_barang"+harga_barang);
                    console.log(output);
                    $('#green').fadeIn();
                    $('#green').html(output);
                } else {
                    alert("Silahkan cek inputan harga.");
                }
                return false;
            });

        });

    </script>