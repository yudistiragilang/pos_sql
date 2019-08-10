<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Produk By Squad Qurang Liburan">
    <meta name="author" content="POS SQL">

    <title>Transaksi Penjualan</title>

    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url().'assets/css/bootstrap.min.css'?>" rel="stylesheet">
	<link href="<?php echo base_url().'assets/css/style.css'?>" rel="stylesheet">
	<link href="<?php echo base_url().'assets/css/font-awesome.css'?>" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="<?php echo base_url().'assets/css/4-col-portfolio.css'?>" rel="stylesheet">
    <link href="<?php echo base_url().'assets/css/dataTables.bootstrap.min.css'?>" rel="stylesheet">
    <link href="<?php echo base_url().'assets/css/jquery.dataTables.min.css'?>" rel="stylesheet">
    <link href="<?php echo base_url().'assets/dist/css/bootstrap-select.css'?>" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/bootstrap-datetimepicker.min.css'?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/jquery-ui.css'?>">
</head>

<body>

    <!-- Navigation -->
   <?php
        $this->load->view('admin/menu');
   ?>

    <!-- Page Content -->
    <div class="container">
        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
            <center><?php echo $this->session->flashdata('msg');?></center>
                <h1 class="page-header">Transaksi
                    <small>Penjualan (Eceran)</small>
                    <a href="#" data-toggle="modal" data-target="#largeModal" class="pull-right"><small>Cari Produk!</small></a>
                </h1>
            </div>
        </div>
        <!-- /.row -->
        <!-- Projects Row -->
        <div class="row">
            <div class="col-lg-12">
            <form action="<?php echo base_url().'admin/penjualan/add_to_cart'?>" method="post">
            <!-- <div class="col-lg-12 row"> -->
                <table class="table">
                    <tr>
                        <th>Kode Barang <a data-toggle="modal" id="ScanKode" data-target="#ModalScan">[ <i class="fa fa-qrcode"></i> ]</a></th>
                        <th>Nama Barang</th>
                        <th>Satuan</th>
                        <th>Stok</th>
                        <th>Harga(Rp)</th>
                        <th>Diskon(Rp)</th>
                        <th>Jumlah</th>
                        <th></th>
                    </tr>
                    <tr>
                        <td style="width:150px;"><input type="text" name="kode_brg" id="kode_brg" class="form-control input-sm" placeholder="BR..."></td>
                        <td style="width:250px;"><input type="text" name="nabar" id="nabar" class="form-control input-sm" placeholder="Nama Barang"></td>
                        <td><input type="text" id="satuan" name="satuan" value="" class="form-control input-sm" readonly></td>
                        <td><input type="text" id="stok" name="stok" value="" class="form-control input-sm" style="width:60px;" readonly></td>
                        <td><input type="text" id="harjul" name="harjul" value="" class="form-control input-sm" readonly></td>
                        <td><input type="number" name="diskon" id="diskon" value="0" min="0" max="100" class="form-control input-sm" style="width:80px;" required></td>
                        <td><input type="number" name="qty" id="qty" value="1" min="1" max="" class="form-control input-sm" style="width:80px;" required></td>
                        <td><button type="submit" class="btn btn-sm btn-primary">Ok</button></td>
                    </tr>
                </table>
            <!-- </div> -->
            <!-- <div class="col-lg-6 row">
                <div id="detail_barang" style="position:absolute;"></div>
            </div> -->
            </form>
        </div>
    </div>
        <div class="row">
            <div class="col-lg-12">
            <table class="table table-bordered table-condensed" style="font-size:11px;margin-top:10px;">
                <thead>
                    <tr>
                        <th>Kode Barang</th>
                        <th>Nama Barang</th>
                        <th style="text-align:center;">Satuan</th>
                        <th style="text-align:center;">Harga(Rp)</th>
                        <th style="text-align:center;">Diskon(Rp)</th>
                        <th style="text-align:center;">Qty</th>
                        <th style="text-align:center;">Sub Total</th>
                        <th style="width:100px;text-align:center;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($this->cart->contents() as $items): ?>
                    <?php echo form_hidden($i.'[rowid]', $items['rowid']); ?>
                    <tr>
                         <td><?=$items['id'];?></td>
                         <td><?=$items['name'];?></td>
                         <td style="text-align:center;"><?=$items['satuan'];?></td>
                         <td style="text-align:right;"><?php echo number_format($items['amount']);?></td>
                         <td style="text-align:right;"><?php echo number_format($items['disc']);?></td>
                         <td style="text-align:center;"><?php echo number_format($items['qty']);?></td>
                         <td style="text-align:right;"><?php echo number_format($items['subtotal']);?></td>

                         <td style="text-align:center;"><a href="<?php echo base_url().'admin/penjualan/remove/'.$items['rowid'];?>" class="btn btn-warning btn-xs"><span class="fa fa-close"></span> Batal</a></td>
                    </tr>

                    <?php $i++; ?>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <form action="<?php echo base_url().'admin/penjualan/simpan_penjualan'?>" method="post">
            <table>
                <tr>
                    <td style="width:760px;" rowspan="2"><button type="submit" class="btn btn-info btn-lg"> Simpan</button></td>
                    <th style="width:140px;">Total Belanja(Rp)</th>
                    <th style="text-align:right;width:140px;"><input type="text" name="total2" value="<?php echo number_format($this->cart->total());?>" class="form-control input-sm" style="text-align:right;margin-bottom:5px;" readonly></th>
                    <input type="hidden" id="total" name="total" value="<?php echo $this->cart->total();?>" class="form-control input-sm" style="text-align:right;margin-bottom:5px;" readonly>
                </tr>
                <tr>
                    <th>Tunai(Rp)</th>
                    <th style="text-align:right;"><input type="text" id="jml_uang" name="jml_uang" class="jml_uang form-control input-sm" style="text-align:right;margin-bottom:5px;" required></th>
                    <input type="hidden" id="jml_uang2" name="jml_uang2" class="form-control input-sm" style="text-align:right;margin-bottom:5px;" required>
                </tr>
                <tr>
                    <td></td>
                    <th>Kembalian(Rp)</th>
                    <th style="text-align:right;"><input type="text" id="kembalian" name="kembalian" class="form-control input-sm" style="text-align:right;margin-bottom:5px;" required></th>
                </tr>

            </table>
            </form>
            <hr/>
        </div>
        <!-- /.row -->
        <!-- ============ MODAL TAMPIL BANTUAN =============== -->
        <div class="modal fade" id="largeModal" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
            <div class="modal-dialog modal-lg">
            <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 class="modal-title" id="myModalLabel">Data Barang</h3>
            </div>
                <div class="modal-body" style="overflow:scroll;height:500px;">

                  <table class="table table-bordered table-condensed" style="font-size:11px;" id="mydata">
                    <thead>
                        <tr>
                            <th style="text-align:center;width:40px;">No</th>
                            <th style="width:120px;">Kode Barang</th>
                            <th style="width:240px;">Nama Barang</th>
                            <th>Satuan</th>
                            <th style="width:100px;">Harga (Eceran)</th>
                            <th>Stok</th>
                            <th style="width:100px;text-align:center;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        $no=0;
                        foreach ($data->result_array() as $a):
                            $no++;
                            $id=$a['barang_id'];
                            $nm=$a['barang_nama'];
                            $satuan=$a['nama_uom'];
                            $harpok=$a['barang_harpok'];
                            $harjul=$a['barang_harjul'];
                            $harjul_grosir=$a['barang_harjul_grosir'];
                            $stok=$a['barang_stok'];
                            $min_stok=$a['barang_min_stok'];
                            $kat_id=$a['barang_kategori_id'];
                            $kat_nama=$a['kategori_nama'];
                    ?>
                        <tr>
                            <td style="text-align:center;"><?php echo $no;?></td>
                            <td><?php echo $id;?></td>
                            <td><?php echo $nm;?></td>
                            <td style="text-align:center;"><?php echo $satuan;?></td>
                            <td style="text-align:right;"><?php echo 'Rp '.number_format($harjul);?></td>
                            <td style="text-align:center;"><?php echo $stok;?></td>
                            <td style="text-align:center;">
                            <form action="<?php echo base_url().'admin/penjualan/add_to_cart'?>" method="post">
                            <input type="hidden" name="kode_brg" value="<?php echo $id?>">
                            <input type="hidden" name="nabar" value="<?php echo $nm;?>">
                            <input type="hidden" name="satuan" value="<?php echo $satuan;?>">
                            <input type="hidden" name="stok" value="<?php echo $stok;?>">
                            <input type="hidden" name="harjul" value="<?php echo number_format($harjul);?>">
                            <input type="hidden" name="diskon" value="0">
                            <input type="hidden" name="qty" value="1" required>
                                <button type="submit" class="btn btn-xs btn-info" title="Pilih"><span class="fa fa-edit"></span> Pilih</button>
                            </form>
                            </td>
                        </tr>
                    <?php endforeach;?>
                    </tbody>
                </table>

                </div>

                <div class="modal-footer">
                    <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>

                </div>
            </div>
            </div>
        </div>



        <!-- ============ MODAL HAPUS =============== -->

        <!-- ============ Modal Scan Kode Barang =============== -->
        <!-- Small modal -->
        
