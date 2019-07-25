<?php
class Kategori extends CI_Controller{

	function __construct(){
		parent::__construct();
		if($this->session->userdata('masuk') !=TRUE){
            $url=base_url();
            redirect($url);
        };
		$this->load->model('m_kategori');
		$this->load->model('m_global');
	}

	function index(){

		if($this->session->userdata('akses')=='1'){
			$data['data']=$this->m_kategori->tampil_kategori();
			$this->load->view('admin/v_kategori',$data);
		}else{
	        echo "Halaman tidak ditemukan";
	    }

	}

	function tambah_kategori(){

		if($this->session->userdata('akses')=='1'){
			$kat=$this->input->post('kategori');
			$simpan = $this->m_kategori->simpan_kategori($kat);

			// audit 
			$this->m_global->audit_master('Insert', 'tbl_kategori', $simpan);
			// audit

			redirect('admin/kategori');
		}else{
	        echo "Halaman tidak ditemukan";
	    }

	}

	function edit_kategori(){

		if($this->session->userdata('akses')=='1'){
			$kode=$this->input->post('kode');
			$kat=$this->input->post('kategori');
			$update = $this->m_kategori->update_kategori($kode,$kat);

			// audit 
			$this->m_global->audit_master('Update', 'tbl_kategori', $kode);
			// audit

			redirect('admin/kategori');
		}else{
	        echo "Halaman tidak ditemukan";
	    }

	}

	function hapus_kategori(){

		if($this->session->userdata('akses')=='1'){
			$kode = $this->input->post('kode');
			$hapus = $this->m_kategori->hapus_kategori($kode);

			// audit 
			$this->m_global->audit_master('Delete', 'tbl_kategori', $kode);
			// audit

			redirect('admin/kategori');
		}else{
	        echo "Halaman tidak ditemukan";
	    }

	}

}