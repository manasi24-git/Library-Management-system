<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Book extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	
	
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->helper('url');
		$this->load->model('Book_model');
	}
	
	public function index()
	{
		$result['data']=$this->Book_model->display_records();
		$this->load->view('book_action',$result);
	}
	// To display all records on the page
	public function dispdata()
	{
		$result['data']=$this->Book_model->display_records();
		$this->load->view('book_action',$result);
	}
	// Search a book 
	public function search_book()
	{
		$book = $this->input->post('book_name'); 
		if($book!=''){
				$result['data'] = $this->Book_model->search($book);
		}else{
			$result['data'] = array();
		}
		
		$this->load->view('book_action',$result);
	}
	//Issue a book
	public function issue_book()
	{
		$this->Book_model->issue();
		
	}
	//Return a book
	public function return_book()
	{
		$this->Book_model->return_book();
	}
}
?>

