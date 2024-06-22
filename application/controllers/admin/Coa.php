<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Coa extends CI_Controller 
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('coa_model');
        $this->load->model("user_model");
        $this->load->library("form_validation");
        if($this->user_model->isNotLogin()) redirect(site_url('admin/login'));
    }

    public function index()
    {
        $data["coa"] = $this->coa_model->getAll();
        $this->load->view("admin/master_coa/list", $data);
    }

    public function add()
    {
        $coa = $this->coa_model; 
        $data['coa'] = $this->coa_model->getAll();
        $validation = $this->form_validation; // objek form validation
        $validation->set_rules($coa->rules()); // terapkan rules

        if($validation->run()) { // melakukan validasi
           $coa->save(); // simpan data ke database
           $this->session->set_flashdata('success', 'Berhasil disimpan'); // tampilkan pesan berhasil
        }

        $this->load->view("admin/master_coa/new_form", $data); // tampilkan form add
    }

    public function edit($id = null) // id data yang akan diedit
    {
        if (!isset($id)) redirect('admin/coa'); // kita lakukan redirect ke route ini kalau $id bernilai null

        $coa = $this->coa_model; // objek model
        $validation = $this->form_validation; // objek validation
        $validation->set_rules($coa->rules()); // menerapkan rules

        if($validation->run()) { // melakukan validasi
            $coa->update(); // menyimpan data
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $data["coa"] = $coa->getById($id); // mengambil data untuk ditampilkan pada form
        if(!$data["coa"]) show_404(); // jika tidak ada data, tampilkan error 404

        $this->load->view("admin/master_coa/edit", $data); // menampilkan form edit
    }

    public function delete($id=null)
    {
        if (!isset($id)) show_404();

        if($this->coa_model->delete($id)) {
            redirect(site_url('admin/master_coa/list'));
        }
    }
}