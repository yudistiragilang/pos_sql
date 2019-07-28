<?php
class Controler_global extends CI_Controller{

	function __construct(){

		parent::__construct();
		if($this->session->userdata('masuk') !=TRUE){
            $url=base_url();
            redirect($url);
        };
		$this->load->model('m_kategori');
		$this->load->model('m_barang');
		$this->load->model('m_suplier');
		$this->load->model('m_pembelian');
		$this->load->model('m_penjualan');
		$this->load->model('m_laporan');
		$this->load->model('m_global');
		$this->load->model('m_uom');

	}

	function import($tipe = null){

		include_once ( APPPATH."libraries/Excel_reader.php");
	    $data = new Spreadsheet_Excel_Reader($_FILES['userfile']['tmp_name']);
	     
	    $jumlah_sukses = 0;
	    $jumlah_gagal = 0;

	    for ($i=3; $i <= ($data->rowcount($sheet_index=0)); $i++){ 

	    	$Col_2 = $data->val($i, 2);
	    	$Col_3 = $data->val($i, 3);
	    	$Col_4 = $data->val($i, 4);
	    	$Col_5 = $data->val($i, 5);
	    	$Col_6 = $data->val($i, 6);
	    	$Col_7 = $data->val($i, 7);
	    	$Col_8 = $data->val($i, 8);
	    	$Col_9 = $data->val($i, 9);
	    	$Col_10 = $data->val($i, 10);

	    	if ($tipe == UOM ) {

	    		$classnya = "m_uom";
	    		$methodnya = "simpan_uom";
	    		$tabelnya = "tbl_uom";
	    		$redirect_ke = "admin/uom";

	    	}elseif ($tipe == KATEGORI) {

	    		$classnya = "m_kategori";
	    		$methodnya = "simpan_kategori";
	    		$tabelnya = "tbl_kategori";
	    		$redirect_ke = "admin/kategori";

	    	}elseif ($tipe == SUPPLIER) {
	    		
	    		$classnya = "m_suplier";
	    		$methodnya = "simpan_suplier";
	    		$tabelnya = "tbl_suplier";
	    		$redirect_ke = "admin/suplier";

	    	}elseif ($tipe == BARANG) {

	    		$classnya = "m_barang";
	    		$methodnya = "simpan_barang";
	    		$tabelnya = "tbl_barang";
	    		$redirect_ke = "admin/barang";

	    	}

	    	$simpan = $this->$classnya->$methodnya($Col_2, $Col_3, $Col_4, $Col_5, $Col_6, $Col_7, $Col_8, $Col_9, $Col_10);
	    	
	    	// audit 
			$this->m_global->audit_master('Insert', $tabelnya, $simpan);
			// audit

	    	if ($simpan) {
	    		$jumlah_sukses = $jumlah_sukses + 1;
	    	} else {
	    		$jumlah_gagal = $jumlah_gagal + 1;
	    	}
	      
	    }

	    echo $this->session->set_flashdata('sukses','<label class="label label-success">Unit of Measure Sukses = '.$jumlah_sukses.'</label>');
	    echo $this->session->set_flashdata('gagal','<label class="label label-danger">Unit of Measure Gagal = '.$jumlah_gagal.'</label>');
	    redirect($redirect_ke);

	}

}