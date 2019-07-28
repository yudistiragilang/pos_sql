<?php
class Suplier extends CI_Controller{

	function __construct(){

		parent::__construct();

		if($this->session->userdata('masuk') !=TRUE){

            $url=base_url();
            redirect($url);

        };

		$this->load->model('m_suplier');
		$this->load->model('m_global');

	}

	function index(){

		if($this->session->userdata('akses')=='1'){

			$data['data']=$this->m_suplier->tampil_suplier();
			$this->load->view('admin/v_suplier',$data);

		}else{

	        echo "Halaman tidak ditemukan";

	    }

	}

	function tambah_suplier(){

		if($this->session->userdata('akses')=='1'){

			$nama=$this->input->post('nama');
			$alamat=$this->input->post('alamat');
			$notelp=$this->input->post('notelp');
			$simpan = $this->m_suplier->simpan_suplier($nama, $alamat, $notelp);

			// audit 
			$this->m_global->audit_master('Insert', 'tbl_suplier', $simpan);
			// audit

			echo $this->session->set_flashdata('msg','<label class="label label-success">Suppliers '.$nama.' Berhasil Ditambahkan </label>');
			redirect('admin/suplier');

		}else{

	        echo "Halaman tidak ditemukan";

	    }

	}

	function edit_suplier(){

		if($this->session->userdata('akses')=='1'){

			$kode=$this->input->post('kode');
			$nama=$this->input->post('nama');
			$alamat=$this->input->post('alamat');
			$notelp=$this->input->post('notelp');
			$this->m_suplier->update_suplier($kode,$nama,$alamat,$notelp);

			// audit 
			$this->m_global->audit_master('Update', 'tbl_suplier', $kode);
			// audit

			echo $this->session->set_flashdata('msg','<label class="label label-info">Suppliers '.$nama.' Berhasil Diubah </label>');
			redirect('admin/suplier');

		}else{

	        echo "Halaman tidak ditemukan";

	    }

	}

	function hapus_suplier(){

		if($this->session->userdata('akses')=='1'){

			$kode=$this->input->post('kode');
			$this->m_suplier->hapus_suplier($kode);

			// audit 
			$this->m_global->audit_master('Delete', 'tbl_suplier', $kode);
			// audit

			echo $this->session->set_flashdata('msg','<label class="label label-warning">Suppliers '.$nama.' Berhasil Dihapus </label>');
			redirect('admin/suplier');

		}else{

	        echo "Halaman tidak ditemukan";

	    }

	}

}