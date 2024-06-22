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

                <?php 
                     foreach ($laporan_inventory as $key => $val) {
                         $nama_proyek = $val->nama_proyek;
                         $tanggal_input = $val->tanggal_input;
                     }

                     if(!empty($laporan_inventory)) {
                        $a = 'Nota Proyek';
                        echo '<h1>' . $nama_proyek . '</h1>';
                     }
                ?>

                <!-- DataTales Example -->
                <div class="card shadow mb-4">
                    <div class="card-body">  
                        <form action="#" class="form-input">
                            <div class="row">
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label>Start Date</label>
                                        <input type="date" class="form-control" name="statdate" id="startdate" placeholder="Start Date">
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label>End Date</label>
                                        <input type="date" class="form-control" name="enddate" id="enddate" placeholder="End Date">
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <br>
                                        <button type="submit" class="btn btn-primary">Search</button>
                                    </div>
                                </div>
                            </div>
                        </form>       
                        <div class="table-responsive">

                        <!-- <?php 
                            foreach ($laporan_inventory as $key => $val) {
                                $tanggal_input = $val->tanggal_input;
                                $no_proyek = $val->no_proyek;
                            }

                            if(!empty($laporan_inventory)) {
                                echo '<h5 class="date" style="float:right;">' ."Tanggal Belanja : " . $tanggal_input . '</h5>';
                             }
                        ?> -->
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Tipe Barang</th>
                                        <th>Merk Barang</th>
                                        <!-- <th>Nama Barang</th> -->
                                        <th>Harga Satuan</th>
                                        <th>Kuantitas</th>
                                        <th>Nama Suplier</th>
                                        <th>Total Belanja</th>
                                        <th>Keterangan</th>
                                        <th>Tanggal Input</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                        $no=0;
                                        foreach ($laporan_inventory as $laporan_inventory): $no++?>    
                                        <tr>
                                            <td><?php echo $no;?></td>
                                            <td><?php echo $laporan_inventory->tipe_barang ?></td>
                                            <td><?php echo $laporan_inventory->merk_barang ?></td>
                                            <!-- <td><?php echo $laporan_inventory->nama_barang ?></td> -->
                                            <td><?php echo number_format($laporan_inventory->harga_satuan) ?></td>
                                            <td><?php echo $laporan_inventory->kuantitas ?></td>
                                            <td><?php echo $laporan_inventory->nama_suplier ?></td>
                                            <td><?php echo number_format($laporan_inventory->total_belanja) ?></td>
                                            <td><?php echo $laporan_inventory->keterangan ?></td>
                                            <td><?php echo $laporan_inventory->tanggal_input ?></td>
                                            <td><a href="<?php echo site_url('admin/laporan_inventory/getPdf/'. $laporan_inventory->no_proyek) ?>"
                                             class="btn btn-small"><i class="fa fa-download"></i> Cetak Nota</a>
                                             <a onclick="deleteConfirm('<?php echo site_url('admin/laporan_inventory/delete/'.$laporan_inventory->id_laporan) ?>')"
                                                href="#!" class="btn btn-small text-danger"><i class="fas fa-trash"></i> Hapus</a></td>
                                            <!-- <td>
                                                <a onclick="deleteConfirm('<?php echo site_url('admin/laporan_inventory/delete/'.$laporan_inventory->id_laporan) ?>')"
                                                href="#!" class="btn btn-small text-danger"><i class="fas fa-trash"></i> Hapus</a>
                                            </td> -->
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                            <?php   
                                $total = 0;
                                $no = 1;
                                foreach($total_nota_proyek as $rows){ 
                                    $total_belanja[] = $rows->total_belanja; $total = array_sum($total_belanja);
                                    echo '<h5 class="date" style="float:right; font-style:bold;">' . "Total Belanja : " . number_format($total) . '</h5>';
                                ?>
                            <?php } ?>
                        </div> 
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</div>
<!-- End of Content Wrapper -->

    <?php $this->load->view("admin/_partials/modal.php") ?>

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
        function deleteConfirm(url){
            $('#btn-delete').attr('href', url);
            $('#deleteModal').modal();
        }   

    </script>