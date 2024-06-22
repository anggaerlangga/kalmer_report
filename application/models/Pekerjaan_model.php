<?php defined('BASEPATH') OR exit('No direct script access allowed');

class pekerjaan_model extends CI_Model 
{
    // nama table
    private $_table = "master_pekerjaan";

    // nama kolom di tabel
    public $id_pekerjaan;
    public $jenis_pekerjaan;
    public $nama_pekerjaan;
    public $volume;
    public $satuan;
    public $harga_satuan;
    public $material_spec;

    public function rules() {
        return [
            ['field' => 'id_pekerjaan',
            'label' => 'id_pekerjaan'],

            ['field' => 'jenis_pekerjaan',
            'label' => 'jenis_pekerjaan'],

            ['field' => 'nama_pekerjaan',
            'label' => 'nama_pekerjaan'],

            ['field' => 'volume',
            'label' => 'volume'],

            ['field' => 'satuan',
            'label' => 'satuan'],

            ['field' => 'harga_satuan',
            'label' => 'harga_satuan'],

            ['field' => 'material_spec',
            'label' => 'material_spec']
        ];
    }

    public function getAll() {
        return $this->db->get($this->_table)->result();
        // SELECT * FROM banner
        // method ini akan mengembalikan sebuah array
    }

    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["id_pekerjaan" => $id])->row();
        // SELECT * FROM barang WHERE id_barang=$id
        // method ini akan mengembalikan sebuah objek
    }

    public function save() 
    {
        $post = $this->input->post(); // ambil data dari form
        $this->id_pekerjaan = uniqid(); // membuat id unik
        $this->jenis_pekerjaan = $post["jenis_pekerjaan"]; // isi field nama
        $this->nama_pekerjaan = $post["nama_pekerjaan"]; // isi field jumlah
        $this->volume = $post["volume"]; // isi field tipe
        $this->satuan = $post["satuan"];
        $this->harga_satuan = $post["harga_satuan"];
        $this->material_spec = $post["material_spec"];
        return $this->db->insert($this->_table, $this); // simpan ke database
    }

    public function update()
    {
        $post = $this->input->post();
        $this->id_pekerjaan = $post["id_pekerjaan"];
        $this->jenis_pekerjaan = $post["jenis_pekerjaan"]; // isi field nama
        $this->nama_pekerjaan = $post["nama_pekerjaan"]; // isi field jumlah
        $this->volume = $post["volume"]; // isi field tipe
        $this->satuan = $post["satuan"];
        $this->harga_satuan = $post["harga_satuan"];
        $this->material_spec = $post["material_spec"];
        return $this->db->update($this->_table, $this, array('id_pekerjaan' => $post['id_pekerjaan']));
    }

    public function delete($id)
    {
        $this->_deleteImage($id);
        return $this->db->delete($this->_table, array("id_pekerjaan" => $id));
    }

}