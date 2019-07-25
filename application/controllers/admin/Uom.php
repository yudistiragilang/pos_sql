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

		if($this->session->userdata('akses')=='1'){
			$data['data']=$this->m_uom->tampil_uom();
			$this->load->view('admin/v_uom',$data);
		}else{
	        echo "Halaman tidak ditemukan";
	    }

	}

	function tambah_uom(){

		if($this->session->userdata('akses')=='1'){
			$uom=$this->input->post('uom');
			$des_uom=$this->input->post('des_uom');
			$simpan = $this->m_uom->simpan_uom($uom, $des_uom);

			// audit 
			$this->m_global->audit_master('Insert', 'tbl_uom', $simpan);
			// audit

			redirect('admin/uom');
		}else{
	        echo "Halaman tidak ditemukan";
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

			redirect('admin/uom');
		}else{
	        echo "Halaman tidak ditemukan";
	    }

	}

	function hapus_uom(){

		if($this->session->userdata('akses')=='1'){
			$kode=$this->input->post('kode');
			$this->m_uom->hapus_uom($kode);

			// audit 
			$this->m_global->audit_master('Delete', 'tbl_uom', $kode);
			// audit

			redirect('admin/uom');
		}else{
	        echo "Halaman tidak ditemukan";
	    }

	}

}