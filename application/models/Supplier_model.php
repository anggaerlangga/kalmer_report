<?php defined('BASEPATH') OR exit('No direct script access allowed');

class supplier_model extends CI_Model 
{
    // nama table
    private $_table = "master_suplier";

    // nama kolom di tabel
    public $id_suplier;
    public $nama_suplier;
    public $telp_suplier;

    public function rules() {
        return [
            ['field' => 'id_suplier',
            'label' => 'Kode Suplier',
            'rules' => 'required'],

            ['field' => 'nama_suplier',
            'label' => 'Nama Suplier'],

            ['field' => 'telp_suplier',
            'label' => 'Telp Suplier']
        ];
    }

    public function getAll() {
        return $this->db->get($this->_table)->result();
        // SELECT * FROM banner
        // method ini akan mengembalikan sebuah array
    }

    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["id_suplier" => $id])->row();
        // SELECT * FROM barang WHERE id_barang=$id
        // method ini akan mengembalikan sebuah objek
    }

    public function save() 
    {
        $post = $this->input->post(); // ambil data dari form
        //$this->id_suplier = uniqid(); // membuat id unik
        $this->id_suplier = $post["id_suplier"];
        $this->nama_suplier = $post["nama_suplier"]; // isi field nama
        $this->telp_suplier = $post["telp_suplier"]; // isi field jumlah
        return $this->db->insert($this->_table, $this); // simpan ke database
    }

    public function update()
    {
        $post = $this->input->post();
        $this->id_suplier = $post["id_suplier"];
        $this->nama_suplier = $post["nama_suplier"];
        $this->telp_suplier = $post["telp_suplier"];
        return $this->db->update($this->_table, $this, array('id_suplier' => $post['id_suplier']));
    }

    public function delete($id)
    {
        $this->_deleteImage($id);
        return $this->db->delete($this->_table, array("id_suplier" => $id));
    }

}