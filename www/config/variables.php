<?
$link = mysql_connect($hote,$login,$plogin);
if (!$link) {
   die('Non connect&eacute; : ' . mysql_error());
}
$db_selected = mysql_select_db($base,$link);
if (!$db_selected) {
   die ('Impossible d\'utiliser la base : ' . mysql_error());
}
$query = "SELECT * FROM paramettres";
$req = mysql_query($query, $link) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
while ($data = mysql_fetch_assoc($req))
{
  if($data['libelle'] == 'meteo ville') { $meteo_ville = $data['value']; }
  if($data['libelle'] == 'meteo sonde temperature') { $meteo_sonde_temperature = $data['value']; }
  if($data['libelle'] == 'meteo sonde vent') { $meteo_sonde_vent = $data['value']; }
  if($data['libelle'] == 'pollution ville') { $pollution_ville = $data['value']; }
  if($data['libelle'] == 'idzibase') { $idzibase = $data['value']; }
  if($data['libelle'] == 'tokenzibase') { $tokenzibase = $data['value']; }
  if($data['libelle'] == 'ipzibase') { $ipzibase = $data['value']; }
  if($data['libelle'] == 'ipserver') { $ipserver = $data['value']; }
  if($data['libelle'] == 'cout fixe') { $coutfixe = $data['value']; }
  if($data['libelle'] == 'cout heure pleine') { $coutHP = $data['value']; }
  if($data['libelle'] == 'cout heure creuse') { $coutHC = $data['value']; }
  if($data['libelle'] == 'heure creuse 0 debut') { $heuresCreuses[0]['debut'] = $data['value'].':00'; }
  if($data['libelle'] == 'heure creuse 0 fin') { $heuresCreuses[0]['fin'] = $data['value'].':00'; }
  if($data['libelle'] == 'heure creuse 1 debut') { $heuresCreuses[1]['debut'] = $data['value'].':00'; }
  if($data['libelle'] == 'heure creuse 1 fin') { $heuresCreuses[1]['fin'] = $data['value'].':00'; }
  if($data['libelle'] == 'heure creuse 2 debut') { $heuresCreuses[2]['debut'] = $data['value'].':00'; }
  if($data['libelle'] == 'heure creuse 2 fin') { $heuresCreuses[2]['fin'] = $data['value'].':00'; }
  if($data['libelle'] == 'cout eau') { $coutEau = $data['value']; }
  if($data['libelle'] == 'couleur graph 1') { $couleurgraph1 = $data['value']; }
  if($data['libelle'] == 'couleur graph 2') { $couleurgraph2 = $data['value']; }
}
?>
