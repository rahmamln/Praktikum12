<?php
class Matakuliah extends CI_Controller{
    // membuat method index
    public function index(){
        // akses model matakuliah
        $this->load->model('Matakuliah_model');
        $matakuliah = $this->Matakuliah_model->getALL();
        $data['matakuliah'] = $matakuliah;

        // render data dan kirim data ke dalam view
        $this->load->view('layouts/header');
        $this->load->view('matakuliah/index', $data);
        $this->load->view('layouts/footer');
    }
    public function detail($id){
        // akses model matakuliah
        $this->load->model('Matakuliah_model');
        $siswa = $this->Matakuliah_model->getById($id);
        $data['siswa'] = $siswa;
        $this->load->view('layouts/header');
        $this->load->view('matakuliah/detail', $data);
        $this->load->view('layouts/footer');
    }
    public function form(){
        // render view 
        $this->load->view('layouts/header');
        $this->load->view('matakuliah/form');
        $this->load->view('layouts/footer');
    }
    public function save(){
        // akses ke model matakuliah 
        $this->load->model('matakuliah_model', 'matakuliah'); //1
        $_id = $this->input->post('id');
        $_nim = $this->input->post('nim');
        $_nama = $this->input->post('nama');
        $_sks = $this->input->post('sks');
        $_kode = $this->input->post('kode');
        $_dosen_pembimbing = $this->input->post('dosen_pembimbing');

        $data_matakuliah['id'] = $_id; //2
        $data_matakuliah['nim'] = $_nim;
        $data_matakuliah['nama'] = $_nama;
        $data_matakuliah['sks'] = $_sks;
        $data_matakuliah['kode'] = $_kode;
        $data_matakuliah['dosen_pembimbing'] = $_dosen_pembimbing; 

        if((!empty($_idedit))){ //update
            $data_matakuliah['id'] = $_idedit;
            $this->matakuliah->update($data_mahasiswa);
        }else{
            //  data baru
            $this->matakuliah->simpan($data_matakuliah);
        }
        redirect('matakuliah','refresh');
    }
    public function edit($id){
        // akses model matakuliah
        $this->load->model('matakuliah_model', 'matakuliah');
        $obj_matakuliah = $this->matakuliah->getById($id);
        $data['obj_matakuliah'] = $obj_matakuliah;
        $this->load->view('layouts/header');
        $this->load->view('matakuliah/edit', $data);
        $this->load->view('layouts/footer');
    }
    public function delete($id){
        $this->load->model('matakuliah_model', 'matakuliah');
        // mengecek data matakuliah berdasarkan id
        $data_matakuliah['id'] = $id;
        $this->matakuliah->delete($data_matakuliah);
        redirect('matakuliah', 'refresh');
    }
    public function __construct()
    {
        parent::__construct();
        if(!$this->session->userdata('username')){
            redirect('login');
        }
    }
    public function upload(){
        $_idmatakuliah = $this->input->post('idmatakuliah');
        // akses model matakuliah
        $this->load->model('matakuliah_model', 'matakuliah');
        $siswa = $this->matakuliah->getById($_idmatakuliah);
        $data['siswa'] = $siswa;

        $config ['upload_path']='./uploads/photos';
        $config ['allowed_types']='jpg|png';
        $config ['max_size']=2894;
        $config ['max_width']=2894;
        $config ['max_height']=2894;
        $config ['file_name']=$siswa->id;

        // aktifkan library upload
        $this->load->library('upload', $config);

        if(!$this->upload->do_upload('foto')){
            // jika tidak ada file diupload 
            // maka tampilkan pesan data berhasil di upload atau data sukses
            $data['error'] = $this->upload->display_errors();
        }else{
            $data['upload_data'] = $this->upload->data();
            $data['error'] = 'data sukses';
        }
        // kirim ke view
        $this->load->view('layouts/header');
        $this->load->view('matakuliah/detail', $data);
        $this->load->view('layouts/footer');
    }
}
?>