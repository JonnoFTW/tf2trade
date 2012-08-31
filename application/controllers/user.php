<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller {

    function __construct() {
        $this->data['title'] = "User Profile"
    }
	/**
	 * Show information about a given trade
	 */
	public function index($tid = false)
	{
        if(!$tid) {
            // Please specify trade id
        } else {
            $this->data['trade'] = $this->mongo_db->get('trades');
            $this->data['content'] = $this->load->view('trade',$this->data,true);
            $this->load->view('default',$this->data);
        }
	}

    /**
     * Mark a particular trade as finished
     *
     */
    public function finish($tid = false) {
        if(!$tid) {
            $this->data['content'] = "Please specify a trade";
            
        } else [
            $this->mongo_db->update('trades',['_id'=>$tid,user=>$this->session->userdata['steamid']])->set(['finished',true]);
            $this->data['content'] = "Your trade was successfully marked as finished";
        }
        $this->load->view('default',$this->data);
    }
}

