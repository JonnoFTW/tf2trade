<?

// This is the view for a user

echo "SteamID: $SteamId</br>";
echo "VAC Status: ".($VACBanned?'True':'False')."</br>";
echo "Community Banned: ".($CommunityBanned?'True':'False')."</br>";
echo "Trade Banned: ".($EconomyBan?'True':'False')."</br>";

