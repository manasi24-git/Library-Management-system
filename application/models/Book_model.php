<?php
class Book_model extends CI_Model 
{
	//Display all records
	public function display_records()
	{
		$query=$this->db->query("SELECT id,book_name,status_id from tblbooks");
		return $query->result();
	}
	//Issue a book
	public function issue()
	{
		$id = $this->uri->segment(3);
		$status_id = $this->uri->segment(4);
		$this->db->where('id',$id);
		$this->db->set('status_id', $status_id);
		$this->db->update('tblbooks');
		redirect('/index.php/book/', 'refresh');
		
	}
	//Return a book
	public function return_book(){
		$id = $this->uri->segment(3);
		$status_id = $this->uri->segment(4);
		$this->db->where('id',$id);
		$this->db->set('status_id', $status_id);
		$this->db->update('tblbooks');
		redirect('/index.php/book/', 'refresh');
	}
	//Search a book
	public function search($book)
	{
		$this->db->like('book_name',$book);
		$query  = $this->db->get('tblbooks');
		return $query->result();
	}


}