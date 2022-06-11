<?php
class Tampil extends CI_Controller{
    public function index(){
        // akses model mahasiswa
        $this->load->model('Mahasiswa_model');
        $mahasiswa = $this->Mahasiswa_model->getALL();
        $data['mahasiswa'] = $mahasiswa;

        // render data dan kirim data ke dalam view
        $this->load->view('layouts/header');
        $this->load->view('mahasiswa/tampil', $data);
        $this->load->view('layouts/footer');
    }
    public function dosen(){
        // akses model dosen
        $this->load->model('Dosen_model');
        $dosen = $this->Dosen_model->getALL();
        $data['dosen'] = $dosen;

        // render data dan kirim data ke dalam view
        $this->load->view('layouts/header');
        $this->load->view('dosen/tampil', $data);
        $this->load->view('layouts/footer');
    }
    public function matkul(){
        // akses model matakuliah
        $this->load->model('Matakuliah_model');
        $matakuliah = $this->Matakuliah_model->getALL();
        $data['matakuliah'] = $matakuliah;

        // render data dan kirim data ke dalam view
        $this->load->view('layouts/header');
        $this->load->view('matakuliah/tampil', $data);
        $this->load->view('layouts/footer');
    }
}
?>