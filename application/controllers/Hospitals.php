<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Hospitals extends CI_Controller {

	public function __construct(){
        parent::__construct();
        $this->load->model('BushfireModel');

    }


	public function index(){
        $mapData = $this->BushfireModel->getAllfromTable('Hospitals');
        $data['locations'] = $this->BushfireModel->getLocations($mapData);        
        $this->loadView('hospitals/index', $data);
    }




    /**
     * Load view 
     * @param 1 : view name
     * @param 2 : data to be render on view. If no data pass null
     */
    function loadView($view, $data) {

        $this->load->view('common/header');
        //$this->load->view('common/sidebar');

        $this->load->view($view, array('data' => $data));
        $this->load->view('common/footer');

    }   	
}
