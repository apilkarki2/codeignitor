<?php
Class ApiModel extends CI_Model
{
	protected $table = "app_data";
	 function Insert($app_name, $regID,$country,$app_key)
	 {
			$data = array('app_name' => $app_name, 'regIID' => $regID, 'country' => $country,'app_id'=>$app_key);
			$this->db->insert($this->table, $data);
			$num_inserts = $this->db->affected_rows();
			
			if($num_inserts)
			{
				return true;
			} else 
			{
				return false;
			}
	 }
	 function countries()
	 {
		$this->db->select('country');
	   $this->db->from("app_data");
	   $this->db->group_by('country');
	   $query =  $this->db->get();
	   $query = $query->result_array();
	   $r = array();
	   foreach($query as $row) {
		$r[$row["country"]] = $row["country"];
	   }
	   return $r;
	 }
	 function app_name()
	 {
	   $this->db->select('app_name');
	   $this->db->from("app_data");
	   $this->db->group_by('app_name');
	   $query =  $this->db->get();
	   $query = $query->result_array();
	    $r = array();
	   foreach($query as $row) {
		$r[$row["app_name"]] = $row["app_name"];
	   }
	   return $r;
	 }
	 
	 function getRegIds($country,$app)
	 {
	 
	   $this->db->select('regIID');
	   $this->db->from("app_data");
	   $this->db-> where('app_name', $app);
	   $this->db-> where('country', $country);
	 
	   $query =  $this->db->get();
	   $query = $query->result_array();
	    $r = array();
	   foreach($query as $row) {
		$r[] = $row["regIID"];
	   }
	   return $r;
	 }
	 
	 function getAppKey($app)
	 {
	   $this -> db -> select('app_id');
	   $this -> db -> from("app_data");
	    $this->db-> where('app_name', $app);
	   $this -> db -> limit(1);
	 
	   $query = $this -> db -> get();
	 
	   if($query -> num_rows() == 1)
	   {
		if($query)
		{
			 
		 foreach($query->result() as $row)
		 {
		
			$app_id = $row->app_id;
		 }
		 return $app_id;
		}
		 
	   }
	   else
	   {
		 return $app_id="";
	   }
	 }
}
?>