<?php defined('BASEPATH') OR exit('No direct script access allowed');

class laporan_pemasukan_model extends CI_Model 
{
    // nama table
    private $_table = "laporan_pemasukan";

    // nama kolom di tabel
    public $id_pemasukan;
    public $no_proyek;
    public $nama_proyek;
    public $tanggal_pemasukan;
    public $jenis_pemasukan;
    public $deskripsi;
    public $akun;
    public $nama_akun;
    public $nominal;
    public $debit;
    public $kredit;
    public $total;
    public $no_transaksi;

    public function rules() {
        return [

            ['field' => 'no_proyek',
            'label' => 'No Proyek',
            'rules' => 'required'],
            
            ['field' => 'nama_proyek',
            'label' => 'Nama Proyek'],

            ['field' => 'tanggal_pemasukan',
            'label' => 'Tanggal Pemasukan'],

            ['field' => 'jenis_pemasukan',
            'label' => 'Jenis Pemasukan'],

            ['field' => 'deskripsi',
            'label' => 'Deskripsi'],

            ['field' => 'akun',
            'label' => 'akun'],

            ['field' => 'nama_akun',
            'label' => 'nama_akun'],

            ['field' => 'debit',
            'label' => 'debit'],

            ['field' => 'kredit',
            'label' => 'kredit'],

            ['field' => 'nominal',
            'label' => 'Nominal'],

            ['field' => 'no_transaksi',
            'label' => 'no_transaksi']
        ];
    }

