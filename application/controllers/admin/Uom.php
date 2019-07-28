<?php
class Uom extends CI_Controller{

	function __construct(){

		parent::__construct();
		if($this->session->userdata('masuk') !=TRUE){
            $url=base_url();
            redirect($url);
        };
		$this->load->model('m_uom');
		$this->load->model('m_global');

	}

	function index(){

		$data['data']=$this->m_uom->tampil_uom();
		$this->load->view('admin/v_uom',$data);

	}

	function tambah_uom(){

		if($this->session->userdata('akses')=='1'){
			$uom=$this->input->post('uom');
			$des_uom=$this->input->post('des_uom');
			$simpan = $this->m_uom->simpan_uom($uom, $des_uom);

			// audit 
			$this->m_global->audit_master('Insert', 'tbl_uom', $simpan);
			// audit
			echo $this->session->set_flashdata('msg','<label class="label label-success">Unit of Measure '.$uom.' Berhasil Ditambahkan </label>');
			redirect('admin/uom');
		}else{
	        echo $this->session->set_flashdata('msg','<label class="label label-danger">Tidak Ada Akses Untuk Tambah Unit of Measure !</label>');
			redirect('admin/uom');
	    }

	}

	function edit_uom(){

		if($this->session->userdata('akses')=='1'){
			$kode=$this->input->post('kode');
			$uom=$this->input->post('uom');
			$des_uom=$this->input->post('des_uom');
			$update = $this->m_uom->update_uom($kode, $uom, $des_uom);

			// audit 
			$this->m_global->audit_master('Update', 'tbl_uom', $kode);
			// audit

			echo $this->session->set_flashdata('msg','<label class="label label-info">Unit of Measure '.$uom.' Berhasil Diubah </label>');
			redirect('admin/uom');
		}else{
	        echo $this->session->set_flashdata('msg','<label class="label label-danger">Tidak Ada Akses Untuk Ubah Unit of Measure !</label>');
			redirect('admin/uom');
	    }

	}

	function hapus_uom(){

		if($this->session->userdata('akses')=='1'){
			$kode=$this->input->post('kode');
			$this->m_uom->hapus_uom($kode);

			// audit 
			$this->m_global->audit_master('Delete', 'tbl_uom', $kode);
			// audit

			echo $this->session->set_flashdata('msg','<label class="label label-warning">Unit of Measure '.$uom.' Berhasil Dihapus </label>');
			redirect('admin/uom');
		}else{
	        echo $this->session->set_flashdata('msg','<label class="label label-danger">Tidak Ada Akses Untuk Hapus Unit of Measure !</label>');
			redirect('admin/uom');
	    }

	}

	function import_uom(){

		include_once ( APPPATH."libraries/Excel_reader.php");
	    $data = new Spreadsheet_Excel_Reader($_FILES['userfile']['tmp_name']);
	     
	    $jumlah_sukses = 0;
	    $jumlah_gagal = 0;

	    for ($i=3; $i <= ($data->rowcount($sheet_index=0)); $i++){ 

	    	$uom = $data->val($i, 2);
	    	$des_uom = $data->val($i, 3);

	    	$simpan = $this->m_uom->simpan_uom($uom, $des_uom);

	    	// audit 
			$this->m_global->audit_master('Insert', 'tbl_uom', $simpan);
			// audit

	    	if ($simpan) {
	    		$jumlah_sukses = $jumlah_sukses + 1;
	    	} else {
	    		$jumlah_gagal = $jumlah_gagal + 1;
	    	}
	      
	    }

	    echo $this->session->set_flashdata('sukses','<label class="label label-success">Unit of Measure Sukses = '.$jumlah_sukses.'</label>');
	    echo $this->session->set_flashdata('gagal','<label class="label label-danger">Unit of Measure Gagal = '.$jumlah_gagal.'</label>');
	    redirect('admin/uom');

	}

}