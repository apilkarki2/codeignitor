<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Home extends CI_Controller 
{
	// public  $gcm_key ="AIzaSyCJ0QUUG2xg3VMepd7mMYUZ33vwybrpbiY";
	 function __construct()
	 {
	   parent::__construct();
	   $this->load->Model('User');
	   $this->load->Model('ApiModel');
	   $this->load->helper('form');
	   $this->load->library('form_validation');

	 }

	 function index()
	 {

	   if($this->session->userdata('logged_in'))
	   {
		
		 $session_data = $this->session->userdata('logged_in');
		 $data['username'] = $session_data['username'];
		 $data['appnames'] = $this->ApiModel->app_name();
		 $data['countries'] =  $this->ApiModel->countries();
		 $data['stats'] =$this->ApiModel->getStats();
		 $this->load->view('header');
		 $this->load->view('home', $data);
		 $this->load->view('footer');
		 
	   }
	   else
	   {

		 //If no session, redirect to login page
		 redirect('login', 'refresh');
	   }
	 }

	function DeleteApp() {
	$app_name = $this->input->post('ids');
	 $this->ApiModel->DeleteData($app_name);
	 echo '<div class="success">Record Deleted Successfully.</div>';
	}

	
	 function SendMessage() {
	 $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
		 $app_name = $this->input->post('app_name');
		 $title = $this->input->post('title');
		 $country =  $this->input->post('country');
		 $link= $this->input->post('link');
		 $new_app_name =  $this->input->post('new_app_name');
		 $banner = $this->input->post('banner');
         $icon= $this->input->post('icon');
	 
		
		$this->form_validation->set_rules('app_name', 'app_name', 'required');
		$this->form_validation->set_rules('title', 'title', 'required');
		$this->form_validation->set_rules('link', 'link', 'required');
		$this->form_validation->set_rules('new_app_name', 'new_app_name', 'required');
		$this->form_validation->set_rules('banner', 'banner', 'required');
		$this->form_validation->set_rules('icon', 'icon', 'required');
		$this->form_validation->set_rules('country', 'country', 'required');
	  
		if ($this->form_validation->run() == true)
		{
				
            $message = array();
            //$message['Message'] = "A post has been updated on your website";
            //$message['type'] = 101;
           
            $message['link'] = $link;
            $message['title'] = $title;
            $message['new_app_name'] = $new_app_name;
			$message['banner'] = $banner;
			$message['icon'] = $icon;
			
			
			//$registatoin_id = $this->ApiModel->getRegIds();
			
			//if(!empty($app_name)) {
				//$registatoin_id = $this->ApiModel->getRegIds('',$app_name);
            //}
			/*if(!empty($country)) {
				$registatoin_id = $this->ApiModel->getRegIds($country);
			}*/
			if(!empty($country) && !empty($app_name)) {
				$registatoin_id = $this->ApiModel->getRegIds($country,$app_name);
			}
			else { 
			
				$registatoin_id = $this->ApiModel->getRegIds('',$app_name);
			}
                        
			$gcm_key = $this->ApiModel->getAppKey($app_name);
			
			$S=array();
			
			if (count($registatoin_id)>0) {
				$reg_ids  = array_chunk($registatoin_id,998);
				//echo "<pre>";print_r( $reg_ids); exit;
				//$reg_ids=array();
			  //$reg_ids = $registatoin_id;
			  $total_failure=0;
			  $total_success=0;
				   foreach( $reg_ids as $registatoin_id) {
				        //$gcm_key = $this->ApiModel->getAppKey($registatoin_id);
						//$r=array();
						//$r[] = $registatoin_id;
						$send = $this->send_notification($registatoin_id, $message,$gcm_key);
						$t = json_decode($send);
						echo "<pre>";print_r($t); exit;
						$total_failure += $t->failure;
						$total_success += $t->success;
						//$S[] = json_decode($send);
					}
                }
				/*
				 $session_data = $this->session->userdata('logged_in');
				 $data['username'] = $session_data['username'];
				 $data['appnames'] = $this->ApiModel->app_name();
				 $data['countries'] =  $this->ApiModel->countries();

				 $this->load->view('header');
				 $this->load->view('home', $data);
				 $this->load->view('footer'); */
				 //print_r($S);
				 echo '<div class="success">Successfully Send to '.$total_success.' and Failed  '.$total_failure.'   </div>';
		}
		else
		{
				 
				echo validation_errors();
		}
	 }
	 
	 function logout()
	 {
	   $this->session->unset_userdata('logged_in');
	   session_destroy();
	   redirect('home', 'refresh');
	 }
	 
	 
	 public function send_notification($registatoin_id, $message,$gcm_key) {
	 
		
        $url = 'https://android.googleapis.com/gcm/send';
        $fields = array("registration_ids" => $registatoin_id, 'data' => array("data"=>$message));

      
        $headers = array('Authorization: key=' . "$gcm_key", 'Content-Type: application/json');
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($fields));
        $result = curl_exec($curl);
    
        curl_close($curl);
	
        return $result;
    }
}
?>