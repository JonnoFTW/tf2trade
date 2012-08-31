<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Backpack extends CI_Controller {

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
            $steam_key = '6FB1E2DDAF1CCDD1D36ECC6689630B4A';
            $sid = urlencode($id64);
            $this->data['bp'] = json_decode(file_get_contents("http://api.steampowered.com/IEconItems_440/GetPlayerItems/v0001/?key=$steam_key&format=json&SteamID=$sid"),true)['result'];
            $this->data['content'] = $this->load->view('backpack',$this->data,true);
        }
        $this->load->view('default',$this->data);
    }
}

