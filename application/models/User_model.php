<?php

class user_model extends CI_Model
{
    private $_table = "users";

    public function doLogin(){
		$post = $this->input->post();

        // cari user berdasarkan email dan username
           $this->db->where('email', $post["email"])
                ->or_where('username', $post["username"]);
        $user = $this->db->get($this->_table)->row();

        // jika user terdaftar
        if($user){
            // periksa password-nya
            $isPasswordTrue = password_verify($post["password"], $user->password);
            // periksa role-nya
            $isAdmin = $user->role == "admin";
            $isJurnal = $user->role == "jurnal";

            // jika password benar dan dia admin
            if($isPasswordTrue && $isAdmin){ 
                // login sukses yay!
                $this->session->set_userdata(['user_logged' => $user]);
                $this->_updateLastLogin($user->user_id);
                return true;
            }
            if($isPasswordTrue && $isJurnal){ 
                // login sukses yay!
                $this->session->set_userdata(['user_logged' => $user]);
                $this->_updateLastLogin($user->user_id);
                return true;
            }
        }
        
        // login gagal
		return false;
    }

    function validate($username,$password){
        $this->db->where('username',$username);
        $this->db->where('password',$password);
        $result = $this->db->get('users',1);
        return $result;
    }

    public function isNotLogin(){
        return $this->session->userdata('user_logged') === null;
    }

    private function _updateLastLogin($user_id){
        $sql = "UPDATE {$this->_table} SET last_login=now() WHERE user_id='{$user_id}'";
        $this->db->query($sql);
    }

}