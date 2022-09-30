<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Bonus_komisi extends CI_Controller
{
  function __construct()
  {
    parent::__construct();

    $this->load->library('form_validation');
    $this->load->model('Umum_model', 'umum');
  }

  public function index()
  {
    $data = [
      'view' => 'affiliator/bonus_komisi',
      'active' => 'bonus_komisi',
      'sub1' => 'bonus_komisi',
    ];

    $this->load->view('template/index', $data);
  }

  public function tb_bonus()
  {
    header('Content-Type: application/json');

    $tabel = 'tb_bonus';
    $column_order = array();
    $coloumn_search = array('jml_bonus', 'catatan', 'tanggal_bonus');
    $select = "*";
    $order_by = array('id_bonus' => 'desc');
    $join = [];
    $where = [];
    $group_by = [];
    $list = $this->umum->get_datatables($tabel, $column_order, $coloumn_search, $order_by, $where, $join, $select, $group_by);
    $data = array();
    $no = @$_POST['start'];

    foreach ($list as $list) {
      $row = array();
      $row[] = ++$no;
      $row[] = $list->jml_bonus;
      $row[] = $list->catatan;
      $row[] = $list->tanggal_bonus;
      $data[] = $row;
    }

    $output = array(
      "draw" => @$_POST['draw'],
      "recordsTotal" => $this->umum->count_all($tabel, $column_order, $coloumn_search, $order_by, $where, $join, $select, $group_by),
      "recordsFiltered" => $this->umum->count_filtered($tabel, $column_order, $coloumn_search, $order_by, $where, $join, $select, $group_by),
      "data" => $data,
    );
    //output to json format
    echo json_encode($output);
  }

  function check_bonus()
  {
    $id_bonus = $this->input->post('id_bonus');
    $id_user = $this->input->post('id_user');
    $jml_bonus = $this->input->post('jml_bonus');
    $catatan = $this->input->post('catatan');
    $tanggal_bonus = $this->input->post('tanggal_bonus');

    $check = $this->db->select('id_user', 'jml_bonus', 'catatan', 'tanggal_bonus')->from('tb_bonus')->where('id_bonus !=', $id_bonus)->where('id_bonus', $id_bonus)->get();
    if ($check->num_rows() > 0) {
      return false;
    }
    return true;
  }

  function getBonusK()
  {
    $id_bonus = $this->input->post('id_bonus', true);
    $data = $this->db->get_where('tb_bonus', ['id_bonus' => $id_bonus])->row();
    echo json_encode($data);
  }
}
