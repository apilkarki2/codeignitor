<?php
class Api extends CI_Controller {
	public $Success=0; 
	public $Error=0; 
	public $Msg=""; 
	function __construct()
	 {
	   parent::__construct();
	   $this->load->model('ApiModel');
	 }
	public function AddAppData($app_name='', $regID='',$country='',$app_key='', $newRegID='') {
		if(empty($app_name)) {
			$this->Error = 1;
			$this->Msg = "App name not found.";
		}
		else if(empty($regID)) {
			$this->Error = 1;
			$this->Msg = "regID not found.";
		}
		else if(empty($country)) {
			$this->Error = 1;
			$this->Msg = "country not found.";
		}
		else if(empty($app_key)) {
			$this->Error = 1;
			$this->Msg = "app_key not found.";
		}
		else {                        
             if(empty($newRegID)){
				if($this->ApiModel->getRegId($app_name,$app_key,$regID) == false) 
				{
					if($this->ApiModel->Insert($app_name, $regID,$country,$app_key))
					{
						$this->Success = 1;
						$this->Msg = "Successfully Save.";
					}
					else 
					{
						$this->Error = 1;
						$this->Msg = "Problem in inserting database.";
					}
				}
				else{
					$this->Success = 1;
					$this->Msg = "Successfully Save.";
				}
			}
			else
			{
               	$affectedRows = $this->ApiModel->Update($app_name,$app_key,$regID,$newRegID);

                if ($affectedRows > 0) 
				{
					$this->Success = 1;
					$this->Msg = "Successfully Save.";
				}
				else
				{
					$this->Error = 1;
					$this->Msg = "Problem in updating database.";
				}
			}
		}
		
		$a = array("success"=>$this->Success,"Error"=>$this->Error,"Message"=>$this->Msg);
		echo json_encode($a);
		
		// Load the JSON view
		//$this->load->view('json', $data);
	}
	
}

?>