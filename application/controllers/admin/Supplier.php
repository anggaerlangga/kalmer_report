<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Supplier extends CI_Controller 
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("supplier_model");
        $this->load->library("form_validation");
        $this->load->model("user_model");
        if($this->user_model->isNotLogin()) redirect(site_url('admin/login'));
    }

    public function index()
    {
        $data["supplier"] = $this->supplier_model->getAll();
        $this->load->view("admin/master_supplier/list", $data);
    }

    public function add()
    {
        $supplier = $this->supplier_model; // objek model
        $validation = $this->form_validation; // objek form validation
        $validation->set_rules($supplier->rules()); // terapkan rules

        if($validation->run()) { // melakukan validasi
            $supplier->save(); // simpan data ke database
            $this->session->set_flashdata('success', 'Berhasil disimpan'); // tampilkan pesan berhasil
        }

        $this->load->view("admin/master_supplier/new_form"); // tampilkan form add
    }

    public function edit($id = null) // id data yang akan diedit
    {
        if (!isset($id)) redirect('admin/supplier'); // kita lakukan redirect ke route ini kalau $id bernilai null

        $supplier = $this->supplier_model; // objek model
        $validation = $this->form_validation; // objek validation
        $validation->set_rules($supplier->rules()); // menerapkan rules

        if($validation->run()) { // melakukan validasi
            $supplier->update(); // menyimpan data
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $data["supplier"] = $supplier->getById($id); // mengambil data untuk ditampilkan pada form
        if(!$data["supplier"]) show_404(); // jika tidak ada data, tampilkan error 404

        $this->load->view("admin/master_supplier/edit", $data); // menampilkan form edit
    }

    public function delete($id=null)
    {
        if (!isset($id)) show_404();

        if($this->id_supplier->delete($id)) {
            redirect(site_url('admin/master_supplier'));
        }
    }
}