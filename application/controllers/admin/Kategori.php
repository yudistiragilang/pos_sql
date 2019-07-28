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

	    $data['data']=$this->m_kategori->tampil_kategori();
		$this->load->view('admin/v_kategori',$data);

	}

	function tambah_kategori(){

		if($this->session->userdata('akses')=='1'){

			$kat=$this->input->post('kategori');
			$simpan = $this->m_kategori->simpan_kategori($kat);

			// audit 
			$this->m_global->audit_master('Insert', 'tbl_kategori', $simpan);
			// audit

			echo $this->session->set_flashdata('msg','<label class="label label-success">Kategori '.$kat.' Berhasil Ditambahkan </label>');
			redirect('admin/kategori');

		}else{

	        echo $this->session->set_flashdata('msg','<label class="label label-danger">Tidak Ada Akses Untuk Tambah Kategori !</label>');
			redirect('admin/kategori');

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

			echo $this->session->set_flashdata('msg','<label class="label label-info">Kategori '.$kat.' Berhasil Diubah </label>');
			redirect('admin/kategori');

		}else{

	        echo $this->session->set_flashdata('msg','<label class="label label-danger">Tidak Ada Akses Untuk Edit Kategori !</label>');
			redirect('admin/kategori');

	    }

	}

	function hapus_kategori(){

		if($this->session->userdata('akses')=='1'){
			$kode = $this->input->post('kode');
			$hapus = $this->m_kategori->hapus_kategori($kode);

			// audit 
			$this->m_global->audit_master('Delete', 'tbl_kategori', $kode);
			// audit

			echo $this->session->set_flashdata('msg','<label class="label label-warning">Kategori '.$kat.' Berhasil Dihapus </label>');
			redirect('admin/kategori');

		}else{

	        echo $this->session->set_flashdata('msg','<label class="label label-danger">Tidak Ada Akses Untuk Hapus Kategori !</label>');
			redirect('admin/kategori');

	    }

	}

}