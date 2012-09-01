<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends MY_Controller {


    public function __construct() {
        parent::__construct();
        $this->data['title'] = "Home";
    }
	public function index()
	{
        $this->data['trades'] = $this->mongo_db->order_by(['time'])->limit(10)->get('trades');
		$this->data['content'] = $this->load->view('home',$this->data,true);
        var_dump($this->data['trades']);
        $this->load->view('default',$this->data);
	}
    public function page($page = 0) {
        
    }
}

