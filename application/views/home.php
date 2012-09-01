<?
    foreach($announcement as $t) {
        echo $this->load->view('announcement',$t);
    }
    foreach($trades as $t) {
        echo $this->load->view('trade',$t);
    }
?>
