<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Barang extends CI_Controller 
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("barang_model");
        $this->load->library("form_validation");
        $this->load->model("user_model");
        if($this->user_model->isNotLogin()) redirect(site_url('admin/login'));
    }

    public function index()
    {
        $data["barang"] = $this->barang_model->getAll();
        $this->load->view("admin/master_barang/list", $data);
    }

    public function add()
    {
        $barang = $this->barang_model; // objek model
        $validation = $this->form_validation; // objek form validation
        $validation->set_rules($barang->rules()); // terapkan rules

        if($validation->run()) { // melakukan validasi
            $barang->save(); // simpan data ke database
            $this->session->set_flashdata('success', 'Berhasil disimpan'); // tampilkan pesan berhasil
        }

        $this->load->view("admin/master_barang/new_form"); // tampilkan form add
    }

    function update_qty()
    {
        $data=$this->barang_model->update_qty();
        echo json_encode($data);
    }

    public function getTipeBarang()
    {   
        $postData = $this->input->post();
        $this->load->model('barang_model');
        $data = $this->barang_model->getTipeBarang($postData);
        echo json_encode($data);
    }

    public function getMerkBarang()
    {
        $postData = $this->input->post();
        $this->load->model('barang_model');
        $data = $this->barang_model->getMerkBarang($postData);
        echo json_encode($data);  
    }

    public function getNamaBarang()
    {
        $postData = $this->input->post();
        $this->load->model('barang_model');
        $data = $this->barang_model->getNamaBarang($postData);
        echo json_encode($data);
    }

    public function getKuantitas()
    {
        $postData = $this->input->post();
        $this->load->model('barang_model');
        $data = $this->barang_model->getKuantitas($postData);
        echo json_encode($data);
    }

    public function cekBarang()
    {
        $postData = $this->input->post();
        $this->load->model('barang_model');
        $data = $this->barang_model->cekBarang($postData);
        echo json_encode($data);
    }

    public function cekHarga()
    {
        // $data["barang"] = $this->barang_model->getAll();
        $this->load->view("admin/master_barang/cekharga");
    }

    public function cekHargaBarang()
    {
        $postData = $this->input->post();
        $this->load->model('barang_model');
        $data = $this->barang_model->cekHargaBarang($postData);
        echo json_encode($data);

    }

    public function edit($id = null) // id data yang akan diedit
    {
        if (!isset($id)) redirect('admin/barang'); // kita lakukan redirect ke route ini kalau $id bernilai null

        $barang = $this->barang_model; // objek model
        $validation = $this->form_validation; // objek validation
        $validation->set_rules($barang->rules()); // menerapkan rules

        if($validation->run()) { // melakukan validasi
            $barang->update(); // menyimpan data
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $data["barang"] = $barang->getById($id); // mengambil data untuk ditampilkan pada form
        if(!$data["barang"]) show_404(); // jika tidak ada data, tampilkan error 404

        $this->load->view("admin/master_barang/edit", $data); // menampilkan form edit
    }

    public function delete($id=null)
    {
        if (!isset($id)) show_404();

        if($this->barang_model->delete($id)) {
            redirect(site_url('admin/barang'));
        }
    }
}