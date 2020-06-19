<?php

class Admin_model extends CI_model{

    public function addKaryawan()
    {
        $data = [
            "no_induk" => $this->input->post('no', true),
            "nama" => $this->input->post('nama', true),
            "tgl_lahir" => $this->input->post('tgl_lahir', true),
            "jenis_kelamin" => $this->input->post('jenis_kelamin', true),
            "alamat" => $this->input->post('alamat', true),
            "no_hp" => $this->input->post('no_hp', true),
            "email" => $this->input->post('email', true),
            "tgl_diterima" => $this->input->post('tgl_diterima', true),
            "gaji_pokok" => $this->input->post('gaji', true)
        ];

        $this->db->insert('karyawan', $data);
    }

    public function getKaryawan()
    {
        return $this->db->get('karyawan')->result_array();
    }

    public function updateKaryawan()
    {
        $this->db->set('no_induk',$_POST['no']);
        $this->db->set('nama',$_POST['nama']);
        $this->db->set('tgl_lahir',$_POST['tgl_lahir']);
        $this->db->set('jenis_kelamin',$_POST['jenis_kelamin']);
        $this->db->set('alamat',$_POST['alamat']);
        $this->db->set('no_hp',$_POST['no_hp']);
        $this->db->set('email',$_POST['email']);
        $this->db->set('tgl_diterima',$_POST['tgl_diterima']);
        $this->db->set('gaji_pokok',$_POST['gaji']);
        $this->db->where('id_karyawan',$_POST['id']);
        $this->db->update('karyawan');
    }

    public function deleteKaryawan($id)
    {
        $this->db->where('id_karyawan',$id);
        $this->db->delete('karyawan');
    }

    public function getDetailKaryawan($id)
    {
        return $this->db->get_where('karyawan',['id_karyawan'=>$id])->result_array();
    }

    public function addGaji()
    {
        $data = [
            "id_karyawan" => $this->input->post('id', true),
            "gaji_pokok" => $this->input->post('gaji', true),
            "gaji_bonus" => $this->input->post('bonus', true),
            "detail" => $this->input->post('detail', true),
            "tgl_dibayar" => $this->input->post('tgl_dibayar', true)
        ];

        $this->db->insert('gaji', $data);
    }

    public function getGaji()
    {
        $this->db->select('gaji.*,karyawan.nama, karyawan.no_induk');
        $this->db->from('gaji');
        $this->db->join('karyawan', 'gaji.id_karyawan = karyawan.id_karyawan');

        $query = $this->db->get();
        return $query->result_array();
    }

    public function getGajiId($id)
    {
        $this->db->select('gaji.*,karyawan.nama, karyawan.no_induk');
        $this->db->from('gaji');
        $this->db->join('karyawan', 'gaji.id_karyawan = karyawan.id_karyawan');
        $this->db->where('gaji.id_karyawan',$id);

        $query = $this->db->get();
        return $query->result_array();
    }

    public function deleteGaji($id)
    {
        $this->db->where('id_gaji',$id);
        $this->db->delete('gaji');
    }
}