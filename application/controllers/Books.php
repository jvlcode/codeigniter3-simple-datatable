<?php 
	class Books extends CI_Controller{
		
		public function __construct()
		{
			parent::__construct();
			$this->load->database();
			$this->load->model('books_model');
			$this->load->helper('url');
		}
		public function index(){
			$this->load->view('books/index.php');
		}
		public function books_data(){
			$draw = $this->input->get('draw');
			$start = $this->input->get('start');
			$length = $this->input->get('length');

			$books = $this->books_model->getBooks();
			$data = array();
			foreach($books->result() as $book){
				$data[] = array(
					$book->name,
					$book->price,
					$book->author,
					$book->rating,
					$book->publisher
				);
			}

			$output = array(
				'draw'=>$draw,
				'recordsTotal'=>$books->num_rows(),
				'recordsFiltered'=>$books->num_rows(),
				'data'=>$data
			);

			echo json_encode($output);
			exit();
		}
	}
