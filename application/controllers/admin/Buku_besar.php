<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Buku_besar extends CI_Controller 
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('buku_besar_model');
        $this->load->model("user_model");
        $this->load->library("form_validation");
        if($this->user_model->isNotLogin()) redirect(site_url('admin/login'));
    }

    public function index()
    {
        $data["buku_besar"] = $this->buku_besar_model->getAll();
        $this->load->view("admin/buku_besar/list", $data);
    }

    public function add()
    {
        $buku_besar = $this->buku_besar_model; 
        $data['buku_besar'] = $this->buku_besar_model->getAll();
        $validation = $this->form_validation; // objek form validation
        $validation->set_rules($buku_besar->rules()); // terapkan rules

        if($validation->run()) { // melakukan validasi
           $buku_besar->save(); // simpan data ke database
           $this->session->set_flashdata('success', 'Berhasil disimpan'); // tampilkan pesan berhasil
        }

        $this->load->view("admin/buku_besar/new_form", $data); // tampilkan form add
    }

    public function edit($id = null) // id data yang akan diedit
    {
        if (!isset($id)) redirect('admin/buku_besar'); // kita lakukan redirect ke route ini kalau $id bernilai null

        $buku_besar = $this->buku_besar_model; // objek model
        $validation = $this->form_validation; // objek validation
        $validation->set_rules($buku_besar->rules()); // menerapkan rules

        if($validation->run()) { // melakukan validasi
            $buku_besar->update(); // menyimpan data
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $data["buku_besar"] = $buku_besar->getById($id); // mengambil data untuk ditampilkan pada form
        if(!$data["buku_besar"]) show_404(); // jika tidak ada data, tampilkan error 404

        $this->load->view("admin/buku_besar/edit", $data); // menampilkan form edit
    }

    public function delete($id=null)
    {
        if (!isset($id)) show_404();

        if($this->buku_besar_model->delete($id)) {
            redirect(site_url('admin/buku_besar'));
        }
    }
}