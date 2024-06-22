<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Nota Belanja</title>

    <!-- Custom fonts for this template-->
    <link href="<?php echo base_url('vendor/fontawesome-free/css/all.min.css') ?>" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" type="text/css" rel="stylesheet" />

</head>
<body>
    <h1 class="text-center bg-info">NOTA BELANJA PROYEK</h1>
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th>No</th>
                <th>Tipe Barang</th>
                <th>Merk Barang</th>
                <th>Kuantitas</th>
                <th>Keterangan</th>
            </tr>
        </thead>
        <tbody>
            <?php 
                $no=0;
                foreach ($laporan_inventory as $laporan_inventory): $no++?>
            <tr>
                <td><?php echo $no; ?></td>
                <td><?php echo $laporan_inventory->tipe_barang ?></td>
                <td><?php echo $laporan_inventory->merk_barang ?></td>
                <td><?php echo $laporan_inventory->kuantitas ?></td>
                <td><?php echo $laporan_inventory->keterangan ?></td>
            </tr>
            <?php endforeach; ?>
        <tbody>
</table>

    <?php   
        $total = 0;
        $no = 1;
        foreach($total_nota_proyek as $rows){ 
            $total_belanja[] = $rows->total_belanja;
            $total = array_sum($total_belanja);
            $prof = $total*0.25+$total;
            $include_ppn = $prof*0.11+$prof;
            echo '<h1 class="date" style="float:right; font-style:bold;">' . "Total Belanja : " . number_format($include_ppn) . '</h1>';
        ?>
    <?php } ?>

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

</body>
</html>