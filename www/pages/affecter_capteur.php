<?
if(isset($_SESSION['auth']))
{
if(isset($_POST['id'])){
include("./pages/connexion.php");
$query = "UPDATE capteurs SET id_plan = '".$_POST['sonde']."', protocol = '".$_POST['protocol']."', `top` = '".$_POST['top']."', `left` = '".$_POST['left']."' WHERE nom = '".$_POST['id']."'";
mysql_query($query, $link);
}
include("./pages/connexion.php");
$query = "SELECT * FROM capteurs";
$req = mysql_query($query, $link) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
while ($data = mysql_fetch_assoc($req))
{
?>
<p><FORM method="post" action="./index.php?page=administration&detail=affecter_capteur">
<? echo $data['nom']; ?> : <select name="sonde">
<?
$query3 = "SELECT * FROM `plan` ORDER BY `libelle`";
$req3 = mysql_query($query3, $link) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
while($data3 = mysql_fetch_assoc($req3))
{ ?>
<option value="<? echo $data3['id']; ?>"<? if($data3['id'] ==  $data['id_plan']){ echo " selected"; } ?>><? echo $data3['libelle']; ?></option>
<? } ?>
</select>
Protocol : <select name="protocol">
<?
$query1 = "SELECT * FROM protocol WHERE actif = 1 ORDER BY `nom`";
$req1 = mysql_query($query1, $link) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
while($data1 = mysql_fetch_assoc($req1)) {
?>
<option value="<? echo $data1['zcode']; ?>"<? if($data1['zcode'] ==  $data['protocol']){ echo " selected"; } ?>><? echo $data1['nom']; ?></option>
<? } ?>
</select>
Droite:<INPUT TYPE="text" NAME="left" VALUE="<? echo $data['left']; ?>" size=5> 
bas:<INPUT TYPE="text" NAME="top" VALUE="<? echo $data['top']; ?>" size=5>
<INPUT TYPE="HIDDEN" NAME="id" VALUE="<? echo $data['nom']; ?>">
<INPUT TYPE="SUBMIT" NAME="VALIDER" VALUE="VALIDER">
</FORM></p>
<?
}
}
?>