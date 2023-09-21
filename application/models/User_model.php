<?php

class User_model extends CI_Model
{
   public function cek_login($username, $password)
   {
      $this->db->where("username", $username);
      $this->db->where("password", $password);
      return $this->db->get('tbl_user');
   }

   public function getLoginData($user, $pass)
   {
      $u = $user;
      $p = MD5($pass);

      $query_ceklogin = $this->db->get_where('tbl_user', array('username' => $u, 'password' => $p));

      if (count($query_ceklogin->result()) > 0) {
         foreach ($query_ceklogin->result() as $qck) {
            foreach ($query_ceklogin->result() as $qck) {
               $sess_data['logged_in'] = TRUE;
               $sess_data['username'] = $qck->username;
               $sess_data['password'] = $qck->password;
               $this->session->set_userdata($sess_data);
            }
            redirect('admin/dashboard/viewdashboard');
         }
      } else {
         $this->session->set_flashdata('pesan', '<div class="alert alert-warning alert-dismissible fade show" role="alert"> Maaf Username dan Password Anda Salah! <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
         redirect('admin/login/index');
      }
   }

   public function isUsernameExists($username)
   {
      $this->db->where('username', $username);
      $query = $this->db->get('tbl_user');

      return $query->num_rows() > 0;
   }

   public function isPasswordCorrect($username, $password)
   {
      $this->db->where('username', $username);
      $this->db->where('password', $password);
      $query = $this->db->get('tbl_user');

      return $query->num_rows() > 0;
   }
}
