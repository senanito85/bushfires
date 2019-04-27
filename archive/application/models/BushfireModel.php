<?php if( ! defined('BASEPATH')) exit('No direct script access allowed');

class BushfireModel extends CI_Model {
    function __construct()
    {
        parent::__construct();
        $this->load->database();

    }


    public function getAllfromTable( $tableName ) {
        $this->db->select('*');
        $this->db->from( $tableName );
        //$this->db->where(  'id <', 80 );
        $quary_result=$this->db->get();
        $result = $quary_result->result();
        return $result;        
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

}