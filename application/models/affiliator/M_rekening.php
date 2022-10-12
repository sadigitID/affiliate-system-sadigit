<?php
class M_rekening extends CI_Model
{

  public function getBank()
  {
    $this->db->order_by('id_bank', 'ASC');
        return $this->db->from('tb_bank')
          ->get()
          ->result();

    // $this->db->get('tb_bank', ['id_bank' => $id_bank])->result();
 
  }

  private $_table = "tb_rekening";

  public $id_rek;
  public $id_bank;
  public $nama_pemilik_rek;
  public $no_rek;
  public $id_user;

  public function rules()
  {
    return [
      [
      'field' => 'nama_pemilik_rek',
      'label' => 'nama_pemilik_rek',
      'rules' => 'required|trim',
      'errors' => [
        'required' => 'nama pemilik rekening tidak boleh kosong'
        ]
      ],

      [
      'field' => 'no_rek',
      'label' => 'no_rek',
      'rules' => 'required|trim|numeric',
      'errors' => [
        'required' => 'nomer rekening tidak boleh kosong',
        'numeric' => 'nomer rekening harus angka'
        ]
      ],
    ];
  }

  public function getAll()
  {
    return $this->db->get($this->_table)->result();
  }

  public function getById($id_rek)
  {
    return $this->db->get_where($this->_table, ["id_rek" => $id_rek])->row();
  }

  public function save()
  {
    $post = $this->input->post();
    $this->id_rek = uniqid();
    $this->id_bank = $post["id_bank"];
    $this->nama_pemilik_rek = $post["nama_pemilik_rek"];
    $this->no_rek = $post["no_rek"];
    $this->id_user = $post["id_user"];
    $this->db->insert($this->_table, $this);
  }

  public function update()
  {
    $post = $this->input->post();
    $this->id_rek = $post["id_rek"];
    $this->id_bank = $post["id_bank"];
    $this->nama_pemilik_rek = $post["nama_pemilik_rek"];
    $this->no_rek = $post["no_rek"];
    $this->db->update($this->_table, $this, array('id_rek' => $post['id_rek']));
  }



  public function getRekening($email)
  {
    return $this->db->query("select a.*,b.*,c.* from tb_rekening a join tb_bank b on a.id_bank=b.id_bank join tb_users c on a.id_user=c.id_user where c.email='$email' ")->row_array();
    
  }

  public function getUser($email)
    {
        return $this->db->query("select a.*,b.*,c.*,d.* from tb_users a join provinces b on a.province_id=b.province_id join cities c on a.city_id=c.city_id join districts d on a.district_id=d.district_id where a.email='$email' ")->row_array();
    }

  public function addRekening($data,$table)
  {
    $this->db->insert($table,$data);
  } 
  
    

}
?>