    public function getAll() {
        return $this->db->get($this->_table)->result();
        // SELECT * FROM banner
        // method ini akan mengembalikan sebuah array
    }

    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["id_pemasukan" => $id])->row();
        // SELECT * FROM barang WHERE id_barang=$id
        // method ini akan mengembalikan sebuah objek
    }

    public function getDetailByNoPro($id)
    {
        return $this->db->get_where($this->_table, ["no_proyek" => $id])->row();
    }

    public function getTotalByNoPro($id)
    {
        $query = $this->db->get_where('laporan_pemasukan', ["no_proyek" => $id]);
        return $query->result();
    }

   /* public function save() 
    {
        $post = $this->input->post(); // ambil data dari form
        $this->id_pemasukan = uniqid(); // membuat id unik
        $this->no_proyek = $post["no_proyek"];
        $this->nama_proyek = $post["nama_proyek"]; // isi field nama
        $this->tanggal_pemasukan = $post["tanggal_pemasukan"];
        $this->jenis_pemasukan = $post["jenis_pemasukan"];
        $this->deskripsi = $post["deskripsi"];
        $this->akun = $post["akun"];
        $this->nama_akun = $post["nama_akun"];
        $this->nominal = $post["debit"];
        $this->debit = $post["debit"];
        $this->kredit = $post["kredit"];
        // $this->total = $post["total"];
        return $this->db->insert($this->_table, $this); // simpan ke database
    }*/

    function save_pemasukan(){
        $data = array(
                'id_pemasukan'  => uniqid(), 
                'no_proyek'  => $this->input->post('no_proyek'), 
                'nama_proyek' => $this->input->post('nama_proyek'),
                'tanggal_pemasukan' => $this->input->post('tanggal_pemasukan'),
                'jenis_pemasukan' => $this->input->post('jenis_pemasukan'), 
                'deskripsi' => $this->input->post('deskripsi'),
                'akun' => $this->input->post('akun'),
                'nama_akun' => $this->input->post('nama_akun'),
                'nominal' => $this->input->post('debit'),
                'debit' => $this->input->post('debit'),
                'kredit' => $this->input->post('kredit'),
                'no_transaksi' => $this->input->post('no_transaksi'),
            );
        $result=$this->db->insert('laporan_pemasukan',$data);
        return $result;
    }

    function update_pemasukan()
    {
        $id_pemasukan = $this->input->post('id_pemasukan');
        $no_proyek = $this->input->post('no_proyek');
        $nama_proyek = $this->input->post('nama_proyek');
        $tanggal_pemasukan = $this->input->post('tanggal_pemasukan');
        $jenis_pemasukan = $this->input->post('jenis_pemasukan');
        $deskripsi = $this->input->post('deskripsi');
        $nominal = $this->input->post('nominal');
        $total = $this->input->post('total');
        $akun = $this->input->post('akun');
        $nama_akun = $this->input->post('nama_akun');
        $debit = $this->input->post('debit');
        $kredit = $this->input->post('kredit');
        $no_transaksi = $this->input->post('no_transaksi');

        // $this->db->set('id_pemasukan', $id_pemasukan);
        $this->db->set('no_proyek', $no_proyek);
        $this->db->set('nama_proyek', $nama_proyek);
        $this->db->set('tanggal_pemasukan', $tanggal_pemasukan);
        $this->db->set('jenis_pemasukan', $jenis_pemasukan);
        $this->db->set('deskripsi', $deskripsi);
        $this->db->set('akun', $akun);
        $this->db->set('nama_akun', $nama_akun);
        $this->db->set('nominal', $nominal);
        $this->db->set('debit', $debit);
        $this->db->set('kredit', $kredit);
        $this->db->set('no_transaksi', $no_transaksi);

        $this->db->where('id_pemasukan', $id_pemasukan);
        $result=$this->db->update('laporan_pemasukan');
        return $result;
    }

    /*public function update()
    {
        $post = $this->input->post();
        $this->id_pemasukan = $post["id_pemasukan"];
        $this->no_proyek = $post["no_proyek"];
        $this->nama_proyek = $post["nama_proyek"];
        $this->tanggal_pemasukan = $post["tanggal_pemasukan"];
        $this->jenis_pemasukan = $post["jenis_pemasukan"];
        $this->deskripsi = $post["deskripsi"];
        $this->akun = $post["akun"];
        $this->nama_akun = $post["nama_akun"];
        $this->nominal = $post["debit"];
        $this->debit = $post["debit"];
        $this->kredit = $post["kredit"];
        // $this->total = $post["total"];
        return $this->db->update($this->_table, $this, array('id_pemasukan' => $post['id_pemasukan']));
    }*/

    public function totalPemasukan() 
    {
        $this->db->select_sum('nominal');
        $query = $this->db->get('laporan_pemasukan');
       // var_dump($query);
        return $query->result();
    }

    public function getTotalPemasukanTahunan()
    {
        $this->db->select_sum('nominal');
        // $this->db->select('MONTHNAME(tanggal_pengeluaran) as mon');
        $this->db->select('tanggal_pemasukan', '%Y-%m');
        $this->db->from('laporan_pemasukan');
        $this->db->group_by('MONTH(tanggal_pemasukan), YEAR(tanggal_pemasukan)');
        $this->db->order_by('tanggal_pemasukan asc');
        $query = $this->db->get();
        return $query->result();

    }

    public function getTotalPemasukan()
    {
        $this->db->select_sum('nominal');
        $this->db->from('laporan_pemasukan');
        $query = $this->db->get();
        return $query->result();
    }

    public function getTotalPemasukanProyek()
    {
        $this->db->select_sum('nominal');
        $this->db->select('no_proyek');
        $this->db->from('laporan_pemasukan');
        $this->db->group_by('no_proyek');
        $query = $this->db->get();
        return $query->result();   
    }

    public function getAllExcel() {
        // $this->db->select(array('kode_rab', 'no_proyek', 'nama_proyek', 'lokasi_proyek', 'uraian_pekerjaan', 'volume', 'satuan', 'harga_satuan', 'material_spec', 'jumlah_harga'));
        // $this->db->from('tb_anggaran');
        // $query = $this->db->get_where(["kode_rab" => $id])->row();
        // return $query->result();
       // $query = $this->db->get_where('laporan_pemasukan', array('id_pemasukan' => $id));
       $this->db->from('laporan_pemasukan');
       $query = $this->db->get();
        return $query->result();
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array("id_pemasukan" => $id));
    }

}