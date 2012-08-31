<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Search extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->data['title'] = "Search";
        
    }
	public function index()
	{
        // Load the search form
        $this->data['content'] = $this->load->view('search',null,true);
		$this->load->view('default',$this->data);
	}
    public function results()
    {
        // Get the post variables and perform the search
        $buy  = json_decode($this->input->post('buying'),true);
        $sell = json_decode($this->input->post('selling'),true);
        $this->data['trades'] = $this->mongo_db->where(['buying'=>$buy]);
        $this->data['content'] = $this->load->view('trades',$this->data,true);
        $this->data['title'] = "Search Results";
        $this->load->view('default',$this->data);
    }
}
