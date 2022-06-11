<?php
class Dosen extends CI_Controller{
    // membuat method index
    public function index(){
        // akses model dosen
        $this->load->model('Dosen_model');
        $dosen = $this->Dosen_model->getALL();
        $data['dosen'] = $dosen;

        // render data dan kirim data ke dalam view
        $this->load->view('layouts/header');
        $this->load->view('dosen/index', $data);
        $this->load->view('layouts/footer');
    }
    public function detail($id){
        // akses model dosen
        $this->load->model('Dosen_model');
        $siswa = $this->Dosen_model->getById($id);
        $data['siswa'] = $siswa;
        $this->load->view('layouts/header');
        $this->load->view('dosen/detail', $data);
        $this->load->view('layouts/footer');
    }
    public function form(){
        // render view 
        $this->load->view('layouts/header');
        $this->load->view('dosen/form');
        $this->load->view('layouts/footer');
    }
    public function save(){
        // akses ke model dosen 
        $this->load->model('dosen_model', 'dosen'); //1
        $_nama = $this->input->post('nama');
        $_gender = $this->input->post('gender');
        $_tmp_lahir = $this->input->post('tmp_lahir');
        $_tgl_lahir = $this->input->post('tgl_lahir');
        $_nidn = $this->input->post('nidn');
        $_pendidikan = $this->input->post('pendidikan');

        $data_dosen['nama'] = $_nama; //2
        $data_dosen['gender'] = $_gender;
        $data_dosen['tmp_lahir'] = $_tmp_lahir;
        $data_dosen['tgl_lahir'] = $_tgl_lahir;
        $data_dosen['nidn'] = $_nidn;
        $data_dosen['pendidikan'] = $_pendidikan; 

        if((!empty($_idedit))){ //update
            $data_dosen['id'] = $_idedit;
            $this->dosen->update($data_dosen);
        }else{
            //  data baru
            $this->dosen->simpan($data_dosen);
        }
        redirect('dosen','refresh');
    }
    public function edit($id){
        // akses model dosen
        $this->load->model('dosen_model', 'dosen');
        $obj_dosen = $this->dosen->getById($id);
        $data['obj_dosen'] = $obj_dosen;
        $this->load->view('layouts/header');
        $this->load->view('dosen/edit', $data);
        $this->load->view('layouts/footer');
    }
    public function delete($id){
        $this->load->model('dosen_model', 'dosen');
        // mengecek data dosen berdasarkan id
        $data_dosen['id'] = $id;
        $this->dosen->delete($data_dosen);
        redirect('dosen', 'refresh');
    }
    public function __construct()
    {
        parent::__construct();
        if(!$this->session->userdata('logged_in')){
            redirect('login');
        }
    }
    public function upload(){
        $_iddosen = $this->input->post('iddosen');
        // akses model dosen
        $this->load->model('dosen_model', 'dosen');
        $siswa = $this->dosen->getById($_iddosen);
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
        $this->load->view('dosen/detail', $data);
        $this->load->view('layouts/footer');
    }
}
?>