<div id="ModalScan" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="gridSystemModalLabel">Scan Kode Barang</h4>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <!-- <div id="tes"></div> -->
          <input type="hidden" name="hasil_scan" id="hasil_scan" class="form-control">
          <input type="hidden" name="nama_brg" id="nama_brg" class="form-control">
          <input type="hidden" name="satuan" id="satuan" class="form-control">
          <input type="hidden" name="stok" id="stok" class="form-control">
          <input type="hidden" name="harga" id="harga" class="form-control">
        </div>
        <div class="row">
          <div class="col-md-12 text-center">
              <video width="320" height="240" id="preview" class="img-thumbnail"></video>
              <div id="tes"></div>
          </div>
        </div>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-info" onclick="mySave()" data-dismiss="modal">Save changes</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

        <!--END MODAL-->

        <hr>

        <!-- Footer -->

        <?php
            $this->load->view('admin/footer');
        ?>

        <!-- Footer -->

    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="<?php echo base_url().'assets/js/jquerys.js'?>"></script>
    <script src="<?php echo base_url().'assets/js/jquery-ui.js'?>"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url().'assets/dist/js/bootstrap-select.min.js'?>"></script>
    <script src="<?php echo base_url().'assets/js/bootstrap.min.js'?>"></script>
    <script src="<?php echo base_url().'assets/js/dataTables.bootstrap.min.js'?>"></script>
    <script src="<?php echo base_url().'assets/js/jquery.dataTables.min.js'?>"></script>
    <script src="<?php echo base_url().'assets/js/jquery.price_format.min.js'?>"></script>
    <script src="<?php echo base_url().'assets/js/moment.js'?>"></script>
    <script src="<?php echo base_url().'assets/js/bootstrap-datetimepicker.min.js'?>"></script>

