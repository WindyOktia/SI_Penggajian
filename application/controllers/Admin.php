<?php

class Admin extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('admin_model');
        $this->load->model('login_model');
        if($this->login_model->is_role() != "1"){
            $this->session->set_flashdata('error', 'Anda tidak memiliki akses');
            redirect('login');
        }
    }

    public function index()
    {
        $this->load->view('parts/header');
        $this->load->view('admin/main');
        $this->load->view('parts/footer');
    }

    public function karyawan()
    {
        $data['karyawan']=$this->admin_model->getKaryawan();
        $this->load->view('parts/header');
        $this->load->view('admin/karyawan',$data);
        $this->load->view('parts/footer');
    }

    public function addKaryawan()
    {
        $this->admin_model->addKaryawan();
        $this->session->set_flashdata('success', 'Data Ditambahkan');
        redirect('admin/karyawan'); 
    }

    public function updateKaryawan()
    {
        $this->admin_model->updateKaryawan();
        $this->session->set_flashdata('success', 'Data Diubah');
        redirect('admin/karyawan'); 
    }

    public function deleteKaryawan($id)
    {
        
        $this->admin_model->deleteKaryawan($id);
        $this->session->set_flashdata('success', 'Data Dihapus');
        redirect('admin/karyawan'); 
    }

    public function gaji()
    {
        $data['gaji']=$this->admin_model->getGaji();
        $this->load->view('parts/header');
        $this->load->view('admin/gaji',$data);
        $this->load->view('parts/footer');
    }

    public function slip()
    {
        $data['karyawan']=$this->admin_model->getKaryawan();
        if(isset($_GET['id'])){
            $data['detailkar']=$this->admin_model->getDetailKaryawan($_GET['id']);
        }
        $this->load->view('parts/header');
        $this->load->view('admin/slipgaji',$data);
        $this->load->view('parts/footer');
    }

    public function addGaji()
    {
        $this->admin_model->addGaji();
        $this->session->set_flashdata('success', 'Data Ditambahkan');
        redirect('admin/gaji'); 
    }

    public function deleteGaji($id)
    {
        $this->admin_model->deleteGaji($id);
        $this->session->set_flashdata('success', 'Data Dihapus');
        redirect('admin/gaji'); 
    }

    public function laporan_pdf($id)
    {
        $data['export']= $this->admin_model->getGajiId($id);
    
        $this->load->library('pdf');
    
        $this->pdf->setPaper('A4', 'potrait');
        $this->pdf->filename = "laporan.pdf";
        $this->pdf->load_view('laporan_pdf', $data);
    }


}