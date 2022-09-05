<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Bonusexcel_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function view_by_date($date){
        $this->db->where('DATE(tgl)', $date);

        return $this->db->get('tb_bonus')->result();
    }

    public function view_all(){
        return $this->db->get('tb_bonus')->result();
    }
}