<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class AddTrade extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->data['title'] = "Add A Trade";
    }
	/**
	 * Add a trade!
	 */
	public function index()
	{
        
		$this->data['content'] = $this->load->view('addtrade',$this->data,true);
        $this->load->view('default',$this->data);
	}
    public function add() {
        $input = json_decode($this->input-post(),true);
        // Read in the post data which should be json and make a trade
        $this->mongo_db->insert('trades',['user'=>$this->session->userdata('steamid'),
                                              'time'=>new MongoDate(), 
                                              'buying'=>$input['buying'],
                                              'selling'=>$input['selling']
                                              ]);
    }
}
