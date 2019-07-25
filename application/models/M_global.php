<?php
class M_global extends CI_Model{

	function audit_master($aksi, $tabel, $src_id){

		$user_id=$this->session->userdata('idadmin');
		$date = date('Y-m-d H:i:s');
		
		$sql = $this->db->query("INSERT INTO tbl_audit_master (aksi, tabel, oleh, created_date, src_id) VALUES ('$aksi', '$tabel', '$user_id', '$date', '$src_id')");

		return $sql;
	}

}