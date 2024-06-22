<?php defined('BASEPATH') OR exit('No direct script access allowed');

class laporan_inventory_model extends CI_Model 
{
    // nama table
    private $_table = "laporan_inventory";

    public $id_laporan;
    public $no_proyek;
    public $nama_proyek;
    public $tipe_barang;
    public $merk_barang;
    public $id_barang;
    // public $nama_barang;
    public $satuan;
    public $harga_satuan;
    public $kuantitas;
    public $nama_suplier;
    public $no_telp;
    public $keterangan;
    public $total_belanja;
    public $tanggal_input;
    public $photo;

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }

    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["id_laporan" => $id])->row();
    }

    public function getTotalNota($id)
    {
        $this->db->select_sum('total_belanja');
        // $this->db->select('no_proyek');
        $this->db->from('laporan_inventory');
        $this->db->where('no_proyek', $id);
        // $this->db->group_by('tanggal_input');
        $query = $this->db->get();
        return $query->result();   
    }

    public function getProyek()
    {
        $this->db->select('id_laporan,no_proyek, nama_proyek');
        $this->db->from('laporan_inventory');
        $this->db->group_by("no_proyek");
        $query = $this->db->get();
        return $query->result(); 
    }

    function save_inventory() 
    {
        $data = array(
            'id_laporan' => uniqid(),
            'no_proyek' => $this->input->post('no_proyek'),
            'nama_proyek' => $this->input->post('nama_proyek'),
            'tipe_barang' => $this->input->post('tipe_barang'),
            'merk_barang' => $this->input->post('merk_barang'),
            'id_barang' => $this->input->post('id_barang'),
            // 'nama_barang' => $this->input->post('nama_barang'),
            'satuan' => $this->input->post('satuan'),
            'harga_satuan' => $this->input->post('harga_satuan'),
            'kuantitas' => $this->input->post('kuantitas'),
            'nama_suplier' => $this->input->post('nama_suplier'),
            'no_telp' => $this->input->post('no_telp'),
            'keterangan' => $this->input->post('keterangan'),
            'total_belanja' => $this->input->post('total_belanja'),
            'tanggal_input' => $this->input->post('tanggal_input'),
            // 'photo' => $this->_uploadImage(),
        );
        $result=$this->db->insert('laporan_inventory',$data);
        return $result;
    }

    private function _uploadImage()
    {
        $config['upload_path']          = './upload/';
        $config['allowed_types']        = 'gif|jpg|jpeg|png';
        $config['file_name']            = $this->id_laporan;
        $config['overwrite']			= true;
        $config['max_size']             = 5024; // 1MB
        // $config['max_width']            = 1024;
        // $config['max_height']           = 768;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('image')) {
            return $this->upload->data("file_name");
        }
        
        print_r($this->upload->display_errors());
        //return "default.jpg";
    }

    function getNoteByNoPro($id)
    {
        return $this->db->get_where($this->_table, ["no_proyek" => $id])->result();
    }

    // function fetch_date($startdate,$enddate){
    //     $this->db->select(*);
    //     $this->db->from('laporan_inventory');
    //     if($startDate != '' && $endDate != ''){
    //         $this->db->where('cast(added_date as date) BETWEEN "' . $startDate . '" AND "' . $endDate . '"',null,false);
    //     }
    //     $this->db->order_by('tanggal_sekarang','ASC');
    //     return $this->db->get();
    // }


    public function delete($id)
    {
        return $this->db->delete($this->_table, array("id_laporan" => $id));
    }

}