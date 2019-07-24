<?php
class M_barang extends CI_Model{

	function hapus_barang($kode){

		$hsl=$this->db->query("DELETE FROM tbl_barang where barang_id='$kode'");
		return $hsl;
		
	}

	function update_barang($kobar, $nabar, $kat, $uom, $harpok, $harjul, $harjul_grosir, $stok, $min_stok){

		$user_id=$this->session->userdata('idadmin');
		$hsl=$this->db->query("UPDATE tbl_barang SET barang_nama='$nabar', barang_harpok='$harpok', barang_harjul='$harjul', barang_harjul_grosir='$harjul_grosir', barang_stok='$stok', barang_min_stok='$min_stok', barang_tgl_last_update=NOW(), barang_kategori_id='$kat', barang_user_id='$user_id', barang_uom_id='$uom' WHERE barang_id='$kobar'");
		return $hsl;

	}

	function tampil_barang(){

		$hsl=$this->db->query("SELECT
								barang_id,
								barang_nama,
								barang_harpok,
								barang_harjul,
								barang_harjul_grosir,
								barang_stok,
								barang_min_stok,
								barang_kategori_id,
								barang_uom_id,
								kat.kategori_nama,
								uom.nama AS nama_uom
							FROM
								tbl_barang AS barang
								JOIN tbl_kategori AS kat ON barang.barang_kategori_id = kat.kategori_id
								JOIN tbl_uom AS uom ON uom.id=barang.barang_uom_id");
		return $hsl;

	}

	function simpan_barang($kobar,$nabar,$kat,$satuan,$harpok,$harjul,$harjul_grosir,$stok,$min_stok){

		$user_id=$this->session->userdata('idadmin');
		$hsl=$this->db->query("INSERT INTO tbl_barang (barang_id, barang_nama, barang_uom_id, barang_harpok, barang_harjul, barang_harjul_grosir, barang_stok, barang_min_stok, barang_kategori_id, barang_user_id) VALUES ('$kobar','$nabar','$satuan','$harpok','$harjul','$harjul_grosir','$stok','$min_stok','$kat','$user_id')");
		return $kobar;

	}


	function get_barang($kobar){

		$hsl=$this->db->query("SELECT * FROM tbl_barang where barang_id='$kobar'");
		return $hsl;

	}

	function get_kobar(){

		$q = $this->db->query("SELECT MAX(RIGHT(barang_id,6)) AS kd_max FROM tbl_barang");
        $kd = "";
        if($q->num_rows()>0){
            foreach($q->result() as $k){
                $tmp = ((int)$k->kd_max)+1;
                $kd = sprintf("%06s", $tmp);
            }
        }else{
            $kd = "000001";
        }
        return "BR".$kd;

	}

	function audit_barang($aksi, $tabel, $src_id){

		$user_id=$this->session->userdata('idadmin');
		$date = date('Y-m-d H:i:s');

		$sql = $this->db->query("INSERT INTO tbl_audit_master (aksi, tabel, oleh, created_date, src_id) VALUES ('$aksi', '$tabel', '$user_id', '$date', '$src_id')");

		return $sql;
	}

}