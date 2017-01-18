<?php
    class HomeController extends Ci_Controller{
        public function index(){
        $data['val'] = "This is data passed from controller";
        $this->load->view('HomeView', $data);
    }
    }
?>