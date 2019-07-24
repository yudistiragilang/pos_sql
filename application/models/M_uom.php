<?php
class M_uom extends CI_Model{

	function hapus_uom($kode){

		$hsl=$this->db->query("DELETE FROM tbl_uom where id='$kode'");
		return $hsl;

	}

	function update_uom($kode, $uom, $des_uom){

		$hsl=$this->db->query("UPDATE tbl_uom set nama='$uom', description='$des_uom' where id='$kode'");
		return $hsl;

	}

	function tampil_uom(){

		$hsl=$this->db->query("SELECT * FROM tbl_uom ORDER BY id DESC");
		return $hsl;

	}

	function simpan_uom($uom, $des_uom){

		$hsl=$this->db->query("INSERT INTO tbl_uom(nama, description) VALUES ('$uom', '$des_uom')");
		return $this->db->insert_id();

	}

	function audit_uom($aksi, $tabel, $src_id){

		$user_id=$this->session->userdata('idadmin');
		$date = date('Y-m-d H:i:s');
		
		$sql = $this->db->query("INSERT INTO tbl_audit_master (aksi, tabel, oleh, created_date, src_id) VALUES ('$aksi', '$tabel', '$user_id', '$date', '$src_id')");

		return $sql;
	}

}