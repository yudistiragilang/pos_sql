<!DOCTYPE html>
<html>
  <head>
    <title>Masuk</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="Produk By Squad Qurang Liburan">
    <meta name="author" content="POS SQL">
    <!-- Bootstrap -->
    <link href="<?php echo base_url().'assets/css/bootstrap.min.css'?>" rel="stylesheet">
    <!-- styles -->
    <link href="<?php echo base_url().'assets/css/stylesl.css'?>" rel="stylesheet">
	
   
  </head>
  <body class="login-bg">
  

	<div class="page-content container">
		<div class="row">
			<div class="col-md-4 col-md-offset-4">
				<div class="login-wrapper">
			        <div class="box">
			            <div class="content-wrap">
			                <img width="310px" src="<?php echo base_url().'assets/img/logo.png'?>"/>
			                <p><?php echo $this->session->flashdata('msg');?></p>
	                        <hr/>
	                        <form action="<?php echo base_url().'administrator/cekuser'?>" method="post">
	                        	<input class="form-control" type="text" name="username" placeholder="Username" required>
				                <input class="form-control" type="password" name="password" placeholder="Password" style="margin-bottom:1px;" required>
				                <div class="action">
				                    <button type="submit" class="btn btn-lg " style="width:310px;margin-top:0px; bg-color:#ff9000;">Login</button>
				                </div>
	                        </form>
			                                
			            </div>
			        </div>

			        <div class="already">
			            <p>Username: admin<br/> Password: admin</p>
			            
			        </div>
			    </div>
			</div>
		</div>
	</div>



    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="<?php echo base_url().'assets/js/jquery.min.js'?>"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="<?php echo base_url().'assets/js/bootstrap.min.js'?>"></script>

    <!-- Added -->
    <script src="<?php echo base_url().'assets/js/sweetalert2.all.min.js'?>"></script>

	<?php if ($this->session->flashdata('sukses')): ?>
	    <script>
	    Swal.fire({
	      toast: true,
	      position: 'top-end',
	      type: 'success',
	      title: '<?php echo $this->session->flashdata('sukses'); ?>',
	      showConfirmButton: false,
	      timer: 3500
	    })
	    </script>
	<?php endif; ?>

  </body>
</html>