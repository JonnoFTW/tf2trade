<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Controller extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->data['content'] = "";
    }
    function getSteamApi($method, $args) {
        $defArgs = ['key' => '6FB1E2DDAF1CCDD1D36ECC6689630B4A','format'=>'json'];
        $args = array_merge($defArgs,$args);
        $url = "http://api.steampowered.com/$method/?". http_build_query($args);
        $arr = json_decode(file_get_contents($url),true);
        return $arr;
    }
}