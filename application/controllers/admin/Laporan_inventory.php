<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan_inventory extends CI_Controller 
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('laporan_inventory_model');
        $this->load->library('session');
        $this->load->model('proyek_model');
        $this->load->model('barang_model');
        $this->load->library("form_validation");
        $this->load->library('pdf');
        $this->load->model("user_model");
        if($this->user_model->isNotLogin()) redirect(site_url('admin/login'));
    }

    public function index()
    {
        // $data["laporan_inventory"] = $this->laporan_inventory_model->getAll();
        $data["laporan_inventory"] = $this->laporan_inventory_model->getProyek();
        $this->load->view("admin/laporan_inventory/list", $data);
    }

    public function getAllProyek()
    {   
        $postData = $this->input->post();
        $this->load->model('proyek_model');
        $data = $this->proyek_model->getAll();
        echo json_encode($data);
    }

    public function getAllBarang()
    {   
        $postData = $this->input->post();
        $this->load->model('barang_model');
        $data = $this->barang_model->getAll();
        echo json_encode($data);
    }

    public function getByNoPro()
    {   
        $postData = $this->input->post();
        $this->load->model('proyek_model');
        $data = $this->proyek_model->getByNoPro($postData);
        echo json_encode($data);
    }

    public function getByKodeBarang()
    {   
        $postData = $this->input->post();
        $this->load->model('barang_model');
        $data = $this->barang_model->getByKodeBarang($postData);
        echo json_encode($data);
    }

    public function tambah()
    {

        $laporan_inventory = $this->laporan_inventory_model; 
        $data['master_proyek'] = $this->proyek_model->getAll();
        $data['master_barang'] = $this->barang_model->getAll();
        // $aksi=$this->input->post('aksi');
        $this->load->view("admin/laporan_inventory/tambah", $data);
    }


    function save_inventory(){
        $data=$this->laporan_inventory_model->save_inventory();
        echo json_encode($data);
    }

    function getNoteByNoPro($id = null)
    {
        if (!isset($id)) redirect('admin/laporan_inventory');
        $laporan_inventory = $this->laporan_inventory_model; 
        $data['laporan_inventory'] = $this->laporan_inventory_model->getNoteByNoPro($id);
        $data['total_nota_proyek'] = $this->laporan_inventory_model->getTotalNota($id);
        // $aksi=$this->input->post('aksi');
        $this->load->view("admin/laporan_inventory/nota", $data);
    }

    public function getPdf($id = null)
    {
        $username = $this->session->userdata();
        if($username['user_logged']->role === 'admin'){
            // $html_content = '<h3 align="center">INVOICE PROJECT</h3>';
            $html_content['laporan_inventory'] = $this->laporan_inventory_model->getNoteByNoPro($id);
            $html_content['total_nota_proyek'] = $this->laporan_inventory_model->getTotalNota($id);
            // $this->pdf->loadHtml($html_content);
            $this->load->library('pdf');
            $html = $this->load->view('admin/GeneratePdfView', $html_content, true);
            $this->pdf->createPDF($html, 'mypdf', false);
        } else {
            redirect('admin/laporan_inventory');
        }
        
    }


    // public function save_inventory()
    // {
    //     $status = "";
    //     $msg = "";
    //     $file_element_name = 'userfile';
        
    //     if (empty($_POST['title']))
    //     {
    //         $status = "error";
    //         $msg = "Please enter a title";
    //     }

    //     if ($status != "error")
    //     {
    //         $config['upload_path'] = './files/';
    //         $config['allowed_types'] = 'gif|jpg|png|doc|txt';
    //         $config['max_size']	= 1024 * 8;
    //         $config['encrypt_name'] = TRUE;
    //         $this->load->library('upload', $config);
        
    //         if (!$this->upload->do_upload($file_element_name)) {
    //             $status = 'error';
    //             $msg = $this->upload->display_errors('', '');
    //         } else {
    //             $data = $this->upload->data();
    //             $file_id = $this->laporan_inventory_model->save_inventory($data['file_name'], 
    //                     $_POST['no_proyek'], $_POST['nama_proyek'],  $_POST['tipe_barang'],
    //                     $_POST['merk_barang'], $_POST['id_barang'], $_POST['nama_barang'],
    //                     $_POST['harga_satuan'], $_POST['kuantitas'], $_POST['nama_suplier'],
    //                     $_POST['keterangan'], $_POST['total_belanja'], $_POST['tanggal_input']);

    //             if($file_id) {
    //                 $status = "success";
    //                 $msg = "File successfully uploaded";
    //             } else {
    //                 unlink($data['full_path']);
    //                 $status = "error";
    //                 $msg = "Something went wrong when saving the file, please try again.";
    //             }
    //         }
    //         @unlink($_FILES[$file_element_name]);
    //     }
    //     redirect(site_url('admin/laporan_inventory'));
    // }

    // public function add()
    // {
    //     $laporan_inventory = $this->laporan_inventory_model; 
    //     $data['master_proyek'] = $this->proyek_model->getAll();
    //     $data['master_barang'] = $this->barang_model->getAll();

    //     $this->load->view("admin/laporan_inventory/new_form", $data); // tampilkan form add
    // }

    public function delete($id=null)
    {
        if (!isset($id)) show_404();

        if($this->laporan_inventory_model->delete($id)) {
            redirect(site_url('admin/laporan_inventory'));
        }
    }

}