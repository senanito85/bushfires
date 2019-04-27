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

    public function getAllfrommap() {
        $res = $this->db->query('SELECT Hospitals.* FROM Hospitals UNION ALL SELECT Fresh_Food.* FROM Fresh_Food UNION ALL SELECT Drinkable_Water.* FROM Drinkable_Water UNION ALL SELECT Emergency_Shelters.* FROM Emergency_Shelters ');
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

}
