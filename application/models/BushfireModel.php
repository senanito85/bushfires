<?php if( ! defined('BASEPATH')) exit('No direct script access allowed');

class BushfireModel extends CI_Model {
    function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->library('session');

    }


    public function getAllfromTable( $tableName ) {
        $this->db->select('*');
        $this->db->from( $tableName );
        //$this->db->where(  'id <', 80 );
        $quary_result=$this->db->get();
        $result = $quary_result->result();
        return $result;        
    }

    public function getAllfrommap() {
        $res = $this->db->query('SELECT hospitals.* FROM hospitals UNION ALL SELECT fresh_food.* FROM fresh_food UNION ALL SELECT drinkable_water.* FROM drinkable_water UNION ALL SELECT emergency_shelters.* FROM emergency_shelters ');
        // $quary_result=$this->db->get();
        // $result = $quary_result->result();
        // print "<pre>";
        // print_r($res->result());
        // print "</pre>";
        // echo count($res->result());exit;
        return $res->result();        
    }

    public function getAllsearch($search) {
        $qry = "SELECT * FROM bush_fire ";
        $clause = "";

        if(isset($search['d_water'])){
            $clause = " WHERE (type_bit = 1 ";
        }
        if(isset($search['e_shelter'])){
            if($clause != "")
                $clause .= " OR type_bit = 2 ";
            else
                $clause = " Where (type_bit = 2 "; 
        }
        if(isset($search['f_food'])){
            if($clause != "")
                $clause .= " OR type_bit = 3 ";
            else
                $clause .= " Where (type_bit = 3 "; 
        }
        if(isset($search['hospital'])){
            if($clause != "")
                $clause .= " OR type_bit = 4 ";
            else
                $clause = " Where (type_bit = 4 "; 
        }

        if(isset($search['search']) && !empty($search['search'])){
            if($clause != "")
                $clause .= ") AND Suburb LIKE '%".$search['search']."%'";
        }else{
	    if($clause != "")
		$clause .= ")";
	}
        if($clause == '') return false;
        $quary_result = $this->db->query($qry . $clause);
	//echo $qry . $clause;exit;
        //print_r($quary_result->result());exit;
        return $quary_result->result();        
    } 
 
   

    public function getLocations( $result ){
        $location = []; $location_data = [];
        foreach ($result as $key => $value) {
            $location_data = '["' .$value->Name .'", '. $value->Latitude . ', '. $value->Longitude .']';
            array_push($location, $location_data);
            $location_data = [];
        }
        $data = '['. implode(",",$location) . ']';
        return $data;
    }

    public function getLocat( $result ){
         $location = []; $location_data = [];
         foreach ($result as $key => $value) {
             $location_data = '["' .$value->Name .'", '. $value->Latitude . ', '. $value->Longitude .', '. $value->type_bit .']';
             array_push($location, $location_data);
             $location_data = [];
         }
         $data = '['. implode(",",$location) . ']';
         return $data;
     }

     public function get_feedback() {
        $this->db->select('*');
        $this->db->from('feedback');
        $this->db->where('approve =', 1);
        $quary_result=$this->db->get();
        $result = $quary_result->result();
        return $result;        
    }
    public function send_feedback() {
        $data = array(
            'name'=>$this->input->post('name'),
            'email'=>$this->input->post('email'),
            'message'=>$this->input->post('message'),
            'date'=>date('Y-m-d'),
        );
       $sql = $this->db->insert_string('feedback',$data);
       $this->db->query($sql);
       return ($this->db->affected_rows() > 0) ? true : false;
    }

}