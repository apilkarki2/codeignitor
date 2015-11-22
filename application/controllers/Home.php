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

	 function SendMessage() {
	 
		 $app_name=  $this->input->post('app_name');
		 $title=  $this->input->post('title');
		 $country =  $this->input->post('country');
		 $link= $this->input->post('link');
		 $icon =  $this->input->post('icon');
		 $banner = $this->input->post('banner');
	 
		$this->form_validation->set_rules('app_name', 'app_name', 'required');
		$this->form_validation->set_rules('title', 'title', 'required');
		$this->form_validation->set_rules('link', 'link', 'required');
		$this->form_validation->set_rules('icon', 'icon', 'required');
		$this->form_validation->set_rules('banner', 'banner', 'required');
		$this->form_validation->set_rules('country', 'country', 'required',
				array('required' => ' %s is Required.')
		);
	  
		if ($this->form_validation->run() == true)
		{
				
            $message = array();
            //$message['Message'] = "A post has been updated on your website";
            $message['type'] = 101;
           
            $message['link'] = $link;
            $message['title'] = $title;
            $message['icon'] = $icon;
			$message['banner'] = $banner;
			

			
			$registatoin_id = $this->ApiModel->getRegIds($country,$app_name);
			 $gcm_key = $this->ApiModel->getAppKey($app_name);
			 
			if (count($registatoin_id)>0) {
               $reg_ids  = array_chunk($registatoin_id,998);
			  
				   foreach( $reg_ids as $registatoin_id) {
				   
						$this->send_notification($registatoin_id, $message,$gcm_key);
					}
                }
				
				 $session_data = $this->session->userdata('logged_in');
				$data['username'] = $session_data['username'];
				 $data['appnames'] = $this->ApiModel->app_name();
				 $data['countries'] =  $this->ApiModel->countries();
				 $this->load->view('header');
				 $this->load->view('home', $data);
				 $this->load->view('footer');
		}
		else
		{
				 redirect('home', 'refresh');
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