<script src="<?php echo base_url().'assets/js/instascan.min.js'?>"></script>
<script type="text/javascript">
let scanner = new Instascan.Scanner({
    video: document.getElementById('preview')
});
scanner.addListener('scan', function (content) {
    $('#hasil_scan').val(content);

    $('#tes').html(content);
        <?php
            $b=$brg->row_array();
        ?>
        $.ajax({
          url: '<?= base_url()?>admin/penjualan/get_scan',
          method: 'post',
          data: {'content': content},
          dataType: "json",
          beforeSend: function (e) {
            if (e && e.overrideMimeType) {
              e.overrideMimeType("application/json;charset=UTF-8");
            }
          },
          success: function (response, msg) { 
            //$("#detail_barang").load("<?php echo base_url().'admin/penjualan/get_barang'; ?>");
            $("#nama_brg").val(response.nabar);
            $("#satuan").val(response.satuan);
            $("#stok").val(response.stok);
            $("#harjul").val(response.harjul);
            console.log('nabar: ' + response.nabar + ', satuan: ' + response.satuan + ', stok: ' + response.stok + ', harjul: ' + response.harjul);
          },
          error: function (xhr, ajaxOptions, thrownError) { // Ketika ada error
            alert('Maaf kode barang tidak ditemukan. \n Error : ' + thrownError); // Munculkan alert error
          }
        });
});
var myLink = document.getElementById('ScanKode');
myLink.onclick = function () {

    Instascan.Camera.getCameras().then(function (cameras) {

        if (cameras[1]) {
            scanner.start(cameras[1]);
        } else {
            scanner.start(cameras[0]);
        }

    }).catch(function (e) {

        console.error(e);

    });
}

