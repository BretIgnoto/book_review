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

		if($review['new_author']!=null && $review['select_author']!=null || $review['new_author']==null && $review['select_author']==null) {
			$this->session->set_flashdata("errors", "Please either select an author from the list or add a new one");
			redirect('/books/add');
		}
		if($review['new_author']) {
			$authid = $this->Author->new($review);
		}
		else if($review['select_author']) {
			$authid = $review['select_author'];
		}
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