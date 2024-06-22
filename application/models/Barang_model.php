<?php defined('BASEPATH') OR exit('No direct script access allowed');

class barang_model extends CI_Model 
{
    // nama table
    private $_table = "master_barang";

    // nama kolom di tabel
    public $id_barang;
    public $tipe_barang;
    public $merk_barang;
    public $nama_barang;
    public $satuan;
    public $nama_suplier;
    public $harga_satuan;
    public $kuantitas;

    public function rules() {
        return [
            ['field' => 'id_barang',
            'label' => 'id_barang',
            'rules' => 'required'],

            ['field' => 'tipe_barang',
            'label' => 'tipe_barang'],

            ['field' => 'merk_barang',
            'label' => 'merk_barang'],

            ['field' => 'nama_barang',
            'label' => 'nama_barang'],

            ['field' => 'satuan',
            'label' => 'satuan'],

            ['field' => 'kuantitas',
            'label' => 'kuantitas'],

            ['field' => 'nama_supler',
            'label' => 'nama_suplier'],

            ['field' => 'harga_satuan',
            'label' => 'harga_satuan']
        ];
    }

    public function getAll() {
        return $this->db->get($this->_table)->result();
        // SELECT * FROM banner
        // method ini akan mengembalikan sebuah array
    }

    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["id_barang" => $id])->row();
    }

    public function getTipeBarang($postData)
    {
        // $response = array();
        $this->db->distinct();
        $this->db->select('tipe_barang');
        $this->db->limit(5);
        $this->db->like('tipe_barang',$postData['tipe_barang']);
        $q = $this->db->get('master_barang');
        $response = $q->result();

        return $response;
    }

    public function getMerkBarang($postData)
    {
        $response = array();
        $this->db->distinct();
        $this->db->select('merk_barang');
        $this->db->like('tipe_barang',$postData['tipe_barang']);
        $q = $this->db->get('master_barang');
        $response = $q->result_array();

        return $response;
    }

    public function getNamaBarang($postData)
    {
        $response = array();
        $this->db->distinct();
        $this->db->select('nama_barang,id_barang,harga_satuan');
        $this->db->like('nama_barang',$postData['nama_barang']);
        $q = $this->db->get('master_barang');
        $response = $q->result_array();

        return $response;
    }

    public function getKuantitas($postData)
    {
        $response = array();
        $this->db->distinct();
        $this->db->select('id_barang,kuantitas');
        $this->db->like('nama_barang',$postData['value']);
        $q = $this->db->get('master_barang');
        $response = $q->result_array();

        return $response;
    }


    public function getByTipeBarang($postData)
    {
        $response = array();
        $this->db->select('nama_barang');
        $this->db->where('tipe_barang',$postData['tipe_barang']);
        $q = $this->db->get('master_barang');
        $response = $q->result_array();

        return $response;
    }

    public function getByKodeBarang($postData)
    {
        $response = array();
        $this->db->select('nama_barang,harga_satuan,kuantitas');
        $this->db->where('id_barang',$postData['id_barang']);
        $q = $this->db->get('master_barang');
        $response = $q->result_array();

        return $response;
    }

    public function cekBarang($postData)
    {
        $response = array();
        $this->db->select('id_barang');
        $this->db->where('id_barang',$postData['id_barang']);
        $q = $this->db->get('master_barang');
        $response = $q->result_array();
        var_dump($response);
        print_r($response);
        // if(empty($response)){
        //     return "sukses";
        // } else {
        //     return "false";
        // }

        return $response;
    }

    public function cekHargaBarang($postData)
    {
        $response = array();
        $this->db->select('harga_satuan');
        $this->db->where('id_barang',$postData['id_barang']);
        $q = $this->db->get('master_barang');
        $response = $q->result_array();
        var_dump($response);
        print_r($response);
        // if(empty($response)){
        //     return "sukses";
        // } else {
        //     return "false";
        // }

        return $response;
    }

    public function save() 
    {
        $post = $this->input->post(); // ambil data dari form
        //$this->id_barang = uniqid(); // membuat id unik
        $this->id_barang = $post["id_barang"]; // isi field nama
        $this->tipe_barang = $post["tipe_barang"];
        $this->merk_barang = $post["merk_barang"];
        $this->nama_barang = $post["nama_barang"]; // isi field jumlah
        $this->satuan = $post["satuan"]; // isi field tipe
        $this->kuantitas = $post["kuantitas"];
        $this->nama_suplier = $post["nama_suplier"]; // isi field tipe
        $this->harga_satuan = $post["harga_satuan"]; // isi field tipe
        return $this->db->insert($this->_table, $this); // simpan ke database
    }

    function update_qty(){
        $id_barang = $this->input->post('id_barang');
        $kuantitas=$this->input->post('kuantitas');
 
        $this->db->set('kuantitas', $kuantitas);
        $this->db->where('id_barang', $id_barang);
        $result=$this->db->update('master_barang');
        return $result;
    }

    public function update()
    {
        $post = $this->input->post();
        $this->id_barang = $post["id_barang"]; // isi field nama
        $this->tipe_barang = $post["tipe_barang"];
        $this->merk_barang = $post["merk_barang"];
        $this->nama_barang = $post["nama_barang"]; // isi field jumlah
        $this->satuan = $post["satuan"]; // isi field tipe
        $this->kuantitas = $post["kuantitas"];
        $this->nama_suplier = $post["nama_suplier"]; // isi field tipe
        $this->harga_satuan = $post["harga_satuan"];
        return $this->db->update($this->_table, $this, array('id_barang' => $post['id_barang']));
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array("id_barang" => $id));
    }

}