<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Jurnal_umum extends CI_Controller 
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('jurnal_umum_model');
        $this->load->model("user_model");
        $this->load->library("form_validation");
        if($this->user_model->isNotLogin()) redirect(site_url('admin/login'));
    }

    public function index()
    {
        $data["jurnal_umum"] = $this->jurnal_umum_model->getAll();
        $this->load->view("admin/jurnal_umum/list", $data);
    }

    public function add()
    {
        $jurnal_umum = $this->jurnal_umum_model; 
        $data['jurnal_umum'] = $this->jurnal_umum_model->getAll();
        $validation = $this->form_validation; // objek form validation
        $validation->set_rules($jurnal_umum->rules()); // terapkan rules

        if($validation->run()) { // melakukan validasi
           $jurnal_umum->save(); // simpan data ke database
           $this->session->set_flashdata('success', 'Berhasil disimpan'); // tampilkan pesan berhasil
        }

        $this->load->view("admin/jurnal_umum/new_form", $data); // tampilkan form add
    }

    public function add_jurnal()
    {
        $data=$this->jurnal_umum_model->save_jurnal();
        echo json_encode($data);
    }
    
    function update_jurnal()
    {
        $data=$this->jurnal_umum_model->update_jurnal();
        echo json_encode($data);
    }

    public function edit($id = null) // id data yang akan diedit
    {
        if (!isset($id)) redirect('admin/jurnal_umum'); // kita lakukan redirect ke route ini kalau $id bernilai null

        $jurnal_umum = $this->jurnal_umum_model; // objek model
        $validation = $this->form_validation; // objek validation
        $validation->set_rules($jurnal_umum->rules()); // menerapkan rules

        if($validation->run()) { // melakukan validasi
            $jurnal_umum->update(); // menyimpan data
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $data["jurnal_umum"] = $jurnal_umum->getById($id); // mengambil data untuk ditampilkan pada form
        if(!$data["jurnal_umum"]) show_404(); // jika tidak ada data, tampilkan error 404

        $this->load->view("admin/jurnal_umum/edit", $data); // menampilkan form edit
    }

    public function delete($id=null)
    {
        if (!isset($id)) show_404();

        if($this->jurnal_umum_model->delete($id)) {
            redirect(site_url('admin/jurnal_umum'));
        }
    }
}