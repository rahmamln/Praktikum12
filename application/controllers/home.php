<?php
class Home extends CI_Controller{
    // membuat method index
    public function index(){
        $this->load->view('home/index');
    }
}
?>