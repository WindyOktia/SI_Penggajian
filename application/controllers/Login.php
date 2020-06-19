<?php

class Login extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('login_model');
    }

    public function index()
    {
        $this->load->view('login');
    }

    public function do_login()
	{
		$user    = $this->input->post('user',TRUE);
		$pass = md5($this->input->post('pass',TRUE));
		$validate = $this->login_model->login($user,$pass);
		if($validate->num_rows() > 0){
			$data  = $validate->row_array();
			$id  = $data['id_user'];
			$name  = $data['nama'];
			$username  = $data['username'];
			$role = $data['role'];
			$sesdata = array(
				'id_user'  => $id,
				'nama'  => $name,
				'username'     => $username,
				'role'    => $role,
				'logged_in' => TRUE
			);
			$this->session->set_userdata($sesdata);
            redirect('admin/karyawan');
			
		}else{
			$this->session->set_flashdata('error', 'Username / Password Salah');
			redirect('login');
		}
    }

    function logout(){
        $this->session->sess_destroy();
        redirect('login');
    }
}