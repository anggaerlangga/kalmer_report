<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Jurnal_penyesuaian extends CI_Controller 
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("user_model");
        $this->load->model("jurnal_penyesuaian_model");
        $this->load->library("form_validation");
        if($this->user_model->isNotLogin()) redirect(site_url('admin/login'));
    }

    public function index()
    {
        $data["jurnal_penyesuaian"] = $this->jurnal_penyesuaian_model->getAll();
        $this->load->view("admin/jurnal_penyesuaian/list", $data);
    }

    public function add()
    {
        $jurnal_penyesuaian = $this->jurnal_penyesuaian_model; 
        $data['jurnal_penyesuaian'] = $this->jurnal_penyesuaian_model->getAll();
        $validation = $this->form_validation; // objek form validation
        $validation->set_rules($jurnal_penyesuaian->rules()); // terapkan rules

        if($validation->run()) { // melakukan validasi
           $jurnal_penyesuaian->save(); // simpan data ke database
           $this->session->set_flashdata('success', 'Berhasil disimpan'); // tampilkan pesan berhasil
        }

        $this->load->view("admin/jurnal_penyesuaian/new_form", $data); // tampilkan form add
    }

    public function edit($id = null) // id data yang akan diedit
    {
        if (!isset($id)) redirect('admin/jurnal_penyesuaian'); // kita lakukan redirect ke route ini kalau $id bernilai null

        $jurnal_penyesuaian = $this->jurnal_penyesuaian_model; // objek model
        $validation = $this->form_validation; // objek validation
        $validation->set_rules($jurnal_penyesuaian->rules()); // menerapkan rules

        if($validation->run()) { // melakukan validasi
            $jurnal_penyesuaian->update(); // menyimpan data
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $data["jurnal_penyesuaian"] = $jurnal_penyesuaian->getById($id); // mengambil data untuk ditampilkan pada form
        if(!$data["jurnal_penyesuaian"]) show_404(); // jika tidak ada data, tampilkan error 404

        $this->load->view("admin/jurnal_penyesuaian/edit", $data); // menampilkan form edit
    }

    public function delete($id=null)
    {
        if (!isset($id)) show_404();

        if($this->jurnal_penyesuaian_model->delete($id)) {
            redirect(site_url('admin/jurnal_penyesuaian'));
        }
    }
}