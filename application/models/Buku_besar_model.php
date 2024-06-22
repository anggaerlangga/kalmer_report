<?php defined('BASEPATH') OR exit('No direct script access allowed');

class buku_besar_model extends CI_Model 
{
    // nama table
    private $_table = "buku_besar";

    // nama kolom di tabel
    public $id;
    public $tgl_transaksi;
    public $no_akun;
    public $akun;
    public $debit;
    public $kredit;

    public function rules() {
        return [

            ['field' => 'tgl_transaksi',
            'label' => 'Tanggal Transaksi',
            'rules' => 'required'],
        
            ['field' => 'no_akun',
            'label' => 'No Akun'],

            ['field' => 'akun',
            'label' => 'Akun'],

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
        $this->tgl_transaksi = $post["tgl_transaksi"];
        $this->no_akun = $post["no_akun"];
        $this->akun = $post["akun"]; // isi field nama
        $this->debit = $post["debit"];
        $this->kredit = $post["kredit"];
        return $this->db->insert($this->_table, $this); // simpan ke database
    }

    public function update()
    {
        $post = $this->input->post();
        $this->id = $post["id"];
        $this->tgl_transaksi = $post["tgl_transaksi"];
        $this->no_akun = $post["no_akun"];
        $this->akun = $post["akun"];
        $this->debit = $post["debit"];
        $this->kredit = $post["kredit"];
        return $this->db->update($this->_table, $this, array('id' => $post['id']));
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array("id" => $id));
    }

}