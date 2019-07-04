<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Website extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->Model('Will_Model');
		$this->load->helper('string');
	}

	public function index()
	{
		$is_login = $this->session->userdata('user_is_login');
		$user_id = $this->session->userdata('user_id');
		if($is_login && $user_id){
			$user_data = $this->Will_Model->get_user_data($user_id);
			$this->load->view('website/index',['user_data'=>$user_data]);
		}
		else{
		$this->load->view('website/index.php');
	}
	}

	public function about()
	{
		$is_login = $this->session->userdata('user_is_login');
		$user_id = $this->session->userdata('user_id');
		if($is_login && $user_id){
			$user_data = $this->Will_Model->get_user_data($user_id);
			$this->load->view('website/about.php',['user_data'=>$user_data]);
		}
			else{
		$this->load->view('website/about.php');
	}
}
	public function faqs()
	{
		$is_login = $this->session->userdata('user_is_login');
		$user_id = $this->session->userdata('user_id');
		if($is_login && $user_id){
			$user_data = $this->Will_Model->get_user_data($user_id);
			$this->load->view('website/faqs.php',['user_data'=>$user_data]);
		}
			else{
		$this->load->view('website/faqs.php');
	}
}
	public function pricing()
	{
		$is_login = $this->session->userdata('user_is_login');
		$user_id = $this->session->userdata('user_id');
		if($is_login && $user_id){
			$user_data = $this->Will_Model->get_user_data($user_id);
			$this->load->view('website/pricing.php',['user_data'=>$user_data]);
		}
		else{
			$this->load->view('website/pricing.php');
		}

	}
	public function Privacy()
	{
		$is_login = $this->session->userdata('user_is_login');
		$user_id = $this->session->userdata('user_id');
		if($is_login && $user_id){
			$user_data = $this->Will_Model->get_user_data($user_id);
			$this->load->view('website/Privacy.php',['user_data'=>$user_data]);
			}else{
			$this->load->view('website/privacy.php');
		}
	}

	public function terms()
	{
		$is_login = $this->session->userdata('user_is_login');
		$user_id = $this->session->userdata('user_id');
		if($is_login && $user_id){
			$user_data = $this->Will_Model->get_user_data($user_id);
			$this->load->view('website/terms.php',['user_data'=>$user_data]);
		}
		else {
				$this->load->view('website/terms.php');
		}

	}
	public function contact()
	{
		$is_login = $this->session->userdata('user_is_login');
		$user_id = $this->session->userdata('user_id');
		if($is_login && $user_id){
			$user_data = $this->Will_Model->get_user_data($user_id);
			$this->load->view('website/contact.php',['user_data'=>$user_data]);
		}
		else {
		$this->load->view('website/contact.php');
		}

	}
	public function insta(){
		$this->load->view('pages/Instamojo.php');
	}
}
