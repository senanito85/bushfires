<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Combined_Map extends CI_Controller {

	public function __construct(){
        parent::__construct();
        $this->load->model('BushfireModel');
        $this->load->library('session');

    } 


	public function index(){
        // To Kill Session data
        $array_items = array('hospital', 'f_food','e_shelter','d_water');
        $this->session->unset_userdata($array_items);
        
        //$mapData = $this->BushfireModel->getAllfrommap();
        //$data['locations'] = $this->BushfireModel->getLocations($mapData);        
        $data['locations'] = '';        
        $this->loadView('combined_map/index', $data);
    }

    public function show_result(){
        if(!empty($this->input->post('search')))
            $this->session->set_userdata('search', $this->input->post("search"));
        else
            $this->session->unset_userdata('search');
        if(!empty($this->input->post('e_shelter')))
            $this->session->set_userdata('e_shelter', true);
        else
            $this->session->unset_userdata('e_shelter');
        if(!empty($this->input->post('f_food')))
            $this->session->set_userdata('f_food', true);
        else
            $this->session->unset_userdata('f_food', true);
        if(!empty($this->input->post('d_water')))
            $this->session->set_userdata('d_water', true);
        else
            $this->session->unset_userdata('d_water', true);
        if(!empty($this->input->post('hospital')))
            $this->session->set_userdata('hospital', true);
        else
            $this->session->unset_userdata('hospital', true);

        $data = array();
        $data['search'] = $this->input->post("search");
        $data['d_water'] = $this->input->post("d_water");
        $data['e_shelter'] = $this->input->post("e_shelter");
        $data['f_food'] = $this->input->post("f_food");
        $data['hospital'] = $this->input->post("hospital");

        $mapData = $this->BushfireModel->getAllsearch($data);
        if($mapData == false)  
            $data['locations'] = '';
        else
            $data['locations'] = $this->BushfireModel->getLocat($mapData);        
        $this->loadView('combined_map/index', $data);
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
        $this->load->view('combined_map/map_script');

    }   	
}
