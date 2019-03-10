<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PageController extends CI_Controller {

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

	// untuk buat load kontennya
	public function index(){
		$data["page_title"] = 'Dashboard';
		$this->load->view('head', $data);
		$this->load->view('dashboard', $data);
		$this->load->view('footer', $data);
	}
	public function anime_list(){
		$data["page_title"] = 'Anime List';
		$this->load->view('head', $data);
		$this->load->view('anime-list', $data);
		$this->load->view('footer', $data);
	}
	public function genre_list(){
		$data["page_title"] = 'Genre List';
		$this->load->view('head', $data);	
		$this->load->view('genre-list', $data);
		$this->load->view('footer', $data);
	}
	public function setting(){
		$data["page_title"] = 'Setting';
		$this->load->view('head', $data);
		$this->load->view('setting', $data);
		$this->load->view('footer', $data);
	}
}
