<?
// Converts a mongo date object into a readable time

$this->m =& get_instance();
echo "<span alt='".date("l jS \of F Y h:i:s A",$sec)."' class='time'>".$this->m->time2str($sec)."</span>";
