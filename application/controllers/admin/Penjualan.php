<?php
class Penjualan extends CI_Controller{

	function __construct(){

		parent::__construct();
		if($this->session->userdata('masuk') !=TRUE){
            $url=base_url();
            redirect($url);
        };
		$this->load->model('m_kategori');
		$this->load->model('m_barang');
		$this->load->model('m_suplier');
		$this->load->model('m_penjualan');
		$this->load->model('m_global');

	}

	function index(){

		if($this->session->userdata('akses')=='1' || $this->session->userdata('akses')=='2'){
			$kobar=$this->input->post('kode_brg');
			$data['brg']=$this->m_barang->get_barang($kobar);
			$data['data']=$this->m_barang->tampil_barang();
			$this->load->view('admin/v_penjualan',$data);

		}else{

	        echo "Halaman tidak ditemukan";

	    }

	}

	function get_barang(){

		if($this->session->userdata('akses')=='1' || $this->session->userdata('akses')=='2'){

			$kobar=$this->input->post('kode_brg');
			$x['brg']=$this->m_barang->get_barang($kobar);
			$this->load->view('admin/v_detail_barang_jual',$x);

		}else{

	        echo "Halaman tidak ditemukan";

	    }

	}

	function get_nama_barang(){

		if($this->session->userdata('akses')=='1' || $this->session->userdata('akses')=='2'){

			$nabar=$this->input->post('nabar');
			$x['brg']=$this->m_barang->get_nama_barang($nabar);
			$this->load->view('admin/v_detail_barang_jual',$x);

		}else{

	        echo "Halaman tidak ditemukan";

	    }

	}

	function get_autocomplete_kobar(){
		if (isset($_GET['term'])) {
		  	$result = $this->m_penjualan->barang_id($_GET['term']);
		   	if (count($result) > 0) {
		    foreach ($result as $row)
		     	$arr_result[] = array(
		     		'label'			=> $row->barang_id,
		     		'nabar'			=> $row->barang_nama,
		     		'satuan'		=> $row->nama,
		     		'stok'			=> $row->barang_stok,
		     		'harjul'		=> $row->barang_harjul,
		     		'qty'			=> 1,
				);
		     	echo json_encode($arr_result);
		   	}
		}
	}

	function get_autocomplete_nabar(){
		if (isset($_GET['term'])) {
		  	$result = $this->m_penjualan->barang_nama($_GET['term']);
		   	if (count($result) > 0) {
		    foreach ($result as $row)
		     	$arr_result[] = array(
		     		'kobar'			=> $row->barang_id,
		     		'label'			=> $row->barang_nama,
		     		'satuan'		=> $row->nama,
		     		'stok'			=> $row->barang_stok,
		     		'harjul'		=> $row->barang_harjul,
		     		'qty'			=> 1,
				);
		     	echo json_encode($arr_result);
		   	}
		}
	}

	function add_to_cart(){

		if($this->session->userdata('akses')=='1' || $this->session->userdata('akses')=='2'){

			$kobar=$this->input->post('kode_brg');
			$produk=$this->m_barang->get_barang($kobar);
			$harga_pokok = str_replace(",", "", $this->input->post('harjul'));
			$diskon = str_replace(",", "", $this->input->post('diskon'));
			$i=$produk->row_array();
			if (!empty($this->input->post('diskon'))) {
				$data = array(
		              'id'       => $i['barang_id'],
		              'name'     => $i['barang_nama'],
		              'satuan'   => $i['nama_uom'],
		              'harpok'   => $i['barang_harpok'],
		              'price'    => $harga_pokok-(($this->input->post('diskon')/100)*str_replace(",", "", $this->input->post('harjul'))),
		              // 'price'    => $harga_pokok-$diskon, // diskon dengan nominal
		              'disc'     => $this->input->post('diskon'),
		              'qty'      => $this->input->post('qty'),
		              'amount'	  => str_replace(",", "", $this->input->post('harjul'))
		            );
			} else {
				$data = array(
		              'id'       => $i['barang_id'],
		              'name'     => $i['barang_nama'],
		              'satuan'   => $i['nama_uom'],
		              'harpok'   => $i['barang_harpok'],
		              'price'    => str_replace(",", "", $this->input->post('harjul')),
		              'disc'     => $this->input->post('diskon'),
		              'qty'      => $this->input->post('qty'),
		              'amount'	  => str_replace(",", "", $this->input->post('harjul'))
		            );
			}
			
			if(!empty($this->cart->total_items())){

				foreach ($this->cart->contents() as $items){
					$id=$items['id'];
					$qtylama=$items['qty'];
					$rowid=$items['rowid'];
					$kobar=$this->input->post('kode_brg');
					$qty=$this->input->post('qty');

					if($id==$kobar){

						$up=array(
							'rowid'=> $rowid,
							'qty'=>$qtylama+$qty
							);
						$this->cart->update($up);

					}else{

						$this->cart->insert($data);

					}

				}

			}else{

				$this->cart->insert($data);

			}

				redirect('admin/penjualan');

		}else{

	        echo "Halaman tidak ditemukan";

	    }

	}

	function remove(){

		if($this->session->userdata('akses')=='1' || $this->session->userdata('akses')=='2'){

			$row_id=$this->uri->segment(4);
			$this->cart->update(array(
	               'rowid'      => $row_id,
	               'qty'     => 0
	            ));
			redirect('admin/penjualan');

		}else{

	        echo "Halaman tidak ditemukan";

	    }

	}

	function simpan_penjualan(){

		if($this->session->userdata('akses')=='1' || $this->session->userdata('akses')=='2'){

			$total=$this->input->post('total');
			$jml_uang=str_replace(",", "", $this->input->post('jml_uang'));
			$kembalian=$jml_uang-$total;

			if(!empty($total) && !empty($jml_uang)){

				if($jml_uang < $total){

					echo $this->session->set_flashdata('msg','<label class="label label-danger">Jumlah Uang yang anda masukan Kurang</label>');
					redirect('admin/penjualan');

				}else{

					$nofak=$this->m_penjualan->get_nofak();
					$this->session->set_userdata('nofak',$nofak);
					$order_proses=$this->m_penjualan->simpan_penjualan($nofak,$total,$jml_uang,$kembalian);

					// Audit Penjualan
					$this->m_global->audit_master('Insert', 'tbl_jual', $order_proses);
					//

					if($order_proses){

						$this->cart->destroy();
						
						$this->session->unset_userdata('tglfak');
						$this->session->unset_userdata('suplier');
						$this->load->view('admin/alert/alert_sukses');	

					}else{

						redirect('admin/penjualan');

					}

				}
				
			}else{

				echo $this->session->set_flashdata('msg','<label class="label label-danger">Penjualan Gagal di Simpan, Mohon Periksa Kembali Semua Inputan Anda!</label>');
				redirect('admin/penjualan');

			}

		}else{

	        echo "Halaman tidak ditemukan";

	    }

	}

	function cetak_faktur(){
		$x['data']=$this->m_penjualan->cetak_faktur();
		$this->load->view('admin/laporan/v_faktur',$x);
		//$this->session->unset_userdata('nofak');
	}


}