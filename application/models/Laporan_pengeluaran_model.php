<?php defined('BASEPATH') OR exit('No direct script access allowed');

class laporan_pengeluaran_model extends CI_Model 
{
    // nama table
    private $_table = "laporan_pengeluaran";

    // nama kolom di tabel
    public $id_pengeluaran;
    public $no_proyek;
    public $nama_proyek;
    public $tanggal_pengeluaran;
    public $jenis_pengeluaran;
    public $pelaksana;
    public $belanja;
    public $id_barang;
    public $nama_barang;
    public $kuantitas;
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

            ['field' => 'tanggal_pengeluaran',
            'label' => 'Tanggal Pengeluaran'],

            ['field' => 'jenis_pengeluaran',
            'label' => 'Jenis Pengeluaran'],

            ['field' => 'pelaksana',
            'label' => 'Pelaksana'],

            ['field' => 'belanja',
            'label' => 'Belanja'],

            ['field' => 'id_barang',
            'label' => 'id_barang'],

            ['field' => 'nama_barang',
            'label' => 'nama_barang'],

            ['field' => 'kuantitas',
            'label' => 'kuantitas'],

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

            ['field' => 'no_transaksi',
            'label' => 'no_transaksi'],

        ];
    }

    public function getAll() {
        return $this->db->get($this->_table)->result();
        // SELECT * FROM banner
        // method ini akan mengembalikan sebuah array
    }

    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["id_pengeluaran" => $id])->row();
        // SELECT * FROM barang WHERE id_barang=$id
        // method ini akan mengembalikan sebuah objek
    }

    public function getDetailByNoPro($id)
    {
        return $this->db->get_where($this->_table, ["no_proyek" => $id])->row();
    }

    public function getTotalPbm($id)
    {
        //$query = $this->db->get_where('laporan_pengeluaran', ["no_proyek" => $id]);
        $query = $this->db->get_where('laporan_pengeluaran', ["no_proyek" => $id, "jenis_pengeluaran" => "PBM"]);
        return $query->result();
    }

    public function getTotalPbj($id)
    {
        //$query = $this->db->get_where('laporan_pengeluaran', ["no_proyek" => $id]);
        $query = $this->db->get_where('laporan_pengeluaran', ["no_proyek" => $id, "jenis_pengeluaran" => "PBJ"]);
        return $query->result();
    }

    public function getTotalPbjm($id)
    {
        $this->db->select('nominal');
        $this->db->from('laporan_pengeluaran');
        $where = "no_proyek='$id' AND jenis_pengeluaran='PBJM'";
        $this->db->where($where);
        $query = $this->db->get();
        return $query->result();
    }

    public function getTotalPengeluaran()
    {
        $this->db->select_sum('nominal');
        $this->db->from('laporan_pengeluaran');
        $query = $this->db->get();
        return $query->result();
    }

    public function getTotalPengeluaranTahunan()
    {
        $this->db->select_sum('nominal');
        // $this->db->select('MONTHNAME(tanggal_pengeluaran) as mon');
        $this->db->select('tanggal_pengeluaran', '%Y-%m');
        $this->db->from('laporan_pengeluaran');
        $this->db->group_by('MONTH(tanggal_pengeluaran), YEAR(tanggal_pengeluaran)');
        $this->db->order_by('tanggal_pengeluaran asc');
        $query = $this->db->get();
        return $query->result();

    }

    public function getTotalPengeluaranProyek()
    {
        $this->db->select_sum('nominal');
        $this->db->select('no_proyek');
        $this->db->from('laporan_pengeluaran');
        $this->db->group_by('no_proyek');
        $query = $this->db->get();
        return $query->result();   
    }


    public function save() 
    {
        $post = $this->input->post(); // ambil data dari form
        $this->id_pengeluaran = uniqid(); // membuat id unik
        $this->no_proyek = $post["no_proyek"];
        $this->nama_proyek = $post["nama_proyek"]; // isi field nama
        $this->tanggal_pengeluaran = $post["tanggal_pengeluaran"];
        $this->jenis_pengeluaran = $post["jenis_pengeluaran"];
        $this->pelaksana = $post["pelaksana"];
        $this->belanja = $post["belanja"];
        $this->deskripsi = $post["deskripsi"];
        $this->akun = $post["akun"];
        $this->nama_akun = $post["nama_akun"];
        $this->nominal = $post["nominal"];
        $this->nominal = $post["debit"];
        $this->nominal = $post["kredit"];
        // $this->total = $post["total"];
        return $this->db->insert($this->_table, $this); // simpan ke database
    }

    function save_pengeluaran(){
        $data = array(
                'id_pengeluaran'  => uniqid(), 
                'no_proyek'  => $this->input->post('no_proyek'), 
                'nama_proyek' => $this->input->post('nama_proyek'),
                'tanggal_pengeluaran' => $this->input->post('tanggal_pengeluaran'),
                'jenis_pengeluaran' => $this->input->post('jenis_pengeluaran'), 
                'pelaksana' => $this->input->post('pelaksana'),
                'belanja' => $this->input->post('belanja'),
                'id_barang' => $this->input->post('id_barang'),
                'nama_barang' => $this->input->post('nama_barang'),
                'kuantitas' => $this->input->post('kuantitas'),
                'deskripsi' => $this->input->post('deskripsi'),
                'akun' => $this->input->post('akun'),
                'nama_akun' => $this->input->post('nama_akun'),
                'nominal' => $this->input->post('nominal'),
                'debit' => $this->input->post('debit'),
                'kredit' => $this->input->post('kredit'),
                'no_transaksi' => $this->input->post('no_transaksi'),
            );
        $result=$this->db->insert('laporan_pengeluaran',$data);
        return $result;
    }

    function update_pengeluaran()
    {
        $id_pengeluaran = $this->input->post('id_pengeluaran');
        $no_proyek = $this->input->post('no_proyek');
        $nama_proyek = $this->input->post('nama_proyek');
        $tanggal_pengeluaran = $this->input->post('tanggal_pengeluaran');
        $jenis_pengeluaran = $this->input->post('jenis_pengeluaran');
        $pelaksana = $this->input->post('pelaksana');
        $belanja = $this->input->post('belanja');
        $id_barang = $this->input->post('id_barang');
        $nama_barang = $this->input->post('nama_barang');
        $kuantitas = $this->input->post('kuantitas');
        $deskripsi = $this->input->post('deskripsi');
        $akun = $this->input->post('akun');
        $nama_akun = $this->input->post('nama_akun');
        $nominal = $this->input->post('nominal');
        $debit = $this->input->post('debit');
        $kredit = $this->input->post('kredit');
        $no_transaksi = $this->input->post('no_transaksi');

        $this->db->set('no_proyek', $no_proyek);
        $this->db->set('nama_proyek', $nama_proyek);
        $this->db->set('tanggal_pengeluaran', $tanggal_pengeluaran);
        $this->db->set('jenis_pengeluaran', $jenis_pengeluaran);
        $this->db->set('pelaksana', $pelaksana);
        $this->db->set('belanja', $belanja);
        $this->db->set('id_barang', $id_barang);
        $this->db->set('nama_barang', $nama_barang);
        $this->db->set('kuantitas', $kuantitas);
        $this->db->set('deskripsi', $deskripsi);
        $this->db->set('akun', $akun);
        $this->db->set('nama_akun', $nama_akun);
        $this->db->set('nominal', $nominal);
        $this->db->set('debit', $debit);
        $this->db->set('kredit', $kredit);
        $this->db->set('no_transaksi', $no_transaksi);

        $this->db->where('id_pengeluaran', $id_pengeluaran);
        $result=$this->db->update('laporan_pengeluaran');
        return $result;
    }

    public function update()
    {
        $post = $this->input->post();
        $this->id_pengeluaran = $post["id_pengeluaran"];
        $this->no_proyek = $post["no_proyek"];
        $this->nama_proyek = $post["nama_proyek"];
        $this->tanggal_pengeluaran = $post["tanggal_pengeluaran"];
        $this->jenis_pengeluaran = $post["jenis_pengeluaran"];
        $this->pelaksana = $post["pelaksana"];
        $this->belanja = $post["belanja"];
        $this->deskripsi = $post["deskripsi"];
        $this->akun = $post["akun"];
        $this->nama_akun = $post[">nama_akun"];
        $this->nominal = $post["nominal"];
        $this->debit = $post["debit"];
        $this->kredit = $post["kredit"];
        // $this->total = $post["total"];
        return $this->db->update($this->_table, $this, array('id_pengeluaran' => $post['id_pengeluaran']));
    }

    public function getAllExcel() {
        // $this->db->select(array('kode_rab', 'no_proyek', 'nama_proyek', 'lokasi_proyek', 'uraian_pekerjaan', 'volume', 'satuan', 'harga_satuan', 'material_spec', 'jumlah_harga'));
        // $this->db->from('tb_anggaran');
        // $query = $this->db->get_where(["kode_rab" => $id])->row();
        // return $query->result();
       // $query = $this->db->get_where('laporan_pemasukan', array('id_pemasukan' => $id));
       $this->db->from('laporan_pengeluaran');
       $query = $this->db->get();
        return $query->result();
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array("id_pengeluaran" => $id));
    }

}