<?php
require_once ('connectlab.php');
class LabModel {
	private $db;
	private $error;
	private $results;
	private $picName;
	
	public function __construct($hostname, $username, $userpass, $dbname) {
		// try {
		$this->error = 0;
		$hostStr = "mysql:host=$hostname;dbname=$dbname;charset=utf8";
		$this->db = new PDO ( $hostStr, $username, $userpass );
		$this->db->setAttribute ( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
		$this->db->setAttribute ( PDO::ATTR_EMULATE_PREPARES, false );
	}
	public function nextMem() {
		if (! isset ( $this->results ) or ! $this->results) {
			$this->results = $this->db->query ( 'SELECT * FROM members' );
		}
		return $this->results->fetch ( PDO::FETCH_ASSOC );
	}
	public function lastThree() {
		if (! isset ( $this->results ) or ! $this->results) {
			$this->results = $this->db->query ( 'select * from members order by mem_id desc limit 3' );
		}
		return $this->results->fetch ( PDO::FETCH_ASSOC );
	}
	public function viewMem($id) {
		if (! isset ( $this->results ) or ! $this->results) {
			$this->results = $this->db->query ( "SELECT * FROM members WHERE mem_id = $id" );
		}
		return $this->results->fetch ( PDO::FETCH_ASSOC );
	}
	public function newMem($vals) {
		$vals = $this->validate ( $vals );
		if (! $vals) {
			return;
		}
		$stmt = $this->db->prepare ( "INSERT INTO members (mem_uname, mem_pwd, mem_name, mem_gender, mem_email, mem_dep, mem_description)
					VALUES (:mem_uname, :mem_pwd, :mem_name, :mem_gender, :mem_email, :mem_dep, :mem_description)" );
		
		$stmt->execute ($vals);
	}
	
	public function validate($vals) {
		if (! is_array ( $vals )) {
			$this->error = "Input argument not an array";
			return 0;
		}
		
		if (! array_key_exists ( 'mem_name', $vals )
			or ! array_key_exists ( 'mem_uname', $vals )
			or ! array_key_exists ( 'mem_pwd', $vals )
			or ! array_key_exists ( 'mem_gender', $vals )
			or ! array_key_exists ( 'mem_email', $vals ) 
			or ! array_key_exists ( 'mem_dep', $vals ) 
			or ! array_key_exists ( 'mem_description', $vals )) {
			$this->error = "Missing form field on New Organization form";
			return 0;
		}
		
		$mem_uname = trim ( filter_var ( $vals ['mem_uname'], FILTER_SANITIZE_STRING ) );
		if (! $mem_uname or strlen ( $mem_uname ) == 0) {
			$this->error = "Invalid UserName";
			return 0;
		}
		
		$mem_pwd = trim ( filter_var ( $vals ['mem_pwd'], FILTER_SANITIZE_STRING ) );
		if (! $mem_pwd or strlen ( $mem_pwd ) == 0) {
			$this->error = "Invalid Password";
			return 0;
		}
		
		
		$mem_name = trim ( filter_var ( $vals ['mem_name'], FILTER_SANITIZE_STRING ) );
		if (! $mem_name or strlen ( $mem_name ) == 0) {
			$this->error = "Invalid Name";
			return 0;
		}
		
		$mem_gender = trim ( filter_var ( $vals ['mem_gender'], FILTER_SANITIZE_STRING ) );
		if (! $mem_gender or strlen ( $mem_gender ) == 0) {
			$this->error = "Invalid Gender";
			return 0;
		}
		
		$mem_email = trim ( filter_var ( $vals ['mem_email'], FILTER_SANITIZE_STRING ) );
		if (! $mem_email or strlen ( $mem_email ) == 0) {
			$this->error = "Invalid Email";
			return 0;
		}
		
		$mem_dep = trim ( filter_var ( $vals ['mem_dep'], FILTER_SANITIZE_STRING ) );
		if (! $mem_dep or strlen ( $mem_dep ) == 0) {
			$this->error = "Invalid Department";
			return 0;
		}
		$mem_description = trim ( filter_var ( $vals ['mem_description'], FILTER_SANITIZE_STRING ) );
		if (! $mem_description or strlen ( $mem_description ) == 0) {
			$this->error = "Invalid Organization Description";
			return 0;
		}
		
		$newvals = array (
				'mem_uname' => $mem_uname,
				'mem_pwd' => $mem_pwd,
				'mem_name' => $mem_name,
				'mem_gender' => $mem_gender,
				'mem_email' => $mem_email,
				'mem_dep' => $mem_dep,
				'mem_description' => $mem_description 
		);
		return $newvals;
	}
	public function getError() {
		return $this->error;
	}
	
	public function login($info){
		$mem_uname = trim ( filter_var ( $info ['uname'], FILTER_SANITIZE_STRING ) );
		$mem_pwd = trim ( filter_var ( $info ['pwd'], FILTER_SANITIZE_STRING ) );
		
		if (! isset ( $this->results ) or ! $this->results) {
			$this->results = $this->db->query ( "SELECT * FROM members WHERE mem_uname='$mem_uname' AND mem_pwd='$mem_pwd'" );
		}
		
		return $this->results->fetch ( PDO::FETCH_ASSOC );
	}
	
	public function updateMem($info){
		$id = trim ( filter_var ( $info ['mem_id'], FILTER_SANITIZE_STRING ) );
		$mem_name = trim ( filter_var ( $info ['mem_name'], FILTER_SANITIZE_STRING ) );
		$mem_gender = trim ( filter_var ( $info ['mem_gender'], FILTER_SANITIZE_STRING ) );
		$mem_email = trim ( filter_var ( $info ['mem_email'], FILTER_SANITIZE_EMAIL ) );
		$mem_dep = trim ( filter_var ( $info ['mem_dep'], FILTER_SANITIZE_STRING ) );
		$mem_description = trim ( filter_var ( $info ['mem_description'], FILTER_SANITIZE_STRING ) );
		
		if (! isset ( $this->results ) or ! $this->results) {
			$this->results = $this->db->query ( "UPDATE members SET mem_name = '$mem_name', mem_gender = '$mem_gender', 
												mem_email = '$mem_email', mem_dep = '$mem_dep', mem_description = '$mem_description' 
												WHERE mem_id = '$id'" );
		}
		
		return $this->results->fetch ( PDO::FETCH_ASSOC );
		
	}
	
}

?>