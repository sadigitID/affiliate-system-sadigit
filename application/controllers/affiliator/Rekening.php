<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Rekening extends CI_Controller
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
      'view' => 'affiliator/rekening',
      'active' => 'rekening',
      'sub1' => 'rekening',
    ];

    $this->load->view('template/index', $data);
  }

  public function tb_rekening()
  {
    header('Content-Type: application/json');


    $tabel = 'tb_rekening';
    $column_order = array();
    $coloumn_search = array('no_rek', 'nama_pemilik_rek', 'nama_bank');
    $select = "*";
    $order_by = array('id_rek' => 'desc');
    $join = [];
    $where = [];
    $group_by = [];
    $list = $this->umum->get_datatables($tabel, $column_order, $coloumn_search, $order_by, $where, $join, $select, $group_by);
    $data = array();
    $no = @$_POST['start'];

    foreach ($list as $list) {
      // akuntansi_journal_edit
      $edit =  "<i class='fas fa-edit btn btn-icon btn-light-primary' onclick={_edit('$list->id')}></i>";
      $row = array();
      $row[] = ++$no;
      $row[] = $list->no_rek;
      $row[] = $list->nama_pemilik_rek;
      $row[] = $list->nama_bank;
      $row[] = "<center>
                      $edit 
                    </center>";
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

  function check_rekening()
  {
    $id_rek = $this->input->post('id_rek');
    $no_rek = $this->input->post('no_rek');
    $nama_pemilik_rek = $this->input->post('nama_pemilik_rek');
    $nama_bank = $this->input->post('nama_bank');

    $check = $this->db->select('id_rek', 'no_rek', 'nama_pemilik_rek', 'nama_bank')->from('tb_rekening')->where('id_rek !=', $id_rek)->where('id_rek', $id_rek)->get();
    if ($check->num_rows() > 0) {
      return false;
    }
    return true;
  }

  public function save()
  {
    $config = [
      [
        'field' => 'no_rek',
        'rules' => 'required',
        'errors' => [
          'required' => 'nomor rekening tidak boleh kosong'
        ]
      ],
      [
        'field' => 'nama_pemilik_rek',
        'rules' => 'required',
        'errors' => [
          'required' => 'nama pemilik rekening tidak boleh kosong'
        ]
      ],
      [
        'field' => 'nama_bank',
        'rules' => 'required',
        'errors' => [
          'required' => 'nama bank tidak boleh kosong'
        ]
      ],
    ];

    $data = array('status' => false, 'messages' => array());
    $this->form_validation->set_rules($config);
    $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    if ($this->form_validation->run() == TRUE) {

      $id_rek = $this->input->post('id_rek');

      $payloadData = [
        'no_rek' => $this->input->post('no_rek'),
        'nama_pemilik_rek' => $this->input->post('nama_pemilik_rek'),
        'nama_bank' => $this->input->post('nama_bank'),
      ];

      if ($id_rek == "") {
        $this->db->insert('tb_rekening', $payloadData);
      } else {
        $this->db->update('tb_rekening', $payloadData, ['id_rek' => $id_rek]);
      }

      $data['status'] = true;
      $this->session->set_flashdata('daftar_rekening', 'Berhasil menyimpan alamat rekening');
    } else {
      foreach ($_POST as $key => $value) {
        $data['messages'][$key] = form_error($key);
      }
    }
    echo json_encode($data);
  }

  function getRekening()
  {
    $id_rek = $this->input->post('id_rek', true);
    $data = $this->db->get_where('tb_rekening', ['id_rek' => $id_rek])->row();
    echo json_encode($data);
  }
}
