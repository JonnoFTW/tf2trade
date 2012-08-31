<?
$status = $bp['status'];
if($status === 8) {
    echo "Steam id invalid or missing";
} else if($status === 15) {
    echo "This backpack is private";
} else if($status === 18) {
    echo "This Steam ID does not exist";
} else if($status === 1) {
    echo "Slots in backpack:".$bp['num_backpack_slots']."</br>";
    $classes = ["Scout","Scout","Sniper","Soldier","Demoman","Medic","Heavy","Pyro","Spy","Engineer"];
    $slots =[0=>"Primary",1=>"Secondary",2=>"Melee",4=>"Building",6=>"PDA",7=>"Head",8=>"Misc 1",9=>"Action",10=>"Misc 2",65535=>"Previously Equipped"];
    $quality = [0=>["col"=>"#B2B2B2","name"=>"Normal"],
                1=>["col"=>"#4D7455","name"=>"Genuine"],
                2=>["col"=>"#B2B2B2","name"=>"Unused"], 
                3=>["col"=>"#476291","name"=>"Vintage"],
                4=>["col"=>"#B2B2B2","name"=>"Unused"],
                5=>["col"=>"#8650AC","name"=>"Unusual"],
                6=>["col"=>"#FFD700","name"=>"Unique"],
                7=>["col"=>"#70B04A","name"=>"Community"],
                8=>["col"=>"#A50F79","name"=>"Valve"],
                9=>["col"=>"#70B04A","name"=>"Self-made"],
                10=>["col"=>"#B2B2B2","name"=>"Customized"],
                11=>["col"=>"#CF6A32","name"=>"Strange"],
                12=>["col"=>"#B2B2B2","name"=>"Completed"],
                13=>["col"=>"#8650AC","name"=>"Haunted"]] ;
    //var_dump($bp['result']);
    $items = [];
  //  var_dump($bp);
    foreach($bp['items'] as $v) {
        // Each cell needs to contain the info
        $i = "id: " .$v['id']."</br>\n";
        $i .= "original id: ".$v['original_id']."</br>\n";
        $i .= "defindex: ".$v['defindex']."</br>\n";
        $i .= "level: ".$v['level']."</br>\n";
        $i .= "quantity: ". $v['quantity']."</br>\n";
        $i .= "quality: <span style='color:{$quality[$v['quality']]['col']}'>". $quality[$v['quality']]['name']."</span></br>\n";
        $i .= "Tradable: ". (isset($v['flag_cannot_trade'])?"True":"False")."</br>\n";
        $i .= "Craftable: ". (isset($v['flag_cannot_craft'])?"False":"True")."</br>\n";
        if(isset($v['custom_name']))
        $i .= "Custom Name: ". $v['custom_name']."</br>\n";
        if(isset($v['custom_descr']))
        $i .= "Custom Description: ". $v['custom_descr']."</br>\n";
        
        if(isset($v['contained_item']))
        $i .= "Gift Wrapped: ". $v['contained_item']."</br>\n";
        if(isset($v['style']))
        $i .= "Style: ". $v['style']."</br>\n";
        if(isset($v['equipped'])) {
            foreach($v['equipped'] as $u)
                $i .= "Equipped:  by {$classes[$u['class']]} as".
                       " {$slots[$u['slot']]}</br>\n";
        }
        $i .= "";
        
        $items[] = $i;
    }
    while(count($items) <= $bp['num_backpack_slots']) {
        $items[] = "";
    }
    echo $this->table->generate($this->table->make_columns($items,10));

}