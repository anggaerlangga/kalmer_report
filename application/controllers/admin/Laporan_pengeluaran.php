<?php

defined('BASEPATH') OR exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Laporan_pengeluaran extends CI_Controller 
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('laporan_pengeluaran_model');
        $this->load->model('proyek_model');
        $this->load->model('barang_model');
        $this->load->model('jurnal_umum_model');
        $this->load->model('coa_model');
        $this->load->library("form_validation");
        $this->load->model("user_model");
        if($this->user_model->isNotLogin()) redirect(site_url('admin/login'));
    }

    public function index()
    {
        $data["laporan_pengeluaran"] = $this->laporan_pengeluaran_model->getAll();
        $this->load->view("admin/laporan_pengeluaran/list", $data);
    }

    public function getByNoPro()
    {   
        $postData = $this->input->post();
        $this->load->model('proyek_model');
        $data = $this->proyek_model->getByNoPro($postData);
        echo json_encode($data);
    }

    public function getByKodeBarang()
    {   
        $postData = $this->input->post();
        $this->load->model('barang_model');
        $data = $this->barang_model->getByKodeBarang($postData);
        echo json_encode($data);
    }

    public function getByAkun()
    {
        $postData = $this->input->post();
        $this->load->model('coa_model');
        $data = $this->coa_model->getByAkun($postData);
        echo json_encode($data);  
    }

    function save_pengeluaran(){
        $data=$this->laporan_pengeluaran_model->save_pengeluaran();
        echo json_encode($data);
    }

    function update(){
        $data=$this->barang_model->update_product();
        echo json_encode($data);
    }

    function update_pengeluaran(){
        $data=$this->laporan_pengeluaran_model->update_pengeluaran();
        echo json_encode($data);
    }
 
    public function add()
    {
        $laporan_pengeluaran = $this->laporan_pengeluaran_model; 
        $data['master_proyek'] = $this->proyek_model->getAll();
        $data['master_barang'] = $this->barang_model->getAll();
        $data['coa'] = $this->coa_model->getAll();
        // $validation = $this->form_validation; // objek form validation
        // $validation->set_rules($laporan_pengeluaran->rules()); // terapkan rules

        // if($validation->run()) { // melakukan validasi
        //    $laporan_pengeluaran->save(); // simpan data ke database
        //    $this->session->set_flashdata('success', 'Berhasil disimpan'); // tampilkan pesan berhasil
        // }

        $this->load->view("admin/laporan_pengeluaran/new_form", $data); // tampilkan form add
    }

    public function edit($id = null) // id data yang akan diedit
    {
        if (!isset($id)) redirect('admin/laporan_pengeluaran'); // kita lakukan redirect ke route ini kalau $id bernilai null

        $laporan_pengeluaran = $this->laporan_pengeluaran_model; // objek model
        $data['master_barang'] = $this->barang_model->getAll();
        $data['coa'] = $this->coa_model->getAll();
        //$validation = $this->form_validation; // objek validation
        //$validation->set_rules($laporan_pengeluaran->rules()); // menerapkan rules

        //if($validation->run()) { // melakukan validasi
        //    $laporan_pengeluaran->update(); // menyimpan data
        //    $this->session->set_flashdata('success', 'Berhasil disimpan');
        //}

        $data["laporan_pengeluaran"] = $laporan_pengeluaran->getById($id); // mengambil data untuk ditampilkan pada form
        if(!$data["laporan_pengeluaran"]) show_404(); // jika tidak ada data, tampilkan error 404

        $this->load->view("admin/laporan_pengeluaran/edit", $data); // menampilkan form edit
    }

    public function excel()
	{
        $filename = 'laporan_pengeluaran';
        $pengeluaranData = $this->laporan_pengeluaran_model->getAllExcel();
		$spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setCellValue('A2', 'Laporan Pengeluaran');
        $sheet->mergeCells('A2:E2');
        $sheet->getStyle('A2')->getFont()->setBold(TRUE);
        $sheet->getStyle('A2')->getFont()->setUnderline(TRUE);
        $sheet->getStyle('A2')->getFont()->setSize(11);
        $sheet->getStyle('A3')->getFont()->setBold(TRUE);
        $sheet->getStyle('A4')->getFont()->setBold(TRUE);
        $sheet->getStyle('A5')->getFont()->setBold(TRUE);
        $sheet->getStyle('B5')->getFont()->setBold(TRUE);
        $sheet->getStyle('C5')->getFont()->setBold(TRUE);
        $sheet->getStyle('D5')->getFont()->setBold(TRUE);
        $sheet->getStyle('E5')->getFont()->setBold(TRUE);
        $sheet->getStyle('F5')->getFont()->setBold(TRUE);
        $sheet->getStyle('G5')->getFont()->setBold(TRUE);
        $sheet->getStyle('H5')->getFont()->setBold(TRUE);
        $sheet->getStyle('I5')->getFont()->setBold(TRUE);
        $sheet->getStyle('J5')->getFont()->setBold(TRUE);
        $sheet->getStyle('K5')->getFont()->setBold(TRUE);
        $sheet->getStyle('L5')->getFont()->setBold(TRUE);
        $sheet->getStyle('M5')->getFont()->setBold(TRUE);
        $sheet->getStyle('N5')->getFont()->setBold(TRUE);
        $sheet->getStyle('O5')->getFont()->setBold(TRUE);
        $sheet->getStyle('P5')->getFont()->setBold(TRUE);
        $sheet->getStyle('Q5')->getFont()->setBold(TRUE);
		$sheet->setCellValue('A5', 'No');
        $sheet->setCellValue('B5', 'No Proyek');
        $sheet->setCellValue('C5', 'Nama Proyek');
        $sheet->setCellValue('D5', 'Tanggal Pengeluaran');
        $sheet->setCellValue('E5', 'Jenis Pengeluaran');
        $sheet->setCellValue('F5', 'Deskripsi');
        $sheet->setCellValue('G5', 'Pelaksana');
        $sheet->setCellValue('H5', 'Belanja');
        $sheet->setCellValue('I5', 'Kuantitas');
        $sheet->setCellValue('J5', 'Kode Barang');
        $sheet->setCellValue('K5', 'Nama Barang');
       // $sheet->setCellValue('G6', 'Nominal');
        $sheet->setCellValue('L5', 'Akun');
        $sheet->setCellValue('M5', 'Nama Akun');
        $sheet->setCellValue('N5', 'No Transaksi');
        $sheet->setCellValue('O5', 'Debit');
        $sheet->setCellValue('P5', 'Kredit');
        $no = 1;
        $x = 6;
		foreach($pengeluaranData as $row)
		{
			$sheet->setCellValue('A' . $x, $no++);
			$sheet->setCellValue('B' . $x, $row->no_proyek);
			$sheet->setCellValue('C' . $x, $row->nama_proyek);
			$sheet->setCellValue('D' . $x, $row->tanggal_pengeluaran);
            $sheet->setCellValue('E' . $x, $row->jenis_pengeluaran);
            $sheet->setCellValue('F' . $x, $row->deskripsi);
            $sheet->setCellValue('G' . $x, $row->pelaksana);
            $sheet->setCellValue('H' . $x, $row->belanja);
            $sheet->setCellValue('I' . $x, $row->kuantitas);
            $sheet->setCellValue('J' . $x, $row->id_barang);
            $sheet->setCellValue('K' . $x, $row->nama_barang);
            $sheet->setCellValue('L' . $x, $row->akun);
            $sheet->setCellValue('M' . $x, $row->nama_akun);
            $sheet->setCellValue('N' . $x, $row->no_transaksi);
            $sheet->setCellValue('O' . $x, $row->debit);
            $sheet->setCellValue('P' . $x, $row->kredit);
			$x++;
        }
        $writer = new Xlsx($spreadsheet);
        // $writer->save("upload/".$fileName);
		header("Content-Type: application/vnd.ms-excel");
		header('Content-Disposition: attachment;filename="'. $filename .'.xlsx"'); 
	
		$writer->save('php://output');
        
    }

    public function delete($id=null)
    {
        if (!isset($id)) show_404();

        if($this->laporan_pengeluaran_model->delete($id)) {
            redirect(site_url('admin/laporan_pengeluaran'));
        }
    }

}