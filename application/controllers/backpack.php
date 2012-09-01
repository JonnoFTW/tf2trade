<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Backpack extends MY_Controller {

    function __construct() {
        parent::__construct();
        $this->data['title'] = "BackPack Viewer";
    }
	/**
	 * Show a users backpack
	 */
	public function index()
	{
        $this->data['content'] = "Please select a user to view";
        $this->load->view('default',$this->data);
	}
    public function view($id64 = false) {
        $this->load->library('table');
        
        if(!$id64) {
            // Please specify an id
            $this->data['content'] = $this->load->view('backpack_not_found',null,true);
        } else {
            $this->data['bp'] = $this->getSteamApi('IEconItems_440/GetPlayerItems/v0001',['SteamID'=>$id64])['result'];
            $this->data['content'] = $this->load->view('backpack',$this->data,true);
        }
        $this->load->view('default',$this->data);
    }
}

