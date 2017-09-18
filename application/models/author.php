<?php
class Author extends CI_Model {
	function find($id) {
		return $this->db->query('SELECT * FROM authors WHERE authors.id = ?', $id)->row_array();
	}
	function new($new_author) {
		$query = 'INSERT INTO authors (name, created_at, updated_at) VALUES (?,?,?)';
		$values = array($new_author['new_author'], date("Y-m-d, H:i:s"), date("Y-m-d, H:i:s"));
		$this->db->query($query, $values);
		return $this->db->insert_id();
	}
	function populate() {
		$query = ('SELECT DISTINCT authors.name, authors.id FROM authors ORDER BY authors.name');
		return $this->db->query($query)->result_array();
	}
}