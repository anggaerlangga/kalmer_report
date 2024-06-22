<?php

defined('BASEPATH') OR exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Laporan_pemasukan extends CI_Controller 
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('laporan_pemasukan_model');
        $this->load->model('proyek_model');
        $this->load->model('jurnal_umum_model');
        $this->load->model('coa_model');
        $this->load->library("form_validation");
        $this->load->model("user_model");
        if($this->user_model->isNotLogin()) redirect(site_url('admin/login'));
    }

    public function index()
    {
        $data["laporan_pemasukan"] = $this->laporan_pemasukan_model->getAll();
        $this->load->view("admin/laporan_pemasukan/list", $data);
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
        $laporan_pemasukan = $this->laporan_pemasukan_model; 
        $data['coa'] = $this->coa_model->getAll();
        $data['master_proyek'] = $this->proyek_model->getAll();
        $data['jurnal_umum'] = $this->jurnal_umum_model->getAll();
        $validation = $this->form_validation; // objek form validation
        $validation->set_rules($laporan_pemasukan->rules()); // terapkan rules

        if($validation->run()) { // melakukan validasi
           $laporan_pemasukan->save(); // simpan data ke database
           $this->session->set_flashdata('success', 'Berhasil disimpan'); // tampilkan pesan berhasil
        }

        $this->load->view("admin/laporan_pemasukan/new_form", $data); // tampilkan form add
    }

    function save_pemasukan(){
        $data=$this->laporan_pemasukan_model->save_pemasukan();
        echo json_encode($data);
    }

    function update_pemasukan(){
        $data=$this->laporan_pemasukan_model->update_pemasukan();
        echo json_encode($data);
    }

    public function edit($id = null) // id data yang akan diedit
    {
        if (!isset($id)) redirect('admin/laporan_pemasukan'); // kita lakukan redirect ke route ini kalau $id bernilai null

        $laporan_pemasukan = $this->laporan_pemasukan_model; // objek model
        $data['coa'] = $this->coa_model->getAll();
        $validation = $this->form_validation; // objek validation
        $validation->set_rules($laporan_pemasukan->rules()); // menerapkan rules

        if($validation->run()) { // melakukan validasi
            $laporan_pemasukan->update(); // menyimpan data
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $data["laporan_pemasukan"] = $laporan_pemasukan->getById($id); // mengambil data untuk ditampilkan pada form
        if(!$data["laporan_pemasukan"]) show_404(); // jika tidak ada data, tampilkan error 404

        $this->load->view("admin/laporan_pemasukan/edit", $data); // menampilkan form edit
    }

    public function delete($id=null)
    {
        if (!isset($id)) show_404();

        if($this->laporan_pemasukan_model->delete($id)) {
            redirect(site_url('admin/laporan_pemasukan'));
        }
    }

    function delete_pemasukan(){
        $data=$this->_model->delete_pemasukan();
        echo json_encode($data);
    }

    public function excel()
	{
        $filename = 'laporan_pemasukan';
        $pemasukanData = $this->laporan_pemasukan_model->getAllExcel();
		$spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setCellValue('A2', 'Laporan Pemasukan');
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
		$sheet->setCellValue('A5', 'No');
        $sheet->setCellValue('B5', 'No Proyek');
        $sheet->setCellValue('C5', 'Nama Proyek');
        $sheet->setCellValue('D5', 'Tanggal Pemasukan');
        $sheet->setCellValue('E5', 'Jenis Pemasukan');
        $sheet->setCellValue('F5', 'Deskripsi');
       // $sheet->setCellValue('G6', 'Nominal');
        $sheet->setCellValue('G5', 'Akun');
        $sheet->setCellValue('H5', 'Nama Akun');
        $sheet->setCellValue('I5', 'No Transaksi');
        $sheet->setCellValue('J5', 'Debit');
        $sheet->setCellValue('K5', 'Kredit');
        $no = 1;
        $x = 6;
		foreach($pemasukanData as $row)
		{
			$sheet->setCellValue('A' . $x, $no++);
			$sheet->setCellValue('B' . $x, $row->no_proyek);
			$sheet->setCellValue('C' . $x, $row->nama_proyek);
			$sheet->setCellValue('D' . $x, $row->tanggal_pemasukan);
            $sheet->setCellValue('E' . $x, $row->jenis_pemasukan);
            $sheet->setCellValue('F' . $x, $row->deskripsi);
            $sheet->setCellValue('G' . $x, $row->akun);
            $sheet->setCellValue('H' . $x, $row->nama_akun);
            $sheet->setCellValue('I' . $x, $row->no_transaksi);
            $sheet->setCellValue('J' . $x, $row->debit);
            $sheet->setCellValue('K' . $x, $row->kredit);
			$x++;
        }
        $writer = new Xlsx($spreadsheet);
        // $writer->save("upload/".$fileName);
		header("Content-Type: application/vnd.ms-excel");
		header('Content-Disposition: attachment;filename="'. $filename .'.xlsx"'); 
	
		$writer->save('php://output');
        
    }

}