<?php
class M_kategori extends CI_Model{

	function hapus_kategori($kode){

		$hsl=$this->db->query("DELETE FROM tbl_kategori where kategori_id='$kode'");
		return $hsl;

	}

	function update_kategori($kode,$kat){

		$hsl=$this->db->query("UPDATE tbl_kategori set kategori_nama='$kat' where kategori_id='$kode'");
		return $hsl;

	}

	function tampil_kategori(){

		$hsl=$this->db->query("SELECT * FROM tbl_kategori ORDER BY kategori_id DESC");
		return $hsl;

	}

	function simpan_kategori($kat){

		$hsl=$this->db->query("INSERT INTO tbl_kategori(kategori_nama) VALUES ('$kat')");
		// return $hsl;
		return $this->db->insert_id();

	}

	function audit_kategori($aksi, $tabel, $src_id){

		$user_id=$this->session->userdata('idadmin');
		$date = date('Y-m-d H:i:s');
		
		$sql = $this->db->query("INSERT INTO tbl_audit_master (aksi, tabel, oleh, created_date, src_id) VALUES ('$aksi', '$tabel', '$user_id', '$date', '$src_id')");

		return $sql;
	}

}