<?php

class Login extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_model');
        $this->load->library('form_validation');
        $this->load->helper('url', 'form');
    }

    public function index()
    {
        $this->load->view('admin/login/login');
    }

    public function proses_login()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $user = $username;
        $pass = MD5($password);

        $cek = $this->User_model->cek_login($user, $pass);

        if ($cek->num_rows() > 0) {
            foreach ($cek->result() as $ck) {
                $sess_data['username'] = $ck->username;
                $sess_data['password'] = $ck->password;
                $this->session->set_userdata($sess_data);
            }

            $this->session->set_flashdata('pesan', 'Welcome To Dashboard');
            $this->session->set_flashdata('sweet_alert', true);
            $this->session->set_flashdata('sweet_title', 'Login Success');
            $this->session->set_flashdata('sweet_text', 'Hallo Admin 👋');
            $this->session->set_flashdata('sweet_icon', 'success');
            redirect('admin/dashboard');
        } else {
            if ($username === "" && $password === "") {
                $errorMessage = 'Please fill in your username and password';
            } else if ($username === "") {
                $errorMessage = 'Please fill in your username';
            } else if ($password === "") {
                $errorMessage = 'Please fill in your password';
            } else {
                $cek = $this->User_model->cek_login($user, $pass);
                if ($cek->num_rows() > 0) {
                    // Valid login credentials
                    $sess_data['username'] = $ck->username;
                    $sess_data['password'] = $ck->password;
                } else {
                    // Invalid login credentials
                    $errorMessage = 'Username or password is wrong';
                    if ($this->User_model->isUsernameExists($username)) {
                        $errorMessage = 'Password is wrong';
                    } else {
                        $errorMessage = 'Username is wrong';
                    }
                }
            }
            $this->session->set_flashdata('pesan', $errorMessage);
            redirect('login');
        }
    }




    public function logout()
    {
        $this->session->sess_destroy();
        redirect('login');
    }
}
