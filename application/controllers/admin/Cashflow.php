<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Cashflow extends CI_Controller 
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('laporan_pemasukan_model');
        $this->load->model('laporan_pengeluaran_model');
        $this->load->model('proyek_model');
        $this->load->library("form_validation");
        $this->load->model("user_model");
        if($this->user_model->isNotLogin()) redirect(site_url('admin/login'));
    }

    public function index()
    {
        $data["laporan_pemasukan"] = $this->laporan_pemasukan_model->totalPemasukan();
        $data["laporan_pengeluaran"] = $this->laporan_pengeluaran_model->getAll();
        $data["master_proyek"] = $this->proyek_model->getAll();
        $this->load->view("admin/cashflow/list", $data);
    }


    public function detail($id = null) // id data yang akan diedit
    {
        if (!isset($id)) redirect('admin/cashflow'); // kita lakukan redirect ke route ini kalau $id bernilai null
        $data["laporan_pemasukan"] = $this->laporan_pemasukan_model->getTotalByNoPro($id); // mengambil data untuk ditampilkan pada form
        $data["laporan_pengeluaran_pbm"] = $this->laporan_pengeluaran_model->getTotalPbm($id);
        $data["laporan_pengeluaran_pbj"] = $this->laporan_pengeluaran_model->getTotalPbj($id);
        $data["laporan_pengeluaran_pbjm"] = $this->laporan_pengeluaran_model->getTotalPbjm($id);
        $data["master_proyek"] = $this->proyek_model->getDetailByNoPro($id);

        if(!$data["master_proyek"]) show_404(); // jika tidak ada data, tampilkan error 404

        $this->load->view("admin/cashflow/detail", $data); // menampilkan form edit
    }

    public function delete($id=null)
    {
        if (!isset($id)) show_404();

        if($this->laporan_pemasukan_model->delete($id)) {
            redirect(site_url('admin/laporan_pemasukan'));
        }
    }

}