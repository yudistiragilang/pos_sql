 <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?php echo base_url().'welcome'?>">Point of Sale</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                   <?php $h=$this->session->userdata('akses'); ?>
                    <?php $u=$this->session->userdata('user'); ?>
                    <?php if($h=='1'){ ?> 
                     <!--dropdown-->
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" title="Transaksi"><span class="fa fa-shopping-cart" aria-hidden="true"></span> Transaksi</a>
                        <ul class="dropdown-menu">
                            <li><a href="<?php echo base_url().'admin/penjualan'?>"><span class="fa fa-shopping-bag" aria-hidden="true"></span> Penjualan (Eceran)</a></li> 
                            <!-- <li><a href="<?php //echo base_url().'admin/penjualan_grosir'?>"><span class="fa fa-cubes" aria-hidden="true"></span> Penjualan (Grosir)</a></li> --> 
                        </ul>
                    </li>
                    <!--ending dropdown-->
                    <li>
                        <a href="<?php echo base_url().'admin/retur'?>"><span class="fa fa-refresh"></span> Retur</a>
                    </li>
                    <li>
                        <a href="<?php echo base_url().'admin/grafik'?>"><span class="fa fa-line-chart"></span> Grafik</a>
                    </li>
                    <li>
                        <a href="<?php echo base_url().'admin/laporan'?>"><span class="fa fa-file"></span> Laporan</a>
                    </li>
                    <?php }?>
                    <?php if($h=='2'){ ?> 
                      <!--dropdown-->
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" title="Transaksi"><span class="fa fa-shopping-cart" aria-hidden="true"></span> Transaksi</a>
                        <ul class="dropdown-menu">
                            <li><a href="<?php echo base_url().'admin/penjualan'?>"><span class="fa fa-shopping-bag" aria-hidden="true"></span> Penjualan (Eceran)</a></li> 
                            <!-- <li><a href="<?php //echo base_url().'admin/penjualan_grosir'?>"><span class="fa fa-cubes" aria-hidden="true"></span> Penjualan (Grosir)</a></li> --> 
                        </ul>
                    </li>
                    <!--ending dropdown-->
                    <!-- <li>
                        <a href="<?php //echo base_url().'admin/retur'?>"><span class="fa fa-refresh"></span> Retur</a>
                    </li> -->
                    <?php }?>
                     <li>
                        <a class="alert-logout" href="<?php echo base_url().'administrator/logout'?>"><span class="fa fa-sign-out"></span> Logout</a>
                    </li>

                    <li style="color:#fcc;">
                        <a href="!#"><?php echo date('d-M-Y') ?> - <b id="jam"></b> : <b id="menit"></b> : <b id="detik"></b></a>
                    </li>

                </ul>


            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
    <script src="<?php echo base_url().'assets/js/jquery.js'?>"></script>
    <script src="<?php echo base_url().'assets/js/sweetalert2.all.min.js'?>"></script>
    <script>
    $('.alert-logout').on("click", function (e) {
        e.preventDefault();
        var url = $(this).attr('href');
        Swal.fire({
                title: 'Keluar ?',
                text: "Yakin mau keluar?",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, Keluar sekarang!',
                cancelButtonText: 'Batal',
            })
            .then((result) => {
                if (result.value) {
                    setTimeout(
                        function () {
                            window.location.replace(url);
                        }, 0);

                } else {
                    //Swal.fire("Batal Keluar!");
                }
            });
    });
  </script>

  <script>
      window.setTimeout("waktu()", 1000);

      function waktu() {
        var waktu = new Date();
        setTimeout("waktu()", 1000);
        document.getElementById("jam").innerHTML = waktu.getHours();
        document.getElementById("menit").innerHTML = waktu.getMinutes();
        document.getElementById("detik").innerHTML = waktu.getSeconds();
      }
    </script>