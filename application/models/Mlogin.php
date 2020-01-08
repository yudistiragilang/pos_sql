<?php

class Mlogin extends CI_Model{

    function cekadmin($u,$p){

        $hasil=$this->db->query("SELECT * FROM tbl_user WHERE user_username='$u' AND user_password=md5('$p')");
        return $hasil;

    }
  
}
