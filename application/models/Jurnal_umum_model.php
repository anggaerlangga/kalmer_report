<?php defined('BASEPATH') OR exit('No direct script access allowed');

class jurnal_umum_model extends CI_Model 
{
    // nama table
    private $_table = "jurnal_umum";

    // nama kolom di tabel
    public $no_transaksi;
    public $tanggal;
    public $akun;
    public $nama_akun;
    public $debit;
    public $kredit;

    public function rules() {
        return [

            ['field' => 'no_transaksi',
            'label' => 'No Transaksi',
            'rules' => 'required'],
            
            ['field' => 'tanggal',
            'label' => 'Tanggal'],

            ['field' => 'akun',
            'label' => 'Akun'],

            ['field' => 'nama_akun',
            'label' => 'Nama Akun'],

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
        return $this->db->get_where($this->_table, ["no_akun" => $id])->row();
        // SELECT * FROM barang WHERE id_barang=$id
        // method ini akan mengembalikan sebuah objek
    }

/*
    public function save() 
    {
        $post = $this->input->post(); // ambil data dari form
        $this->no_akun = uniqid(); // membuat id unik
        $this->tanggal = $post["tanggal"];
        $this->akun = $post["akun"]; // isi field nama
        $this->debit = $post["debit"];
        $this->kredit = $post["kredit"];
        return $this->db->insert($this->_table, $this); // simpan ke database
    }
*/

    function save_jurnal(){
        $data = array(
                'no_transaksi' => $this->input->post('no_transaksi'),
                'tanggal' => $this->input->post('tanggal'),
                'akun' => $this->input->post('akun'),
                'nama_akun' => $this->input->post('nama_akun'),
                'debit' => $this->input->post('debit'),
                'kredit' => $this->input->post('kredit'),
            );
        $result=$this->db->insert('jurnal_umum',$data);
        return $result;
    }

    function update_jurnal()
    {
        $no_transaksi = $this->input->post('no_transaksi');
        $tanggal = $this->input->post('tanggal');
        $akun = $this->input->post('akun');
        $nama_akun = $this->input->post('nama_akun');
        $debit = $this->input->post('debit');
        $kredit = $this->input->post('kredit');

        $this->db->set('no_transaksi', $no_transaksi);
        $this->db->set('tanggal', $tanggal);
        $this->db->set('akun', $akun);
        $this->db->set('nama_akun', $nama_akun);
        $this->db->set('debit', $debit);
        $this->db->set('kredit', $kredit);

        $this->db->where('no_transaksi', $no_transaksi);
        $result=$this->db->update('jurnal_umum');
        return $result;
    }

  /*  public function update()
    {
        $post = $this->input->post();
        $this->no_akun = $post["no_akun"];
        $this->tanggal = $post["tanggal"];
        $this->akun = $post["akun"];
        $this->debit = $post["debit"];
        $this->kredit = $post["kredit"];
        return $this->db->update($this->_table, $this, array('no_akun' => $post['no_akun']));
    }
*/

    // public function delete($id)
    // {
    //     return $this->db->delete($this->_table, array("no_akun" => $id));
    // }

    function delete_jurnal(){
        $no_transaksi=$this->input->post('no_transaksi');
        $this->db->where('no_transaksi', $no_transaksi);
        $result=$this->db->delete('jurnal_umum');
        return $result;
    }

}