<?php
class Book extends CI_Model {
	function find($id) {
		$query = ('SELECT books.id, books.title, authors.name, reviews.content, reviews.rating, reviews.created_at, users.name AS reviewer FROM books
				  LEFT JOIN authors ON authors.id = books.authors_id LEFT JOIN reviews ON reviews.books_id = books.id LEFT JOIN users ON reviews.users_id = users.id
				  WHERE books.id = ?');
		return $this->db->query($query, $id)->result_array();
	}
	function new($new_book, $authid) {
		$query = 'INSERT INTO books (title, authors_id, created_at, updated_at) VALUES (?,?,?,?)';
		$values = array($new_book['title'], $authid, date("Y-m-d, H:i:s"), date("Y-m-d, H:i:s"));
		$this->db->query($query, $values);
		return $this->db->insert_id();
	}
	function populate() {
		$query = ('SELECT books.id, books.title FROM books ORDER BY books.title');
		return $this->db->query($query)->result_array();
	}
}