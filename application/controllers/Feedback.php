<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Feedback extends CI_Controller {

	public function __construct(){
        parent::__construct();
        $this->load->model('BushfireModel');
        $this->load->library('session');

    }


	public function index(){
        $data['data'] = $this->BushfireModel->get_feedback();
        $this->load->view('common/header');
        $this->load->view('feedback/index',$data);
        $this->load->view('common/footer');
    }
    public function send_feedback(){
        $insert_data = $this->BushfireModel->send_feedback();
        if($insert_data) { 
            // echo "message sent";exit;
            $this->session->set_userdata('message', 'Feedback sent successfully,and will show after admin approve.');
            $this->session->set_userdata('class', 'alert alert-success');
         } else {
            // $this->session->set_flashdata('input', array('name' => $this->input->post('name'),'message' => $this->input->post('message'),'email' => $this->input->post('email')));
        //    $this->session->set_flashdata('item', array('message' => 'please try again!','class' => 'alert alert-danger'));
              $this->session->set_userdata('message', 'please try again! .');
              $this->session->set_userdata('name', $this->input->post('name'));
              $this->session->set_userdata('email', $this->input->post('email'));
              $this->session->set_userdata('txt', $this->input->post('txt'));
              $this->session->set_userdata('class', 'alert alert-danger');
         }
         
         
        redirect('/Feedback?msg=hello world');
    }
}
