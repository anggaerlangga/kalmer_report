<?php defined('BASEPATH') OR exit('No direct script access allowed');

class jurnal_penyesuaian_model extends CI_Model 
{
    // nama table
    private $_table = "jurnal_penyesuaian";

    // nama kolom di tabel
    public $id;
    public $keterangan;
    public $debit;
    public $kredit;

    public function rules() {
        return [

            ['field' => 'keterangan',
            'label' => 'Keterangan',
            'rules' => 'required'],

            ['field' => 'keterangan',
            'label' => 'Keterangan'],

            ['field' => 'debit',
            'label' => 'debit'],

            ['field' => 'kredit',
            'label' => 'Kredit']
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


    public function save() 
    {
        $post = $this->input->post(); // ambil data dari form
        $this->id = uniqid(); // membuat id unik
        $this->keterangan = $post["keterangan"];
        $this->debit = $post["debit"];
        $this->kredit = $post["kredit"];
        return $this->db->insert($this->_table, $this); // simpan ke database
    }

    public function update()
    {
        $post = $this->input->post();
        $this->id = $post["id"];
        $this->keterangan = $post["keterangan"];
        $this->debit = $post["debit"];
        $this->kredit = $post["kredit"];
        return $this->db->update($this->_table, $this, array('id' => $post['id']));
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array("id" => $id));
    }

}