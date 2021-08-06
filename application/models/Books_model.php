<?php 

	class Books_model extends CI_Model{
		
		public function getBooks(){
			return $this->db->get('books');
		}
	}
