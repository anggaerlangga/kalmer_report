        <!-- The Modal -->
        <div class="modal fade" id="addModal">
            <div class="modal-dialog">
                <div class="modal-content">
                <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Input Laporan Inventory</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <!-- Modal body -->
                    <div class="modal-body">
                        <div id="tampil_modal">
                            <!-- Data akan di tampilkan disini-->
                            <form enctype="multipart/form-data" >    
                                <div class="container">
                                    <div class="row">
                                        <div class="col-sm">
                                            <div class="form-group">
                                                <label for="no_proyek">No Proyek</label>
                                                <select class="form-control" name="no_proyek" id="no_proyek">
                                                    <option value="">No Selected</option>
                                                    <option value="OPS">OPS</option>
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
                                    </div>

                                    <div class="row">
                                        <div class="col-sm" id="tipe_barang">
                                            <div class="form-group">
                                                <label for="tipe_barang">Tipe Barang</label>
                                                <input class="form-control" type="text" name="tipe_barang" id="s_tipe" /> 
                                                <div class="invalid-feedback">
                                                    <?php echo form_error('tipe_barang') ?>
                                                </div>
                                                <label>Data pada Database :</label>
                                                <div id="list"></div>
                                            </div>            
                                        </div>
                                        <div class="col-sm">
                                            <div class="form-group">
                                                <label for="merk_barang">Merk Barang</label>
                                                <select class="form-control" name="merk_barang" id="merk_barang">
                                                    <!-- <option value="OTH">Lain - lain</option> -->
                                                    <!-- <?php foreach($master_barang as $row):?>
                                                        <option value="<?php echo $row->merk_barang;?>"><?php echo $row->merk_barang;?></option>
                                                    <?php endforeach;?> -->
                                                </select>
                                                <div class="invalid-feedback">
                                                    <?php echo form_error('merk_barang') ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row" id="merk_barang_2">
                                        <div class="col-sm">
                                            <div class="form-group">
                                                <label for="merk_barang">Merk Barang</label>
                                                <input class="form-control <?php echo form_error('merk_barang') ? 'is-invalid':'' ?>"
                                                    type="text" name="merk_barang" id="merk_barang_hide" placeholder="Isi Merk Barang ..." />
                                                <div class="invalid-feedback">
                                                    <?php echo form_error('merk_barang') ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                 
                                    <!-- <div class="row"> -->
                                        <!-- <div class="col-sm" id="kode_barang">
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
                                        </div> -->
                                        
                                        <!-- <div class="col-sm">
                                            <div class="form-group">
                                                <label for="nama_barang">Nama Barang</label>
                                                <select class="form-control" name="nama_barang" id="name_barang">
                                                </select>
                                                <div class="invalid-feedback">
                                                    <?php echo form_error('nama_barang') ?>
                                                </div>
                                            </div>
                                        </div> -->
                                    <!-- </div> -->
                                    
                                    <!-- <div class="row" id="nama_barang_2">
                                        <div class="col-sm">
                                            <div class="form-group">
                                                <label for="nama_barang">Nama Barang</label>
                                                <input class="form-control <?php echo form_error('nama_barang') ? 'is-invalid':'' ?>"
                                                    type="text" name="nama_barang" id="name_barang_hide" placeholder="Isi Nama Barang ..." />
                                                <div class="invalid-feedback">
                                                    <?php echo form_error('nama_barang') ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div> -->

                                    <div class="row">
                                        <div class="col-sm">
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
                                                <label for="kuantitas">Kuantitas</label>
                                                <input class="form-control <?php echo form_error('kuantitas') ? 'is-invalid':'' ?>"
                                                    type="text" name="kuantitas" id="kuantitas" placeholder="" />
                                                <div class="invalid-feedback">
                                                    <?php echo form_error('kuantitas') ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
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
                                                <label for="no_telp">Telp Suplier</label>
                                                <input class="form-control <?php echo form_error('no_telp') ? 'is-invalid':'' ?>"
                                                    type="text" name="no_telp" id="no_telp" placeholder="" />
                                                <div class="invalid-feedback">
                                                    <?php echo form_error('no_telp') ?>
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
                                                <textarea class="form-control" rows="4" cols="50" name="keterangan" id="keterangan">
                                                </textarea>
                                                <div class="invalid-feedback">
                                                    <?php echo form_error('keterangan') ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm">
                                            <div class="form-group">
                                                <label for="tanggal">Tanggal Input</label>
                                                <input type="date" class="form-control" name="tanggal_input" id="tanggal_input">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm">
                                            <div class="form-group">
                                                <label for="Foto">Foto</label>
                                                <input class="form-control" type="file" name="photo" id="photo">
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <input type="hidden" name="id_barang" id="id_barang">
                                    <input type="hidden" name="nominal" id="nominal" />                                                
                                    <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                                    <input class="btn btn-success" type="submit" name="btn" id="btn_save" value="Save" />

                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Bootstrap core JavaScript-->
        <script src="<?php echo base_url('vendor/jquery/jquery.min.js') ?>"></script>
        <script src="<?php echo base_url('vendor/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>

        <!-- Core plugin JavaScript-->
        <script src="<?php echo base_url('vendor/jquery-easing/jquery.easing.min.js') ?>"></script>

        <?php $this->load->view("admin/_partials/sukses.php") ?>
        
        <script type="text/javascript">
            $(document).ready(function(){

                // load_data();
                var response = "";
                $.ajax({
                    url: "<?php echo site_url('admin/laporan_inventory/getAllProyek');?>",
                    context: document.body,
                    success: function (response) {
                        var json_obj = $.parseJSON(response);
                        var output = "<select>";
                        output += "<option value=" + "" + ">" + "--- No Proyek ---" + "</option>";
                        for (var i in json_obj) {
                            output += "<option value=" + json_obj[i].no_proyek + ">" + json_obj[i].no_proyek + "</option>";
                        }
                        output += "</select>";
                        $('#no_proyek').html(output);
                    }
                });

                // $.ajax({
                //     url: "<?php echo site_url('admin/laporan_inventory/getAllBarang');?>",
                //     context: document.body,
                //     success: function (response) {
                //         var json_obj = $.parseJSON(response);
                //         var output = "<select>";
                //         for (var i in json_obj) {
                //             output += "<option value=" + json_obj[i].id_barang + ">" + json_obj[i].id_barang + "</option>";
                //         }
                //         output += "</select>";
                //         $('#id_barang').html(output);
                //     }
                // });

                function load_data(tipe_barang)
                {
                    $.ajax({
                        method:"POST",
                        url:"<?php echo site_url('admin/barang/getTipeBarang');?>",
                        data: {tipe_barang: tipe_barang},
                        success:function(data)
                        {  
                            $('#list').html(data);                       
                        }
                    });
                }

                $('#s_tipe').keyup(function(){
                     var tipe_barang = $('#s_tipe').val();
                     if(tipe_barang != '')
                     {
                        load_data(tipe_barang);
                     } else {
                        return null;
                     }
                    if(tipe_barang.length > 3) {
                        $.ajax({
                            url : "<?php echo site_url('admin/barang/getMerkBarang');?>",
                            method : "POST",
                            data : {tipe_barang: tipe_barang},
                            async : true,
                            dataType : 'json',
                            success: function(data){
                                var merk_barang = '';
                                var i;
                                var output = "<select class='form-control'>";
                                for (var i in data) {
                                    output += "<option value=" + data[i].merk_barang + ">" + data[i].merk_barang + "</option>";
                                }
                                output += "<option value=" + "OTH" + ">" + "Lain-lain" + "</option>";
                                output += "</select>";
                                $('#merk_barang').html(output);
                                $('#merk_barang').val(output);
                            }
                        });
                        return false;
                    }
                });

                $('#merk_barang_2').hide();
                $('#merk_barang').change(function(){ 
                    var merk_barang = $(this).val();
                    $.ajax({
                        url : "<?php echo site_url('admin/barang/getNamaBarang');?>",
                        method : "POST",
                        data : {merk_barang: merk_barang},
                        async : true,
                        dataType : 'json',
                        success: function(data){     
                            var nama_barang = '';
                            var id_barang = '';
                            // var qty = '';
                            var i;
                            var output = "<select class='form-control'>";
                            for(i=0; i<data.length; i++){
                                output += "<option value=" + data[i].nama_barang + ">" + data[i].nama_barang + "</option>";
                                // id_barang += data[i].id_barang;
                                // qty += data[i].kuantitas;
                            }
                            output += "<option value=" + "OTH" + ">" + "Lain-lain" + "</option>";
                            output += "</select>";
                            // selectElement = document.querySelector('#merk_barang');
                            // nama_barang = selectElement.value;
                            // $('#id_barang').val(id_barang);
                            // $('#kuantitas').val(qty);
                            // $('#name_barang').html(output);

                            if($('#merk_barang').val() == 'OTH') {
                                $('#merk_barang_2').fadeIn();
                                // $('#nama_barang_2').fadeIn();
                            } else if($('#merk_barang').val() != 'OTH') {
                                $('#merk_barang_2').hide();
                                // $('#nama_barang_2').hide();
                            }
                        }
                    }); 
                    return false; 
                });

                // $('#name_barang').change(function(){ 
                //     var ddlViewBy = document.getElementById('name_barang');
                //     var value = ddlViewBy.options[ddlViewBy.selectedIndex].text;
                //     $.ajax({
                //         url : "<?php echo site_url('admin/barang/getKuantitas');?>",
                //         method : "POST",
                //         data : {value: value},
                //         async : true,
                //         dataType : 'json',
                //         success: function(data){
                //             console.log(data);
                //             var qty = '';
                //             var id_barang = '';  
                //             var i;
                //             for(i=0; i<data.length; i++){
                //                 qty += data[i].kuantitas;
                //                 id_barang += data[i].id_barang;
                //             }   
                //             $('#kuantitas').val(qty);
                //             $('#id_barang').val(id_barang);
                //         }
                //     }); 
                //      return false;            
                // });


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

                $('#kuantitas').change(function(){
                    $('#nominal').val("");
                    var kuantitas = $('#kuantitas').val();
                    var harga_satuan = $('#harga_satuan').val();
                    var nominal = kuantitas * harga_satuan;
                    $('#total_belanja').val(nominal);
                });

                // $('#id_barang').change(function(){ 
                //     var id_barang=$(this).val();
                //     $.ajax({
                //         url : "<?php echo site_url('admin/laporan_inventory/getByKodeBarang');?>",
                //         method : "POST",
                //         data : {id_barang: id_barang},
                //         async : true,
                //         dataType : 'json',
                //         success: function(data){
                            
                //             var name_barang = '';
                //             var harga_satuan = '';
                //             var qty = '';   
                //             var i;
                //             for(i=0; i<data.length; i++){
                //                 name_barang += data[i].nama_barang;
                //                 qty += data[i].kuantitas;
                //                 harga_satuan += data[i].harga_satuan;
                //             }
                //             var nominal = harga_satuan * qty;
                //             $('#name_barang').val(name_barang);
                //             $('#kuantitas').val(qty);
                //             $('#harga_satuan').val(harga_satuan);
                //             $('#nominal').val(nominal);

                //         }
                //     });
                //     return false;
                // });

            });

            $('#btn_save').on('click',function(){
                var no_proyek = $('#no_proyek').val();
                var nama_proyek = $('#nama_proyek').val();
                var tipe_barang = $('#s_tipe').val();
                var merk_barang = $('#merk_barang').val();
                // var ddlViewBy = document.getElementById('name_barang');
                // var value = ddlViewBy.options[ddlViewBy.selectedIndex].text;
                // var nama_barang = value;
                var id_barang = $('#id_barang').val();
                var kuantitas = $('#kuantitas').val();
                var harga_satuan = $('#harga_satuan').val();
                var nama_suplier = $('#nama_suplier').val();
                var no_telp = $('#no_telp').val();
                var total_belanja = $('#total_belanja').val();
                var keterangan = $('#keterangan').val();
                var photo = $('#photo').val();
                let currentDate = new Date();
                var tanggal_input = $('#tanggal_input').val();
                let time = currentDate.getFullYear() + currentDate.getMonth() + currentDate.getHours() + currentDate.getMinutes() + currentDate.getSeconds();
                let id_barang_gen = 'BRG' + time;
                if($('#merk_barang').val() == '' || $('#merk_barang').val() == 'OTH'){
                    var merk_barang = $('#merk_barang_hide').val();
                }
                // if($('#name_barang').val() == '' || $('#name_barang').val() == 'OTH'){
                //     var nama_barang = $('#name_barang_hide').val();
                // }
                if($('#id_barang').val() == ''){
                    var id_barang = id_barang_gen;
                }
                    //let no_transaksi = "CR"+time; 
                    // kode_transaksi = "CR"+time;
                $.ajax({
                    type : "POST",
                    url  : "<?php echo site_url('admin/laporan_inventory/save_inventory')?>",
                    dataType : "JSON",
                    data : {no_proyek:no_proyek, nama_proyek:nama_proyek, tipe_barang:tipe_barang, merk_barang:merk_barang, id_barang:id_barang, kuantitas:kuantitas, harga_satuan:harga_satuan, nama_suplier:nama_suplier, no_telp:no_telp, total_belanja:total_belanja, keterangan:keterangan, photo:photo, tanggal_input:tanggal_input},
                    success: function(data){
                        console.log(data);
                        if(data == true){
                            // cekData();
                            sukses();
                        }
                        //update_barang();
                    }
                });
                return false;
            });

            function cekData()
            {
                var id_barang = $('#id_barang').val();
                $.ajax({
                    url : "<?php echo site_url('admin/barang/cekBarang');?>",
                    method : "POST",
                    data : {id_barang: id_barang},
                    async : true,
                    dataType : 'json',
                    success: function(data){
                        var i;
                        for(i=0; i<data.length; i++){
                            if(data.length() > 1) {
                                update_barang(id_barang);
                            } else {
                                tambah_barang();
                                // return "gagal";
                            }
                        }  
                    }
                }); 
                return false;     
            }

            function update_barang(id_barang)
            {
                // var id_barang = $('#id_barang').val();
                var kuantitas1 = $('#kuantitas').val();
                var kuantitas2 = qty - kuantitas1;
                $.ajax({
                    type : "POST",
                    url  : "<?php echo site_url('admin/barang/update_qty')?>",
                    dataType : "JSON",
                    data : {id_barang:id_barang, kuantitas:kuantitas2},
                    success: function(data){
                        sukses();
                        // add_jurnal();
                        // alert("Penambahan data berhasil");
                        //$("form").trigger("reset");
                    }
                });
            }

            function sukses(){
                $('#suksesModal').modal();
            }

        </script> 