function mySave() {
document.getElementById("kode_brg").value = document.getElementById("hasil_scan").value;
document.getElementById("nabar").value = document.getElementById("nama_brg").value;
}

/* Modal Scan Kode */
$(document).ready(function(){
    /*$("#ModalScan").on('shown.bs.modal', function(){
        $(this).find('#hasil_scan').focus();

    });*/
    /*$(".custom-close").on('click', function() {
        document.getElementById("kode_brg").value = document.getElementById("hasil_scan").value;
        $('#ModalScan').modal('hide');
    });*/
});

</script>

    <script type="text/javascript">
        $(function(){
            $('#jml_uang').on("input",function(){
                var total=$('#total').val();
                var jumuang=$('#jml_uang').val();
                var hsl=jumuang.replace(/[^\d]/g,"");
                console.log('Total :' + total + 'Jumlah Uang :' + jumuang + 'Hasil : ' + jumuang);
                $('#jml_uang2').val(hsl);
                $('#kembalian').val(hsl-total);
            })

        });
    </script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#mydata').DataTable();
        } );
    </script>
    <script type="text/javascript">
        $(function(){
            $('.jml_uang').priceFormat({
                    prefix: '',
                    //centsSeparator: '',
                    centsLimit: 0,
                    thousandsSeparator: ','
            });
            $('#jml_uang2').priceFormat({
                    prefix: '',
                    //centsSeparator: '',
                    centsLimit: 0,
                    thousandsSeparator: ''
            });
            $('#kembalian').priceFormat({
                    prefix: '',
                    //centsSeparator: '',
                    centsLimit: 0,
                    thousandsSeparator: ','
            });
            $('.harjul').priceFormat({
                    prefix: '',
                    //centsSeparator: '',
                    centsLimit: 0,
                    thousandsSeparator: ','
            });
        });
    </script>
    <script type="text/javascript">
        <?php
            $b=$brg->row_array();
        ?>
        /*$(document).ready(function(){
            //Ajax kabupaten/kota insert
            $("#kode_brg").focus();
            $("#kode_brg").on("input",function(){
                var kobar = {kode_brg:$(this).val()};
                   $.ajax({
                   type: "POST",
                   url : "<?php echo base_url().'admin/penjualan/get_barang';?>",
                   data: kobar,
                   success: function(msg){
                   $('#detail_barang').html(msg);
                   }
                });
            });

            $("#nabar").on("input",function(){
                var nabar = {nabar:$(this).val()};
                   $.ajax({
                   type: "POST",
                   url : "<?php echo base_url().'admin/penjualan/get_barang';?>",
                   data: nabar,
                   success: function(msg){
                   $('#detail_barang').html(msg);
                   }
                });
            });

            $("#kode_brg").keypress(function(e){
                if(e.which==13){
                    $("#jumlah").focus();
                }
            });
        });*/
    </script>
    <script type="text/javascript">
        $(document).ready(function(){

            $('#kode_brg').autocomplete({
                source: "<?php echo base_url().'admin/penjualan/get_autocomplete_kobar';?>",
                select: function (event, ui) {
                    $('[name="nabar"]').val(ui.item.nabar);
                    $('[name="satuan"]').val(ui.item.satuan);
                    $('[name="stok"]').val(ui.item.stok);
                    $('[name="harjul"]').val(ui.item.harjul);
                    $('[name="diskon"]').val(ui.item.diskon);
                    $('[name="qty"]').val(ui.item.qty);
                }
            });

            $('#nabar').autocomplete({
                source: "<?php echo base_url().'admin/penjualan/get_autocomplete_nabar';?>",
                select: function (event, ui) {
                    $('[name="kode_brg"]').val(ui.item.kobar);
                    $('[name="satuan"]').val(ui.item.satuan);
                    $('[name="stok"]').val(ui.item.stok);
                    $('[name="harjul"]').val(ui.item.harjul);
                    $('[name="diskon"]').val(ui.item.diskon);
                    $('[name="qty"]').val(ui.item.qty);
                }
            });

        });
    </script>


</body>

</html>
