<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Quize extends CI_Controller {

	public function __construct(){
        parent::__construct();
        $this->load->model('BushfireModel');

    }
    
    function index() {

        $this->load->view('common/header');
        $this->load->view('quize/index');
        $this->load->view('common/footer');

    }   	
}
