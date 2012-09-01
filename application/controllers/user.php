<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends MY_Controller {

    function __construct() {
        $this->data['title'] = "User Profile";
    }
	/**
	 * Show information about a given trade
	 */
	public function index() {
       //show a search form or somethin here
	}
    public function view($id64 = false) {
        if(!$id64) {
            // Please specify user  id, possibly show a search form
            $this->data['content'] = "Please Specify a user";
        } else {
            $userInfo = $this->getSteamApi('ISteamUser/GetPlayerBans/v1',['steamids'=>$id64])['players'][0];
            $this->data['trade'] = $this->mongo_db->where([['user']=>['id64'=>$id64]])->get('trades');
            $this->data['content'] =  $this->load->view('user',$userInfo,true);
            $this->data['content'] .= $this->load->view('trade',$this->data,true);
        }
        $this->load->view('default',$this->data);
    }
    /**
     * Mark a particular trade as finished
     *
     */
    public function finish($tid = false) {
        if(!$tid) {
            $this->data['content'] = "Please specify a trade";
        } else {
            $this->mongo_db->update('trades',['_id'=>$tid,user=>$this->session->userdata['steamid']])->set(['finished',true]);
            $this->data['content'] = "Your trade was successfully marked as finished";
        }
        $this->load->view('default',$this->data);
    }
}

