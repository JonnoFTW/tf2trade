<?

// This is the view for a trade

echo $this->load->view('user_link',$user,true)." at ".$this->load->view('show_date',$time,true);
echo heading("Buying",2);
foreach($buying as $s) {
    echo "Item: ".$s['item_name'];
    echo "Low:".$s['low'];
    echo "high:".$s['high'];
}
echo heading("Selling",2);
foreach($selling as $s) {
    echo "Item: ".$s['item_name'];
    echo "Low:".$s['low'];
    echo "high:".$s['high'];
}
echo heading("Comments",2);
foreach($comments as $c) {
    echo $this->load->view('user_link',$c['user'],true)." at ".$this->load->view('show_date',$c['time'],true)."<p>{$c['text']} </p>";
}
// Need a form here to add more comments
echo form_open('trade/addComment');
echo form_textarea("Add Your Comment Here");
echo form_submit("Submit","Submit");
echo form_close();
echo "<hr/>";
