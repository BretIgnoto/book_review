<?php
class Review extends CI_Model {
	function index() {
		$query = 'SELECT books.id, books.title, reviews.content, reviews.rating, users.name, reviews.created_at 
				  FROM reviews LEFT JOIN books ON reviews.books_id = books.id LEFT JOIN users ON reviews.users_id = users.id
				  ORDER BY reviews.created_at DESC LIMIT 3';
		return $this->db->query($query)->result_array();
	}
	function new($review, $bookid) {
		$query = 'INSERT INTO reviews (content, rating, created_at, updated_at, users_id, books_id) VALUES (?,?,?,?,?,?)';
		$value = array($review['review'], $review['rating'], date("Y-m-d, H:i:s"), date("Y-m-d, H:i:s"), $this->session->user_session['id'], $bookid);
		return $this->db->query($query, $value);
	}
	function add($review) {
		$query = 'INSERT INTO reviews (content, rating, created_at, updated_at, users_id, books_id) VALUES (?,?,?,?,?,?)';
		$values = array($review['review'], $review['rating'], date("Y-m-d, H:i:s"), date("Y-m-d, H:i:s"), $this->session->user_session['id'], $review['book']);
		return $this->db->query($query, $values);
	}
}