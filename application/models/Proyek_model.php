<?php defined('BASEPATH') OR exit('No direct script access allowed');

class proyek_model extends CI_Model 
{
    // nama table
    private $_table = "master_proyek";

    // nama kolom di tabel
    public $id_proyek;
    public $no_proyek;
    public $nama_proyek;
    public $lokasi_proyek;
    public $status_proyek;
    public $pelaksana;
    public $tgl_mulai;
    public $tgl_selesai;

    public function rules() {
        return [

            ['field' => 'no_proyek',
            'label' => 'No Proyek',
            'rules' => 'required'],
            
            ['field' => 'nama_proyek',
            'label' => 'Nama Proyek'],
            
            ['field' => 'pelaksana',
            'label' => 'Pelakana Proyek'],

            ['field' => 'lokasi_proyek',
            'label' => 'Lokasi Proyek'],

            ['field' => 'status_proyek',
            'label' => 'Status Proyek'],

            ['field' => 'pelaksana',
            'label' => 'Pelaksana'],

            ['field' => 'tgl_mulai',
            'label' => 'Tanggal Mulai'],

            ['field' => 'tgl_selesai',
            'label' => 'Tanggal Selesai']
        ];
    }

    public function getAll() {
        return $this->db->get($this->_table)->result();
        // SELECT * FROM banner
        // method ini akan mengembalikan sebuah array
    }

    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["id_proyek" => $id])->row();
        // SELECT * FROM barang WHERE id_barang=$id
        // method ini akan mengembalikan sebuah objek
    }

    public function getDetailByNoPro($id)
    {
        return $this->db->get_where($this->_table, ["no_proyek" => $id])->row();
    }

    public function getProjectProgress()
    {
       $this->db->where('status_proyek', 'P');
       $query = $this->db->count_all_results('master_proyek');
        // var_dump($query);
        return $query;
    }

    public function getProjectPending()
    {
       $this->db->where('status_proyek', 'O');
       $query = $this->db->count_all_results('master_proyek');
        // var_dump($query);
        return $query;
    }

    public function getByNoPro($postData)
    {
        //return $this->db->get_where($this->_table, ["no_proyek" => $no_proyek])->row();
        // SELECT * FROM barang WHERE id_barang=$id
        // method ini akan mengembalikan sebuah objek
        $response = array();
        $this->db->select('nama_proyek,lokasi_proyek,status_proyek');
        $this->db->where('no_proyek',$postData['no_proyek']);
        $q = $this->db->get('master_proyek');
        $response = $q->result_array();

        return $response;
    }

    public function save() 
    {
        $post = $this->input->post(); // ambil data dari form
        $this->id_proyek = uniqid(); // membuat id unik
        $this->no_proyek = $post["no_proyek"];
        $this->nama_proyek = $post["nama_proyek"]; // isi field nama
        $this->lokasi_proyek = $post["lokasi_proyek"]; // isi field jumlah
        $this->status_proyek = $post["status_proyek"];
        $this->pelaksana = $post["pelaksana"];
        $this->tgl_mulai = $post["tgl_mulai"];
        $this->tgl_selesai = $post["tgl_selesai"];
        return $this->db->insert($this->_table, $this); // simpan ke database
    }

    public function update()
    {
        $post = $this->input->post();
        $this->id_proyek = $post["id_proyek"];
        $this->no_proyek = $post["no_proyek"];
        $this->nama_proyek = $post["nama_proyek"]; // isi field nama
        $this->pelaksana = $post["pelaksana"];
        $this->lokasi_proyek = $post["lokasi_proyek"]; // isi field jumlah
        $this->status_proyek = $post["status_proyek"];
        $this->tgl_mulai = $post["tgl_mulai"];
        $this->tgl_selesai = $post["tgl_selesai"];
        return $this->db->update($this->_table, $this, array('id_proyek' => $post['id_proyek']));
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array("id_proyek" => $id));
    }

}