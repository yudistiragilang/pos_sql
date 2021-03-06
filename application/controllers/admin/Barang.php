<?php

class Barang extends CI_Controller{

	function __construct(){

		parent::__construct();
		if($this->session->userdata('masuk') !=TRUE){
            $url=base_url();
            redirect($url);
        };
		$this->load->model('m_kategori');
		$this->load->model('m_uom');
		$this->load->model('m_barang');
		$this->load->model('m_global');
		$this->load->library('barcode');

	}

	function index(){

		if($this->session->userdata('akses')=='1'){

			$data['data']=$this->m_barang->tampil_barang();
			$data['kat2']=$this->m_kategori->tampil_kategori();
			$data['uom']=$this->m_uom->tampil_uom();
			$this->load->view('admin/v_barang',$data);
		
		}else{

	        echo "Halaman tidak ditemukan";
	    
	    }

	}

	function tambah_barang(){

		if($this->session->userdata('akses')=='1'){
			
			// $kobar=$this->m_barang->get_kobar();
			$kobar=$this->input->post('kobar');
			$nabar=$this->input->post('nabar');
			$kat=$this->input->post('kategori');
			$satuan=$this->input->post('satuan');
			$harpok=str_replace(',', '', $this->input->post('harpok'));
			$harjul=str_replace(',', '', $this->input->post('harjul'));
			$harjul_grosir=str_replace(',', '', $this->input->post('harjul_grosir'));
			$stok=$this->input->post('stok');
			$min_stok=$this->input->post('min_stok');

			// cek kode
			if($this->m_barang->cek_kode_exist($kobar) == TRUE){

				$simpan = $this->m_barang->simpan_barang($kobar, $nabar, $kat, $satuan, $harpok, $harjul, $harjul_grosir, $stok, $min_stok);

				// audit 
				$this->m_global->audit_master('Insert', 'tbl_barang', $simpan);
				// audit 

				echo $this->session->set_flashdata('msg','<label class="label label-success">Barang '.$nabar.' Berhasil Ditambahkan </label>');
				redirect('admin/barang');
			
			}else{

				echo $this->session->set_flashdata('msg','<label class="label label-danger">Kode Barang '.$kobar.' Sudah Ada ! </label>');
				redirect('admin/barang');

			}

			// cek kode
		
		}else{

	        echo "Halaman tidak ditemukan";
	    
	    }

	}

	function edit_barang(){

		if($this->session->userdata('akses')=='1'){
			$kobar=$this->input->post('kobar');
			$nabar=$this->input->post('nabar');
			$kat=$this->input->post('kategori');
			$satuan=$this->input->post('satuan');
			$harpok=str_replace(',', '', $this->input->post('harpok'));
			$harjul=str_replace(',', '', $this->input->post('harjul'));
			$harjul_grosir=str_replace(',', '', $this->input->post('harjul_grosir'));
			$stok=$this->input->post('stok');
			$min_stok=$this->input->post('min_stok');
			$update = $this->m_barang->update_barang($kobar, $nabar, $kat, $satuan, $harpok, $harjul, $harjul_grosir, $stok, $min_stok);

			// audit 
			$this->m_global->audit_master('Update', 'tbl_barang', $kobar);
			// audit 

			echo $this->session->set_flashdata('msg','<label class="label label-info">Barang '.$nabar.' Berhasil Diubah </label>');
			redirect('admin/barang');
		}else{
	        echo "Halaman tidak ditemukan";
	    }

	}

	function hapus_barang(){

		if($this->session->userdata('akses')=='1'){
			$kode=$this->input->post('kode');
			$hapus = $this->m_barang->hapus_barang($kode);

			// audit 
			$this->m_global->audit_master('Delete', 'tbl_barang', $kode);
			// audit 

			echo $this->session->set_flashdata('msg','<label class="label label-warning">Barang '.$nabar.' Berhasil Dihapus </label>');
			redirect('admin/barang');
		}else{
	        echo "Halaman tidak ditemukan";
	    }

	}

}