<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Pekerjaan extends CI_Controller 
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('pekerjaan_model');
        $this->load->library("form_validation");
        $this->load->model("user_model");
        if($this->user_model->isNotLogin()) redirect(site_url('admin/login'));
    }

    public function index()
    {
        $data["pekerjaan"] = $this->pekerjaan_model->getAll();
        $this->load->view("admin/master_pekerjaan/list", $data);
    }

    public function add()
    {
        $pekerjaan = $this->pekerjaan_model; // objek model
        $validation = $this->form_validation; // objek form validation
        $validation->set_rules($pekerjaan->rules()); // terapkan rules

        if($validation->run()) { // melakukan validasi
            $pekerjaan->save(); // simpan data ke database
            $this->session->set_flashdata('success', 'Berhasil disimpan'); // tampilkan pesan berhasil
        }

        $this->load->view("admin/master_pekerjaan/new_form"); // tampilkan form add
    }
    public function edit($id = null) // id data yang akan diedit
    {
        if (!isset($id)) redirect('admin/pekerjaan'); // kita lakukan redirect ke route ini kalau $id bernilai null

        $pekerjaan = $this->pekerjaan_model; // objek model
        $data['pekerjaan'] = $this->pekerjaan_model->getAll();
        $validation = $this->form_validation; // objek validation
        $validation->set_rules($pekerjaan->rules()); // menerapkan rules

        if($validation->run()) { // melakukan validasi
            $pekerjaan->update(); // menyimpan data
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $data["pekerjaan"] = $pekerjaan->getById($id); // mengambil data untuk ditampilkan pada form
        if(!$data["pekerjaan"]) show_404(); // jika tidak ada data, tampilkan error 404

        $this->load->view("admin/master_pekerjaan/edit_form", $data); // menampilkan form edit
    }

    public function delete($id=null)
    {
        if (!isset($id)) show_404();

        if($this->pekerjaan_model->delete($id)) {
            redirect(site_url('admin/pekerjaan'));
        }
    }

}