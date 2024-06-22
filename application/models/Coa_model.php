<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Coa_model extends CI_Model 
{
    // nama table
    private $_table = "master_coa";

    // nama kolom di tabel
    public $id;
    public $akun;
    public $nama_akun;

    public function rules() {
        return [

            ['field' => 'akun',
            'label' => 'Akun',
            'rules' => 'required'],

            ['field' => 'nama_akun',
            'label' => 'Nama Akun']
        ];
    }

    public function getAll() {
        return $this->db->get($this->_table)->result();
        // SELECT * FROM banner
        // method ini akan mengembalikan sebuah array
    }

    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["id" => $id])->row();
        // SELECT * FROM barang WHERE id_barang=$id
        // method ini akan mengembalikan sebuah objek
    }

    public function getByAkun($postData)
    {
        //return $this->db->get_where($this->_table, ["no_proyek" => $no_proyek])->row();
        // SELECT * FROM barang WHERE id_barang=$id
        // method ini akan mengembalikan sebuah objek
        $response = array();
        $this->db->select('nama_akun');
        $this->db->where('akun',$postData['akun']);
        $q = $this->db->get('master_coa');
        $response = $q->result_array();

        return $response;
    }


    public function save() 
    {
        $post = $this->input->post(); // ambil data dari form
        $this->id = uniqid(); // membuat id unik
        $this->akun = $post["akun"]; // isi field nama
        $this->nama_akun = $post["nama_akun"];
        return $this->db->insert($this->_table, $this); // simpan ke database
    }

    public function update()
    {
        $post = $this->input->post();
        $this->id = $post["id"];
        $this->akun = $post["akun"];
        $this->nama_akun = $post["nama_akun"];
        return $this->db->update($this->_table, $this, array('id' => $post['id']));
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array("id" => $id));
    }

}