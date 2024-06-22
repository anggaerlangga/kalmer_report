<?php defined('BASEPATH') OR exit('No direct script access allowed');

class anggaran_model extends CI_Model 
{
    // nama table
    private $_table = "tb_anggaran";

    // nama kolom di tabel
    public $id_transaksi;
    public $kode_rab;
    public $no_proyek;
    public $lokasi_proyek;
    public $nama_proyek;
    public $uraian_pekerjaan;
    public $volume;
    public $satuan;
    public $harga_satuan;
    public $material_spec;
    public $jumlah_harga;
    // public $pekerjaan_lain;  
    public $subtotal;
    public $total;
    public $diskon;
    public $grand_total; 

    public function rules() {
        return [
            ['field' => 'kode_rab',
            'label' => 'Kode RAB',
            'rules' => 'required'],

            ['field' => 'no_proyek',
            'label' => 'No Proyek',
            'rules' => 'required'],

            ['field' => 'lokasi_proyek',
            'label' => 'Lokasi Proyek'],

            ['field' => 'nama_proyek',
            'label' => 'Nama Proyek'],

            ['field' => 'uraian_pekerjaan',
            'label' => 'Uraian Pekerjaan'],

            ['field' => 'volume',
            'label' => 'Volume'],

            ['field' => 'satuan',
            'label' => 'Satuan'],

            ['field' => 'harga_satuan',
            'label' => 'Harga Satuan'],

            ['field' => 'material_spec',
            'label' => 'Material Spec'],

            ['field' => 'jumlah_harga',
            'label' => 'Jumlah Harga'],

            ['field' => 'subtotal',
            'label' => 'Subtotal'],

            ['field' => 'total',
            'label' => 'Total'],

            ['field' => 'diskon',
            'label' => 'Diskon'],
            
            ['field' => 'grand_total',
            'label' => 'Grand Total']
        ];
    }

    public function getAll() {
        $this->db->select('*');
        $this->db->from('tb_anggaran');
        $this->db->group_by('kode_rab');
        $query = $this->db->get(); 
        return $query->result(); 
        //return $this->db->get($this->_table)->result();
        // SELECT * FROM banner
        // method ini akan mengembalikan sebuah array
    }

    public function getAllExcel($id) {
        // $this->db->select(array('kode_rab', 'no_proyek', 'nama_proyek', 'lokasi_proyek', 'uraian_pekerjaan', 'volume', 'satuan', 'harga_satuan', 'material_spec', 'jumlah_harga'));
        // $this->db->from('tb_anggaran');
        // $query = $this->db->get_where(["kode_rab" => $id])->row();
        // return $query->result();
        $query = $this->db->get_where('tb_anggaran', array('kode_rab' => $id));
        return $query->result();
    }

    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["kode_rab" => $id])->row();
    }

    //public function save($data) 
    //{
      // return $this->db->insert_batch('tb_anggaran', $data);
        /*$post = $this->input->post(); // ambil data dari form
        $this->kode_rab = $post["kode_rab"]; // membuat id unik
        $this->no_proyek = $post["no_proyek"]; 
        $this->nama_proyek = $post["nama_proyek"]; // isi field nama
        $this->lokasi_proyek = $post["lokasi_proyek"]; // isi field jumlah
        $total_kerjaan = count($post["uraian_pekerjaan"]);
        var_dump($total_kerjaan);
        for($i = 0; $i < $total_kerjaan; $i++)
		{
            $this->uraian_pekerjaan = $post["uraian_pekerjaan"][$i];
            $this->volume = $post["volume"][$i];
            $this->satuan = $post["satuan"][$i];
            $this->material_spec = $post["material_spec"][$i];
            $this->harga_satuan = $post["harga_satuan"][$i];
            $this->jumlah_harga = $post["jumlah_harga"][$i];

        }
        // $this->pekerjaan_lain = $post["pekerjaan_lain"];
        // $this->subtotal = $post["subtotal"];
        // $this->total = $post["total"];
        // $this->diskon = $post["diskon"];
        // $this->grand_total = $post["grand_total"];
        return $this->db->insert($this->_table, $this); // simpan ke database */
    //}

    public function update()
    {
        $post = $this->input->post();
        $this->kode_rab = $post["kode_rab"];
        $this->no_proyek = $post["no_proyek"];
        $this->lokasi_proyek = $post["lokasi_proyek"]; 
        $this->nama_proyek = $post["nama_proyek"];
        $total_kerjaan = count($post["uraian_pekerjaan"]);
        // var_dump($total_kerjaan);
        for($i = 0; $i < $total_kerjaan; $i++)
		{
            $this->uraian_pekerjaan = $post["uraian_pekerjaan"][$i];
            $this->volume = $post["volume"][$i];
            $this->satuan = $post["satuan"][$i];
            $this->material_spec = $post["material_spec"][$i];
            $this->harga_satuan = $post["harga_satuan"][$i];
            $this->jumlah_harga = $post["jumlah_harga"][$i];
            // $this->pekerjaan_lain = $post["pekerjaan_lain"];
        }
        $this->subtotal = $post["subtotal"];
        $this->total = $post["total"];
        $this->diskon = $post["diskon"];
        $this->grand_total = $post["grand_total"];
        return $this->db->update($this->_table, $this, array('kode_rab' => $post['kode_rab']));
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array("kode_rab" => $id));
    }

}