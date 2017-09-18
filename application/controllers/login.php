<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	protected $view_data = array();
	protected $user_session = NULL;
	function __construct() {
		parent::__construct();
		$this->load->model('User');
		$this->load->model('Book');
		$this->load->model('Author');
		$this->load->model('Review');
	}
	function index() {
		$this->load->view('welcome');
	}
	function add() {
		$authors['authors'] = $this->Author->populate();
		$this->load->view('add', $authors);
	}
	function home() {
		$reviews['reviews'] = $this->Review->index();
		$reviews['books'] = $this->Book->populate();
		$this->load->helper('url');
		$this->load->view('home', $reviews);
	}
	function register() {
		$this->load->library("form_validation");
		$this->form_validation->set_rules("name", "Name", "trim|required");
		$this->form_validation->set_rules("email", "Email", "trim|valid_email|required");
		$this->form_validation->set_rules("password", "Password", "trim|min_length[8]|required|matches[confirm]");
		$this->form_validation->set_rules("confirm", "Confirm Password", "trim|required");

		if($this->form_validation->run() === FALSE) {
			$this->session->set_flashdata("errors", validation_errors());
			redirect('/');
		}
		else {
			$new_user = $this->input->post();
			$insert_user = $this->User->register($new_user);
						
			if($insert_user) {				
				$this->session->set_userdata("user_session", $insert_user);
				redirect('/home');
			}
			else {
				$this->session->set_flashdata("errors", "Sorry but your info was not registered please try again.");
				redirect('/');
			}
		}
		
	}
	function signin() {
		$this->load->library("form_validation");
		$this->form_validation->set_rules("email", "Email", "trim|valid_email|required");
		$this->form_validation->set_rules("password", "Password", "trim|min_length[8]|required");
		
		if($this->form_validation->run() === FALSE) {
			$this->session->set_flashdata("errors", validation_errors());
			redirect('/');
		}
		else {
			$user = $this->input->post();
			$get_user = $this->User->login($user);					   

			if ($get_user) {
				$this->session->user_session = $get_user;
				redirect('/home');
			}
			else {
				$this->session->set_flashdata("errors", "Invalid email and/or password");
				redirect('/');
			}		
		}
	}
	function logout() {
		$this->session->sess_destroy();
		redirect('/');
	}
}