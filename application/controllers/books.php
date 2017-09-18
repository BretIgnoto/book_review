<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Books extends CI_Controller {
	function __construct() {
		parent::__construct();
		$this->load->model('Book');
		$this->load->model('Author');
		$this->load->model('Review');
	}
	function book($id) {
		$info['info'] = $this->Book->find($id);
		$this->load->helper('url');
		$this->load->view('books', $info);
	}
	function add_new() {
		$review = $this->input->post();
		$authid = $this->Author->new($review);
		$bookid = $this->Book->new($review, $authid);
		$this->Review->new($review, $bookid);
		redirect('/login/home');
	}
	function review() {
		$review = $this->input->post();
		$this->Review->add($review);
		redirect('/books/' .$review['book']);

	}
}