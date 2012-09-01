<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Trade extends MY_Controller {

    function __construct() {
        $this->data['title'] = "Trade";
    }
	/**
	 * Show information about a given trade
	 */
	public function index($tid = false)
	{
        $this->data['trade'] = $this->mongo_db->get('trades');
        if(!$tid) {
            // Please specify trade id
            $this->data['content'] = $this->load->view('trade_not_found',null,true);
        } else {
            $this->data['content'] = $this->load->view('trade',$this->data,true);
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
	
	/**
	 * Add a comment to a trade
	 */
	public function addComment() {
		$data = json_decode($this->input->post(),true);
        // Add the comment to the trade
        if(empty($data['text'])) {
            echo "Please provide text for a comment";
        } else {
            $this->mongo_db->update(['trade'=>$data['tid']])->push('comments',['time'=>new MongoDate(),'text'=>$data['text'],'user'=>['id64'=>$this->session->userdata('id')]]);
            echo "Comment was added";
        }
	}
    /**
     * Load comments for a given trade
     */
     public function getComments($tid = false) {
        if(!$tid) {
            echo "Please specify a trade to get comments for ";
        }
        else {
            $this->mongo_db->where(['_id'=>$tid])->get('trades');
        }
     }
}

