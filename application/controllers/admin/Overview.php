<?php

class Overview extends CI_Controller {
    public function __construct()
    {
	parent::__construct();
        $this->load->model("user_model");
        $this->load->model('laporan_pengeluaran_model');
        $this->load->model('laporan_pemasukan_model');
        $this->load->model('proyek_model');
	    if($this->user_model->isNotLogin()) redirect(site_url('admin/login'));
        //if($this->session->userdata('logged_in') !== TRUE){
        //    redirect('admin/login');
        //}
    }

    public function index()
    {
        //if($this->session->userdata('role')==='admin'){
            // load view admin/overview.php
            $data["laporan_pemasukan"] = $this->laporan_pemasukan_model->getAll();
            $data["laporan_pengeluaran"] = $this->laporan_pengeluaran_model->getAll();
            $data["laporan_pengeluaran_bulanan"] = $this->laporan_pengeluaran_model->getTotalPengeluaranTahunan();
            $data["laporan_pemasukan_bulanan"] = $this->laporan_pemasukan_model->getTotalPemasukanTahunan();
            $data["laporan_pengeluaran_proyek"] = $this->laporan_pengeluaran_model->getTotalPengeluaranProyek();
            $data["laporan_pemasukan_proyek"] = $this->laporan_pemasukan_model->getTotalPemasukanProyek();
            // $data["proyek_model"] = $this->proyek_model->getAll();
            $data["master_proyek"] = $this->proyek_model->getProjectProgress();
            $data["master_proyek_pending"] = $this->proyek_model->getProjectPending();
            $this->load->view("admin/overview", $data);
       // } else {
       //     echo "Access Denied";
        //}
    }
     
    public function staff(){
        //Allowing akses to staff only
        //if($this->session->userdata('role')==='jurnal'){
            $data["laporan_pemasukan"] = $this->laporan_pemasukan_model->getAll();
            $data["laporan_pengeluaran"] = $this->laporan_pengeluaran_model->getAll();
            $data["laporan_pengeluaran_bulanan"] = $this->laporan_pengeluaran_model->getTotalPengeluaranTahunan();
            $data["laporan_pemasukan_bulanan"] = $this->laporan_pemasukan_model->getTotalPemasukanTahunan();
            $data["laporan_pengeluaran_proyek"] = $this->laporan_pengeluaran_model->getTotalPengeluaranProyek();
            $data["laporan_pemasukan_proyek"] = $this->laporan_pemasukan_model->getTotalPemasukanProyek();
            // $data["proyek_model"] = $this->proyek_model->getAll();
            $data["master_proyek"] = $this->proyek_model->getProjectProgress();
            $data["master_proyek_pending"] = $this->proyek_model->getProjectPending();
            $this->load->view("admin/overview", $data);
        //} else {
         //   echo "Access Denied";
        //}
    }
}