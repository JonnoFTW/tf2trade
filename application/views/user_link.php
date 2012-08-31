<?

echo "<span class='user_link'>".anchor("user/view/{$id64}","Profile")." ". anchor("backpack/view/{$id64}",'Backpack') ." ".anchor("steam://friends/add/{$id64}",'Add'). " ".anchor("steam://friends/message/{$id64}",'Message')." ".anchor("http://steamcommunity.com/profiles/{$id64}",'Steam Profile')."</span>";
