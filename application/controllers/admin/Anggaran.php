<?php

defined('BASEPATH') OR exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Anggaran extends CI_Controller 
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('anggaran_model');
        $this->load->model('proyek_model');
        $this->load->library("form_validation");
        $this->load->model("user_model");
        if($this->user_model->isNotLogin()) redirect(site_url('admin/login'));
    }

    public function index()
    {
        $data["anggaran"] = $this->anggaran_model->getAll();
        $this->load->view("admin/anggaran/list", $data);
    }

    public function getByNoPro()
    {   
        $postData = $this->input->post();
        $this->load->model('proyek_model');
        $data = $this->proyek_model->getByNoPro($postData);
        echo json_encode($data);
    }
    
    public function add()
    {
        $anggaran = $this->anggaran_model;
        $data['master_proyek'] = $this->proyek_model->getAll();
        $validation = $this->form_validation;
        $validation->set_rules($anggaran->rules()); 

        if($validation->run()) {
           $anggaran->save();
           $this->session->set_flashdata('success', 'Berhasil disimpan'); 
        }

        $this->load->view("admin/anggaran/new_form", $data); 
    }

    public function proses()
    {
        $anggaran = $this->anggaran_model;
        $data = array();
        // $id_transaksi = uniqid();
        $kode_rab = $_POST['kode_rab'];
        $no_proyek = $_POST['no_proyek'];
        $nama_proyek = $_POST['nama_proyek'];
        $lokasi_proyek = $_POST['lokasi_proyek'];
        $uraian_pekerjaan = $_POST['uraian_pekerjaan'];
        $volume = $_POST['volume'];
        $satuan = $_POST['satuan'];
        $material_spec = $_POST['material_spec'];
        $harga_satuan = $_POST['harga_satuan'];
        $jumlah_harga = $_POST['jumlah_harga']; 
        $subtotal = $_POST['subtotal'];
        $total = $_POST['total'];
        $diskon = $_POST['diskon']; 
        $grand_total = $_POST['grand_total'];      

        // $index = 0;
        foreach($uraian_pekerjaan as $key => $val) {
            $data[] = array(
                'kode_rab' => $kode_rab,
                'no_proyek' => $no_proyek,
                'nama_proyek' => $nama_proyek,
                'lokasi_proyek' => $lokasi_proyek,
                'uraian_pekerjaan' => $uraian_pekerjaan[$key],
                'volume' => $volume[$key],
                'satuan' => $satuan[$key],
                'material_spec' => $material_spec[$key],
                'harga_satuan' => $harga_satuan[$key],
                'jumlah_harga' => $jumlah_harga[$key],
                'subtotal' => $subtotal,
                'total' => $total,
                'diskon' => $diskon,
                'grand_total' => $grand_total,
            );
        }
        $this->db->insert_batch('tb_anggaran', $data);
        redirect(site_url('admin/anggaran'));

    }
    

    public function edit($id = null) // id data yang akan diedit
    {
        if (!isset($id)) redirect('admin/anggaran'); // kita lakukan redirect ke route ini kalau $id bernilai null

        $anggaran = $this->anggaran_model; // objek model
        $validation = $this->form_validation; // objek validation
        $validation->set_rules($anggaran->rules()); // menerapkan rules

        if($validation->run()) { // melakukan validasi
            $anggaran->update(); // menyimpan data
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $data["anggaran"] = $anggaran->getById($id); // mengambil data untuk ditampilkan pada form
        if(!$data["anggaran"]) show_404(); // jika tidak ada data, tampilkan error 404

        $this->load->view("admin/anggaran/edit", $data); // menampilkan form edit
    }

    public function delete($id=null)
    {
        if (!isset($id)) show_404();

        if($this->anggaran_model->delete($id)) {
            redirect(site_url('admin/anggaran'));
        }
    }

    public function excel($id=null)
	{
        $filename = 'rab';
        $anggaranData = $this->anggaran_model->getAllExcel($id);
		$spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setCellValue('A1', 'RENCANA ANGGARAN BIAYA');
        $sheet->mergeCells('A1:E1');
        $sheet->getStyle('A1')->getFont()->setBold(TRUE);
        $sheet->getStyle('A1')->getFont()->setUnderline(TRUE);
        $sheet->getStyle('A1')->getFont()->setSize(11);
        $sheet->getStyle('A2')->getFont()->setBold(TRUE);
        $sheet->getStyle('A3')->getFont()->setBold(TRUE);
        $sheet->getStyle('A4')->getFont()->setBold(TRUE);
        $sheet->getStyle('A5')->getFont()->setBold(TRUE);
        $sheet->getStyle('A6')->getFont()->setBold(TRUE);
        $sheet->getStyle('B6')->getFont()->setBold(TRUE);
        $sheet->getStyle('C6')->getFont()->setBold(TRUE);
        $sheet->getStyle('D6')->getFont()->setBold(TRUE);
        $sheet->getStyle('E6')->getFont()->setBold(TRUE);
        $sheet->getStyle('F6')->getFont()->setBold(TRUE);
        $sheet->getStyle('G6')->getFont()->setBold(TRUE);
        foreach($anggaranData as $row)
        {
            $sheet->setCellValue('A2', 'Nama Proyek :' . $row->nama_proyek);
            $sheet->setCellValue('A3', 'Lokasi Proyek :' . $row->lokasi_proyek);
            $sheet->setCellValue('A4', 'Kontraktor Bangunan : PT. Kalmer Multi Teknik');
            $sheet->setCellValue('A5', 'No Transaksi :' . $row->kode_rab);
        }
		$sheet->setCellValue('A6', 'No');
        $sheet->setCellValue('B6', 'Uraian Pekerjaan');
        $sheet->setCellValue('C6', 'Vol');
        $sheet->setCellValue('D6', 'Sat');
        $sheet->setCellValue('E6', 'Harga Satuan');
        $sheet->setCellValue('F6', 'Material');
        $sheet->setCellValue('G6', 'Jumlah Harga');
        $no = 1;
        $x = 7;
		foreach($anggaranData as $row)
		{
			$sheet->setCellValue('A' . $x, $no++);
			$sheet->setCellValue('B' . $x, $row->uraian_pekerjaan);
			$sheet->setCellValue('C' . $x, $row->volume);
			$sheet->setCellValue('D' . $x, $row->satuan);
            $sheet->setCellValue('E' . $x, $row->harga_satuan);
            $sheet->setCellValue('F' . $x, $row->material_spec);
            $sheet->setCellValue('G' . $x, $row->jumlah_harga);
			$x++;
        }
        $sheet->mergeCells('A20:B20');
        $sheet->mergeCells('A21:B21');
        $sheet->mergeCells('A22:B22');
        $sheet->mergeCells('A23:B23');
        $sheet->getStyle('A20')->getFont()->setBold(TRUE);
        $sheet->getStyle('A21')->getFont()->setBold(TRUE);
        $sheet->getStyle('A22')->getFont()->setBold(TRUE);
        $sheet->getStyle('A23')->getFont()->setBold(TRUE);
       foreach($anggaranData as $row)
        {
            $sheet->setCellValue('A20', 'Subtotal :' . $row->subtotal);
            $sheet->setCellValue('A21', 'Total :' . $row->total);
            $sheet->setCellValue('A22', 'Disc :' . $row->diskon);
            $sheet->setCellValue('A23', 'Grand Total :' . $row->grand_total);
        }
        $writer = new Xlsx($spreadsheet);
        // $writer->save("upload/".$fileName);
		header("Content-Type: application/vnd.ms-excel");
		header('Content-Disposition: attachment;filename="'. $filename .'.xlsx"'); 
	
		$writer->save('php://output');
        
    }

}