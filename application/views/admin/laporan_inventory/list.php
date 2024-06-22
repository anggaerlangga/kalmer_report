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

                <h1 class="h3 mb-2 text-gray-800">Daftar Inventory</h1>

                <!-- DataTales Example -->
                <div class="card shadow mb-4">
                    <div class="card-header">
                            <!-- Button to Open the Modal -->
                        <a href="#!" onclick="tambah()" class="btn btn-primary"><i class="fas fa-plus"></i> Tambah</a>
                        <!-- <a href="<?php echo site_url('admin/laporan_inventory/excel') ?>"
                                                class="btn btn-small"><i class="fa fa-download"></i> Download to Excel</a> -->
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>No Proyek</th>
                                        <th>Nama Proyek</th>
                                        <!-- <th>Tipe Barang</th>
                                        <th>Merk Barang</th>
                                        <th>Kode Barang</th> -->
                                        <!-- <th>Nama Barang</th> -->
                                        <!-- <th>Harga Satuan</th>
                                        <th>Kuantitas</th>
                                        <th>Nama Suplier</th>
                                        <th>Total Belanja</th>
                                        <th>Keterangan</th>
                                        <th>Tanggal Input</th>
                                        <th>Photo</th> -->
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                        $no=0;
                                        foreach ($laporan_inventory as $laporan_inventory): $no++?>
                                    <tr>
                                        <td><?php echo $no;?></td>
                                        <td><?php echo $laporan_inventory->no_proyek ?></td>
                                        <td><?php echo $laporan_inventory->nama_proyek ?></td>
                                        <!-- <td><?php echo $laporan_inventory->tipe_barang ?></td>
                                        <td><?php echo $laporan_inventory->merk_barang ?></td> -->
                                        <!-- <td><?php echo $laporan_inventory->id_barang ?></td> -->
                                        <!-- <td><?php echo $laporan_inventory->nama_barang ?></td> -->
                                        <!-- <td><?php echo $laporan_inventory->harga_satuan ?></td>
                                        <td><?php echo $laporan_inventory->kuantitas ?></td>
                                        <td><?php echo $laporan_inventory->nama_suplier ?></td>
                                        <td><?php echo $laporan_inventory->total_belanja ?></td>
                                        <td><?php echo $laporan_inventory->keterangan ?></td>
                                        <td><?php echo $laporan_inventory->tanggal_input ?></td> -->
                                        <!-- <td>
											<img src="<?php echo base_url('upload/homepage/'.$laporan_inventory->photo) ?>" width="64" />
										</td> -->
                                        <td>
                                            <!-- <a href="<?php echo site_url('admin/laporan_inventory/edit/'.$laporan_inventory->id_laporan) ?>"
                                            class="btn btn-small"><i class="fas fa-edit"></i> Edit</a> -->
                                            <a href="<?php echo site_url('admin/laporan_inventory/getNoteByNoPro/'.$laporan_inventory->no_proyek) ?>"
                                            class="btn btn-small"><i class="fas fa-book"></i> Nota</a>
                                            <!-- <a onclick="deleteConfirm('<?php echo site_url('admin/laporan_inventory/delete/'.$laporan_inventory->id_laporan) ?>')"
                                            href="#!" class="btn btn-small text-danger"><i class="fas fa-trash"></i> Hapus</a> -->
										</td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
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

    <?php $this->load->view("admin/_partials/modal.php") ?>
    <?php $this->load->view("admin/laporan_inventory/tambah.php") ?>

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

    <script>
        $(document).ready(function(){

            $('.tambah').click(function(){
                var aksi = 'Tambah Inventory';
                $.ajax({
                    url: '<?php echo site_url('admin/laporan_inventory/tambah');?>',
                    method: 'post',
                    data: {aksi:aksi},
                    success:function(){
                        $('#myModal').modal("show");
                    }
                });
            });
            
        });

        function tambah(){
            $('#addModal').modal();
        }

        function deleteConfirm(url){
            $('#btn-delete').attr('href', url);
            $('#deleteModal').modal();
        }   

    </script>

</body>

</html>