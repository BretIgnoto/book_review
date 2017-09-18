<?php
class User extends CI_Model {
	function register($new_user) {
		$query = 'INSERT INTO users (name, email, password, created_at, updated_at) VALUES (?,?,?,?,?)';
		$values = array($new_user['name'], $new_user['email'], $new_user['password'], date("Y-m-d, H:i:s"), date("Y-m-d, H:i:s"));
		$this->db->query($query, $values);
		$query = 'SELECT * FROM users WHERE email = ? AND password = ?';
		$values = array($new_user['email'], $new_user['password']);
		return $this->db->query($query, $values)->row_array();

	}
	function login($user) {
		$query = 'SELECT * FROM users WHERE email = ? AND password = ?';
		$values = array($user['email'], $user['password']);
		return $this->db->query($query, $values)->row_array();
	}
}