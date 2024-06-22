<?php

class Login extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("user_model");
        $this->load->library('form_validation');
        $this->load->library('session');
    }

    public function index()
    {
        // jika form login disubmit
        if($this->input->post()){
            if($this->user_model->doLogin()) redirect(site_url('admin'));
        }

        // tampilkan halaman login
        $this->load->view("admin/login_page.php");
    }

   function auth(){
        $username    = $this->input->post('username',TRUE);
        $password = md5($this->input->post('password',TRUE));
        $validate = $this->user_model->validate($username,$password);
        if($validate->num_rows() > 0){
            $data  = $validate->row_array();
            $username  = $data['username'];
            $email = $data['email'];
            $role = $data['role'];
            $sesdata = array(
                'username'  => $username,
                'email'     => $email,
                'role'      => $role,
                'logged_in' => TRUE
            );
            $this->session->set_userdata($sesdata);
            // access login for admin
            if($role === 'admin') {
                redirect('admin/overview');
     
            // access login for staff
            } elseif($role === 'jurnal') {
                redirect('admin/overview');
    
            }else{
                echo $this->session->set_flashdata('msg','Username or Password is Wrong');
                redirect(site_url('admin/login'));
            }
        }
      }

    public function logout()
    {
        // hancurkan semua sesi
        $this->session->sess_destroy();
        redirect(site_url('admin/login'));
    }
}