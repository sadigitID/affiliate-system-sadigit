<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pesanan_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    private function _get_datatables_query($tabel, $column_order, $coloumn_search, $order_by, $where, $join, $select, $group_by)
    {
        $this->db->select($select);
        $this->db->from($tabel);

        if ($where != []) {
            $this->db->where($where);
        }

        if ($group_by != []) {
            $this->db->group_by($group_by);
        }

        if ($join != []) {
            foreach ($join as $j) {
                if ($j['direction'] == "") {
                    $this->db->join($j['field'], $j['condition']);
                } else {
                    $this->db->join($j['field'], $j['condition'], $j['direction']);
                }
            }
        }

        $i = 0;

        foreach ($coloumn_search as $item) // loop column 
        {
            if (@strtolower($_POST['search']['value'])) // if datatable send POST for search
            {

                if ($i === 0) // first loop
                {
                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->like($item, strtolower($_POST['search']['value']));
                } else {
                    $this->db->or_like($item, strtolower($_POST['search']['value']));
                }

                if (count($coloumn_search) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
            }
            $i++;
        }

        if (isset($_POST['order'])) // here order processing
        {
            $this->db->order_by($column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else if (isset($order_by)) {
            $order = $order_by;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

    function get_datatables($tabel, $column_order, $coloumn_search, $order_by, $where = [], $join = [], $select = "*", $group_by = [])
    {
        $this->_get_datatables_query($tabel, $column_order, $coloumn_search, $order_by, $where, $join, $select, $group_by);
        if (@$_POST['length'] != -1)
            $this->db->limit(@$_POST['length'], @$_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }


    function count_filtered($tabel, $column_order, $coloumn_search, $order_by, $where = [], $join = [], $select = "*", $group_by = [])
    {
        $this->_get_datatables_query($tabel, $column_order, $coloumn_search, $order_by, $where, $join, $select, $group_by);
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all($tabel, $column_order, $coloumn_search, $order_by, $where = [], $join = [], $select = "*", $group_by = [])
    {
        $this->_get_datatables_query($tabel, $column_order, $coloumn_search, $order_by, $where, $join, $select, $group_by);
        return $this->db->count_all_results();
    }

    function getKode($table, $field, $prefix, $length = 4)
    {
        $this->db->select("max(cast(replace($field,'$prefix','') as unsigned)) as kode");
        $query = $this->db->get("$table");

        if ($query->num_rows() > 0) {
            $data = $query->row();
            $angka = str_ireplace($prefix, '', $data->kode);
            $kode = intval($angka) + 1;
        } else {
            $kode = 1;
        }

        if (strlen($kode) < $length) {
            $kodemax = str_pad($kode, $length, "0", STR_PAD_LEFT);
        } else {
            $kodemax = $kode;
        }

        $kodejadi  = $prefix . $kodemax;
        return $kodejadi;
    }

    function toNumber($val)
    {
        $exp = explode('.', $val);
        $val = join('', $exp);
        return (float) $val;
    }

    public function view_all_pdf()
    {
        //return $this->db->get('tb_bonus')->result(); // Tampilkan semua data export
        return $this->db->from('tb_pesanan')
        ->join('tb_produk', 'tb_produk.id_produk = tb_pesanan.id_produk')
        ->join('tb_users', 'tb_users.id_user = tb_pesanan.id_user')
        ->get()
        ->result();
    }

    public function view_by_date_pdf($tgl_awal, $tgl_akhir)
    {

        $tgl_awal = $this->db->escape($tgl_awal);
        $tgl_akhir = $this->db->escape($tgl_akhir);
        $this->db->where('DATE(tanggal_pembayaran) BETWEEN ' . $tgl_awal . ' AND ' . $tgl_akhir); // Tambahkan where tanggal nya
        return $this->db->from('tb_pesanan')
        ->join('tb_produk', 'tb_produk.id_produk = tb_pesanan.id_produk')
        ->join('tb_users', 'tb_users.id_user = tb_pesanan.id_user')
        ->get()
        ->result(); // Tampilkan data export sesuai tanggal yang diinput oleh user pada filter
    }

    public function view_all_excel()
    {
        //return $this->db->get('tb_pesanan')->result(); // Tampilkan semua data export
        return $this->db->from('tb_pesanan')
        ->join('tb_produk', 'tb_produk.id_produk = tb_pesanan.id_produk')
        ->join('tb_users', 'tb_users.id_user = tb_pesanan.id_user')
        ->get()
        ->result();
    }

    public function view_by_date_excel($tgl_awal, $tgl_akhir)
    {
        $tgl_awal = $this->db->escape($tgl_awal);
        $tgl_akhir = $this->db->escape($tgl_akhir);
        $this->db->where('DATE(tanggal_pembayaran) BETWEEN ' . $tgl_awal . ' AND ' . $tgl_akhir); // Tambahkan where tanggal nya
        return $this->db->from('tb_pesanan')
        ->join('tb_produk', 'tb_produk.id_produk = tb_pesanan.id_produk')
        ->join('tb_users', 'tb_users.id_user = tb_pesanan.id_user')
        ->get()
        ->result(); // Tampilkan data export sesuai tanggal yang diinput oleh user pada filter
    }
}
