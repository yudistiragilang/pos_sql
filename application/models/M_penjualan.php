<?php
class M_penjualan extends CI_Model{

	function hapus_retur($kode){

		$hsl=$this->db->query("DELETE FROM tbl_retur WHERE retur_id='$kode'");
		return $hsl;

	}

	function tampil_retur(){

		$hsl=$this->db->query("SELECT retur_id,DATE_FORMAT(retur_tanggal,'%d/%m/%Y') AS retur_tanggal,retur_barang_id,retur_barang_nama,retur_barang_satuan,retur_harjul,retur_qty,(retur_harjul*retur_qty) AS retur_subtotal,retur_keterangan FROM tbl_retur ORDER BY retur_id DESC");
		return $hsl;

	}

	function barang_id($id){
		$this->db->like('barang_id', $id , 'both');
		$this->db->order_by('barang_id', 'ASC');
		$this->db->limit(10);
		$this->db->join('tbl_uom', 'id = barang_uom_id');
		return $this->db->get('tbl_barang')->result();
	}

	function simpan_retur($kobar, $nabar, $satuan, $harjul, $qty, $keterangan){

		$subtotal = $harjul*$qty;
		$hsl=$this->db->query("INSERT INTO tbl_retur(retur_barang_id, retur_barang_nama, retur_barang_satuan, retur_harjul, retur_qty, retur_subtotal, retur_keterangan) VALUES ('$kobar', '$nabar', '$satuan', '$harjul', '$qty', '$subtotal', '$keterangan')");
		$stok_lama = $this->get_barang($kobar);
		$stok_update = $stok_lama - $qty;

		$this->db->query("UPDATE tbl_barang SET barang_stok =".$stok_update." WHERE barang_id='".$kobar."'");

		$get_retur_lastest = $this->get_retur_lastest();
		return $get_retur_lastest;

	}

	function simpan_penjualan($nofak, $total, $jml_uang, $kembalian){

		$idadmin=$this->session->userdata('idadmin');
		$this->db->query("INSERT INTO tbl_jual (jual_nofak, jual_total, jual_jml_uang, jual_kembalian, jual_user_id, jual_keterangan) VALUES ('$nofak', '$total', '$jml_uang', '$kembalian', '$idadmin', 'eceran')");

		foreach ($this->cart->contents() as $item) {
			$data=array(
				'd_jual_nofak' 			=>	$nofak,
				'd_jual_barang_id'		=>	$item['id'],
				'd_jual_barang_nama'	=>	$item['name'],
				'd_jual_barang_satuan'	=>	$item['satuan'],
				'd_jual_barang_harpok'	=>	$item['harpok'],
				'd_jual_barang_harjul'	=>	$item['amount'],
				'd_jual_qty'			=>	$item['qty'],
				'd_jual_diskon'			=>	$item['disc'],
				'd_jual_total'			=>	$item['subtotal']
			);
			$this->db->insert('tbl_detail_jual',$data);
			$this->db->query("update tbl_barang set barang_stok=barang_stok-'$item[qty]' where barang_id='$item[id]'");
		}

		return $nofak;
	}

	function get_nofak(){

		$q = $this->db->query("SELECT MAX(RIGHT(jual_nofak,6)) AS kd_max FROM tbl_jual WHERE DATE(jual_tanggal)=CURDATE()");
        $kd = "";
        if($q->num_rows()>0){
            foreach($q->result() as $k){
                $tmp = ((int)$k->kd_max)+1;
                $kd = sprintf("%06s", $tmp);
            }
        }else{
            $kd = "000001";
        }
        return date('dmy').$kd;

	}

	//=====================Penjualan grosir================================
	function simpan_penjualan_grosir($nofak,$total,$jml_uang,$kembalian){

		$idadmin=$this->session->userdata('idadmin');
		$this->db->query("INSERT INTO tbl_jual (jual_nofak,jual_total,jual_jml_uang,jual_kembalian,jual_user_id,jual_keterangan) VALUES ('$nofak','$total','$jml_uang','$kembalian','$idadmin','grosir')");

		foreach ($this->cart->contents() as $item) {
			$data=array(
				'd_jual_nofak' 			=>	$nofak,
				'd_jual_barang_id'		=>	$item['id'],
				'd_jual_barang_nama'	=>	$item['name'],
				'd_jual_barang_satuan'	=>	$item['satuan'],
				'd_jual_barang_harpok'	=>	$item['harpok'],
				'd_jual_barang_harjul'	=>	$item['amount'],
				'd_jual_qty'			=>	$item['qty'],
				'd_jual_diskon'			=>	$item['disc'],
				'd_jual_total'			=>	$item['subtotal']
			);
			$this->db->insert('tbl_detail_jual',$data);
			$this->db->query("update tbl_barang set barang_stok=barang_stok-'$item[qty]' where barang_id='$item[id]'");
		}

		return true;

	}

	function cetak_faktur(){

		$nofak=$this->session->userdata('nofak');
		$hsl=$this->db->query("SELECT jual_nofak,DATE_FORMAT(jual_tanggal,'%d/%m/%Y %H:%i:%s') AS jual_tanggal,jual_total,jual_jml_uang,jual_kembalian,jual_keterangan,d_jual_barang_nama,d_jual_barang_satuan,d_jual_barang_harjul,d_jual_qty,d_jual_diskon,d_jual_total FROM tbl_jual JOIN tbl_detail_jual ON jual_nofak=d_jual_nofak WHERE jual_nofak='$nofak'");
		return $hsl;

	}

	function get_barang($kobar){

		$this->db->select('barang_stok');
	    $this->db->from('tbl_barang');
	    $this->db->where('barang_id',$kobar);
	    return $this->db->get()->row()->barang_stok;
	    
	}

	function get_retur_lastest(){

		$this->db->select('retur_id');
	    $this->db->from('tbl_retur');
	    $this->db->order_by('retur_id','DESC');
	    $this->db->limit('1');
	    return $this->db->get()->row()->retur_id;
	    
	}
	
}